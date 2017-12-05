<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php Response::addJsAsset('https://cdn.optimizely.com/js/9525271075.js') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/dave-phillyd-background.png)">
      <div class="content content-dark text-center">
        <h2 class="cover-title cover-title-tile cover-title-flat">
          Dave creates. We watch.<br/>
          Dave gets paid.*
        </h2>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        <div class="spacer1">
          <a href="/get" class="btn-primary btn-large">Watch Rubin on LBRY</a>
        </div>
        <div class="meta">
          *Only Dave. No middlemen.
        </div>
      </div>
    </div>
  </div>
  <div class="span5">
    <div class="cover cover-light">
      <div class="content content-light content-readable">
        <h3>What am I looking at here?</h3>
        <p>LBRY is a departure from the platforms of yesterday. Support shows like The Rubin Report with 100% of your donations, subscriptions, and attention.</p>
        <p>Just you, and Dave.</p>
        <h3>Okay. But why?</h3>
        <p>Open-source and decentralized, LBRY is shaped entirely by the creators and community who use it. <b>Free speech and censorship-resistance are baked into the design.</b></p>
        <p>There are lots of nifty aspects to how LBRY works (pronounced, "library"). Learn from the old-timers on our Discord at https://chat.lbry.io</p>
        <div class="text-center">
          <a href="/get" class="btn-alt btn-large">Download the App</a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
