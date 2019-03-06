<!DOCTYPE html>
<html lang="en">
  <head prefix="og: http://ogp.me/ns#">
    <meta name="google-site-verification" content="QEyIHPbSKR2Z9ZNkfVHGdGv5EE7tTM7FE0Wt8tmcH50"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>

    <?php $title = Response::getMetaTitle() ?: Response::guessMetaTitle($content) ?>
    <?php $title = $title ?
      $title . (strpos($title, 'LBRY') === false ? ' - LBRY' : '') :
      'LBRY' ?>
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tonsky/FiraCode@master/distr/fira_code.css"/>
    <link rel="stylesheet" href="/components/dist/index.css"/>

    <?php foreach (Response::getCssAssets() as $src): ?>
    <link rel="stylesheet" href="<?php echo $src?>"/>
    <?php endforeach ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"/>

    <link rel="apple-touch-icon" sizes="60x60" href="/img/fav/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/img/fav/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/img/fav/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/img/fav/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/img/fav/apple-touch-icon-180x180.png"/>

    <link rel="icon" type="image/png" href="/img/fav/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/img/fav/favicon-194x194.png" sizes="194x194"/>
    <link rel="icon" type="image/png" href="/img/fav/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/png" href="/img/fav/android-chrome-192x192.png" sizes="192x192"/>
    <link rel="icon" type="image/png" href="/img/fav/favicon-16x16.png" sizes="16x16"/>

    <link rel="manifest" href="/img/fav/manifest.json"/>

    <?php if (isset($showRssLink) && $showRssLink): ?>
    <link rel="alternate" type="application/rss+xml" title="LBRY News" href="<?php echo ContentActions::URL_NEWS . '/' . ContentActions::SLUG_RSS ?>"/>
    <?php endif ?>

    <meta name="description" content="<?php echo Response::getMetaDescription() ?>"/>
    <meta name="msapplication-TileColor" content="#155B4A"/>
    <meta name="msapplication-TileImage" content="/img/fav/mstile-144x144.png"/>
    <meta name="theme-color" content="#155B4A"/>

    <!-- Twitter Card data -->
    <meta name="twitter:site" content="@lbryio">
    <meta name="twitter:creator" content="@lbryio">

    <meta property="fb:app_id" content="1673146449633983"/>

    <!-- Open Graph data -->
    <meta property="og:description" content="<?php echo Response::getMetaDescription() ?>"/>
    <?php foreach (Response::getMetaImages() as $image): ?>
    <meta property="og:image" content="<?php echo $image ?>"/>
    <?php endforeach ?>
    <meta property="og:site_name" content="LBRY"/>
    <meta property="og:title" content="<?php echo $title ?>"/>
    <meta property="og:type" content="article"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <base target="_parent"/>

    <?php echo View::render('layout/_analytics_head') ?>
  </head>

  <body>
    <?php echo View::render('nav/_header', ['isDark' => false, 'isBordered' => false]) ?>
    <?php echo $content ?>
    <?php echo View::render('nav/_footer') ?>

    <div style="display: none;">
      <div id="fb-root"></div>

      <div id="js">
        <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1477813539180850"></script>
        <script id="twitter-oct" src="https://platform.twitter.com/oct.js"></script>
        <script id="twitter-wjs" src="https://platform.twitter.com/widgets.js"></script>

        <?php foreach (Response::getJsAssets() as $src): ?>
        <script src="<?php echo $src ?>"></script>
        <?php endforeach ?>

        <?php echo View::render('layout/_analytics_footer') ?>
        <?php $js = Response::getJsCalls() ?>

        <?php if ($js): ?>
        <script><?php echo implode("\n", $js) ?></script>
        <?php endif ?>
      </div>
    </div>
  </body>
</html>
