<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php Response::addJsAsset('https://cdn.optimizely.com/js/9525271075.js') ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image:url(/img/dave-rucka-wide.png)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        <br/>
        The Rubin Report<br/>
        YouTube Week
      </h1>
      <h3 class="cover-item--outline">
          Brought to you by LBRY
        </h3>
      <div class="spacer1">
        <a href="/get?rubin" class="btn-primary btn-large">Try the App</a>
      </div>
      <div class="meta cover-item--outline">
        Desktop only. Mobile coming soon.
      </div>
    </div>
  </div>
  <div class="cover cover-light">
    <div class="content content-light content-readable">
      <h3>What's going on here?</h3>
      <p>LBRY is a departure from the platforms of yesterday.</p>
      <p>Watch The Rubin Report YouTube Week on the only community-run video app without ads or middlemen.</p>
      <h3>Okay. But why?</h3>
      <p>Open-source and decentralized, LBRY is shaped entirely by the creators and community who use it. <b>Free speech and censorship-resistance are baked into the design.</b></p>
      <p>There are lots of nifty aspects to how LBRY works (pronounced, "library"). </br> Learn from the veteran LBRYians on <a href="https://chat.lbry.io"><u>our Discord</u></a>.</p>
      <div class="text-center">
        <a href="/get?rubin" class="btn-alt btn-large">Download LBRY</a>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
