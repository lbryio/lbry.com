<main class="soon">
  <section>
    <h1><strong>lbry.org</strong> is coming soon</h1>
    <p>Sign up to connect with community leaders and get your page!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbryorg',
      'forceUrl' => 'https://lbry.com',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="/">lbry.com</a></strong>.</p>
  </section>
</main>
