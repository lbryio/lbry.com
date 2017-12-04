<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php Response::addJsAsset('https://cdn.optimizely.com/js/9525271075.js') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/dave-phillyd-background.png)">
      <div class="content content-dark text-center">
        <h1 class="cover-title cover-title-tile cover-title-flat">
          Dave creates. We watch.<br/>
          Dave gets paid.*
        </h1>
        <div class="spacer1">
          <a href="/get" class="btn-primary btn-large">Download Now</a>
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
        <h3>What's All This?</h3>
        <p>LBRY is a departure from the platforms of yesterday. Support shows like The Rubin Report with 100% of your donations, subscriptions, and attention. Just you, and Dave.</p>
        <h3>Right. And I Have A Bridge To Sell You.</h3>
        <p>Welcome to the magic of blockchain. LBRY is open-source, decentralized, and shaped entirely by the creators and community who use it.</p>
        <h3>This Is A 3rd Title</h3>
        <p>There are lots of nifty things about how LBRY works (pronounced, "library").</p>
        <div class="text-center">
          <a href="/get" class="btn-alt btn-large">Download Now</a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
