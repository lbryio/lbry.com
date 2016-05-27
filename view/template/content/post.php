<?php Response::setMetaDescription($post->getTitle()) ?>
<?php NavActions::setNavUri('/news') ?>
<?php echo View::render('nav/header') ?>
<main>
  <header class="post-header <?php echo $post->getCover() ? 'with-cover' : ('no-cover'.$post->getCoverBackgroundStyle(4)) ?>"
          <?php echo $post->getCover() ? 'style="background-image: url(\'/img/blog-covers/' . $post->getCover() . '\')"' : ''?>
          >
    <div class="post-header-inner content <?php echo $post->getIsCoverLight() ? 'content-light' : 'content-dark' ?>">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
      <div class="meta spacer1">
        <?php echo $post->getAuthorName() ?>
        <?php echo $post->hasAuthor() ? '&bull;' : '' ?>
        <span title="<?php echo $post->getDate()->format('F jS, Y') ?>"><?php echo $post->getDate()->format('M j') ?></span>
      </div>
    </div>
  </header>

  <div class="post-content">

    <section class="content spacer2">
      <div class="post-content">
        <?php echo $post->getContentHtml() ?>
      </div>
    </section>

    <nav class="content prev-next row-fluid">
      <div class="prev span6">
        <?php if ($prevPost = $post->getPrevPost()): ?>
          <div class="prev-next-label">
            <a href="<?php echo $prevPost->getRelativeUrl() ?>" class="link-primary">‹ Previous</a>
          </div>
          <div class="meta">
            <a href="<?php echo $prevPost->getRelativeUrl() ?>">
              <?php echo htmlentities($prevPost->getTitle()) ?>
            </a>
          </div>
        <?php endif ?>
      </div>
      <div class="next span6">
        <?php if ($nextPost = $post->getNextPost()): ?>
          <div class="prev-next-label">
            <a href="<?php echo $nextPost->getRelativeUrl() ?>"  class="link-primary">Next ›</a>
          </div>
          <div class="meta">
            <a class="prev-next-title" href="<?php echo $nextPost->getRelativeUrl() ?>">
              <?php echo htmlentities($nextPost->getTitle()) ?>
            </a>
           </div>
        <?php endif ?>
      </div>
    </nav>
  </div>

  <?php if ($post->hasAuthor()): ?>
    <?php echo View::render('content/_postAuthor', [
      'post' => $post
    ]) ?>
  <?php endif ?>

</main>
<?php echo View::render('nav/footer') ?>
