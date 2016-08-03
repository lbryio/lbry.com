<?php Response::setMetaDescription($metadata['title']) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header') ?>
<main>
  <div class="post-content">
    <div class="meta">
      <br/>
      <a href="/bounty" class="link-primary">« Back to All Bounties</a>
    </div>
    <section class="spacer2">
      <h1><?php echo htmlentities($metadata['title']) ?></h1>
      <div class="spacer1">
        <?php echo View::render('bounty/_meta', ['metadata' => $metadata]) ?>
      </div>
      <?php if ($metadata['status'] == 'complete'): ?>
        <div class="notice notice-info spacer1">{{bounty.show.completednotice}}</div>
      <?php endif ?>
        <?php echo $postHtml ?>
    </section>
    <section>
      <h4>Claim This Bounty</h4>
      <div class="spacer1">
        <a href="mailto:bounty@lbry.io?subject=<?php echo $metadata['title'] ?>" class="btn btn-alt">Claim Bounty</a>
      </div>
      <h4>Bounty Questions?</h4>
      <div class="spacer1">
        <a href="/faq/bounties">Read the FAQ</a>
      </div>
    </section>
  </div>
</main>
<?php echo View::render('nav/_footer', ['showLearnFooter' => true]) ?>
