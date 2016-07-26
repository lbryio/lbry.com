<?php NavActions::setNavUri('/get') ?>
<?php Response::setMetaDescription('description.publish') ?>
<?php Response::setMetaTitle(__('title.publish')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main >
  <?php //if you change the image, change it on download/_publish too! ?>
  <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/cover-home3.jpg)">
    <h1 class="cover-title" id="art">Publish on LBRY</h1>
    <div class="cover-subtitle" style="max-width: 580px; text-align: center">
      <strong>Earn $1,000 and join the next content epoch: the viewer and you, with nobody in between.</strong>
    </div>
    <a href="#learn-more" class="btn-alt">Keep Reading</a>
  </div>
  <div class="column-fluid" id="learn-more">
    <div class="span6">
      <div class="cover cover-light">
        <div class="content content-light content-tile">
          <h2 class="cover-title cover-title-tile cover-title-flat">Publishing Partnership</h2>
          <h3>How It Works</h3>
          <ul>
            <li>
              Publish five pieces of content with the LBRY app.
              <div class="meta">Existing content is okay, so long as it's content you created.</div>
            </li>
            <li>Set any price per view — from zero to a dime to one million dollars — you’re in control.</li>
            <li>Receive 100% of your list price in real time as it is streamed.</li>
            <li>
              Receive approximately $1,000.<br/>
              <div class="meta">See <a href="#what-you-get" class="link-primary">What You Get</a>.</div>
            </li>
            <li>Answer our beta feedback survey about your experience.</li>
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
      <div class="hero-content" style="max-width: 540px">
        <blockquote>
          <p>You was inspired by the world; allow the world to be inspired by [you]</p>
        </blockquote>
        <cite>J. Cole, <em><a href="https://www.youtube.com/watch?v=UMCGOAGb4Y0&amp;t=496s">Note to Self</a></em></cite>
      </div>
    </div>
  </div>
  <div class="column-fluid" id="how-it-works">
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">Why LBRY?</h3>
              <h4>More, Better Profit</h4>
              <p>Any price you charge for content settles near-instantly into an account only you control. You receive 100% of the price. Micro-payments (and free content) supported.</p>
              <h4>Open, Trustworthy Technology</h4>
              <p>
                LBRY uses the ground-breaking innovation of the blockchain to leave no one in control of your content except for you (including us!).</p>
               <p>
                 LBRY is an open-source protocol that is controlled by it's users: we could not change the rules even if wanted to.
              </p>
              <h4>Complete Creator Control</h4>
              <p>Update your content at any time. Change the price. Change the title. Publish, unpublish. You and only you can do this in LBRY.</p>
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
            <li>Content featured on the LBRY landing screen seen by all users, as well as on our blog, social media, and 100,000 person email list, including links to your YouTube or other profiles.</li>
            <li>
              Receive $1,000 worth of LBRY credits to hold, use or sell.
              <div class="meta">
                We make no guarantee of the value of a credit, but credits are actively traded. Current credit price can be seen
                <a class="link-primary" href="https://bittrex.com/Market/Index?MarketName=BTC-LBC">here</a> or <a class="link-primary" href="https://poloniex.com/exchange#btc_lbc">here</a>.
              </div>
            </li>
            <li>We hold your hand every step of the way while taking none of your revenue.</li>
          </ul>
          <h3 class="cover-title cover-title-tile cover-title-flat">What You Give</h3>
          <ul>
            <li>Upload five videos via the LBRY interface (we’ll help you out).</li>
            <li>A single social media mention about your availability on LBRY.</li>
            <li>Allowance for us to promote availability of your content.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="content content-readable">
    <h3>Get In Now</h3>
    <iframe id="feedback-form-iframe" src="https://docs.google.com/forms/d/17yrFsY1W86N9hfNt1batFbySY-1z-tq0wDjFjXKjgp8/viewform?embedded=true"
            width="760" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
    <h3>Questions?</h3>
    <p>Email <a  class="link-primary" href=mailto:reilly@lbry.io?subject=Publishing Program">Reilly Smith</a> with questions or to schedule a call.</p>
    <?php echo View::render('content/_bio', ['person' => 'reilly-smith', 'orientation' => 'horizontal']) ?>
  </div>
  <?php echo View::render('nav/_learnFooter', ['isDark' => true]) ?>
</main>
<?php echo View::render('nav/_footer') ?>
