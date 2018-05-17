<?php
Response::setCssAssets(['/css/youtube.css']);
Response::addJsAsset('/js/yt2/TweenMax.min.js');
Response::addJsAsset('/js/yt2/ScrollToPlugin.min.js');
Response::addJsAsset('/js/yt2/app.js');
Response::addJsAsset('/js/yt2/FormValidation.js');
Response::addJsAsset('/js/yt2/SyncStatus.js');
Response::addJsAsset('/js/yt2/youtube_video.js');
Response::setMetaTitle("LBRY YouTube Partner Program");
Response::setMetaDescription("Put your content on the blockchain, experience true content freedom, and earn rewards.");
?>
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
    <div class="overflow"><h1>Content Freedom.</h1></div>
    <p>Put your content on the blockchain and earn rewards.</p>
    <div class="button">Claim Your LBRY Channel</div>
  </div>
</section>
<section class="sync section">
  <div class="inner">
    <div class="content">
      <div class="zigzag"></div>
      <h1>Sync &amp; Earn Crypto</h1>
      <p>LBRY offers a single-click sync process<br>for existing YouTubers</p>
        <form class="form" id="sync" method="post" action="http://api.lbry.io/yt/connect">
            <div class="form-inner">
              <div class="block">
                <div class="center">
                  <input type="text" hidden name="type" value="sync"/>
                  <input id="immediate-sync" name="immediate_sync" type="checkbox" value="true"/>
                  <label for="immediate-sync">I want to sync my content.</label></div>
                </div>
              </div>
              <div class="block">
                <div class="center">
                  <input type="submit" value="Sync Now"/>
                </div>
              </div>
            </div>
        </form>




      <div class="meta">
        By syncing, you agree to mirror your content to the LBRY network for 1 year, and acknowledge <a href="/faq/youtube-terms">these terms</a>.
      </div>
    </div>
  </div>
</section>

<section class="join section">
  <div class="inner">
    <div class="content">
      <h1>LBRY is more fun with friends</h1>
      <p>Take your peers and your audience with you. Create without limits.</p>
      <div class="boxes">
        <div class="box">
            <div class="image" target="_blank">
                <div id="play-video1" class="to-play" onclick="playVideo('video1')"><span></span></div>
                    <video id="video1" width="100%" poster="/img/youtube/01@2x.jpg" src="https://spee.ch/1ac47b8b3def40a25850dc726a09ce23d09e7009/ever-wonder-how-bitcoin-and-other.mp4" style="cursor: pointer" onclick="this.paused ? this.play() : this.pause();"/></video>
            </div>

          <div class="text">
            <p>@3Blue1Brown</p>
          </div>
        </div>
        <div class="box">
            <div class="image" target="_blank">
                <div id="play-video2" class="to-play" onclick="playVideo('video2')"><span></span></div>
              <video id="video2" width="100%" poster="/img/youtube/02@2x.jpg" src="https://spee.ch/3c96f32de285db6c04e80bd6f5fad573250541e9/casually-successful.mp4" style="cursor: pointer" onclick="this.paused ? this.play() : this.pause();" /></video>
            </div>

          <div class="text">
            <p>@CasuallyExplained</p>
          </div>
        </div>
        <div class="box">
          <div class="image"  target="_blank">
              <div id="play-video3" class="to-play" onclick="playVideo('video3')"><span></span></div>
              <video id="video3" width="100%" poster="/img/youtube/03@2x.jpg" src="https://spee.ch/8958c5d573d71f5c2d0c1bfdf752737ce39744cb/the-historical-elements-of-wolfenstein.mp4" style="cursor: pointer" onclick="this.paused ? this.play() : this.pause();"></video>
          </div>
          <div class="text">
            <p>@ColinsLastStand</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="how section">
  <div class="inner">
    <div class="content">
      <h1>Migrating to LBRY</h1>
      <p>We will automatically mirror your existing YouTube channel to the LBRY Network.</p>
      <div class="steps">
        <div class="path">
          <div class="journey"></div>
        </div>
        <div class="step one enabled" data-enable="12">
          <div class="circle">1</div>
          <p class="text">Sync your channel</p>
        </div>
        <div class="step two enabled" data-enable="33">
          <div class="circle">2</div>
          <p class="text">Download the LBRY App</p>
        </div>
        <div class="step three enabled" data-enable="75">
          <div class="circle">3</div>
          <p class="text">Receive your LBRY Credits</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="rewards section">
  <div class="inner">
    <div class="content">
      <h1>LBRY Credits and Your Channel</h1>
      <p>After you sync, receive LBRY Credits for one year based on your current subscriber count.<br/><br/>
      The more you give to the network, the more it gives back.</p>
      <div class="price">
        <h3>Partner Programs</h3>
        <p>LBC <span class="current-value"></span></p>
      </div>
      <div class="table">
        <div class="head">
          <p>Subscribers</p>
          <p>Yearly</p>
          <p>Amount</p>
        </div>
        <div class="line">
          <p>1,000</p>
          <p><?php echo $reward['data']['1000']; ?> <span></span></p>
          <p></p>
        </div>
        <div class="line">
          <p>10,000</p>
          <p><?php echo $reward['data']['10000']; ?> <span></span></p>
          <p></p>
        </div>
        <div class="line">
          <p>100,000</p>
          <p><?php echo $reward['data']['100000']; ?> <span></span></p>
          <p></p>
        </div>
        <div class="line">
          <p>1,000,000</p>
          <p><?php echo $reward['data']['1000000']; ?> <span></span></p>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="contact section">
  <div class="inner">
    <div class="content">
      <h1>Tell me more.</h1>
      <p>We have a guy that elaborates on things. Apply directly to the forehead.</p>
      <div class="v-card">
        <div class="photo"><img src="/img/youtube/reilly-smith@2x.png"></div>
        <div class="text">
          <h3>Reilly Smith</h3>
          <p>Head of Content</p>
          <a href="mailto:reilly@lbry.io?subject=YouTube+Freedom">Contact</a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="to-top"><span>to top</span></div>
</main>
