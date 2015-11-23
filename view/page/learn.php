<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php Response::setMetaTitle(__('Learn About LBRY')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main class="column-fluid">
  <div class="span4">
    <div class="cover cover-column cover-dark cover-dark-grad">
      <div class="content content-dark">
        <h1><?php echo __('What?') ?></h1>
        <div class="spacer1">
          <div class="spacer1">
            <a href="/img/lbry-win-ss-783x272.png">
              <img src="/img/lbry-win-ss-783x272.png" />
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
        <a href="/what" class="btn-alt"><?php echo __('More About LBRY') ?></a>
      </div>
    </div>
  </div>
  <div class="span4">
    <div class="cover  cover-column cover-light-alt cover-light-alt-grad">
      <div class="content">
        <h1><?php echo __('Why?') ?></h1>
        <div class="spacer1">
          <p><?php echo __('Current systems benefit huge corporations that add little but extract a lot.') ?></p>
          <p>
            <?php echo __('We don\'t like it when middlemen, greedy rent-seekers, and kleptocrats win.') ?></p>
          </p>
          <p><?php echo __('We think a better world is one in which artists and consumers are directly connected.') ?></p>
        </div>
        <div class="spacer1">
          <a href="/why" class="btn-primary"><?php echo __('Why Make LBRY') ?></a>
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
        <h1><?php echo __('Who?') ?></h1>
        <div class="spacer1">
          <p><?php echo __('LBRY promises an awful lot.') ?> <?php echo __('Can you trust us to deliver?') ?></p>
          <p><?php echo __('Learn more about the relentless rebels changing the internet.') ?></p>
        </div>
        <div class="spacer1">
          <a href="/team" class="btn-alt"><?php echo __('About The Team') ?></a>
        </div>
        <img src="/img/cover-team.jpg" alt="<?php echo __('LBRY Founders') ?>" />
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>