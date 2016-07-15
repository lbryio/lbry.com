<?php Response::setMetaDescription('Publish your content on the world\'s first platform that leaves creators in control.') ?>
<?php Response::setMetaTitle(__('Publish')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main >
  <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/cover-home3.jpg)">
    <h1 class="cover-title" id="art">Publish on LBRY</h1>
    <div class="cover-subtitle" style="max-width: 580px; text-align: center">
      <strong>Earn $1,000 and join the next content epoch: the viewer and you, with nobody in between.</strong>
    </div>
    <a href="#learn-more" class="btn-alt">Learn More</a>
  </div>
  <div class="column-fluid" id="learn-more">
    <div class="span6">
      <div class="cover cover-light">
        <div class="content content-light content-tile">
          <h2 class="cover-title cover-title-tile cover-title-flat">LBRY Premier Publishing Partnerships</h2>
          <p>LBRY is seeking partners for a brand-new way to publish content online that offers unprecedented benefits to creators.</p>
          <ul>
            <li>
              <h3>More, Better Profit</h3>
              <p>Any price you charge for content settles near-instantly into an account only you control. You receive 100% of the price. Micro-payments (and free content) supported.</p>
            </li>
            <li>
              <h3>Open, Trustworthy Technology</h3>
              <p>
                LBRY uses the ground-breaking innovation of the blockchain to leave no one in control of your content except for you (including us!).
                LBRY is an open-source protocol that is controlled by it's users: we could not change the rules even if wanted to.
              </p>
            </li>
            <li>
              <h3>Complete Creator Control</h3>
              <p>Update your content at any time. Change the price. Change the title. Publish, unpublish. You and only you can do this in LBRY.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile">What is LBRY?</h3>
          <p>Watch "LBRY in 100 Seconds", an introduction to the wonderful technology of LBRY.</p>
          <?php echo View::render('download/_videoIntro') ?>
        </div>
      </div>
    </div>
  </div>
  <div class="hero hero-quote hero-img" style="background-image: url(/img/cover-jcole.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content">
        <blockquote>
          <p>Profit from connecting directly to your audience on your terms.</p>
        </blockquote>
      </div>
    </div>
  </div>
  <div class="column-fluid" id="how-it-works">
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">How It Works</h3>
          <ul>
            <li>Publish five pieces of your original content with the LBRY app.</li>
            <li>Set any price per view — from zero to dime to one million dollars — you’re in control.</li>
            <li>Receive 100% of your list price in real time as it is streamed.</li>
            <li>Give us feedback and help us make this your video publishing paradise.</li>
            <li>
              Receive ~$1,000 for joining*.<br/>
              <div class="meta">*See <a href="#what-you-get" class="link-primary">What You Get</a></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
        <div class="content content-light content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat" id="what-you-get" >What You Get</h3>
          <ul>
            <li>Premier Partner status. Receive insider access and support for life.</li>
            <li>Content featured on the LBRY landing screen seen by all users, as well as on our blog, social media, and 100,000 person email list.</li>
            <li>
              Receive over $1,000 worth of LBRY credits.
              <div class="meta">
                You will receive 1,000 LBRY credits. Credits are yours to save or sell. We make no guarantee of the value of a credit. Current credit price can be seen
                <a class="link-primary" href="https://bittrex.com/Market/Index?MarketName=BTC-LBC">here</a>.
              </div>
            </li>
            <li>We hold your hand every step of the way while taking none of your revenue.</li>
          </ul>
          <h3 class="cover-title cover-title-tile cover-title-flat">What You Give</h3>
          <ul>
            <li>Commit to uploading five videos via the LBRY interface (we’ll help you out).</li>
            <li>Commit at least one social media shout out promoting your availability on LBRY.</li>
            <li>Sign a custodial agreement (AKA let us promote your content for you!)</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="content content-readable">
    <h3>Get In Now</h3>
    <iframe id="feedback-form-iframe" src="https://docs.google.com/forms/d/17yrFsY1W86N9hfNt1batFbySY-1z-tq0wDjFjXKjgp8/viewform?embedded=true"
            width="760" height="1200" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
