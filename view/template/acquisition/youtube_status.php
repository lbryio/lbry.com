<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js')?>
<main>
    <?php  $status= LBRY::statusYoutube($token);?>
    <form id="youtube_settings" action="/youtube/edit" method="post">
       <div>
           <input type="hidden" name="status_token" id="status_token" value="<?php echo $token?>"/>
       </div>
        <div hidden id="channel-name-error" style="text-align: center;">
            Channel is invalid or blank
        </div>
        <div style="text-align: center;">
            <label for="channel-name">LBRY channel name:</label>
            <input type="text" id="channel-name" style="display: block; margin : 0 auto;"
                   name="new_preferred_channel" placeholder="@YourPreferredChannelName"
                   value="<?php echo $status['data']['lbry_channel_name'];?>"
            >
        </div>
        <div hidden id="email-error" style="text-align: center;">
            Email is invalid or blank
        </div>
        <div style="text-align: center;">
            Email:
            <input type="text" id="email" style="display: block; margin : 0 auto;"
                   name="new_email" placeholder="bill@gmail.com"
                   value="<?php echo $status['data']['email'];?>"
            >
        </div>

        <div style="text-align: center;">
            Expected Reward:
            <?php echo $status['data']['expected_reward'];?> LBC
        </div>
        <div style="text-align: center;">
            Number Of Subscriber:
            <?php echo $status['data']['subscribers']?>
        </div>
        <div style="text-align: center;">
            Number Of Video:
            <?php echo $status['data']['videos']?>
        </div>
        <div hidden id="sync-consent-error" style="text-align: center;" >
            You must agreed to sync to continue
        </div>
        <div  style="text-align: center;">
            <input name="sync_consent" id="sync-consent" type="checkbox"> I want to sync my content to the LBRY network and agree to the "terms"
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-default" onClick="return submitEditForm()">Edit my preferences</button>
        </div>
    </form>
</main>