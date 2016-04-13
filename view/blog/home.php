<?php Response::setMetaDescription('Access information and content in ways you never dreamed possible. Earn credits for your unused bandwidth and diskspace.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>The Front Desk</h1>
    News and musings from the LBRY team.
  </div>
  <section class="content">
    <?php foreach($posts as $post): ?>
      <div>
        <a href="/blog/<?php echo $post->getSlug() ?>"><h2><?php echo $post->getTitle() ?></h2></a>
        <h4><?php echo $post->getDate()->format('Y-m-d') ?></h4>
      </div>
    <?php endforeach ?>
  </section>
</main>
<?php echo View::render('nav/footer') ?>
