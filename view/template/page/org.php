<main class="soon">
  <section>
    <h1><strong>lbry.org</strong> is coming soon</h1>
    <p>Sign up for updates and get notified as soon as we launch!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbryorg',
      'forceUrl' => 'https://lbry.io',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="https://lbry.io">lbry.io</a></strong></p>
  </section>
</main>
