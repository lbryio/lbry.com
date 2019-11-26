<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php Response::setMetaDescription(htmlspecialchars($post->getContentText(20, true))) ?>
<?php NavActions::setNavUri('/learn') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
        <section>
          <small class="meta">
              <a href="/faq">« {{page.faq.back}}</a>
          </small>
        </section>
      <?php echo $post->getContentHtml() ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>See a mistake? <a href="<?php echo $post->getGithubEditUrl() ?>">Edit this page on GitHub</a>.</p>
    </div>
  </section>
</main>
