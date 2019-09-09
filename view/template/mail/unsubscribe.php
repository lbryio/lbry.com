<?php Response::setMetaTitle(__('title.unsubscribe')) ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{page.unsubscribe}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap" style="position: relative;">
      <?php if ($error ?? false): ?>
      <div class="notice notice-error spacer1"><?php echo $error ?></div>
      <?php else: ?>
      <div class="notice notice-success spacer1">{{email.confirm_unsubscribe}}</div>
      <?php endif ?>
    </div>
  </section>
</main>
