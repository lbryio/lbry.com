<main class="soon">
  <section>
    <h1><strong>lbry.org</strong> is coming soon</h1>
    <p>Sign up for updates and get notified as soon as we launch!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbryorg',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="/">lbry.io</a></strong></p>
  </section>
</main>
