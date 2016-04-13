<?php Response::setMetaDescription($post->getTitle()) ?>
<?php echo View::render('nav/header') ?>
<main class='blog'>
  <div class="content">
    <h1><?php echo $post->getTitle() ?></h1>
    <h2><?php echo $post->getAuthor() ?></h2>
    <h3><?php echo $post->getDate()->format('Y-m-d') ?></h3>
    
    <?php echo $post->getContentHtml() ?>
  </div>
  <footer class="content">
    <?php if ($prevSlug = $post->getPrevPostSlug()): ?>
      <a href="/blog/<?php echo $prevSlug ?>"><< Previous</a>
    <?php endif ?>
    <?php if ($nextSlug = $post->getNextPostSlug()): ?>
      <a href="/blog/<?php echo $nextSlug ?>">Next >></a>
    <?php endif ?>
  </footer>
</main>
<?php echo View::render('nav/footer') ?>
