<?php Response::setMetaDescription(__('description.news')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/teamcropped.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content text-center">
        <h1 class="cover-title">{{news.desk}}</h1>
        <h2 class="cover-subtitle">{{news.musings}}</h2>
      </div>
    </div>
  </div>
  <section class="content content-readable spacer2">
    <?php foreach ($posts as $post): ?>
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
<?php echo View::render('nav/_footer') ?>
