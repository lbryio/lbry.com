<?php Response::setMetaTitle(__("title.home")) ?>
<?php Response::setMetaDescription(__("description.home")) ?>
<?php echo View::render("nav/_header") ?>

<main class="home">
  <section class="home__hero">
    <div class="inner-wrap">
      <aside class="home__hero__content">
        <h1>Content Freedom</h1>
        <p>We are a free, open, and community-run digital marketplace. You own your data. You control the network.</p>

        <a href="#" class="home__hero__content__cta download" title="Download our apps">Download</a>
        <!--/ <a href="#" class="home__hero__content__cta watch" title="Watch our video">Watch video</a> /-->
      </aside>

      <aside class="home__hero__devices">
        <figure class="home__hero__device desktop">
          <img src="/media/img/app-desktop-ii.png" alt=""/>
        </figure>

        <figure class="home__hero__device mobile">
          <img src="/media/img/app-mobile.png" alt=""/>
        </figure>
      </aside>
    </div>
  </section>
</main>

<?php echo View::render("nav/_footer") ?>
