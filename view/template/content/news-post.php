<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/news') ?>
<?php echo View::render('nav/_header') ?>
<main>
  <header class="post-header <?php echo $post->getCover() ? 'with-cover' : ('no-cover'.$post->getCoverBackgroundStyle(4)) ?>"
          <?php echo $post->getCover() ? 'style="background-image: url(\'/img/blog-covers/' . $post->getCover() . '\')"' : ''?>
          >
    <div class="post-header-inner content <?php echo $post->getIsCoverLight() ? 'content-light' : 'content-dark' ?>">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
      <div class="meta spacer1">
        <?php echo $post->getAuthorName() ?>
        <?php echo $post->hasAuthor() && $post->hasDate() ? '&bull;' : '' ?>
        <?php if ($post->hasDate()): ?>
          <span title="<?php echo $post->getDate()->format('F jS, Y') ?>"><?php echo $post->getDate()->format('M j') ?></span>
        <?php endif ?>
      </div>
    </div>
  </header>

  <section class="post-content">
    <div class="content">
      <?php echo $post->getContentHtml() ?>
    </div>
    <?php echo View::render('content/_postNav', ['post' => $post]) ?>
    <?php echo View::render('content/_postSocialShare', ['post' => $post]) ?>
  </section>


  <?php if ($post->hasAuthor()): ?>
    <?php echo View::render('content/_postAuthor', ['post' => $post]) ?>
  <?php endif ?>

  <?php echo View::render('nav/_learnFooter') ?>

</main>
<?php echo View::render('nav/_footer') ?>
