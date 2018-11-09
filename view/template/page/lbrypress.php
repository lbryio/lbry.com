<?php Response::setMetaDescription(__('description.meetup')) ?>
<?php Response::setMetaTitle(__('Shouldn’t YOU own YOUR content?')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/blog-covers/censorship.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Shouldn’t YOU own YOUR content?
      </h1>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Yes, tell me how!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <p>Independent media does the work that the mainstream media refuses to do, providing in-depth coverage of issues that matter but might not be sexy enough to sell ads and garner clicks. And for their hard work, they’ve been slandered, mocked, demonetized, and disappeared from social media platforms.</p>

<p>We believe that quality independent media matters. That’s why we’ve been working with independent media organizations who lost their pages in the recent Facebook purge to develop LBRYPress, a simple way for you to keep your content safe, no matter what Mark Zuckerberg thinks of you. And we think you’re really going to like what we came up with.</p>

<p>LBRYPress means you can truly own your content, and that independent media no longer need to rely on Big Tech to get the word out. This tool isn’t just for social media - even if you publish primarily on your own website, chances are that your centralized hosting service can pull the plug any time. It’s time for a decentralized alternative to the status quo.</p>

<p>Setup is shockingly easy - we can help you or your tech team create a custom build of LBRYPress and get it up and running, today. It’s totally free (we promise), and shouldn’t take more than [X HOURS].</p>

<p>Ready to get started? Just <a href="https://docs.google.com/forms/d/e/1FAIpQLScJhAdxAWJuaEiuJMHdEbUVWqIkjw34QAuDvmmMu9PafOgdxA/viewform?usp=sf_link">fill out this form.</a></p>

<p>If you’re particularly tech-savvy, you can get acquainted with the <a href="https://github.com/lbryio/spee.ch">code here.</a></p>

<p>We want to help independent media make the move to a decentralized future, which is why we support individuals and outlets doing this invaluable work through LBRY.fund, a grant program to help people take full advantage of the new technology that LBRY has created.</p>

<p>For more information on our grant programs, head to <a href="https://lbry.fund">LBRY.fund.</a></p>

Still have questions? Contact the team at <a href="mailto:hello@lbry.io">hello@lbry.io</a> - and thanks for keeping journalism alive!
</p>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
