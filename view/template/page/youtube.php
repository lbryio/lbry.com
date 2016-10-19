<?php Response::setMetaDescription('description.publish') ?>
<?php Response::setMetaTitle(__('title.publish')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<?php /*
       <div class="cover-subtitle">
          Join thousands of YouTubers on the first
          community&#x2011;controlled video sharing site. <?php //&#x2011; = non breaking hyphen ?>
      </div>
 */ ?>
<main >
  <?php //if you change the image, change it on download/_publish too! ?>
  <div class="cover cover-dark cover-center cover-full" style="background-color: green;" >
    <div style="max-width: 700px; text-align: center">
      <h1 class="cover-title">
        <?php echo Request::getParam('cta') ?: 'Do you want to say yes to this leading question about YouTube?' ?></h1>
      <div class="spacer2">
        (and get $50?)
      </div>
      <div class="control-group spacer2">
        <a href="#yes" class="btn-primary control-item">Yes</a>
        <a href="#maybe" class="btn-alt control-item">Maybe</a>
        <a href="https://www.youtube.com/watch?v=vjXNvLDkDTA" class="btn-alt control-item">No</a>
      </div>
    </div>
  </div>
  <div id="maybe"  class="content content-light">
    <?php /*
 <div class="content content-light content-tile">
          <h2 class="cover-title cover-title-tile cover-title-flat">{{publish.partner}}</h2>
          <h3>{{publish.how}}</h3>
          <ul>
            <li>
              Publish five pieces of content with the LBRY app.
              <div class="meta">Existing content is okay, so long as it's content you created.</div>
            </li>
            <li>Set any price per view — from zero to a dime to one million dollars — you’re in control.</li>
            <li>Receive 100% of your list price in real time as it is streamed.</li>
            <li>
              Receive approximately $1,000.<br/>
              <div class="meta">See <a href="#what-you-get" class="link-primary">What You Get</a>.</div>
            </li>
            <li>Answer our beta feedback survey about your experience.</li>
          </ul>
          </div>
        </div> */ ?>
    <h2 class="spacer2">Meet LBRY</h2>
    <div class="column-fluid" >
      <?php foreach([
        'icon-group' => ['Community Run', 'Share (and optionally monetize) your content via a network powered entirely by users themselves.'],
        'icon-cubes' => ['Blockchain', 'The power of decentralized consensus allows your content to be discovered and accessed by anyone in the world -- on your terms.'],
        'icon-thumbs-up' => ['Take Control', 'Publish your content with whatever terms, price, and quality you desire. Update, re-release, and unpublish at any time.'],
        'icon-money' => ['Make $50', 'If you have a YouTube channel with at least, 250 followers or a video with 50,000 views, receive $50 for publishing. But everyone is welcome!'],
        'icon-lock' => ['Secure', 'Made with encryption and love by dozens of bright contributors from MIT, CMU, RPI, Udacity, Dyn and more.'],
        'icon-code' => ['Open Source', 'Entirely open-source and permissively licensed (MIT). Maintained by stewards, not overlords.'],
        //Easy
      ] as $iconClass => $copyTuple): ?>
        <?php list($title, $body) = $copyTuple ?>
        <div class="span4 spacer2">
          <div class="content content-light content-tile">
            <div class="text-center spacer-half">
              <span class="icon-mega <?php echo $iconClass ?>"></span>
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
      <div class="cover cover-dark cover-dark-grad cover-full">
        <div class="content content-dark content-tile">
          <h3 class="cover-title cover-title-tile cover-title-flat">I'm In</h3>
          <ol>
            <li>
              Clicking below will authenticate with YouTube and grant permission for your content be available on the decentralized LBRY network.
              You may revoke this permission and unpublish* your content at any time.
            </li>
            <li>
              Our team will automate publishing your content to LBRY. When it's done, you'll receive a notification and a login to review, update, and manage it.
            </li>
            <li>
              If you meet the sponsorship program criteria, you will receive $50 in network credit.
            </li>
          </ol>
          <div class="text-center spacer2">
              <a href="/youtube?success=1" class="btn-alt">Let's Do This</a>
          </div>
          <div class="meta">*Unpublishing means removing the ability to decrypt and accessing your content via LBRY, but we cannot guarantee the deletion of all encrypted data.</div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="cover cover-light-alt cover-light-alt-grad">
      <div class="content content-light content-tile">
        <h3  class="cover-title cover-title-tile cover-title-flat">Questions?</h3>
        <p>Say hello to Reilly.
          If you're a creator, please email <a  class="link-primary" href=mailto:reilly@lbry.io?subject=Fixing+YouTube">Reilly</a> with your questions or to schedule a call.</p>
          <?php echo View::render('content/_bio', ['person' => 'reilly-smith-youtube', 'orientation' => 'horizontal']) ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
