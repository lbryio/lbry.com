<?php Response::setMetaDescription('Frequently asked questions about LBRY.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <section class="content content-readable spacer2">
    <h1>Frequently Asked Questions</h1>
    <?php foreach($posts as $post): ?>
      <div class="spacer1">
        <a href="<?php echo $post->getRelativeUrl() ?>" class="link-primary"><?php echo $post->getTitle() ?></a>
      </div>
    <?php endforeach ?>
  </section>
</main>
<?php echo View::render('nav/footer') ?>
