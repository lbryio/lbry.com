<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php Response::setCssAssets(['/css/yt2.css']) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js')?>
<?php  $status= LBRY::statusYoutube($token); ?>

<main class="channel-settings">
    <?php echo View::render('acquisition/_youtube_header') ?>
    <section class="section channel pad-top">
        <div class="inner">
            <div class="content">
                <div class="zigzag"></div>
                <h1>Almost done.</h1>
                <h2>Here's what happens next...</h2>
                <div>
                  <div class="block">
                    <p>Your Sync Status<br>
                      <span><?php switch ($status['data']['status']) {
                          case "pending": echo __("Agree to Terms Below"); break;
                          case "queued": echo __("Queued"); break;
                          case "syncing": echo __("Sync in Progress!"); break;
                          case "synced": echo __("Content is Live!"); break;
                        } ?></span>
                    </p>
                  </div>
                  <div class="block">
                      <p>Subscribers<br>
                          <span><?php echo $status['data']['subscribers']?></span>
                      </p>
                  </div>
                  <div class="block">
                      <p>Videos<br>
                          <span><?php echo $status['data']['videos']?></span>
                      </p>
                  </div>
                    <div class="block">
                      <p>Expected Rewards<br>
                          <span><?php echo $status['data']['expected_reward']?></span>
                      </p>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section settings">
        <div class="inner">
            <div class="content">
                <div class="zigzag"></div>
                <h1>Confirm your preferences</h1>
                <form id="youtube_settings" action="/youtube/edit" method="post">
                    <div>
                        <input type="hidden" name="status_token" id="status_token" value="<?php echo $token?>"/>
                    </div>
                  <?php
                  if (isset($_GET['error'])): echo "<div>" . "The following error occurred: ". $_GET['error_message']  . " For support please send an email to hello@lbry.io" . "</div>";
                  endif;?>
                    <div class="block">
                        <label for="channel-name">LBRY Channel ID</label>
                        <input type="text" id="channel-name" name="new_preferred_channel" placeholder="@YourPreferredChannelName" value="<?php echo $status['data']['lbry_channel_name'];?>" <?php if($status['data']['status'] == 'syncing' || $status['data']['status'] == 'synced'): echo "disabled"; endif; ?> >
                        <div hidden id="channel-name-error" class="error">Channel is invalid or blank</div>
                    </div>
                    <div class="block">
                        <label for="email">Preferred Email</label>
                        <input type="text" id="email" name="new_email" placeholder="bill@gmail.com" value="<?php echo $status['data']['email'];?>">
                        <div hidden id="email-error" class="error">Email is invalid or blank</div>
                    </div>
                    <div class="block full">
                        <input name="sync_consent" id="sync-consent" type="checkbox" <?php if($status['data']['status'] == 'queued'): echo "checked"; endif;?> <?php if($status['data']['status'] == 'syncing' || $status['data']['status'] == 'synced'): echo "disabled "; echo "checked"; endif; ?>>I want to sync my content to the LBRY network and agree to <a href="/faq/youtube-terms">these terms</a>.
                        <div hidden id="sync-consent-error" class="error">In order to continue, you must agree to sync.</div>
                    </div>
                    <div class="block">
                        <button type="submit" onClick="return submitEditForm()">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section channel">
        <div class="inner">
            <div class="content">
                <div class="zigzag"></div>
                <h1>Your Reward</h1>
                <div class="block">
                    <p>Expected Reward
                        <span class="reward"><?php echo $status['data']['expected_reward'];?></span>
                    </p>
                </div>
                <div class="block get-credits">
                  <p>To get your credits, <a href="/get">download the app</a> and <a href="/faq/youtube">follow these instructions</a>.
                </div>
            </div>
        </div>
    </section>
</main>
