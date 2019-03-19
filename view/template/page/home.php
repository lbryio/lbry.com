<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>

<main class="home">
  <section class="home__hero">
    <div class="inner-wrap">
      <aside class="home__cta">
        <h1>Your Favorite Content</h1>

        <div>
          <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
          <a href="/get?showall=1" class="button--link">show all platforms</a>
        </div>
      </aside>

      <figure class="home__preview">
        <a href="/get">
          <img alt="Picture of LBRY Browser" src="https://spee.ch/@lbry:3f/lbrycom-gif.gif"/>
        </a>
      </figure>
    </div>
  </section>

  <section class="home__callout">
    <p>LBRY is a secure, open, and community-run digital marketplace.</p>
    <p>Enjoy the latest content from your favorite creators, as a user; not a product.</p>
  </section>

  <section class="home__hype">
    <div class="inner-wrap">
      <p>See previews of the LBRY app and the great content available now on LBRY.</p>
      <?php echo View::render('download/_videoIntro') ?>
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
