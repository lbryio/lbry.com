<nav class="content prev-next row-fluid">
  <div class="prev span6">
    <?php if ($prevPost = $post->getPrevPost()): ?>
      <div class="prev-next-label">
        <a href="<?php echo $prevPost->getRelativeUrl() ?>" class="link-primary">‹ {{news.prev}}</a>
      </div>
      <div class="meta">
        <a class="prev-next-title" href="<?php echo $prevPost->getRelativeUrl() ?>">
          <?php echo htmlentities($prevPost->getTitle()) ?>
        </a>
      </div>
    <?php endif ?>
  </div>
  <div class="next span6">
    <?php if ($nextPost = $post->getNextPost()): ?>
      <div class="prev-next-label">
        <a href="<?php echo $nextPost->getRelativeUrl() ?>"  class="link-primary">{{news.next}} ›</a>
      </div>
      <div class="meta">
        <a class="prev-next-title" href="<?php echo $nextPost->getRelativeUrl() ?>">
          <?php echo htmlentities($nextPost->getTitle()) ?>
        </a>
      </div>
    <?php endif ?>
  </div>
</nav>
