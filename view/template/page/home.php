<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>

<main class="home">
  <section class="home__hero">
    <div class="inner-wrap">
      <aside class="home__cta">
        <div class="home__cta-copy">
          <h1>It's time to take back control from YouTube and Amazon.</h1>
          <p><small class="meta">Top creators, self-respecting users, the privacy conscious, computer geeks, freedom lovers, loveable kooks, and readers of small gray text everywhere choose LBRY, because it's open, fair, and free.</small></p>
        </div>
        <?php echo View::render('download/_downloadRow') ?>
      </aside>

      <figure class="home__preview">
        <a href="/get">
          <video
            autoplay
            loop
            poster="https://spee.ch/f/2019-08-lbry-interface-poster.jpg"
            playsinline
          >
            <source src="https://spee.ch/b/2019-09-lbry-interface-webm-2.webm" type="video/webm"/>
            <source src="https://spee.ch/0/2019-09-lbry-interface-mp4-2.mp4" type="video/mp4"/>
          </video>
        </a>
      </figure>
    </div>
  </section>

  <section class="home__callout">
    <p>LBRY is a secure, open, and community-run digital marketplace.</p>
    <p>Enjoy the latest content from your favorite creators—as a user, not a product.</p>
  </section>

  <section class="home__hype">
    <div class="inner-wrap">
      <p>See previews of the LBRY app and the great content available now on LBRY.</p>
      <?php echo View::render('download/_videoIntro') ?>
    </div>
  </section>

    <section class="home__cta">
        <div class="inner-wrap">
            <aside class="home__cta"><h2>Available on desktop, mobile, and in your browser.</h2></aside>
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
