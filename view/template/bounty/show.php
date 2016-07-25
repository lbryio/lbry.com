<?php Response::setMetaDescription($metadata['title']) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header') ?>
<main>
  <section class="post-content">
    <div class="content">
      <div class="meta">
        <br/>
        <a href="/bounty">« Back to All Bounties</a>
      </div>
      <h1><?php echo htmlentities($metadata['title']) ?></h1>
      <?php echo $postHtml ?>
    </div>
  </section>
</main>
<?php echo View::render('nav/_footer', ['showLearnFooter' => true]) ?>
