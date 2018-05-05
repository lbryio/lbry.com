<?php Response::setMetaDescription(__('description.meetup')) ?>
<?php Response::setMetaTitle(__('title.meetup')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/cute-cats.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        CATS FTW!
      </h1>
      <h3 class="cover-item--outline">
        CATS ARE BETTER THAN DOGS!
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Interested in bringing LBRY to your local college campus or Meetup group?</h3>
      <p> We're looking for folks to demonstrate our platform and latest technologies. What's in it for you? We'll provide you with LBRY credits for your group, LBRY swag, and presentation resources.</p>
      <h3>Okay. How do I get involved?</h3>
      <p>Enter your email below and we'll tell you more.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'cats',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
