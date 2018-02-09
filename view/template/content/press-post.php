<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php echo View::render('nav/_header') ?>
  <main>
    <section class="post-content">
      <div class="content">
        <h1><?php echo htmlentities($post->getTitle()) ?></h1>
        <?php echo $post->getContentHtml() ?>
      </div>
    </section>
  </main>
<?php echo View::render('nav/_footer', ['showLearnFooter' => true]) ?>
