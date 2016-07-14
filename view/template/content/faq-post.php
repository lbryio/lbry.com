<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header') ?>
<main>
  <section class="post-content">
    <div class="content">
      <br/>
      <div class="meta">
        <a href="/faq"><< Back to FAQ</a>
      </div>
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
      <?php echo $post->getContentHtml() ?>
    </div>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
