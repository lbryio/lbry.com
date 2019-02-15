<?php Response::setMetaDescription(__('LBRY Welcomes AASI Jaipur Chapter')) ?>
<?php Response::setMetaTitle(__('LBRY Welcomes Blockchain Enthusiasts')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/bangalore.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        LBRY Welcomes You To The Blockchain Workshop
      </h1>
      <h3 class="cover-item--outline">We're excited to share about LBRY with you!
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Enter your email address to receive LBRY updates, news, and information for India's LBRYians!</h3>
      <p>As an open source project, our development and future relies on our communities around the world, and we're delighted to see our community growing in India.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'aasi',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
