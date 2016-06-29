<?php

/**
 * Description of ContentActions
 *
 * @author jeremy
 */
class ContentActions extends Actions
{
  const RSS_SLUG = 'rss.xml',
        URL_NEWS = '/news',
        URL_FAQ = '/faq',
        VIEW_FOLDER_NEWS = ROOT_DIR . '/posts/news',
        VIEW_FOLDER_FAQ = ROOT_DIR . '/posts/faq';

  public static function executeHome()
  {
    return ['page/home', [
      'totalUSD' => CreditApi::getTotalDollarSales(),
      'totalPeople' => CreditApi::getTotalPeople()
    ]];
  }

  public static function executeFaq()
  {
    $posts = Post::find(static::VIEW_FOLDER_FAQ);
    return ['content/faq', [
      'posts' => $posts
    ]];
  }

  public static function executeNews()
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    return ['content/news', [
      'posts' => $posts,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }


  public static function executeRss()
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    return ['content/rss', [
      'posts' => array_slice($posts, 0, 10),
      '_no_layout' => true
    ], [
      'Content-Type' => 'text/xml; charset=utf-8'
    ]];
  }

  public static function executePost($relativeUri)
  {
    $post = Post::load(ltrim($relativeUri, '/'));
    if (!$post)
    {
      return ['page/404', []];
    }
    return ['content/post', [
      'post' => $post,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }

  public static function executePressKit()
  {
    $zipFileName = 'lbry-press-kit-' . date('Y-m-d') . '.zip';
    $zipPath = tempnam('/tmp', $zipFileName);

    $zip = new ZipArchive();
    $zip->open($zipPath, ZipArchive::OVERWRITE);

//    $pageHtml = View::render('page/press-kit', ['showHeader' => false]);
//    $html = <<<EOD
//<!DOCTYPE html>
//<html>
//    <head prefix="og: http://ogp.me/ns#">
//        <title>LBRY Press Kit</title>
//        <link href='https://fonts.googleapis.com/css?family=Raleway:300,300italic,400,400italic,700' rel='stylesheet' type='text/css'>
//        <link href="https://lbry.io/css/all.css" rel="stylesheet" type="text/css" media="screen,print" />
//    </head>
//    <body>
//      $pageHtml
//    </body>
//</html>
//EOD;
//
//    $zip->addFromString('press.html', $html);

    foreach(glob(ROOT_DIR . '/web/img/press/*') as $productImgPath)
    {
      $imgPathTokens = explode('/', $productImgPath);
      $imgName = $imgPathTokens[count($imgPathTokens) - 1];
      $zip->addFile($productImgPath, '/logo_and_product/' . $imgName);
    }

    foreach(glob(ROOT_DIR . '/posts/bio/*.md') as $bioPath)
    {
      list($metadata, $bioHtml) = View::parseMarkdown($bioPath);
      $zip->addFile($bioPath, '/team_bios/' . $metadata['name'] . ' - ' . $metadata['role'] . '.txt');
    }

    foreach(array_filter(glob(ROOT_DIR . '/web/img/team/*.jpg'), function($path) {
      return strpos($path, 'spooner') === false;
    }) as $bioImgPath)
    {
      $imgPathTokens = explode('/', $bioImgPath);
      $imgName = str_replace('644x450', 'lbry', $imgPathTokens[count($imgPathTokens) - 1]);
      $zip->addFile($bioImgPath, '/team_photos/' . $imgName);
    }


    $zip->close();

    return ['internal/zip', [
      '_no_layout' => true,
      'zipPath' => $zipPath
    ], [
      'Content-Disposition' => 'attachment;filename=' . $zipFileName,
      'X-Content-Type-Options' => 'nosniff',
      'Content-Type' => 'application/zip',
      'Content-Length' => filesize($zipPath),
    ]];
  }

  public static function prepareBioPartial(array $vars)
  {
    $person = $vars['person'];
    $path = 'bio/' . $person . '.md';
    list($metadata, $bioHtml) = View::parseMarkdown($path);
    return $metadata + [
      'imgSrc' => '/img/team/' . $person . '-644x450.jpg',
      'bioHtml' => $bioHtml,
    ];
  }

  public static function preparePostAuthorPartial(array $vars)
  {
    $post = $vars['post'];
    return [
      'authorName' => $post->getAuthorName(),
      'photoImgSrc' => $post->getAuthorPhoto(),
      'authorBioHtml' => $post->getAuthorBioHtml()
    ];
  }
}
