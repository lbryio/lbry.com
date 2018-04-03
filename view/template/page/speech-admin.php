<?php Response::setMetaDescription(__('Join the battle for free speech on the internet. Your weapon? A keyboard. Your armor? A decentralized content marketplace protocol.')) ?>
<?php Response::setMetaTitle(__('Fork For Freedom')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/speech-admin.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Fork For Freedom
      </h1>
      <h3 class="cover-item--outline">
        Join the battle for free speech on the internet. Your weapon? A keyboard. Your armor? A decentralized content marketplace protocol.
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Learn More</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>You'd like us to stop being vaguely provocative and just explain?</h3>
      <p>Fine.</p>
      <p>spee.ch is a free, open-source web portal for LBRY content. It both publishes content to the LBRY network and serves data from the LBRY network, but it does it over the web for improved usability.</p>
      <p>Recently, spee.ch has been re-engineered to support self-hosting and custom skinning, as well as hosting only a portion of the network. You could run a spee.ch fork that's dedicated specifically to your favorite cat and has the appearance to show it.</p>
      <h3This is where you come in.</h3>
      <p>This functionality is brand new and we're offering LBC bounties to those who can help us test and refine it. If you're capable of installing Wordpress, you're probably capable of installing spee.ch</p>
      <p>So if you want to play around with a funky new technology, contribute to content freedom, and earn weird internet tokens, join us for an introductory session! We'll explain more about the program and walk you through the basics of how spee.ch works and how to set it up.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'speech-admin',
        'submitLabel' => 'Sign Me Up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
