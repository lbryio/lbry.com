<nav class="post-navigation">
  <?php if ($prevPost = $post->getPrevPost()): ?>
  <a
    href="<?php echo $prevPost->getRelativeUrl() ?>"
    title="Read '<?php echo htmlentities($prevPost->getTitle()) ?>'"
  >← <?php echo htmlentities($prevPost->getTitle()) ?></a>
  <?php endif ?>

  <?php if ($nextPost = $post->getNextPost()): ?>
  <a
    href="<?php echo $nextPost->getRelativeUrl() ?>"
    title="Read '<?php echo htmlentities($nextPost->getTitle()) ?>'"
  ><?php echo htmlentities($nextPost->getTitle()) ?> →</a>
  <?php endif ?>
</nav>
