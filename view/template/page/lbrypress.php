<?php Response::setMetaDescription(__('description.meetup')) ?>
<?php Response::setMetaTitle(__('Independent Hosting for Independent Media')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/blog-covers/censorship.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Independent Hosting for Independent Media
      </h1>
      <div class="spacer2">
        <h3 class="cover-item--outline">
          Don't leave your fate in the hands of Silicon Valley
        </h3>
      </div>
    </div>
  </div>
  <div id="about">
    <div class="content content-light content-readable">
      <h2>Take your fate (and your content) into your own hands.</h2>

      <p>Independent media does the work that the mainstream media refuses to do, providing in-depth coverage of issues that matter but might not be sexy enough to sell ads. And for their hard work, they’ve been slandered, mocked, demonetized, and disappeared from social media platforms.</p>

      <p>It’s time for a decentralized alternative to the status quo.</p>
      
      <p>We believe that quality independent media matters. That’s why we’ve been working with independent media organizations who lost their pages in the recent Facebook purge to develop LBRYPress, a simple way for you to keep your content safe, no matter what Mark Zuckerberg thinks of you. And we think you’re really going to like what we came up with.</p>

      <p>LBRYPress means you can truly own your content, and that independent media no longer need to rely on Big Tech to get the word out. This tool isn’t just for outlets that focus on social media - anyone with a WordPress site can instantly back up all their content with LBRYPress. </p>
    </div>
    <div class="column-fluid spacer2">
      <div class="span6">
        <div class="cover cover-light cover-light-alt-grad">
          <div class="content content-light">
            <h3>For Journalists</h3>
            
            <img src="https://spee.ch/9/typewritersmall.jpg"/>
            
            <p>We want to help independent media make the move to a decentralized future, which is why we support individuals and outlets doing this invaluable work through LBRY.fund, a grant program to help people take full advantage of the new technology that LBRY has created.</p>

            <p>For more information on our grant programs, head to <a class="link-primary" href="https://lbry.fund">LBRY.fund.</a> Click the button below and fill out the form, and we'll have a team member contact you to set up your own LBRYPress ASAP.</p>
            
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScJhAdxAWJuaEiuJMHdEbUVWqIkjw34QAuDvmmMu9PafOgdxA/viewform" class="btn-primary btn-large">Get your custom LBRYPress</a>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="cover cover-dark cover-dark-grad">
          <div class="content content-dark">
            <h3>For Geeks</h3>
            <p>You can have your own self-hosted spee.ch instance up and running in under an hour.</p>
            <div class="spacer1">
              <img src="http://via.placeholder.com/600">
            </div>
            <p>You can dig into the code, take a look at some examples of other customizations, and get acquainted with how all of these parts work with the LBRY network - just click the button below.</p>
            <p><a href="https://github.com/lbryio/spee.ch" class="btn btn-alt">Start Here</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="content content-light content-readable spacer2">
      <h3>More Questions?</h3>
      <p>
        We're here to help. Say hi at <a href="mailto:hello@lbry.io" class="link-primary">hello@lbry.io</a> - and thanks for keeping journalism alive!
      </p>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
