<?php

class ContentActions extends Actions
{
    const
    SLUG_RSS = 'rss.xml',
    SLUG_NEWS = 'news',
    SLUG_FAQ = 'faq',
    SLUG_CREDIT_REPORTS = 'credit-reports',
    SLUG_JOBS = 'jobs',

    URL_NEWS = '/' . self::SLUG_NEWS,
    URL_FAQ = '/' . self::SLUG_FAQ,
    URL_CREDIT_REPORTS = '/' . self::SLUG_CREDIT_REPORTS,

    CONTENT_DIR = ROOT_DIR . '/content',

    VIEW_FOLDER_NEWS = self::CONTENT_DIR . '/' . self::SLUG_NEWS,
    VIEW_FOLDER_FAQ = self::CONTENT_DIR . '/' . self::SLUG_FAQ,
    VIEW_FOLDER_CREDIT_REPORTS = self::CONTENT_DIR . '/' . self::SLUG_CREDIT_REPORTS,
    VIEW_FOLDER_JOBS = self::CONTENT_DIR . '/' . self::SLUG_JOBS;

    public static function executeHome(): array
    {
        Response::enablePublicImmutableCache();
        return ['page/home'];
    }

    //
    public static function executeOrg(): array
    {
        Response::enablePublicImmutableCache();
        return ['page/org'];
    }

    public static function executeTv(): array
    {
        Response::enablePublicImmutableCache();
        return ['page/tv'];
    }
    //

    public static function executeNews(string $slug = null): array
    {
        Response::enablePublicImmutableCache();

        if (!$slug || $slug == static::SLUG_RSS) {
            $posts = array_filter(
        Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC),
        function (Post $post) {
            return !$post->getDate() || $post->getDate()->format('U') <= date('U');
        }
      );

            if ($slug == static::SLUG_RSS) {
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

        try {
            $post = Post::load(static::SLUG_NEWS . '/' . ltrim($slug, '/'));
        } catch (PostException $e) {
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
        Response::enablePublicImmutableCache();

        if (!$slug) {
            $allPosts = Post::find(static::VIEW_FOLDER_FAQ, Post::SORT_ORD_ASC);

            $allCategories = [
        'LBRY 101' => 'Intro to LBRY',
        'getstarted' => 'Getting Started',
        'tutorial' => 'LBRY Tutorials',
        'publisher' => 'Publishers and Creators',
        'troubleshooting' => 'Help and Troubleshooting',
        'powerusers' => 'LBRY for Power Users',       
        'wallet' => 'Wallet and Transactions',
        'bots' => 'LBRY Bots',
        'mining' => 'Mining LBC',
        'differences' => 'What Makes LBRY Different?',
        'other' => 'Other Questions',
      ] + Post::collectMetadata($allPosts, 'category');

            $selectedCategory = Request::getParam('category');
            $filters          = array_filter([
        'category' => $selectedCategory && isset($allCategories[$selectedCategory]) ? $selectedCategory : null,
      ]);

            $posts = $filters ? Post::filter($allPosts, $filters) : $allPosts;

            $groups = array_fill_keys(array_keys($allCategories), []);

            foreach ($posts as $post) {
                $groups[$post->getCategory()][] = $post;
            }

            return ['content/faq', [
        'categories'       => $allCategories,
        'selectedCategory' => $selectedCategory,
        'postGroups'       => $groups
      ]];
        }

        try {
            $post = Post::load(static::SLUG_FAQ . '/' . ltrim($slug, '/'));
        } catch (PostException $e) {
            return Controller::redirect('/' . static::SLUG_FAQ);
        }
        return ['content/faq-post', ['post' => $post]];
    }


    public static function executeCreditReports(string $year = null, string $month = null): array
    {
        Response::enablePublicImmutableCache();

        $posts = Post::find(static::VIEW_FOLDER_CREDIT_REPORTS);

        return ['content/credit-reports', [
      'posts' => $posts
    ]];
    }

    public static function executeCreditReport(string $year = null, string $quarter = null): array
    {
        Response::enablePublicImmutableCache();

        try {
            $post = Post::load(static::SLUG_CREDIT_REPORTS . '/' . $year . '-Q' . $quarter);
        } catch (PostException $e) {
            return Controller::redirect('/' . static::SLUG_CREDIT_REPORTS);
        }
        $metadata = $post->getMetadata();
        return ['content/credit-report', [
      'post' => $post,
      'sheetUrl' => $metadata['sheet']
    ]];
    }


    public static function executeBountyRedirect(string $slug = null): array
    {
        return Controller::redirect('https://lbry.tech/contribute');
    }

    public static function executeRoadmap(string $year = '2000')
    {
        $cache = !Request::getParam('nocache');
        $years = range(2019, 2020);

        if (!in_array($year, $years)) {
          Controller::redirect('/roadmap');
        }

        return ['content/roadmap', [
          'year' => $year,
          'years' => $years,
          'items' => Github::listRoadmapItems($year, $cache)
        ]];
    }

    public static function executePressKit(): array
    {
//        $zipFileName = 'lbry-press-kit-' . date('Y-m-d') . '.zip';
//        $zipPath     = tempnam('/tmp', $zipFileName);
//
//        $zip = new ZipArchive();
//        $zip->open($zipPath, ZipArchive::OVERWRITE);
//
//        foreach (glob(ROOT_DIR . '/web/img/press/*') as $productImgPath) {
//            $imgPathTokens = explode('/', $productImgPath);
//            $imgName       = $imgPathTokens[count($imgPathTokens) - 1];
//            $zip->addFile($productImgPath, 'logo_and_product/' . $imgName);
//        }
//
//        foreach (glob(ContentActions::CONTENT_DIR . '/bio/*.md') as $bioPath) {
//            list($metadata, $bioHtml) = View::parseMarkdown($bioPath);
//            $zip->addFile($bioPath, 'team_bios/' . $metadata['name'] . ' - ' . $metadata['role'] . '.txt');
//        }

        /*
         * team bio images are no longer included in press kit now that they've moved to spee.ch
         * this should be fixed if we care about the press-kit page
         */
//    foreach (array_filter(glob(ROOT_DIR . '/web/img/team/*.jpg'), function ($path)
//    {
//      return strpos($path, 'spooner') === false;
//    }) as $bioImgPath)
//    {
//      $imgPathTokens = explode('/', $bioImgPath);
//      $imgName       = str_replace('644x450', 'lbry', $imgPathTokens[count($imgPathTokens) - 1]);
//      $zip->addFile($bioImgPath, '/team_photos/' . $imgName);
//    }

//
//        $zip->close();
//
//        Response::enablePublicImmutableCache();
//        Response::setDownloadHttpHeaders($zipFileName, 'application/zip', filesize($zipPath));
//
//        return ['internal/zip', [
//      '_no_layout' => true,
//      'zipPath'    => $zipPath
//    ]];
    }

    public static function prepareBioPartial(array $vars): array
    {
        $person = $vars['person'];
        $path   = 'bio/' . $person . '.md';
        list($metadata, $bioHtml) = View::parseMarkdown($path);
        $imgSrc         = 'https://spee.ch/@lbryteam:6/' . $person . '.jpg';
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
      'authorBioHtml' => $post->getAuthorBioHtml(),
      'authorGithub' => $post->getAuthorGithubID(),
      'authorTwitter' => $post->getAuthorTwitterID(),
      'authorEmail' => $post->getAuthorPostEmail()
    ];
    }

    public static function preparePostListPartial(array $vars): array
    {
        $count = $vars['count'] ?? 3;
        return [
      'posts' => array_slice(Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC), 0, $count)
    ];
    }
    public static function executePostCategoryFilter(string $category)
    {
        Response::enablePublicImmutableCache();

        $filter_post = [];

        $posts = array_filter(
      Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC),
      function (Post $post) use ($category) {
          return (($post->getCategory() === $category) && (!$post->getDate() || $post->getDate()->format('U') <= date('U')));
      }
    );



        return ['content/news', [
      'posts'             => $posts,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
    }

    public static function prepareJobsPartial(array $vars)
    {
        $jobs =
      array_filter(
        array_map('View::parseMarkdown', glob(static::VIEW_FOLDER_JOBS . '/*')),
        function ($job) {
            return $job[0]['status'] !== 'closed';
        }
      );

        usort($jobs, function ($jobA, $jobB) {
            if ($jobA[0]['status'] === 'active' xor $jobB[0]['status'] === 'active') {
                return $jobA[0]['status'] === 'active' ? -1 : 1;
            }
            return $jobA[0]['order'] <=> $jobB[0]['order'];
        });

        return $vars + ['jobs' => $jobs];
    }
}
