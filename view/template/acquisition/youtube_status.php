<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main>
    <?php  $status= LBRY::statusYoutube($token);?>
    <form action="yt/update?status_token=<?php echo $token?>" method="post">
        <div style="text-align: center;">
            <label for="channel-name">LBRY channel name:</label>
            <input type="text" id="channel-name" style="display: block; margin : 0 auto;"
                   name="new_preferred_channel" placeholder="@YourPreferredChannelName"
                   value="<?php echo $status['data']['lbry_channel_name'];?>"
            >
        </div>
        <div style="text-align: center;">
            LBRY channel name:
            <input type="text" id="email" style="display: block; margin : 0 auto;"
                   name="new_email" placeholder="bill@gmail.com"
                   value="<?php echo $status['data']['email'];?>"
            >
        </div>
        <div style="text-align: center;">
            <label for="sync-consent">Youtube Sync status:</label>
            <select name="sync_consent" id="sync-consent" style="display: block; margin : 0 auto;">
                <option value="false" <?php echo $status['data']['status']=='pending'?'selected="selected"':'';?>>
                    Don't sync yet
                </option>
                <option value="true" <?php echo $status['data']['status']=='queued'?'selected="selected"':'';?>>
                    Sync my channel
                </option>
                <option value="syncing" <?php echo $status['data']['status']=='syncing'?'selected="selected"':'';?>
                        disabled="disabled">
                    Being synced
                </option>
                <option value="synced" <?php echo $status['data']['status']=='synced'?'selected="selected"':'';?>
                        disabled="disabled">
                    Syncing completed
                </option>
            </select>
        </div>
        <div style="text-align: center;">
            Expected Reward:
            <?php echo $status['data']['expected_reward'];?> LBC
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-default">Edit my preferences</button>
        </div>
    </form>
</main>