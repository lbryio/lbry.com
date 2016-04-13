<?php Response::setMetaDescription('Access information and content in ways you never dreamed possible. Earn credits for your unused bandwidth and diskspace.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/frontdesk.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content blog-header">
        <h1>The Front Desk</h1>
        <p>News and musings from the LBRY team.</p>
      </div>
    </div>
  </div>
  <section class="content post-list">
    <?php foreach($posts as $post): ?>
      <div>
        <a href="/blog/<?php echo $post->getSlug() ?>"><?php echo $post->getTitle() ?></a>
        <span title="<?php echo $post->getDate()->format('F jS, Y') ?>"><?php echo $post->getDate()->format('M j') ?></span>
      </div>
    <?php endforeach ?>
  </section>
</main>
<?php echo View::render('nav/footer') ?>
