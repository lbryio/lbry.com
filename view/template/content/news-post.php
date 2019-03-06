<?php Response::setMetaDescription($post->getTitle()) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/news') ?>

<main class="news ancillary">
  <section class="hero hero--news"<?php echo $post->getCover() ? ' style="background-image: url(\'/img/blog-covers/' . $post->getCover() . '\')"' : ''?>>
    <div class="inner-wrap">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
      <h2>
        <?php echo $post->getAuthorName() ?>
        <?php echo $post->hasAuthor() && $post->hasDate() ? '&bull;' : '' ?>
        <?php if ($post->hasDate()): ?>
          <span title="<?php echo $post->getDate()->format('F jS, Y') ?>"><?php echo $post->getDate()->format('M j Y') ?></span>
        <?php endif ?>
      </h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php echo $post->getContentHtml() ?>
      <?php echo View::render('content/_postNav', ['post' => $post]) ?>
      <!--/ <?php echo View::render('content/_postSocialShare', ['post' => $post]) ?> /-->
    </div>
  </section>

  <?php if ($post->hasAuthor()): ?>
    <?php echo View::render('content/_postAuthor', ['post' => $post]) ?>
  <?php endif ?>

  <!--/
  <section>
    <div class="inner-wrap">
      <?php echo View::render('nav/_learnFooter') ?>
    </div>
  </section>
  /-->
</main>
