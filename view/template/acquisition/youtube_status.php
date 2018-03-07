<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php Response::setCssAssets(['/css/yt2.css']) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js')?>
<?php  $status= LBRY::statusYoutube($token);?>

<main class="channel-settings">
    <?php echo View::render('acquisition/_youtube_header') ?>
    <section class="section channel pad-top">
        <div class="inner">
            <div class="content">
                <div class="zigzag"></div>
                <h1>Your Channel</h1>
                <div class="block">
                    <p>Number of subscriber<br>
                        <span><?php echo $status['data']['subscribers']?></span>
                    </p>
                </div>
                <div class="block">
                    <p>Number of video<br>
                        <span><?php echo $status['data']['videos']?></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section settings">
        <div class="inner">
            <div class="content">
                <div class="zigzag"></div>
                <h1>Edit Your Settings</h1>
                <form id="youtube_settings" action="/youtube/edit" method="post">
                    <div>
                        <input type="hidden" name="status_token" id="status_token" value="<?php echo $token?>"/>
                    </div>
                    <div class="block">
                        <label for="channel-name">LBRY channel name:</label>
                        <input type="text" id="channel-name" name="new_preferred_channel" placeholder="@YourPreferredChannelName" value="<?php echo $status['data']['lbry_channel_name'];?>">
                        <div hidden id="channel-name-error" class="error">Channel is invalid or blank</div>
                    </div>
                    <div class="block">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="new_email" placeholder="bill@gmail.com" value="<?php echo $status['data']['email'];?>">
                        <div hidden id="email-error" class="error">Email is invalid or blank</div>
                    </div>
                    <div class="block full">
                        <input name="sync_consent" id="sync-consent" type="checkbox">I want to sync my content to the LBRY network and agree to the "terms"
                        <div hidden id="sync-consent-error" class="error">You must agreed to sync to continue</div>
                    </div>
                    <div class="block">
                        <button type="submit" onClick="return submitEditForm()">Edit my preferences</button>
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
                    <p>To get your credits... lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ipsum velit, convallis ac libero sit amet, viverra dictum tortor.</p>
                </div>
            </div>
        </div>
    </section>
</main>