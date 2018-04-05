<?php Response::setMetaDescription(__('YouTube is demonetizing and burying LGBTQ videos - try a platform that\'s proud to have your content')) ?>
<?php Response::setMetaTitle(__('You\'re Here, You\'re Queer, We want to get used to it')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/LGBTQ.png)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        LGBTQ Creators Are Under Attack
      </h1>
      <h3 class="cover-item--outline">
        Major services are demonetizing and burying LGBTQ content
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Learn More</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h2>Companies like YouTube are afraid that advertisers will be offended by LGBTQ and sexual health content.</h2>
      <h3>We think their behavior is what's embarrassing.</h3>
      <p>LBRY is a free, open source platform that makes it easy to share your videos (and charge what you want for access to them).</p>
      <p>Our system is decentralized - we care about our users, not advertisers trying to make a buck off of their hard work.</p>
      <h3>This is where you come in.</h3>
      <p>We're building LBRY for everyone, and we want you to join us! As long as it's legal, we'll never tell our users what they can and can't talk about.</p>
      <p>If you're willing to give cutting edge technology (that may not work 100% of the time) a try, download the LBRY app and let us know what you think! </p>
       <img src="https://spee.ch/5a3e08d52dd2d7cb1c63a480b45dea8b4679cf01/lbryget-gif-mastertest.gif" />

<p>You can <a href="/get?src=FA">download the LBRY app here.</a> If you have any questions or need help, <a href="http://chat.lbry.io">join our Discord community.</a></p>
<div class="text-center spacer1"><a href="/get?src=FA" class="btn-primary btn-large">Get LBRY App</a></div>

      <p>If you'd like to get information and updates when new LGBTQ content goes live on our network and hear what's happening in the fight for free speech online, sign up for our mailing list below.</p>
    
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'LGBTQ',
        'submitLabel' => 'Sign Me Up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
