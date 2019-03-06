<?php Response::setMetaDescription(__('Join the battle for free speech on the internet. Your weapon? A keyboard. Your armor? A decentralized content marketplace protocol.')) ?>
<?php Response::setMetaTitle(__('Do you speak spee.ch?')) ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/speech-admin.jpg)">
    <div class="inner-wrap">
      <h1>Do you speak spee.ch?</h1>
      <h3>Join the battle for free speech on the internet. Your weapon? A keyboard. Your armor? A decentralized content marketplace protocol.</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>You'd like us to stop being vaguely provocative and just explain?</h3>
      <p>Fine.</p>
      <p>spee.ch is a free, open-source web portal for LBRY content. It both publishes content to the LBRY network and serves data from the LBRY network, but it does it over the web for improved usability.</p>
      <p>Recently, spee.ch has been re-engineered to support self-hosting and custom skinning, as well as hosting only a portion of the network. You could run a spee.ch clone that's dedicated specifically to your favorite cat and has the appearance to show it.</p>

      <h3>This is where you come in.</h3>
      <p>This functionality is brand new and we're offering LBC bounties to those who can help us test and refine it. If you're capable of installing Wordpress, you're probably capable of installing spee.ch</p>
      <p>So if you want to play around with a funky new technology, contribute to content freedom, and earn weird internet tokens, you'll find <a href="https://github.com/lbryio/www.spee.ch">everything you need to get started here</a>.</p>
      <p>Want to stay up to date on the latest news about Spee.ch and upcoming multisite training sessions? Join our mailing list!</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'speech-admin',
        'submitLabel' => 'Sign Me Up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large'
      ]) ?>
    </div>
  </section>
</main>
