<?php Response::setMetaDescription(__('description.3d-contest')) ?>
<?php Response::setMetaTitle(__('title.3d-contest')) ?>
<?php Response::addMetaImage('https://lbry.io/img/Gold-Crypto-Chess2.jpeg') ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>

<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(https://spee.ch/3/genius-chess-printed.jpeg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        3D Chess Design Contest
      </h1>
      <h3 class="cover-item--outline">
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h1>This contest has ended.</h1>
      <h2> Download the winning designs below!</h2>
      <a href="https://open.lbry.io/gregsintricatechessa"><img src=https://spee.ch/a/Screen-Shot-2018-08-01-at-120254-PM style="width:750px;"></a>
      <a href="https://open.lbry.io/gregsintricatechessb"><img src=https://spee.ch/7/Screen-Shot-2018-08-01-at-120352-PM style="width:750px;"></a>
      <a href="https://open.lbry.io/zeycussabstractchess"><img src=https://spee.ch/b/Screen-Shot-2018-08-01-at-121025-PM style="width:750px;"></a>
      <p>You can <a href="/get?src=FA">download the LBRY app here.</a> If you have any questions or need help, <a href="http://chat.lbry.io">join our Discord community.</a></p>
<div class="text-center spacer1"><a href="/get?src=FA" class="btn-primary btn-large">Get LBRY App</a></div>
    <body align="center">
    <p>Enter your email below and we'll send you updates on new releases from the best content creators.</p>
    <?php echo View::render('mail/_subscribeForm', [
      'tag' => '3d-contest',
      'submitLabel' => 'Sign me up',
      'hideDisclaimer' => true,
      'largeInput' => true,
      'btnClass' => 'btn-alt btn-large',
    ]) ?>
  </div>
</main>
