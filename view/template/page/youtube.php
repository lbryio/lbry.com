<?php Response::setMetaDescription('description.publish') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main >
  <?php //if you change the image, change it on download/_publish too! ?>
  <div class="cover cover-dark cover-center cover-full" style="padding-top: 80px; background-image: url('/img/youtube/tanks3.jpg')" >
    <div style="max-width: 700px; text-align: center">
      <h1 class="cover-title">
        YouTubers!<br/>
        Take Back Control.
      </h1>
      <div class="cover-subtitle" style="font-weight: bold">
        Join thousands of other creators in a world where your content is made available directly to your audience, free of censorship and corporate influence.
      </div>
    </div>
  </div>
  <div class="content content-light">
    <h2 class="spacer2" style="text-align: center">
      <img src="/img/lbry-dark-1600x528.png" style="max-height: 80px" alt="LBRY"/>
    </h2>
    <div class="column-fluid" >
      <?php foreach([
        'icon-group' => ['Community Run', 'Share (and optionally monetize) your content via a network powered entirely by users themselves.'],
        'icon-cubes' => ['Blockchain', 'The power of decentralized consensus allows your content to be discovered and accessed by anyone in the world -- on your terms.'],
        'icon-thumbs-up' => ['Take Control', 'Publish your content with whatever terms, price, and quality you desire. Update, re-release, and unpublish at any time.'],
        'icon-money' => ['Make More', 'You control whether your content is free or paid. If paid, you get 100% of the price.'],
        'icon-lock' => ['Secure', 'Made with encryption and love by dozens of bright contributors from MIT, CMU, RPI, Udacity, Dyn and more.'],
        'icon-code' => ['Open Source', 'Entirely open-source and permissively licensed (MIT). Maintained by stewards, not overlords.'],
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
    <div class="span6" id="yes">
      <div class="cover cover-dark cover-dark-grad">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">I'm in.</h3>
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
              <a href="https://api.lbry.io/yt/connect" class="btn-alt">Let's Do This</a>
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
          Schedule a meeting with Reilly, one of LBRY's founders and an experienced producer.
          Or, <a class="link-primary" href=mailto:reilly@lbry.io?subject=YouTube+Freedom">email him directly</a>.
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
