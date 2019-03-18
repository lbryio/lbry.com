<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/learn') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--hero">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p><a href="/faq">« {{page.faq.back}}</a></p>
      <?php echo $post->getContentHtml() ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>See a mistake? <a href="<?php echo $post->getGithubEditUrl() ?>">Edit this page on GitHub</a>.</p>
    </div>
  </section>
</main>
