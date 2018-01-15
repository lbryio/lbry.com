<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image:url(https://spee.ch/e/shirtless-chang.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        LBRY Goes To College
      </h1>
      <h3 class="cover-item--outline">
        Earn Credits More Valuable<br/>
        Than Those In The Classroom
      </h3>
      <div class="spacer1">
        <a href="#chang" class="btn-primary btn-large">Put A Shirt On</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="chang">
    <div class="content content-light content-readable">
      <h3>What's going on here? Where's Chang's Shirt?</h3>
      <p>I burned it off and put it on a blockchain.</p>
      <h3>Okay. But why?</h3>
      <p>Enter your email below and we'll tell you more.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'college',
        'submitLabel' => 'Enroll',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
