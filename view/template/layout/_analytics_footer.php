<?php if (IS_PRODUCTION): ?>
<script>
  <?php //google analytics?>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60403362-1', 'auto', {'allowLinker': true});
    ga('require', 'GTM-NT8579P');
    ga('require', 'linker');
    ga('linker:autoLink', '<?php echo $_SERVER['HTTP_HOST'] ?>');
    ga('set', 'userId', '<?php echo $_SESSION[Session::USER_ID] ?>');
    ga('send', 'pageview');
    // put the Google Analytics Client ID into a cookie, so that it will be available to PHP
    ga(function(tracker) {
      let date = new Date();
      date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
      document.cookie = 'ga_cid=' + tracker.get('clientId') + '; expires=' + date.toUTCString() + '; path=/' + '; domain=' + tracker.get('cookieDomain');
    });

  !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '1618717031725766',{uid: '<?php echo $_SESSION[Session::USER_ID] ?>'});
  fbq('track', '<?php echo Response::getFacebookPixelAnalyticsType() ?>');
</script>

<script type="text/javascript">
    var _paq = window._paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    _paq.push(['setLinkTrackingTimer', 750]); // increase to 750 milliseconds
    (function() {
        var u="https://analytics.lbry.com/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
</script>

<?php else: ?>
<script>
  window.ga = function() {};
  console.info('Analytics footer partial skipped because this is a non-production instance.');
</script>
<?php endif ?>
