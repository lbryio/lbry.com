<?php Response::setMetaDescription(__('description.shirt-contest')) ?>
<?php Response::setMetaTitle(__('title.shirt-contest')) ?>
<?php Response::addMetaImage('https://spee.ch/d/tshirt-banner-2-02.jpeg') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(https://spee.ch/d/tshirt-banner-2-02.jpeg)">
    <div class="inner-wrap">
      <h1>Calling all design champions!</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>This contest has ended</h2>
      <h3>Purchase the winning designs <a href="https://shop.lbry.io">in our shop!</a> (New designs coming soon)</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Want to keep updated on future contests?</h3>
      <p>Enter your email below and we'll send you updates on new contests.</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'shirt-contest',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large'
      ]) ?>
    </div>
  </section>
</main>
