<?php Response::setMetaDescription($post->getTitle()) ?>
<?php echo View::render('nav/header') ?>
<main>
  <div class="post-content">
    <section class="content spacer2">
      <h1><?php echo htmlentities($post->getTitle()) ?></h1>
      <div class="meta spacer1" title="<?php echo $post->getDate()->format('F jS, Y') ?>">
        <div class="clearfix">
          <div class="pull-left spacer1"><?php echo $post->getAuthorName() ?></div>
          <div class="pull-right spacer1"><?php echo $post->getDate()->format('M j') ?></div>
        </div>
      </div>
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

  <?php echo View::render('blog/_author', [
    'post' => $post
  ]) ?>

</main>
<?php echo View::render('nav/footer') ?>
