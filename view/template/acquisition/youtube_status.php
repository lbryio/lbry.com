<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php Response::setCssAssets(['/css/youtube.css']) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js') ?>
<?php Response::addJsAsset('/js/yt2/youtube_status.js') ?>
<?php Response::addJsAsset('/js/yt2/youtube_video.js') ?>
<?php Response::addJsAsset('//www.googleadservices.com/pagead/conversion_async.js') ?>
<?php $statusData = $status_token['data'] ?>
<?php $isSyncAgreed = in_array($statusData['status'], ["syncing", "synced", "queued", "failed", "finalized"]) ?>
<?php $isRewardClaimed = $statusData['redeemed_reward'] > 0 ?>
<?php if (IS_PRODUCTION): ?>
    <?php js_start() ?>
    if (!localStorage.getItem('status_token')) {
    ga('send', 'event', 'YT Sync', '<?php echo $isSyncAgreed ? "pending" : "queued" ?>', '');
    fbq('track', 'Lead');

    window.google_conversion_id = 980489749;
    window.google_conversion_label = "B0ZpCIuLgV0QlazE0wM";
    window.google_remarketing_only = false;
    window.google_conversion_format = "3";

    var opt = new Object();
    opt.onload_callback = function() { };
    var conv_handler = window['google_trackConversion'];
    if (typeof(conv_handler) == 'function') {
    conv_handler(opt);
    }
    }
    <?php js_end() ?>
<?php endif ?>

<main class="channel-settings">
    <?php echo View::render('acquisition/_youtube_header') ?>
    <section class="section channel pad-top">
        <div class="inner">
            <div class="content">
                <?php if (preg_match('/^[A-Za-z0-9._%+-]+@plusgoogle.com$/', $statusData['email'])): ?>
                    <div id="email-google-plus-error" class="error">Your email address is set
                        as <?php echo $statusData['email']; ?>.<br>If this is not your email address, please <span
                                id="scroll_email">change it below</span>.
                    </div>
                <?php endif ?>
                <div class="zigzag"></div>
                <h1><?php echo $isSyncAgreed && $isRewardClaimed ? "You're all set!" : "Almost done!" ?></h1>
                <div class="confirmation-steps">
                    <ul>
                        <li>
                            <span>✓</span>
                            <p>Confirm your channel</p>
                        </li>
                        <li class="<?php echo $isSyncAgreed ? "" : "disabled" ?>">
                            <span><?php echo $isSyncAgreed ? "✓" : "☐" ?></span>
                            <p>Agree to sync</p>
                            <p <?php echo $isSyncAgreed ? "hidden" : "" ?>>click <a id="scroll-sync" href="#">here</a>
                                to agree to sync your content</p>
                        </li>
                        <li class="<?php echo $isRewardClaimed && $isSyncAgreed ? "" : "disabled" ?>">
                            <span><?php echo $isRewardClaimed ? "✓" : "☐" ?></span>
                            <p>Claim your credits</p>
                            <p <?php echo ($isRewardClaimed === false && $isSyncAgreed === true) ? "" : "hidden" ?>>To
                                get your credits, <a href="/get">download the app</a> and <a href="/faq/youtube">follow
                                    these instructions.</a></p>
                        </li>
                    </ul>
                </div>

                <div class="blocks">
                    <div class="block">
                        <p>Your Sync Status<br>
                            <span>
                            <?php switch ($statusData['status']) {
                                case "pending":
                                    echo __("Pending Agreement");
                                    break;
                                case "queued":
                                    echo __("Queued");
                                    break;
                                case "syncing":
                                    echo __("Sync in Progress!");
                                    break;
                                case "synced":
                                    echo __("Content is Live!");
                                    break;
                                case "failed":
                                    echo __("Something went wrong, check back later!");
                                    break;
                                case "finalized":
                                    echo __("The content is in your control!");
                                    break;
                                case "abandoned":
                                    echo __("Cannot sync anymore!");
                                    break;
                            } ?>
                            </span>
                        </p>
                    </div>
                    <div class="block">
                        <p>Subscribers<br>
                            <span><?php echo $statusData['subscribers'] === 0 ? "-" : $statusData['subscribers'] ?></span>
                        </p>
                    </div>
                    <div class="block">
                        <p>Videos<br>
                            <span><?php echo $statusData['videos'] === 0 ? "-" : $statusData['videos'] ?></span>
                        </p>
                    </div>
                    <div class="block">
                        <p>Expected Rewards<br>
                            <span><?php echo $statusData['expected_reward'] === 0 ? "-" : $statusData['expected_reward'] ?></span>
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
                        <input type="hidden" name="status_token" id="status_token" value="<?php echo $token ?>"/>
                    </div>
                    <?php
                    if ($error_message): echo "<div>" . "The following error occurred: " . $error_message . " For support please send an email to hello@lbry.com" . "</div>";
                    endif; ?>
                    <div class="block">
                        <label for="channel-name">LBRY Channel ID</label>
                        <input type="text" id="channel-name" name="new_preferred_channel"
                               placeholder="@YourPreferredChannelName"
                               value="<?php echo $statusData['lbry_channel_name']; ?>" <?php echo $statusData['editable'] ? "" : "disabled" ?> >
                        <div hidden id="channel-name-error" class="error">Channel is invalid or blank</div>
                    </div>
                    <div class="block">
                        <label for="email">Preferred Email</label>
                        <input type="text" id="email" name="new_email" placeholder="bill@gmail.com"
                               value="<?php echo $statusData['email']; ?>">
                        <div hidden id="email-error" class="error">Email is invalid or blank</div>
                        <div hidden id="email-google-plus-error" class="error">Google plus email addresses cannot be
                            used
                        </div>
                    </div>
                    <p <?php echo $statusData['has_verified_email'] ? "hidden" : "" ?> class="block full error">You need
                        to verify your email before continuing!</p>
                    <label for="sync-consent"
                           class="block full" <?php echo !$statusData['has_verified_email'] ? "hidden" : "" ?>>
                        <input name="sync_consent" id="sync-consent" type="checkbox"
                            <?php echo $isSyncAgreed ? "checked" : "" ?> <?php echo (($statusData['status'] == 'pending' || $statusData['status'] == 'queued') && !$statusData['transferred']) ? "" : "disabled "; ?>>I
                        want to sync my content to the LBRY network and agree to <a href="/faq/youtube-terms">these
                            terms</a>.
                        <p hidden id="sync-consent-error" class="error">In order to continue, you must agree to
                            sync.</p>
                    </label>
                    <div class="block">
                        <button type="submit" onClick="return submitEditForm()">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
</main>
