<?php
  Response::addJsAsset('/js/yt2/TweenMax.min.js');
  Response::addJsAsset('/js/yt2/app.js');
  Response::addJsAsset('/js/yt2/FormValidation.js');
  Response::addJsAsset('/js/yt2/SyncStatus.js');
  Response::addJsAsset('/js/yt2/youtube_video.js');
  if (in_array($_SERVER['REQUEST_URI'], ['/escapeyoutube'])) {
      Response::setMetaTitle("Escape YouTube");
      Response::setMetaDescription("Put your content on the LBRY blockchain before it's too late");
      Response::addMetaImage('https://spee.ch/6/18OanRVGL6mQIMtj93Hb09te.jpeg');
  } else {
      Response::setMetaTitle("LBRY YouTube Partner Program");
      Response::setMetaDescription("Put your content on the blockchain, experience true content freedom, and earn rewards.");
      Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-partner.png');
  }
  $isEnabled = true;
?>

<main class="ancillary youtube youtube--landing">
  <section class="hero hero--youtube">
    <div class="shape">
      <svg>
        <path d="M 0,0" data-from="-1"/>
        <path d="M 0,0" data-from="0"/>
        <path d="M 0,0" data-from="0"/>
        <path d="M 0,0" data-from="1"/>
        <path d="M 0,0" data-from="1"/>
        <path d="M 0,0" data-from="2"/>
        <path d="M 0,0" data-from="2"/>
        <path d="M 0,0" data-from="2"/>
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

    <div class="inner-wrap inner-wrap--center-left">
      <h1 class="weight-light">LBRY &times; YouTube Sync</h1>
      <h2 class="weight-light">Get your YouTube videos in front of the LBRY audience</h2>
      <button
        class="button button--inverse"
        data-id="scroll-to-claim"
        style="font-size: 1rem; margin-top: 2rem;"
        type="button"
      >Claim your channel now</button>
    </div>
  </section>

  <section class="align-text--center" id="claim-section">
    <div class="inner-wrap">
      <?php
        if ($error_message): echo "<p class='error-block'>" . "The following error occurred: ". $error_message  . " For support please send an email to <a href='mailto:hello@lbry.com' title='Email LBRY for help'>hello@lbry.com</a>." . "</p>";
      endif;?>

      <p hidden id="lbry_error" class="error-block">LBRY channel name is either not valid (only letters, numbers and - allowed, no spaces) or your input is blank</p>

      <h2>Connect with your fans while earning rewards</h2>
      <?php if ($isEnabled): ?>
          <form id="youtube_claim" method="post" action="/youtube/token">
            <p hidden id="sync-status" class="sync-status"></p>

            <input-submit style="font-size: 1rem;">
              <label class="symbol-prefix">@</label>
              <input
                id="lbry_channel_name"
                name="desired_lbry_channel_name"
                placeholder="Enter desired LBRY channel name (permanent)"
                type="text"
              />
              <input
                onClick="return submitDetailsForm()"
                type="submit"
                value="Claim now"
              />
            </input-submit>

            <br/>

            <checkbox-element style="font-size: 1rem;">
              <input hidden name="type" type="text" value="sync"/>
              <input id="immediate-sync" name="immediate_sync" type="checkbox" value="true"/>
              <label for="immediate-sync">I want to sync my content to the LBRY network and agree to <a href="/faq/youtube-terms" target="_blank">these terms</a>. I have also read and understand <a href="/faq/youtube" target="_blank">how the program works</a>.</label>
              <checkbox-toggle/>
            </checkbox-element>
          </form>
      <?php else: ?>
          <div class="notice notice-info spacer1">
            The YouTube Program is paused for maintenance. Enter your email address and we will notify you as soon as it returns. 
            If you have over 10K subs on YouTube, please <a href="https://docs.google.com/forms/d/1b9bEahq1L-hWaYN0MfnBZ8d0MnM4oQpsLFG1TlBHMrI/edit">use this form</a> for a manual sync request.
          </div>
          <?php echo View::render('mail/_subscribeForm', [
            'tag' => 'youtube_sync_paused',
            'submitLabel' => 'Get Started',
            'hideDisclaimer' => true,
            'largeInput' => true,
            'btnClass' => 'btn-alt btn-large',
          ]) ?>
      <?php endif ?>
      <small class="meta">
        This will verify you are an active YouTuber. Channel names cannot be changed once chosen, please be extra careful. Additional instructions will be emailed to you after you verify your email on the next page.
        <a href="/faq/youtube">Learn more</a>
      </small>
    </div>
  </section>

  <section>
    <div class="join section inner-wrap">
      <h3>Join great creators already on LBRY</h3>
      <p>Audiences range from 1,000+ to 10,000,000+ people. The videos below are from creators who have synced their content to LBRY.</p>

      <div class="ytsync-previews">
        <figure class="ytsync-preview">
          <video
            onclick="playVideo('video1')"
            id="video1"
            poster="/img/youtube/01@2x.jpg"
            src="https://spee.ch/1ac47b8b3def40a25850dc726a09ce23d09e7009/ever-wonder-how-bitcoin-and-other.mp4"
          ></video>

          <figcaption>@3Blue1Brown</figcaption>
        </figure>

        <figure class="ytsync-preview">
          <video
            onclick="playVideo('video2')"
            id="video2"
            poster="/img/youtube/02@2x.jpg"
            src="https://spee.ch/3c96f32de285db6c04e80bd6f5fad573250541e9/casually-successful.mp4"
          ></video>

          <figcaption>@CasuallyExplained</figcaption>
        </figure>

        <figure class="ytsync-preview">
          <video
            onclick="playVideo('video3')"
            id="video3"
            poster="/img/youtube/03@2x.jpg"
            src="https://spee.ch/8958c5d573d71f5c2d0c1bfdf752737ce39744cb/the-historical-elements-of-wolfenstein.mp4"
          ></video>

          <figcaption>@ColinsLastStand</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <section>
    <div class="rewards section inner-wrap">
      <h3>What you earn</h3>
        <br/>
        <?php /*
      <table>
        <thead style="font-size: 80%;">
          <tr>
            <th>Current YouTube Subscribers</th>
            <th>LBRY Credits/Year</th>
            <th>USD Value         <small class="meta">1 LBC = <span class="current-value"></span></small></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($reward['data'] as $subCount => $rewardAmt): ?>
              <tr>
                <td><?php echo number_format($subCount) ?></td>
                <td><?php echo number_format($rewardAmt * 12); //API returns per month?> <small class="meta">LBC</small></td>
                <td class="lbc-to-usd" data-lbc-amount="<?php echo $rewardAmt * 12 ?>"></td>
              </tr>
          <?php endforeach ?>
        </tbody>
      </table>
        <p class="align-text--center">
     <small> <em>Table shows yearly awards but rewards are distributed monthly. Monthly reward will be one-twelfth the above amount. These reward amounts may change at LBRY Inc.'s discretion.</em></small>
        </p>
     */ ?>
      <h4>
         For Views
      </h4>
      <p>Receive up to 2 LBC (<span class="lbc-to-usd" data-lbc-amount="2"></span>) per view from verified lbry.tv accounts. This requires at least 500 subs and original content. <a href="https://lbry.com/faq/view-rewards" target="_blank">Learn more.</a> 
     <small> <em>These reward amounts may change at LBRY Inc.'s discretion.</em></small>
      </p>

      <h4>
        For Building on LBRY
      </h4>
      <p>You receive additional rewards for building an audience, starting with your first follower and continuing at various tiers.</p>
    </div>
  </section>

  <section>
    <div class="yt-how inner-wrap">
      <h3>Getting on LBRY is easy</h3>
      <p>When you claim your channel your most recent 1,000 YouTube videos will be automatically copied to your LBRY channel.</p>

      <ol>
        <li>Claim your channel</li>
        <li>Authorize your content</li>
        <li>Users watch your content on LBRY</li>
      </ol>

      <div class="steps">
        <div class="path">
          <div class="journey"></div>
        </div>

        <div class="step one enabled" data-enable="12">
          <div class="circle">1</div>
          <p class="text">Claim your channel</p>
        </div>

        <div class="step two enabled" data-enable="33">
          <div class="circle">2</div>
          <p class="text">Authorize your content</p>
        </div>

        <div class="step three enabled" data-enable="75">
          <div class="circle">3</div>
          <p class="text">Users watch your content on LBRY</p>
        </div>
      </div>
    </div>
  </section>

  <section class="align-text--center">
    <div class="inner-wrap">
      <h3>Sync &amp; earn</h3>
      <p>LBRY offers a single-click sync process for existing YouTubers.</p>

      <br/>

      <div>
        <button
          class="button button--inverse"
          data-id="scroll-to-claim"
          style="font-size: 1rem;"
          type="button"
        >Sync now</button>
      </div>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Human available</h3>
      <p>Questions, problems, or feedback? A real human is available.</p>

      <div class="v-card">
        <figure>
          <img alt="Tom Zarebczan, Community Leader" src="https://spee.ch/@lbryteam:6/tom-zarebczan.jpg"/>
        </figure>

        <info>
          <h3>Tom Zarebczan</h3>
          <p>Community Leader</p>
          <a href="mailto:tom@lbry.com?subject=YouTube+Freedom">tom@lbry.com</a>
        </info>
      </div>
    </div>
  </section>
</main>
