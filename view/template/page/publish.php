<?php NavActions::setNavUri('/get') ?>
<?php Response::setMetaDescription('description.publish') ?>
<?php Response::setMetaTitle(__('title.publish')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main >
  <?php //if you change the image, change it on download/_publish too! ?>
  <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/cover-home3.jpg)">
    <h1 class="cover-title" id="art">{{publish.onlbry}}</h1>
    <div class="cover-subtitle" style="max-width: 580px; text-align: center">
      <strong>{{publish.earn}}</strong>
    </div>
    <a href="#learn-more" class="btn-alt">{{publish.keepr}}</a>
  </div>
  <div class="column-fluid" id="learn-more">
    <div class="span6">
      <div class="cover cover-light">
        <div class="content content-light content-tile">
          <h2 class="cover-title cover-title-tile cover-title-flat">{{publish.partner}}</h2>
          <h3>{{publish.how}}</h3>
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
          <h3 class="cover-title cover-title-tile">{{publish.what}}</h3>
          <p>{{publish.watch}}</p>
          <?php echo View::render('download/_videoIntro') ?>
        </div>
      </div>
    </div>
  </div>
  <div class="hero hero-quote hero-img" style="background-image: url(/img/cover-jcole.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content" style="max-width: 540px">
        <blockquote>
          <p>{{publish.quote}}</p>
        </blockquote>
        <cite>J. Cole, <em><a href="https://www.youtube.com/watch?v=UMCGOAGb4Y0&amp;t=496s">Note to Self</a></em></cite>
      </div>
    </div>
  </div>
  <div class="column-fluid" id="how-it-works">
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">{{publish.why}}</h3>
              <h4>{{publish.profit}}</h4>
              <p>Any price you charge for content settles near-instantly into an account only you control. You receive 100% of the price. Micro-payments (and free content) supported.</p>
              <h4>{{publish.open}}</h4>
              <p>
                LBRY uses the ground-breaking innovation of the blockchain to leave no one in control of your content except for you (including us!).</p>
               <p>
                 LBRY is an open-source protocol that is controlled by its users: we could not change the rules even if we wanted to.
              </p>
              <h4>{{publish.control}}</h4>
              <p>Update your content at any time. Change the price. Change the title. Publish, unpublish. You and only you can do this in LBRY.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
        <div class="content content-light content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat" id="what-you-get">{{publish.youget}}</h3>
          <ul>
            <li>{{publish.premier}}</li>
            <li>{{publish.feature}}</li>
            <li>
                {{publish.credits}}
              <div class="meta">
                We make no guarantee of the current or future monetary value of a credit, but credits are actively traded. Current credit market prices can be seen
                <a class="link-primary" href="https://bittrex.com/Market/Index?MarketName=BTC-LBC">here</a> or <a class="link-primary" href="https://poloniex.com/exchange#btc_lbc">here</a>.
              </div>
            </li>
            <li>{{publish.hand}}</li>
          </ul>
          <h3 class="cover-title cover-title-tile cover-title-flat">{{publish.yougive}}</h3>
          <ul>
            <li>{{publish.upload}}</li>
            <li>{{publish.mention}}</li>
            <li>{{publish.allow}}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="content content-readable">
    <h3>{{publish.now}}</h3>
    <iframe id="feedback-form-iframe" src="https://docs.google.com/forms/d/17yrFsY1W86N9hfNt1batFbySY-1z-tq0wDjFjXKjgp8/viewform?embedded=true"
            width="760" height="1000" frameborder="0" marginheight="0" marginwidth="0">{{publish.loading}}</iframe>
    <h3>{{publish.questions}}</h3>
    <p>Email <a  class="link-primary" href=mailto:reilly@lbry.io?subject=Publishing Program">Reilly Smith</a> with questions or to schedule a call.</p>
    <?php echo View::render('content/_bio', ['person' => 'reilly-smith', 'orientation' => 'horizontal']) ?>
  </div>
  <?php echo View::render('nav/_learnFooter', ['isDark' => true]) ?>
</main>
<?php echo View::render('nav/_footer') ?>
