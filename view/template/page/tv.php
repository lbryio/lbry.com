<main class="soon">
  <section>
    <h1><strong>lbry.tv</strong> is coming soon</h1>
    <p>Sign up to be among the first to use LBRY on the web!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbrytv',
      'forceUrl' => 'https://lbry.io',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="https://lbry.io">lbry.io</a></strong>.</p>
  </section>
</main>
