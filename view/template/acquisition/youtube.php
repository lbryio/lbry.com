<?php
  Response::addJsAsset('/js/yt2/TweenMax.min.js');
  Response::addJsAsset('/js/yt2/app.js');
  Response::setMetaTitle("LBRY x YouTube Partner Program");
  Response::setMetaDescription("Take back control of your channel and audience while earning more.");
  Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-partner.png');
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
      <h2 class="weight-light">Keep your channel safe. Reach an audience of millions.</h2>
        <br/>
      <a
        class="button button--inverse"
        href="#begin-sync"
      >Claim your channel now</a>
    </div>
  </section>

  <section class="section ancillary" id="begin-sync">
    <div class="inner-wrap">
      <h2>Sync Your YouTube Channel</h2>
      <p>
          YouTube channel sync is now a feature of <a href="https://odysee.com">odysee.com</a>, the most popular way to access LBRY.
      </p>
        <p>
            Just <a href="https://odysee.com/$/signup">sign up</a> at Odysee and you'll be prompted to sync your channel when you join.
            It takes under a minute -- take back control and begin earning!
        </p>
        <p>
            <a class="button button--primary" href="https://odysee.com">Go to Odysee.com</a>
        </p>
          <video style="max-height: 480px"
                    autoplay loop playsinline
                  src="https://cdn.lbryplayer.xyz/api/v3/streams/free/odyseesignupscaled/b8d8e724119cccde76afcd9a9d50e83f75b7c6d3/e47793"
          ></video>

      </p>
    </div>
  </section>
</main>
