e<?php Response::setMetaDescription(__('description.meetup')) ?>
<?php Response::setMetaTitle(__('title.meetup')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/table2.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        LBRY Welcomes Devfest
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
      <h3>Enter your email address to receive LBRY updates, news, and information for India LBRYians!</h3>
      <p>LBRY is proud to sponsor this year's Devfest Hackathon. Enter your email below and we'll add you to our list.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'vit',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
