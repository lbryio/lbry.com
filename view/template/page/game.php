<?php Response::setMetaDescription(__('Level UP with LBRY Network')) ?>
<?php Response::setMetaTitle(__('Level UP with LBRY Network')) ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/close-up-of-gaming-joystick.jpg)">
    <div class="inner-wrap inner-wrap--hero">
      <h1>Level UP with LBRY Network</h1>
      <h3>We're excited to share LBRY with you!</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Enter your email address to receive LBRY updates, news, and information for LBRY and Polish events and news!</h3>

      <p>As an open source project, our development and future relies on our communities around the world, and we're delighted to see our community growing in Poland. Please enter your email below and we'll give you instructions to redeem the LBC as mentioned by our team.</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'poland',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </section>
</main>
