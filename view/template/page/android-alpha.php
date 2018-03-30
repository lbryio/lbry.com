<?php Response::setMetaDescription(__('description.android-alpha')) ?>
<?php Response::setMetaTitle(__('title.android-alpha')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/droid1.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Testing... Testing...
      </h1>
      <h3 class="cover-item--outline">
        LBRY needs alpha testers for our Android app!
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Want to help build the first ever decentralized, blockchain based media streaming app?</h3>
      <p> We're looking for developers who can help us get our Android app ready for prime time.</p>
      <h3>How do I get involved?</h3>
      <p>Enter your email below. We'll put you in our testing queue (please note that you will <b>not</b> receive an email right away) and send you everything you need to get started when you reach the top.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'android-alpha',
        'submitLabel' => 'Make Me an Alpha Tester!',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
