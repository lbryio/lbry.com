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
          <a href="/news" class="link-primary"><i class="fa fa-newspaper icon-fw"></i><span class="btn-label">Latest News</span></a>
        </div>
        <div class="spacer1">
          <a href="/faq" class="link-primary"><span class="fa fa-question icon-fw"></span><span class="btn-label">{{page.faq.header}}</span></a>
          (<a href="/faq/what-is-lbry" class="link-primary">What is LBRY?</a>)
        </div>
        <div class="spacer1">
          <a href="http://explorer.lbry.io" class="link-primary"><span class="fa fa-globe icon-fw"></span><span class="btn-label">Blockchain Explorer</span></a>
        </div>
        <div class="spacer1">
          <a href="https://lbry.fund" class="link-primary"><span class="fas fa-hand-holding-usd icon-fw"></span><span class="btn-label">LBRY Community Fund</span></a>
        </div>
        <div class="spacer1">
          <a href="/team" class="link-primary"><span class="fa fa-users icon-fw"></span><span class="btn-label">About the Team</span></a>
        </div>
        <div class="spacer1">
          <a href="/credit-reports" class="link-primary"><span class="fa fa-university icon-fw"></span><span class="btn-label">Credit Reports</span></a>
        </div>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover cover-light-alt cover-light-alt-grad">
      <div class="content content-light content-tile">
        <h3>For Creators</h3>
        <div class="spacer1">
          <a href="https://lbry.io/youtube" class="link-primary"><i class="fa fa-sync icon-fw"></i><span class="btn-label">Youtube Partner Program</span></a>
        </div>
        <div class="spacer1">
          <a href="/faq?category=publisher" class="link-primary"><span class="icon-question icon-fw"></span><span class="btn-label">Publisher FAQ</span></a>
        </div>
        <div class="spacer1">
          <a href="https://lbry.io/3d-printing" class="link-primary"><span class="fas fa-cube icon-fw"></span><span class="btn-label">3D Printing Program</span></a>
        </div>
        <h3>For Developers</h3>
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
