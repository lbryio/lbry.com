<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js') ?>
<?php Response::addJsAsset('/js/yt2/youtube_status.js') ?>
<?php Response::addJsAsset('/js/yt2/youtube_video.js') ?>
<?php Response::addJsAsset('//www.googleadservices.com/pagead/conversion_async.js') ?>

<?php if (!$is_disabled): ?>
    <?php $statusData = $status_token['data'] ?>
    <?php $isSyncAgreed = in_array($statusData['status'], ["failed", "finalized", "pendingemail", "queued", "synced", "syncing","pendingupgrade","abandoned"]) ?>
    <?php $isRewardClaimed = $statusData['redeemed_reward'] > 0 ?>
    <?php $isRewardable = $statusData['expected_reward'] > 0 ?>
    <?php $isTransferred = $statusData['transferred'] ?>

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
        var conv_handler = window['google_trackConversion'];

        opt.onload_callback = function() { };

        if (typeof(conv_handler) === 'function')
          conv_handler(opt);
      }
      <?php js_end() ?>
    <?php endif ?>
<?php else: ?>
    <?php $isSyncAgreed = false ?>
    <?php $isRewardClaimed = false ?>
    <?php $isTransferred = false ?>
    <?php $statusData = [
            'email' => 'error@lbry.com',
            'subscribers' => 101,
            'editable' => false,
            'status' => 'failed',
            'videos' => 1,
            'lbry_channel_name' => '@lbry',
            'expected_reward' => 1,
            'has_verified_email' => true
    ] ?>
<?php endif ?>

<main class="ancillary youtube">
  <section class="section channel">
    <div class="inner-wrap">
      <?php if ($is_disabled): ?>
        <div class="notice notice-error spacer1">
            <p>The YouTube program is down for maintenance. It will return soon.</p>
            <p>Until it is back up, you cannot edit your submission. Email <?php echo Config::HELP_CONTACT_EMAIL ?> if you need immediate assistance.</p>
        </div>
      <?php endif ?>
      <?php if (preg_match('/^[A-Za-z0-9._%+-]+@plusgoogle.com$/', $statusData['email'])): ?>
        <p class="error-block" id="email-google-plus-error">
          Your email address is set as <?php echo $statusData['email']; ?>.<br/>
          If this is not your email address, please change it below.<br/> 
          If you have a LBRY Account, please use that email here so the accounts are merged.
        </p>
      <?php endif ?>

      <h2><?php echo $isSyncAgreed && $isTransferred ? "You're all set!" : "Almost done!" ?></h2>

      <div class="confirmation-steps">
        <ul class="bulletless">
          <li>
            <span>✓</span>
            <p>Confirm your channel</p>
          </li>

          <li class="<?php echo $isSyncAgreed ? "" : "disabled" ?>">
            <span><?php echo $isSyncAgreed ? "✓" : "·" ?></span>
            <p>Agree to sync</p>
          </li>

          <li class="<?php echo $isTransferred && $isSyncAgreed ? "" : "disabled" ?>">
            <span><?php echo $isTransferred ? "✓" : "·" ?></span>
            <p>Claim content</p>
            <p <?php echo ($isSyncAgreed === true && $isTransferred === false) ? "" : "hidden" ?>>(<a href="https://lbry.tv">Sign in to lbry.tv</a> or <a href="/get">get the app</a>)</p>
          </li>
        </ul>

        <hr/>
      </div>

      <table>
        <thead>
          <tr>
            <th>Your Sync Status</th>
            <th>Subscribers</th>
            <th>Videos</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <?php switch ($statusData['status']) {
                case "pending":
                  echo __("Pending Agreement");
                  break;
                case "pendingemail":
                  echo __("Pending Email Confirmation. Please refresh after confirming.");
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
                  echo __("Does not qualify or cannot sync anymore!");
                  break;
                default:
                  echo __("—");
                  break;
              } ?>
            </td>

            <td>
              <?php echo $statusData['subscribers'] === 0 ? "—" : $statusData['subscribers'] ?>
            </td>

            <td>
              <?php echo $statusData['videos'] === 0 ? "—" : $statusData['videos'] ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section class="section settings">
    <div class="inner-wrap">
      <form id="youtube_settings" action="/youtube/edit" method="post">
        <div>
          <input type="hidden" name="status_token" id="status_token" value="<?php echo $token ?>"/>
        </div>

        <?php if ($error_message): echo "<p class='error-block'>" . "The following error occurred: <strong>" . $error_message . "</strong> For support please send an email to hello@lbry.com" . "</p>"; endif; ?>

        <fieldset>
          <legend>Confirm your preferences</legend>

          <p <?php echo $statusData['email']==="" ? "" : "hidden" ?> class="error-block">
            You need to provide an email
          </p>
          <p <?php echo ($statusData['has_verified_email']===false && $statusData['email']!=="") ? "" : "hidden"?> class="error-block">
            You need to verify your email! <a href="https://api.lbry.com/yt/resend_verification_email?status_token=<?php echo $token ?>&email=<?php echo $statusData['email'] ?>">Click here to resend a verification email</a>
          </p>

          <fieldset-group>
            <fieldset-section>
              <label for="channel-name">Desired LBRY Channel Name (i.e. @MyChannel)</label>
              <input
                type="text" id="channel-name" name="new_preferred_channel"
                placeholder="@YourPreferredChannelName"
                value="<?php echo $statusData['lbry_channel_name']; ?>" <?php echo $statusData['editable'] ? "" : "disabled" ?>
              />
              <div hidden id="channel-name-error" class="error">Channel is invalid or blank (only letters, numbers and - allowed, no spaces)</div>
            </fieldset-section>

            <fieldset-section>
              <label for="email">Email (use existing LBRY account if signed up)</label>
              <input
                type="text"
                id="email"
                name="new_email"
                placeholder="bill@gmail.com"
                value="<?php echo $statusData['email']; ?>"
              />
              <div hidden id="email-error" class="error">Email is invalid or blank</div>
              <div hidden id="email-google-plus-error" class="error">Google plus email addresses cannot be used</div>
            </fieldset-section>
          </fieldset-group>

          <checkbox-element
            <?php echo (($statusData['status'] === 'pending' || $statusData['status'] === 'queued') && !$statusData['transferred']) ? "" : "disabled "; ?>
            <?php echo !$statusData['has_verified_email'] ? "hidden" : "" ?>
          >
            <input
              id="sync_consent"
              name="sync_consent"
              type="checkbox"
              <?php echo $isSyncAgreed ? "checked" : "" ?> <?php echo (($statusData['status'] === 'pending' || $statusData['status'] === 'queued') && !$statusData['transferred']) ? "" : "disabled "; ?>
            />

            <label for="sync_consent" <?php echo !$statusData['has_verified_email'] ? "hidden" : "" ?>>
              I want to sync my content to the LBRY network and agree to <a href="/faq/youtube-terms" target="_blank">these terms</a>. I have also read and understand <a href="/faq/youtube" target="_blank">how the program works</a>.
              <p hidden id="sync-consent-error" class="error">In order to continue, you must agree to sync.</p>
            </label>
            <checkbox-toggle/>
          </checkbox-element>
          <div>
            <button type="submit" onClick="return submitEditForm()">Save Changes</button>
          </div>
        </fieldset>
      </form>

      <br/><br/>

      <?php if ($isSyncAgreed && !$isTransferred && in_array($statusData['status'], ['queued', 'syncing', 'synced', 'finalized', 'pendingupgrade'])): ?>
        <fieldset>
            <legend>Claim channel and content</legend>
            <p>Just one step left! Take permanent ownership of your content after it's been synced to LBRY. You'll do this by claiming it on the Channels page of lbry.tv/Desktop</p>
            <ul>
              <li><a href="https://lbry.tv">On the web</a></li>
              <li><a href="https://lbry.com/get">Desktop and mobile apps</a></li>
            </ul>
        </fieldset>
      <?php endif ?>
        <p>Have questions, problems, or feedback? Check out the <a href="/faq/youtube" title="YouTube FAQ">YouTube FAQ</a> or send us an <a href="mailto:hello@lbry.com">email</a>.</p>
        <p><a href="/termsofservice" title="View Terms of Service">View Terms of Service</a>.</p>
    </div>
  </section>
</main>
