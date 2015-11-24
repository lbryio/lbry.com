<!DOCTYPE html>
<html>
    <head prefix="og: http://ogp.me/ns#">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <?php $title = Response::getMetaTitle() ?: Response::guessMetaTitle($content) ?>
        <?php $title = $title ? 
                          $title . (strpos($title, 'LBRY') === false ? ' - LBRY' : '') :
                          'LBRY' ?>
        <title><?php echo $title ?></title>
        
        <link href='//fonts.googleapis.com/css?family=Raleway:600,300' rel='stylesheet' type='text/css'>
        <link href="/css/all.css" rel="stylesheet" type="text/css" media="screen,print" />
        <link rel="apple-touch-icon" sizes="60x60" href="/img/fav/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/fav/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/fav/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/fav/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/fav/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="/img/fav/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/img/fav/favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="/img/fav/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="/img/fav/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="/img/fav/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/img/fav/manifest.json">
        <meta name="description" content="<?php echo Response::getMetaDescription() ?>">
        <meta name="msapplication-TileColor" content="#155B4A">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#155B4A">        
        <!-- Twitter Card data -->
        <meta name="twitter:site" content="@lbryio">
        <meta name="twitter:creator" content="@lbryio">

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo $title ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo Response::getMetaImage() ?>" />
        <meta property="og:description" content="<?php echo Response::getMetaDescription() ?>"/>
        <meta property="og:site_name" content="LBRY" />
    </head>
    <body>
      <?php echo $content ?>
      <div class="hide">
        <div id="js">
          <script src="/js/jquery-2.1.3.min.js"></script>
          <script src="/js/global.js"></script>
          <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-60403362-1', 'auto');
            ga('send', 'pageview');

          </script>
        </div>
      </div>
    </body>
</html>
