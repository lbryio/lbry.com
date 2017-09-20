<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main >
  <?php //if you change the image, change it on download/_publish too! ?>
  <div class="cover cover-dark cover-center cover-full" style="padding-top: 80px; background-image: url('/img/youtube/spacerise.jpg')" >
    <div style="max-width: 700px; text-align: center">
      <?php echo View::render('nav/_flashes') ?>
      <h1 class="cover-title">
        Leave YouTube<br/>
        for good.
      </h1>
      <div class="cover-subtitle" style="font-weight: bold">
        No more demonetization or sneaky algorithms.<br/>
        Publish on your terms, not Google's.
      </div>
       <div class="text-center control-group spacer2">
         <a href="#do-it" class="btn-primary">Let's Do This</a>
         <a href="#more-words" class="btn-alt">More Words, Please</a>
       </div>
    </div>
  </div>
  <div class="content content-light" id="more-words">
    <h2 class="spacer2" style="text-align: center">
      <img src="/img/lbry-dark-1600x528.png" style="max-height: 80px" alt="LBRY"/>
    </h2>
    <div class="column-fluid" >
      <?php foreach([
        'icon-money' => ['Earn More', 'Integrated tipjars, pay-per-stream, or free: the choice is yours. And you earn 100% of it.'],
        'icon-group' => ['Community Run', 'Your audience–not advertisers–decide what they want and how they want it.'],
        'icon-code' => ['Accountable', 'Entirely open-source platform. Maintained by stewards, not overlords.'],
        //Easy
      ] as $iconClass => $copyTuple): ?>
        <?php list($title, $body) = $copyTuple ?>
        <div class="span4 spacer2">
          <div class="content content-light content-tile">
            <div class="text-center spacer-half">
              <div class="icon-in-circle">
                <span class="<?php echo $iconClass ?>"></span>
              </div>
            </div>
            <h3><?php echo $title ?></h3>
            <p>
              <?php echo $body ?>
            </p>
          </div>
        </div>
        <?php endforeach ?>
    </div>
  </div>
  <div class="column-fluid" >
    <div class="span6" id="do-it">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">Leave YouTube in one click</h3>
          <ol>
            <li>
              Clicking below will authenticate with YouTube and grant permission for your content to be available on the decentralized LBRY network.
              You may revoke this permission and unpublish* your content at any time.
            </li>
            <li>
              Our team will automate publishing your content to LBRY. When it's done, you'll receive a notification and a login to review, update, and manage it.
            </li>
          </ol>
          <div class="text-center spacer2">
              <a href="https://api.lbry.io/yt/connect" class="btn-alt">Sync Channel</a>
          </div>
          <div class="meta">*Unpublishing means removing the ability to decrypt and accessing your content via LBRY, but we cannot guarantee the deletion of all encrypted data.</div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
      <div class="content content-light content-tile">
        <h3  class="cover-title cover-title-tile cover-title-flat">I Have Questions</h3>
        <p>
          Have a big audience? Let Reilly know how we can support you
          by <a class="link-primary" href=mailto:reilly@lbry.io?subject=YouTube+Freedom">emailing him directly</a>.
        </p>
        <form action="/youtube/sub" method="POST" class="spacer2">
          <?php echo View::render('form/_formRow', [
            'field'    => 'email',
            'type'     => 'email',
            'label'    => 'Email',
            'required' => true,
          ]) ?>
          <input type="submit" value="Let's Talk" class="btn-primary">
        </form>
        <?php echo View::render('content/_bio', ['person' => 'reilly-smith-youtube', 'orientation' => 'horizontal']) ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
