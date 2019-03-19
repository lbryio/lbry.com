<main class="soon">
  <section>
    <h1><strong>lbry.tv</strong> is coming soon</h1>
    <p>Sign up to be among the first to use LBRY on the web!</p>

    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'lbrytv',
      'forceUrl' => 'https://lbry.com',
      'submitLabel' => 'Sign Me Up',
    ]) ?>

    <p>Go back to <strong><a href="/">lbry.com</a></strong>.</p>
  </section>
</main>
