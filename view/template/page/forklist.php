<?php Response::setMetaDescription('Subscribe to be notified of fork-related updates') ?>
<?php Response::setMetaTitle('Blockchain Fork Updates') ?>
<?php echo View::render('nav/_header') ?>
<main>
  <div class="cover cover-dark cover-center cover--dark-overlay" style="background-color:rgb(74, 175, 152)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Blockchain Fork Updates
      </h1>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Subscribe to be notified of fork-related updates</h3>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'fork',
        'submitLabel' => 'Subscribe',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
