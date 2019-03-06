<?php Response::setMetaDescription('Subscribe to be notified of fork-related updates') ?>
<?php Response::setMetaTitle('Blockchain Fork Updates') ?>

<main class="ancillary">
  <section class="hero">
    <div class="inner-wrap">
      <h1>Blockchain Fork Updates</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Subscribe to be notified of fork-related updates</h3>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'fork',
        'submitLabel' => 'Subscribe',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large'
      ]) ?>
    </div>
  </section>
</main>
