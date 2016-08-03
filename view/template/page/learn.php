<?php Response::setMetaDescription(__('description.learn')) ?>
<?php Response::setMetaTitle(__('title.learn')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
  <main class="column-fluid ">
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h1 class="cover-title cover-title-tile">{{learn.100}}</h1>
          <?php echo View::render('download/_videoIntro') ?>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-dark cover-center content content-dark" style="background-image:url(/img/altamira-bison.jpg)">
        <h2 class="cover-title cover-title-tile">{{learn.art}}</h2>
        <p class="cover-subtitle text-center" style="max-width: 660px">{{learn.how}}</p>
        <a href="/what" class="btn-alt"><?php echo __('learn.essay') ?></a>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
        <div class=" content content-light content-tile">
          <div class="row-fluid">
            <div class="span6">
              <h3>{{learn.explore}}</h3>
              <div class="spacer1">
                <a href="/faq" class="link-primary">{{page.faq.header}}</a>
              </div>
              <div class="spacer1">
                <a href="http://explorer.lbry.io" class="link-primary">{{learn.explorer}}</a>
              </div>
              <div class="spacer1">
                <a href="https://bittrex.com/Market/Index?MarketName=BTC-LBC" class="link-primary">{{learn.exchange}}</a>
              </div>
            </div>
            <div class="span6">
              <h3>{{learn.nerd}}</h3>
              <p>LBRY is 100% open source in the <a class="link-primary" href="https://en.wikipedia.org/wiki/The_Cathedral_and_the_Bazaar">Bazaar tradition</a>.</p>
              <?php echo View::render('social/_listDev') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light">
        <div class="content content-light content-tile">
          <div class="row-fluid">
            <div class="span6">
              <h3><?php echo __('page.team.header') ?></h3>
              <p><?php echo __('learn.rebels') ?></p>
              <a href="/team" class="btn-alt"><?php echo __('learn.team') ?></a>
            </div>
            <div class="span6">
              <h3>{{learn.join}}</h3>
              <?php echo View::render('social/_list') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php /*
<main class="column-fluid">
  <div class="span4">
    <div class="cover cover-column cover-light-alt cover-light-alt-grad">
      <div class="content content-light">
        <h1><?php echo __('What?') ?></h1>
        <div class="spacer1">
          <div class="spacer1">
            <a href="/img/lbry-ui.png">
              <img src="/img/lbry-ui.png" alt="Screenshot of a LBRY browser"/>
            </a>
          </div>
          <p><em>Puts on jargon hat.</em></p>
          <p>
            LBRY is a decentralized, censorship-resistant, open-source, peer-to-peer information marketplace and discovery protocol.
          </p>
          <p><em>Removes jargon hat.</em></p>
          <p>
            LBRY is a new way for people to publish and share content with each other.
          </p>
          <p>
            Our goal is to provide a single box that allows anyone anywhere to find and purchase digital content from anyone else.
          </p>
        </div>
        <a href="/what" class="btn-primary"><?php echo __('More About LBRY') ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover  cover-column  cover-dark cover-dark-grad ">
      <div class="content content-dark">
        <h1><?php echo __('Why?') ?></h1>
        <div class="spacer1">
          <p><?php echo __('Current systems benefit huge corporations that add little but extract a lot.') ?></p>
          <p>
            <?php echo __('We don\'t like it when middlemen, greedy rent-seekers, and kleptocrats win.') ?></p>
          </p>
          <p><?php echo __('We think a better world is one in which artists and consumers are directly connected.') ?></p>
        </div>
        <div class="spacer1">
          <a href="/why" class="btn-alt"><?php echo __('Why Make LBRY') ?></a>
        </div>
        <div>
          <img src="/img/smbc-comic.png" />
        </div>
        <div class="meta text-center">
          Credit <a href="//www.smbc-comics.com/" class="link-primary">SMBC</a>.
        </div>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover  cover-column cover-light">
      <div class="content">

        <img src="/img/cover-team.jpg" alt="<?php echo __('LBRY Founders') ?>" />
      </div>
    </div>
  </div>
</main> */ ?>
<?php echo View::render('nav/_footer') ?>
