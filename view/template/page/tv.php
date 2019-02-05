<main class="soon">
  <section>
    <h1><strong>lbry.tv</strong> is coming soon</h1>
    <p>Sign up for updates and get notified as soon as we launch!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbrytv',
      'forceUrl' => 'https://lbry.io',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="/">lbry.io</a></strong>.</p>
  </section>
</main>
