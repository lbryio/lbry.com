<?php Response::setMetaDescription(__('LBRY Welcomes Youngstown State University Students')) ?>
<?php Response::setMetaTitle(__('LBRY Welcomes Youngstown State University Students')) ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/hackysu2.jpg)">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>LBRY Welcomes HackYSU</h1>
      <h3>We're excited to share LBRY with you!</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Enter your email address to receive LBRY updates and college and hackathon news!</h3>
      <p>As an open source project, our development and future relies on our communities around the world, and we're delighted to see our community growing across college campuses in the United States. Please enter your email below and we'll give you instructions to redeem the LBC as mentioned by our team.</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'ysu',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </section>
</main>
