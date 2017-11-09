<?php

class ContentActions extends Actions
{
  const
    SLUG_RSS = 'rss.xml',
    SLUG_NEWS = 'news',
    SLUG_FAQ = 'faq',
    SLUG_PRESS = 'press',
    SLUG_BOUNTY = 'bounty',
    SLUG_CREDIT_REPORTS = 'credit-reports',

    URL_NEWS = '/' . self::SLUG_NEWS,
    URL_FAQ = '/' . self::SLUG_FAQ,
    URL_PRESS = '/' . self::SLUG_PRESS,
    URL_BOUNTY = '/' . self::SLUG_BOUNTY,
    URL_CREDIT_REPORTS = '/' . self::SLUG_CREDIT_REPORTS,

    CONTENT_DIR = ROOT_DIR . '/content',

    VIEW_FOLDER_NEWS = self::CONTENT_DIR . '/' . self::SLUG_NEWS,
    VIEW_FOLDER_FAQ = self::CONTENT_DIR . '/' . self::SLUG_FAQ,
    VIEW_FOLDER_BOUNTY = self::CONTENT_DIR . '/' . self::SLUG_BOUNTY,
    VIEW_FOLDER_PRESS = self::CONTENT_DIR . '/' . self::SLUG_PRESS,
    VIEW_FOLDER_CREDIT_REPORTS = self::CONTENT_DIR . '/' . self::SLUG_CREDIT_REPORTS;

  public static function executeHome(): array
  {
    Response::enableHttpCache();
    return ['page/home'];
  }

  public static function executeNews(string $slug = null): array
  {
    Response::enableHttpCache();

    if (!$slug || $slug == static::SLUG_RSS)
    {
      $posts = array_filter(
        Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC),
        function(Post $post) {
          return !$post->getDate() || $post->getDate()->format('U') <= date('U');
        });

      if ($slug == static::SLUG_RSS)
      {
        Response::setHeader(Response::HEADER_CONTENT_TYPE, 'text/xml; charset=utf-8');
        return ['content/rss', [
          'posts'      => array_slice($posts, 0, 10),
          '_no_layout' => true
        ]];
      }

      return ['content/news', [
        'posts'             => $posts,
        View::LAYOUT_PARAMS => [
          'showRssLink' => true
        ]
      ]];
    }

    try
    {
      $post = Post::load(static::SLUG_NEWS . '/' . ltrim($slug, '/'));
    }
    catch (PostNotFoundException $e)
    {
      return NavActions::execute404();
    }

    return ['content/news-post', [
      'post'              => $post,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }

  public static function executeFaq(string $slug = null): array
  {
    Response::enableHttpCache();

    if (!$slug)
    {
      $allPosts = Post::find(static::VIEW_FOLDER_FAQ, Post::SORT_ORD_ASC);

      $allCategories    = [
        'LBRY 101'   => 'Intro to LBRY',
        'getstarted' => 'Getting Started',
        'setup'      => 'Installing and Running LBRY',
        'troubleshooting' => 'Help and Troubleshooting',
        'wallet'     => 'Wallet and Transactions',
        'mining'     => 'Mining LBC',
        'developer'  => 'Developers',
        'differences' => 'What Makes LBRY Different?',
        'other'      => 'Other Questions',
      ] + Post::collectMetadata($allPosts, 'category');

      $selectedCategory = Request::getParam('category');
      $filters          = array_filter([
        'category' => $selectedCategory && isset($allCategories[$selectedCategory]) ? $selectedCategory : null,
      ]);

      $posts = $filters ? Post::filter($allPosts, $filters) : $allPosts;

      $groups = array_fill_keys(array_keys($allCategories), []);

      foreach ($posts as $post)
      {
        $groups[$post->getCategory()][] = $post;
      }

      return ['content/faq', [
        'categories'       => $allCategories,
        'selectedCategory' => $selectedCategory,
        'postGroups'       => $groups
      ]];
    }

    try
    {
      $post = Post::load(static::SLUG_FAQ . '/' . ltrim($slug, '/'));
    }
    catch (PostNotFoundException $e)
    {
      return Controller::redirect('/' . static::SLUG_FAQ);
    }
    return ['content/faq-post', ['post' => $post]];
  }


  public static function executeCreditReports(string $year = null, string $month = null): array
  {
    Response::enableHttpCache();

    $posts = Post::find(static::VIEW_FOLDER_CREDIT_REPORTS);
    
    return ['content/credit-reports', [
      'posts' => $posts
    ]];
  }

  public static function executeCreditReport(string $year = null, string $quarter = null): array
  {

    Response::enableHttpCache();

    try
    {
      $post = Post::load(static::SLUG_CREDIT_REPORTS . '/' . $year . '-Q' . $quarter);
    }
    catch (PostNotFoundException $e)
    {
      return Controller::redirect('/' . static::SLUG_CREDIT_REPORTS);
    }
    $metadata = $post->getMetadata();
    return ['content/credit-report', [
      'post' => $post,
      'sheetUrl' => $metadata['sheet']
    ]];
  }

  public static function executePress(string $slug = null): array
  {
    Response::enableHttpCache();
    try
    {
      $post = Post::load(static::SLUG_PRESS . '/' . ltrim($slug, '/'));
    }
    catch (PostNotFoundException $e)
    {
      return NavActions::execute404();
    }
    return ['content/press-post', ['post' => $post]];
  }

  protected static function convertBountyAmount($amount)
  {
    return is_numeric($amount) ? round($amount / LBRY::getLBCtoUSDRate(), -1) : $amount;
  }

  public static function executeBounty(string $slug = null): array
  {
    Response::enableHttpCache();



    if ($slug)
    {
      list($metadata, $postHtml) = View::parseMarkdown(ContentActions::VIEW_FOLDER_BOUNTY . '/' . $slug . '.md');

      $metadata['lbc_award'] = static::convertBountyAmount($metadata['award']);

      if (!$postHtml)
      {
        return NavActions::execute404();
      }

      return ['bounty/show', [
        'postHtml' => $postHtml,
        'metadata' => $metadata
      ]];
    }

    $allBounties = Post::find(static::CONTENT_DIR . '/bounty');

    $allCategories = ['' => ''] + Post::collectMetadata($allBounties, 'category');
    $allStatuses = ['' => ''] + array_merge(Post::collectMetadata($allBounties, 'status'), ['complete' => 'unavailable']);

    $selectedStatus = Request::getParam('status', 'available');
    $selectedCategory = Request::getParam('category');

    $filters = array_filter([
      'category' => $selectedCategory && isset($allCategories[$selectedCategory]) ? $selectedCategory : null,
      'status' => $selectedStatus && isset($allStatuses[$selectedStatus]) ? $selectedStatus : null
    ]);

    $bounties = $filters ? Post::filter($allBounties, $filters) : $allBounties;

    uasort($bounties, function($postA, $postB) {
      $metadataA = $postA->getMetadata();
      $metadataB = $postB->getMetadata();
      $awardA = strpos('-', $metadataA['award']) !== false ? rtrim(explode('-', $metadataA['award'])[0], '+') : $metadataA['award'];
      $awardB = strpos('-', $metadataB['award']) !== false ? rtrim(explode('-', $metadataB['award'])[0], '+') : $metadataB['award'];
      if ($awardA != $awardB)
      {
        return $awardA > $awardB ? -1 : 1;
      }
      return $metadataA['title'] < $metadataB['title'] ? -1 : 1;
    });

    foreach($bounties as $bounty) {
      $metadata = $bounty->getMetadata();
      $bounty->setMetadataItem('lbc_award', static::convertBountyAmount($metadata['award']));
    }

    return ['bounty/list', [
      'bounties' => $bounties,
      'categories' => $allCategories,
      'statuses' => $allStatuses,
      'selectedCategory' => $selectedCategory,
      'selectedStatus' => $selectedStatus
    ]];
  }

  public static function executeRoadmap()
  {
    $cache = !Request::getParam('nocache');
    $githubItems = Github::listRoadmapChangesets($cache);

    $projectMaxVersions = [];
    foreach($githubItems as $group => $items)
    {
      if ($items)
      {
        $lastItem = end($items);
        $project = $lastItem['project'];
        if (!isset($projectMaxVersions[$project]) || $lastItem['sort_key'] > $projectMaxVersions[$project])
        {
          $projectMaxVersions[$project] = $lastItem['sort_key'];
        }
      }
    }

    $items = array_merge($githubItems, Asana::listRoadmapTasks($cache));
    return ['content/roadmap', [
      'projectMaxVersions' => $projectMaxVersions,
      'items' => $items
    ]];
  }

  public static function executePressKit(): array
  {
    $zipFileName = 'lbry-press-kit-' . date('Y-m-d') . '.zip';
    $zipPath     = tempnam('/tmp', $zipFileName);

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

    foreach (glob(ROOT_DIR . '/web/img/press/*') as $productImgPath)
    {
      $imgPathTokens = explode('/', $productImgPath);
      $imgName       = $imgPathTokens[count($imgPathTokens) - 1];
      $zip->addFile($productImgPath, '/logo_and_product/' . $imgName);
    }

    foreach (glob(ContentActions::CONTENT_DIR . '/bio/*.md') as $bioPath)
    {
      list($metadata, $bioHtml) = View::parseMarkdown($bioPath);
      $zip->addFile($bioPath, '/team_bios/' . $metadata['name'] . ' - ' . $metadata['role'] . '.txt');
    }

    foreach (array_filter(glob(ROOT_DIR . '/web/img/team/*.jpg'), function ($path)
    {
      return strpos($path, 'spooner') === false;
    }) as $bioImgPath)
    {
      $imgPathTokens = explode('/', $bioImgPath);
      $imgName       = str_replace('644x450', 'lbry', $imgPathTokens[count($imgPathTokens) - 1]);
      $zip->addFile($bioImgPath, '/team_photos/' . $imgName);
    }


    $zip->close();

    Response::enableHttpCache();
    Response::setDownloadHttpHeaders($zipFileName, 'application/zip', filesize($zipPath));

    return ['internal/zip', [
      '_no_layout' => true,
      'zipPath'    => $zipPath
    ]];
  }

  public static function prepareBioPartial(array $vars): array
  {
    $person = $vars['person'];
    $path   = 'bio/' . $person . '.md';
    list($metadata, $bioHtml) = View::parseMarkdown($path);
    $relativeImgSrc = '/img/team/' . $person . '-644x450.jpg';
    $imgSrc         = file_exists(ROOT_DIR . '/web' . $relativeImgSrc) ? $relativeImgSrc : '/img/team/spooner-644x450.jpg';
    return $vars + $metadata + [
      'imgSrc'      => $imgSrc,
      'bioHtml'     => $bioHtml,
      'orientation' => 'vertical'
    ];
  }

  public static function preparePostAuthorPartial(array $vars): array
  {
    $post = $vars['post'];
    return [
      'authorName'    => $post->getAuthorName(),
      'photoImgSrc'   => $post->getAuthorPhoto(),
      'authorBioHtml' => $post->getAuthorBioHtml()
    ];
  }

  public static function preparePostListPartial(array $vars): array
  {
    $count = $vars['count'] ?? 3;
    return [
      'posts' => array_slice(Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC), 0, $count)
    ];
  }
}
