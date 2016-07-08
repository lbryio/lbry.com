<?php Response::setMetaDescription('Access information and content in ways you never dreamed possible. Earn credits for your unused bandwidth and diskspace.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/cover-team.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content text-center">
        <h1 class="cover-title">The Front Desk</h1>
        <h2 class="cover-subtitle">News and musings from the LBRY team.</h2>
      </div>
    </div>
  </div>
  <section class="content content-readable spacer2">
    <?php foreach($posts as $post): ?>
      <div class="spacer1">
        <h3><a href="<?php echo $post->getRelativeUrl() ?>" class="link-primary"><?php echo $post->getTitle() ?></a></h3>
        <div class="meta clearfix" title="<?php echo $post->getDate()->format('F jS, Y') ?>">
          <span class="align-left"><?php echo $post->getDate()->format('M j, Y') ?></span>
          <span class="align-right"><?php echo $post->getAuthorName() ?></span>
        </div>
      </div>
    <?php endforeach ?>
  </section>
</main>
<?php echo View::render('nav/footer') ?>
