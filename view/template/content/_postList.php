<div>
  <h3>Latest News</h3>
  <ul class="no-style">
    <?php foreach ($posts as $post): ?>
      <li><a href="<?php echo $post->getRelativeUrl() ?>"><?php echo $post->getTitle() ?></a></li>
    <?php endforeach ?>
  </ul>
</div>
