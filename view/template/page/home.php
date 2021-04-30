<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>

<main class="home">
  <section class="anno__text">
    <h1 class="anno__title">HELP LBRY SAVE CRYPTO</h1>
    <div class="anno__subtitle">
      <div>The SEC doesn’t understand blockchain. The claims made in SEC vs. LBRY would destroy the United States
        cryptocurrency industry. <br> Learn more at <a id="anno__link" href="https://helplbrysavecrypto.com?ref=lbrycom">helplbrysavecrypto.com</a>
    </div>
  </section>
  <section class="home__hero">
    <div class="inner-wrap">
      <aside class="home__cta">
        <div class="home__cta-copy">
          <h1>LBRY does to publishing,<br />
            what Bitcoin did to money.</h1>
          <p><span class="meta">Join top creators and more than 10,000,000 people on LBRY, an open, free, and fair
              network for digital content.</span></p>
          <?php echo View::render('download/_downloadRow') ?>
        </div>
      </aside>

      <figure class="home__preview">
        <a href="/get">
          <video autoplay loop poster="https://spee.ch/f/2019-08-lbry-interface-poster.jpg" playsinline>
            <source src="https://cdn.lbryplayer.xyz/content/claims/2019-09-lbry-interface-mp4-2/0/stream.mp4"
              type="video/mp4" />
            <source src="https://cdn.lbryplayer.xyz/content/claims/2019-09-lbry-interface-webm-2/b/stream.webm"
              type="video/webm" />
          </video>
        </a>
      </figure>
    </div>
  </section>

  <section class="home__callout">
    <h2 style="max-width: 700px">Enjoy the latest content from your favorite creators - as a user, not a product.</h2>
    <p style="max-width: 800px">This video shows footage from <a href="https://odysee.com">odysee.com</a>, the most
      popular LBRY app. This same content can be accessed by <a href="/get">LBRY Desktop</a> and other clients as part
      of the web 3.0 LBRY network.</p>
    <div class="inner-wrap" style="margin-top: 1rem">
      <iframe id="lbry-iframe" width="560" height="315"
        src="https://odysee.com/$/embed/odysee/7a416c44a6888d94fe045241bbac055c726332aa?r=9wKhJPioiNxTBjT6Zoqaf7LNDJcauUjg"
        allowfullscreen></iframe>
    </div>
  </section>

  <section class="home__cta">
    <div class="inner-wrap">
      <aside class="home__cta">
        <h2>Use Desktop and Mobile apps for full control.<br />Use odysee.com for ease.</h2>
      </aside>
      <?php echo View::render('download/_downloadRow') ?>
    </div>
  </section>

  <section class="home__sites">
    <div class="inner-wrap">
      <aside class="home__site home__site--tech">
        <h3>LBRY.tech</h3>
        <p>Do you have ideas for new features? Do you want to play around with the code for LBRY?</p>
        <a href="https://lbry.tech" class="button button--inverse">Come play at LBRY.tech</a>
      </aside>

      <aside class="home__site home__site--org">
        <h3>LBRY.org</h3>
        <p>Do you have an awesome idea that could use some help? Want to connect with like-minded users?</p>
        <a href="https://lbry.org" class="button button--inverse">Join the party at LBRY.org</a>
      </aside>
    </div>
  </section>
  <section class="home__asfeatured">
    <div class="inner-wrap">
    <h1> As featured on </h1>
      <aside class="featured__row">
      <a href="https://techcrunch.com/2020/12/07/odysee-launch/?=ref=lbrycom"><img src="../img/featured/techcrunch.svg"/></a>
      <a href="https://reclaimthenet.org/odysee-traffic-doubles-jan-2020/?ref=lbrycom"><img id="reclaim" src="../img/featured/reclaimthenet.png"/></a>
      <a href="https://cointelegraph.com/news/whats-next-for-youtubers-impacted-by-crypto-related-content-ban?ref=lbrycom"><img src="../img/featured/cointelegraph.svg"/></a>
      <a href="https://www.nytimes.com/2021/01/26/technology/big-tech-power-bitcoin.html?ref=lbrycom"><img src="../img/featured/newyorktimes.svg"/></a>
      <a href="https://www.wbur.org/hereandnow/2021/04/29/censorship-cryptocurrency-sec?ref=lbrycom"><img src="../img/featured/nationalpublicradio.svg"/></a>
      <a href="https://www.nasdaq.com/articles/us-government-sues-decentralized-content-platform-lbry-over-%2411m-in-token-sales-2021-03-29?ref=lbrycom"><img src="../img/featured/nasdaq.svg"/></a>
      <a href="https://www.forbes.com/sites/jonathanchester/2018/10/25/democratizing-media-in-the-era-of-blockchain/?sh=526a7d5b5c75?ref=lbrycom"><img src="../img/featured/forbes.svg"/></a>
      <a href="https://news.bitcoin.com/big-techs-freedom-of-speech-purge-pushes-people-to-censorship-resistant-blockchain-social-media/?ref=lbrycom"><img src="../img/featured/bitcoincom.png"/></a>
      </aside>
    </div>
  </section>
</main>