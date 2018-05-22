<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main class="column-fluid ">
  <div class="span6">
    <div class="cover cover-dark cover-center content content-dark" style="background-image:url(/img/altamira-bison.jpg)">
      <h1 class="cover-title cover-title-tile">{{learn.art}}</h1>
      <p class="cover-subtitle text-center" style="max-width: 660px">{{learn.how}}</p>
      <a href="/what" class="btn-primary btn-large"><?php echo __('learn.essay') ?></a><P><P>
      <a href="/get" class="btn-alt btn-large">Download Now</a>
    </div>
  </div>
  <div class="span6">
    <div class="cover cover-light">
      <div class="content content-light content-tile">
        <h2 class="cover-title cover-title-tile cover-title-flat">Hello LBRY</h2>
        <p>See previews of the LBRY UI and the great content available now on LBRY.</p>
        <?php echo View::render('download/_videoIntro') ?>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover cover-light">
      <div class="content content-light content-tile">
        <h3>{{learn.explore}}</h3>
        <div class="spacer1">
          <a href="/news" class="link-primary">Latest News</a>
        </div>
        <div class="spacer1">
          <a href="/faq" class="link-primary">{{page.faq.header}}</a>
          (<a href="/faq/what-is-lbry" class="link-primary">What is LBRY?</a>)
        </div>
        <div class="spacer1">
          <a href="http://explorer.lbry.io" class="link-primary">Blockchain Explorer</a>
        </div>
        <div class="spacer1">
          <a href="/team" class="link-primary">About the Team</a>
        </div>
        <div class="spacer1">
          <a href="/credit-reports" class="link-primary">Credit Reports</a>
        </div>
        <div class="spacer1">
          <a href="https://shop.lbry.io" class="link-primary">LBRY Merchandise Shop</a>
        </div>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover cover-light-alt cover-light-alt-grad">
      <div class="content content-light content-tile">
        <h3>For Developers</h3>
        <p>LBRY is 100% open source in the <a class="link-primary" href="https://en.wikipedia.org/wiki/The_Cathedral_and_the_Bazaar">Bazaar tradition</a>.</p>
        <?php echo View::render('social/_listDev') ?>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover cover-dark cover-dark-grad">
      <div class="content content-dark content-tile">
        <h3>{{learn.join}}</h3>
        <?php echo View::render('social/_list') ?>
        <h3>{{learn.contact}}</h3>
        <?php echo View::render('mail/_contact-us') ?>
      </div>
    </div>
  </div>     
       </main>
<?php echo View::render('nav/_footer') ?>
