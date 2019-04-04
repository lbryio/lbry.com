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
Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-partner.png');
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
    <div class="overflow"><h1>Find New Fans</h1></div>
    <p>Get your YouTube videos in front of the LBRY audience.</p>
    <div class="button">Claim Your LBRY Channel Now</div>
  </div>
</section>
<section class="claim section">
  <div class="inner">

    <div class="content">
      <?php
      if ($error_message): echo "<div>" . "The following error occurred: ". $error_message  . " For support please send an email to hello@lbry.com" . "</div>";
      endif;?>
      <div class="zigzag"></div>
      <h1>Connect with your fans while earning money and rewards.</h1>
        <div hidden id="sync-status" class="sync-status">

        </div>
      <form id="youtube_claim" method="post" action="/youtube/token">
        <div class="form-inner" >
          <div class="block">
            <input id="lbry_channel_name" type="text" name="desired_lbry_channel_name" placeholder="Enter your channel name" />
            <label>@</label>
            <div hidden id="lbry_error" class="error">LBRY channel name is not valid or blank</div>
          </div>
      </form>
        <div class="block">
            <input type="submit" value="Claim now" onClick="return submitDetailsForm()"/>
        </div>
      <div class="meta">
        This will verify you are an active YouTuber. Instructions about how to claim credits, and technical details about your channel, will be emailed to you after you are verified.
        <a href="/faq/youtube">Learn more</a>.
      </div>
    </div>
  </div>
</section>
<section class="join section">
  <div class="inner">
    <div class="content">
      <h1>Join The Best Creators Already On LBRY</h1>
      <p>With audiences ranging from 1,000+ to 10,000,000+</p>
      <div class="boxes">
        <div class="box">
            <div class="image">
                <div id="play-video1" class="to-play" onclick="playVideo('video1')"><span></span></div>
                    <video id="video1" width="100%" poster="/img/youtube/01@2x.jpg" src="https://spee.ch/1ac47b8b3def40a25850dc726a09ce23d09e7009/ever-wonder-how-bitcoin-and-other.mp4" style="cursor: pointer" onclick="function(){this.paused ? this.play() : this.pause()}"/></video>
            </div>

          <div class="text">
            <p>@3Blue1Brown</p>
          </div>
        </div>
        <div class="box">
            <div class="image">
                <div id="play-video2" class="to-play" onclick="playVideo('video2')"><span></span></div>
              <video id="video2" width="100%" poster="/img/youtube/02@2x.jpg" src="https://spee.ch/3c96f32de285db6c04e80bd6f5fad573250541e9/casually-successful.mp4" style="cursor: pointer" onclick="function(){this.paused ? this.play() : this.pause()}" /></video>
            </div>

          <div class="text">
            <p>@CasuallyExplained</p>
          </div>
        </div>
        <div class="box">
          <div class="image" >
              <div id="play-video3" class="to-play" onclick="playVideo('video3')"><span></span></div>
              <video id="video3" width="100%" poster="/img/youtube/03@2x.jpg" src="https://spee.ch/8958c5d573d71f5c2d0c1bfdf752737ce39744cb/the-historical-elements-of-wolfenstein.mp4" style="cursor: pointer" onclick="function(){this.paused ? this.play() : this.pause()}"></video>
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
      <h1>Getting On LBRY Is Easy</h1>
      <p>When you claim your channel your most recent 1,000 YouTube videos will be automatically copied to your LBRY channel.</p>
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
  </div>
</section>
<section class="rewards section">
  <div class="inner">
    <div class="content">
      <h1>Getting Credits For Your Channel</h1>
      <p>Depending on the number of subscribers you have on YouTube when you claim your channel, you will qualify for different lump sums of LBC.<br/><br/>
      </p>
      <div class="price">
        <h3>Subscriber Levels</h3>
        <p>LBC <span class="current-value"></span></p>
      </div>
      <div class="table">
        <div class="head">
          <p>Your Current YouTube Subscribers</p>
          <p>LBC Tokens</p>
          <p>USD Value</p>
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
      <h1>Let’s Connect</h1>
      <p>If you have any questions, reach out.</p>
      <div class="v-card">
        <div class="photo"><img src="https://spee.ch/7/rob-smith1.png"></div>
        <div class="text">
          <h3>Rob Smith</h3>
          <p>Head of Product Growth</p>
          <a href="mailto:rob@lbry.com?subject=YouTube+Freedom">Contact</a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="to-top"><span>to top</span></div>
</main>
