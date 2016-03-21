<?php Response::setMetaDescription('Publish your content on the world\'s first platform that leaves creators in control.') ?>
<?php Response::setMetaTitle(__('Publish')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main >
  <div class="content">
    <h1><?php echo __('Publish') ?></h1>
    <p>Own or create content? Release your content on LBRY and enter a brave new world.</p>
  </div>
  <div class="hero hero-pattern spacer2">
    <div class="hero-content">
      <h2 class="hero-title text-center">Publish instantly, everywhere, for free.</h2>
      <div class="row-fluid hero-tile-row">
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-mega icon-cloud"></span>
          </div>
          <h3>Global, Robust Distribution</h3>
          <p>
            LBRY uses ground-breaking technology to make your content instantly available worldwide,
            with no ability for us or anyone else to prevent or censor your content.
          </p>
        </div>
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-mega icon-star"></span>
          </div>
          <h3>Creators in Control</h3>
          <p>Update your content at any time. Change the price. Change the title. Publish, unpublish. You and only you can do this in LBRY.</p>
        </div>
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-money icon-mega"></span>
          </div>
          <h3>More, Better Profit</h3>
          <p>Any price you charge for content settles near-instantly into an account only you control. You receive 100% of the price.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <h2 id="publish-form"><?php echo __('Join LBRY') ?></h2>
    <p>LBRY is currently in alpha testing, preparing for a public release.</p>
    <iframe id="feedback-form-iframe" src="https://docs.google.com/forms/d/17yrFsY1W86N9hfNt1batFbySY-1z-tq0wDjFjXKjgp8/viewform?embedded=true"
            width="760" height="1200" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
  </div>
</main>
<?php echo View::render('nav/footer') ?>