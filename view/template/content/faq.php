<?php Response::setMetaDescription('Frequently asked questions about LBRY.') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <section class="content content-readable spacer2">
    <h1>Frequently Asked Questions</h1>
    <?php foreach($postGroups as $group => $posts): ?>
      <h2><?php echo $groupNames[$group] ?></h2>
      <?php foreach($posts as $post): ?>
        <div class="spacer1">
          <a href="<?php echo $post->getRelativeUrl() ?>" class="link-primary"><?php echo $post->getTitle() ?></a>
        </div>
      <?php endforeach ?>
    <?php endforeach ?>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
