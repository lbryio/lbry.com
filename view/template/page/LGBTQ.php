<?php Response::setMetaDescription(__('YouTube is demonetizing and burying LGBTQ videos - try a platform that\'s proud to have your content')) ?>
<?php Response::setMetaTitle(__('You\'re Here, You\'re Queer, We\'re Cool With It')) ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/LGBTQ.png)">
    <div class="inner-wrap">
      <h1>LGBTQ Creators Are Under Attack</h1>
      <h3>Major services are demonetizing and burying LGBTQ content</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Companies like YouTube are afraid that advertisers will be offended by LGBTQ and sexual health content.</h2>
      <h3>We think their censorship is what's really offensive.</h3>
      <p>LBRY is a free, open source platform that makes it easy to share your videos (and charge what you want for access to them).</p>
      <p>Our system is decentralized - we care about our users, not advertisers trying to make a buck off of their hard work.</p>

      <h3>This is where you come in.</h3>
      <p>We're building LBRY for everyone, and we want you to join us! As long as it's legal, we'll never tell our users what they can and can't talk about.</p>

      <h1>Do you have a favorite LGBTQ creator?</h1>
      <p>Send them this page and ask them to sync their content today with our YouTube Partner Program.</p>

      <div class="spacer2 text-center">
        <a class="btn-primary btn-large" href="https://lbry.io/youtube">Join our Partner Program</a>
      </div>

      <p>If you'd like to get information and updates when new LGBTQ content goes live on our network and hear what's happening in the fight for free speech online, sign up for our mailing list below.</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'LGBTQ',
        'submitLabel' => 'Sign Me Up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large'
      ]) ?>
    </div>
  </section>
</main>
