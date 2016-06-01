<?php Response::setMetaDescription(__('Learn more about LBRY, the technology that puts you back in control of the internet.')) ?>
<?php Response::setMetaTitle(__('Learn About LBRY')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
  <main class="column-fluid ">
    <div class="span6">
      <div class="cover cover-light content">
        <h1 style="max-width: 660px; margin-left: auto; margin-right: auto">LBRY in 60 Seconds</h1>
        <?php echo View::render('download/_videoIntro') ?>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-dark cover-center content content-dark" style="background-image:url(/img/altamira-bison.jpg)">
        <h2 class="cover-title cover-title-tile">Art in the Internet Age</h2>
        <p class="cover-subtitle text-center">Learn how LBRY will forever improve how<br/>we create and share with one another.</p>
        <a href="/what" class="btn-alt"><?php echo __('Read the Essay') ?></a>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3><?php echo __('Who Makes LBRY?') ?></h3>
          <p><?php echo __('Learn more about the relentless rebels changing the internet.') ?></p>
          <div class="spacer1">
            <a href="/team" class="btn-alt"><?php echo __('About The Team') ?></a>
          </div>
          <h4>Talk With Us</h4>
          <?php echo View::render('social/_list') ?>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
        <div class=" content content-light content-tile">
          <h3>Nerd With Us</h3>
          <p>LBRY is a completely open source protocol that provides a decentralized digital marketplace.</p>
          <?php echo View::render('social/_listDev') ?>
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
<?php echo View::render('nav/footer') ?>