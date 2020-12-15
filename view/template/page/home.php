<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>

<main class="home">
  <section class="home__hero">
    <div class="inner-wrap">
      <aside class="home__cta">
        <div class="home__cta-copy">
          <h1>LBRY does to publishing,<br/>
              what Bitcoin did to money.</h1>
          <p><span class="meta">Join top creators and more than 10,000,000 people on LBRY, an open, free, and fair network for digital content.</span></p>
          <?php echo View::render('download/_downloadRow') ?>
        </div>
      </aside>

      <figure class="home__preview">
        <a href="/get">
          <video
            autoplay
            loop
            poster="https://spee.ch/f/2019-08-lbry-interface-poster.jpg"
            playsinline
          >
            <source src="https://cdn.lbryplayer.xyz/content/claims/2019-09-lbry-interface-mp4-2/0/stream.mp4" type="video/mp4"/>
            <source src="https://cdn.lbryplayer.xyz/content/claims/2019-09-lbry-interface-webm-2/b/stream.webm" type="video/webm"/>
          </video>
        </a>
      </figure>
    </div>
  </section>

  <section class="home__callout">
    <h2>Enjoy the latest content from your favorite creators - as a user, not a product.</h2>
      <p>This video shows footage from <a href="https://odysee.com">odysee.com</a>, the most popular LBRY app. This same content can be accessed by <a href="/get">LBRY Desktop</a> and other clients as part of the web 3.0 LBRY network.</p>
      <div class="inner-wrap" style="margin-top: 1rem">
      <iframe id="lbry-iframe" width="560" height="315" src="https://odysee.com/$/embed/odysee/7a416c44a6888d94fe045241bbac055c726332aa?r=9wKhJPioiNxTBjT6Zoqaf7LNDJcauUjg" allowfullscreen></iframe>
      </div>
  </section>

    <section class="home__cta">
        <div class="inner-wrap">
            <aside class="home__cta"><h2>Use Desktop and Mobile apps for control. Use web for ease.</h2></aside>
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
</main>
