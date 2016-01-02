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

        <meta property="fb:app_id" content="1673146449633983" />

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo $title ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo Response::getMetaImage() ?>" />
        <meta property="og:description" content="<?php echo Response::getMetaDescription() ?>"/>
        <meta property="og:site_name" content="LBRY" />
        
        <base target="_parent" />
    </head>
    <body>
      <?php echo $content ?>
      <div class="hide">
        <div id="fb-root"></div>
        <div id="js">
          <?php Response::addJsAsset('//platform.twitter.com/oct.js') ?>
          <?php foreach(Response::getJsAssets() as $src): ?>
            <script src="<?php echo $src ?>"></script>
          <?php endforeach ?>
          <script>
            <?php //google analytics ?>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-60403362-1', 'auto');
            ga('send', 'pageview');

            <?php //facebook sdk and events (do we need both??) ?>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1477813539180850";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','//connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1618717031725766');
            
            <?php //twitter ?>
            window.twttr = (function(d,s,id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
              if (d.getElementById(id)) return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//platform.twitter.com/widgets.js";
              fjs.parentNode.insertBefore(js, fjs);

              t._e = [];
              t.ready = function(f) {
                t._e.push(f);
              };

              return t;
            }(document, "script", "twitter-wjs"));

            <?php //and now everyone knows what happens on our website except us ?>
              
          </script>
          <script>
            <?php echo implode("\n", Response::getJsCalls()) ?>
          </script>
        </div>
      </div>
    </body>
</html>