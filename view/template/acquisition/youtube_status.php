<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php Response::setCssAssets(['/css/yt2.css']) ?>
<?php Response::addJsAsset('/js/yt2/FormValidation.js')?>
<?php  $status= LBRY::statusYoutube($token);?>

<main>
    <?php echo View::render('acquisition/_youtube_header') ?>
  <section class="hero">
    <div class="shape">
      <svg style="width: 100%; height: 100%;">
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="-1" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="0" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="0" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="1" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="1" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="2" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="2" />
        <path d="M 0,0" stroke="#2F3C5C" stroke-width="0.3px" fill="none" data-from="2" />
      </svg>
      <div class="circle one"></div>
      <div class="circle two"></div>
      <div class="circle three"></div>
      <div class="dot a"></div>
      <div class="dot b"></div>
      <div class="dot c"></div>
      <div class="dot d"></div>
      <div class="dot e"></div>
    </div>
    <div class="title">
      <div class="overflow"><h1>Leave YouTube</h1></div>
      <div class="overflow"><h1>for good.</h1></div>
      <p>No more demonetization or sneaky algorithms</p>
      <div class="button">Claim Your Channel</div>
    </div>
  </section>
  <h3>Your Channel</h3>
  <div >
    Number Of Subscriber:
    <?php echo $status['data']['subscribers']?>
  </div>
  <div >
    Number Of Video:
    <?php echo $status['data']['videos']?>
  </div>
  <h3>Edit Your Settings</h3>
  <form id="youtube_settings" action="/youtube/edit" method="post">
    <div>
      <input type="hidden" name="status_token" id="status_token" value="<?php echo $token?>"/>
    </div>
    <div hidden id="channel-name-error" >
      Channel is invalid or blank
    </div>
    <div >
      <label for="channel-name">LBRY channel name:</label>
      <input type="text" id="channel-name" style="display: block; margin : 0 auto;"
             name="new_preferred_channel" placeholder="@YourPreferredChannelName"
             value="<?php echo $status['data']['lbry_channel_name'];?>"
      >
    </div>
    <div hidden id="email-error" >
      Email is invalid or blank
    </div>
    <div >
      Email:
      <input type="text" id="email" style="display: block; margin : 0 auto;"
             name="new_email" placeholder="bill@gmail.com"
             value="<?php echo $status['data']['email'];?>"
      >
    </div>

    <div hidden id="sync-consent-error"  >
      You must agreed to sync to continue
    </div>
    <div  >
      <input name="sync_consent" id="sync-consent" type="checkbox"> I want to sync my content to the LBRY network and agree to the "terms"
    </div>
    <div >
      <button type="submit" class="btn btn-default" onClick="return submitEditForm()">Edit my preferences</button>
    </div>
  </form>
  <h3>Your Reward</h3>
  <div >
    Expected Reward:
    <?php echo $status['data']['expected_reward'];?> LBC
  </div>

  <p>To get your credits... lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ipsum velit, convallis ac libero sit amet, viverra dictum tortor. </p>
</p>
</main>