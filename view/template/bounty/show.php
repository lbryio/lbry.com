<?php Response::setMetaDescription($metadata['title']) ?>
<?php NavActions::setNavUri('/learn') ?>

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
        <div class="notice notice-info spacer1">
          <p>{{bounty.show.completed_notice}}</p>
          <?php if (isset($metadata['pr'])): ?>
            <p></p><a href="<?php echo $metadata['pr'] ?>">{{bounty.show.pull_request_link}}</a></p>
          <?php endif ?>
        </div>
      <?php endif ?>
      <div class="content">
        <?php echo $postHtml ?>
      </div>
    </section>
    <section>
      <?php if ($metadata['status'] !== 'complete'): ?>
        <h4>Claim This Bounty</h4>
        <div class="spacer1">
          <a href="mailto:bounty@lbry.io?subject=<?php echo $metadata['title'] ?>" class="btn btn-alt">Claim Bounty</a>
        </div>
      <h4>Bounty Questions?</h4>
        <div class="spacer1">
          <a href="/faq/bounties" class="link-primary"><span class="icon-question icon-fw"></span>Read the FAQ</a>
        </div>
        <h4>Want Live Help?</h4>
        <div class="spacer1">
          <a href="http://chat.lbry.io" class="link-primary"><span class="icon-comments icon-fw"></span>Join Our Chat</a>
        </div>
      <?php endif ?>
    </section>
  </div>
</main>
