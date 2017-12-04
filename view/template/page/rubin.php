<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php Response::addJsAsset('https://cdn.optimizely.com/js/9525271075.js') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main class="column-fluid ">
  <div class="span12">
    <div class="cover cover-dark cover-center">
      <div class="content">
        <h1 class="cover-title cover-title-tile cover-title-flat">Dave creates. We watch.
<br/>
         Dave gets paid.*
        </h1>
        <p class="text-center">LBRY is a departure from the platforms of yesterday. Support shows like The Rubin Report with 100% of your donations, subscriptions, and attention. Just you, and Dave.</p>
</div>
    </div>

   <div class="content content-light content-readable">
    <img src="/img/dave-phillyd-background.png" alt="Image of Dave and PhillyD" />
       <a href="/get" class="btn-alt btn-large">Download Now</a>
         <p class="text-center" style="max-width: 800px">It's open-source, decentralized, and shaped entirely by the creators who use it.</p>
         <p class="text-center" style="max-width: 800px">There are lots of nifty things about how LBRY works (pronounced, "library"). You can learn a lot from the old-timers on our Discord at https://chat.lbry.io if you're feeling adventurous.</p>
         <p class="text-center" style="max-width: 800px">*Only Dave. Not middlemen.</p>
    </div>
  </div>

  <div class="span6">
    <div class="cover cover-dark cover-dark-grad">
      <div class="content content-dark content-tile">
        <h3>{{learn.join}}</h3>
          <div class="spacer1">
            <a href="/faq" class="link-primary">{{page.faq.header}}</a>
            (<a href="/faq/what-is-lbry" class="link-primary">What is LBRY?</a>)
          </div>
        <?php echo View::render('social/_list') ?>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="cover cover-light-alt cover-light-alt-grad">
      <div class="content content-light content-tile">
        <h3>For Developers</h3>
        <?php echo View::render('social/_listDev') ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
