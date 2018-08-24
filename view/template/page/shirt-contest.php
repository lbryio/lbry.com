<?php Response::setMetaDescription(__('description.shirt-contest')) ?>
<?php Response::setMetaTitle(__('title.shirt-contest')) ?>
<?php Response::addMetaImage('https://spee.ch/d/tshirt-banner-2-02.jpeg') ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>

<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(https://spee.ch/d/tshirt-banner-2-02.jpeg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Calling all design champions!
      </h1>
      <h3 class="cover-item--outline">
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <h2>This contest has ended.</h2>
  <h2> Purchase the winning designs <a href="https://shop.lbry.io">in our shop!</a> (New designs coming soon)</h2>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
    <body align="center">
  <div class="content content-light content-readable">
    <h3>Want to keep updated on future contests?</h3>
    <p>Enter your email below and we'll send you updates on new contests.</p>
    <?php echo View::render('mail/_subscribeForm', [
      'tag' => 'shirt-contest',
      'submitLabel' => 'Sign me up',
      'hideDisclaimer' => true,
      'largeInput' => true,
      'btnClass' => 'btn-alt btn-large',
    ]) ?>
  </div>
</main>
