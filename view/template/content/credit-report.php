<?php Response::setMetaDescription($post->getTitle()) ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--hero">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <div class="meta">
        <a href="/credit-reports">« Credit Reports</a> | <a href="<?php echo $sheetUrl ?>">Sheet</a>
      </div>

      <?php echo $post->getContentHtml() ?>
    </div>
  </section>
</main>
