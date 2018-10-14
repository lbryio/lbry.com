<?php Response::setMetaDescription(__('Welcome to LBRY, LPU students.')) ?>
<?php Response::setMetaTitle(__('LBRY Welcomes LPU')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/table2.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Welcome LPU Blockchain Meetup Attendees
      </h1>
      <h3 class="cover-item--outline">
        Thank you for your interest in LBRY. 
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>LBRY is a free, open, and community-run digital marketplace.</h3>
      <p>Please sign up to learn more about LBRY, get free LBC, and see how you can use and develop on the LBRY protocol. You may download the LBRY app <a href="https://lbry.io/get">here.</a></p>
      <p>Enter your email below and we'll tell you more.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'lpu',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
