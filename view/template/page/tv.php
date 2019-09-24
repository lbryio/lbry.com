<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7620985872686147",
    enable_page_level_ads: true
  });
</script>
</head>
<main class="soon">
  <section>
    <h1><strong>lbry.tv</strong> is coming soon</h1>
    <p>Sign up to be among the first to use LBRY on the web!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbrytv',
      'forceUrl' => 'https://lbry.com',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="https://lbry.com">lbry.com</a></strong>.</p>
  </section>
</main>
