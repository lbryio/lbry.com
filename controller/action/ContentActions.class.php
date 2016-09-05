<?php

class ContentActions extends Actions
{
  const RSS_SLUG = 'rss.xml',
        URL_NEWS = '/news',
        URL_FAQ = '/faq',
        VIEW_FOLDER_NEWS = ROOT_DIR . '/posts/news',
        VIEW_FOLDER_FAQ = ROOT_DIR . '/posts/faq';

  public static function executeHome(): array
  {
    Response::enableHttpCache();
    return ['page/home'];
  }

  public static function executeFaq(): array
  {
    $allPosts = Post::find(static::VIEW_FOLDER_FAQ);

    $allCategories = array_merge(['' => ''] + Post::collectMetadata($allPosts, 'category'), [
      'getstarted' => 'Getting Started',
      'install'    => 'Installing LBRY',
      'running'    => 'Running LBRY',
      'wallet'     => 'The LBRY Wallet',
      'hosting'    => 'Hosting Content',
      'mining'     => 'Mining LBC',
      'policy'     => 'Policies',
      'developer'  => 'Developers',
      'other'      => 'Other Questions',
    ]);
    $selectedCategory = static::param('category');
    $filters = array_filter([
      'category' => $selectedCategory && isset($allCategories[$selectedCategory]) ? $selectedCategory : null,
    ]);

    asort($allCategories);

    $posts = $filters ? Post::filter($allPosts, $filters) : $allPosts ;


    $groups = array_fill_keys(array_keys($allCategories), []);

    foreach($posts as $post)
    {
      $groups[$post->getCategory()][] = $post;
    }

    return ['content/faq', [
      'categories' => $allCategories,
      'selectedCategory' => $selectedCategory,
      'postGroups' => $groups
    ]];
  }

  public static function executeNews(): array
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    return ['content/news', [
      'posts' => $posts,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }


  public static function executeRss(): array
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    Response::setHeader(Response::HEADER_CONTENT_TYPE, 'text/xml; charset=utf-8');
    return ['content/rss', [
      'posts' => array_slice($posts, 0, 10),
      '_no_layout' => true
    ]];
  }

  public static function executeNewsPost($relativeUri): array
  {
    try
    {
      $post = Post::load(ltrim($relativeUri, '/'));
    }
    catch (PostNotFoundException $e)
    {
      return ['page/404', []];
    }
    return ['content/news-post', [
      'post' => $post,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }

  public static function executeFaqPost($relativeUri): array
  {
    try
    {
      $post = Post::load(ltrim($relativeUri, '/'));
    }
    catch (PostNotFoundException $e)
    {
      return ['page/404', []];
    }
    return ['content/faq-post', [
      'post' => $post,
    ]];
  }

  public static function executePressKit(): array
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

    Response::enableHttpCache();
    Response::setDownloadHttpHeaders($zipFileName, 'application/zip', filesize($zipPath));

    return ['internal/zip', [
      '_no_layout' => true,
      'zipPath' => $zipPath
    ]];
  }

  public static function prepareBioPartial(array $vars): array
  {
    $person = $vars['person'];
    $path = 'bio/' . $person . '.md';
    list($metadata, $bioHtml) = View::parseMarkdown($path);
    $relativeImgSrc = '/img/team/' . $person . '-644x450.jpg';
    $imgSrc = file_exists(ROOT_DIR . '/web' . $relativeImgSrc) ? $relativeImgSrc : '/img/team/spooner-644x450.jpg';
    return $vars + $metadata + [
      'imgSrc' => $imgSrc,
      'bioHtml' => $bioHtml,
      'orientation' => 'vertical'
    ];
  }

  public static function preparePostAuthorPartial(array $vars): array
  {
    $post = $vars['post'];
    return [
      'authorName' => $post->getAuthorName(),
      'photoImgSrc' => $post->getAuthorPhoto(),
      'authorBioHtml' => $post->getAuthorBioHtml()
    ];
  }

  public static function preparePostListPartial(array $vars): array
  {
    $count = isset($vars['count']) ? $vars['count'] : 3;
    return [
      'posts' => array_slice(Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC), 0, $count)
    ];
  }
}
