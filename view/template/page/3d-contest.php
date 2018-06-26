<?php Response::setMetaDescription(__('description.3d-contest')) ?>
<?php Response::setMetaTitle(__('title.3d-contest')) ?>
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
      <h3>Are you a 3D designer?</h3>
      <h4>Upload a chess set design and earn $5 in cryptocurrency just for entering. Spark our imagination and win up to $100 in cryptocurrency!</h4>
      <h3>
        <img src="https://spee.ch/6/3D-chess-awards-Submission-DEadlinre.jpeg" alt=3D-Chess-Contest-Image style="width:650px;">
      <h3>I'm game. How do I enter?</h3>
      <div>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/eIsD6fQdfKU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
      <div>
      <p>Upload your chess set design (use a zip folder for multiple files) in either STL or OBJ format to the LBRY (library) network. Once finished, email the lbry:// address (automatically recieve $5 in Library Credits for your first upload) to <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> by July 4th.<p>
      </div>
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
