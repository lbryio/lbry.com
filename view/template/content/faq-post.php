<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/learn') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--hero">
      <h1>Frequently Asked Questions</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2><?php echo htmlentities($post->getTitle()) ?></h2>
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
