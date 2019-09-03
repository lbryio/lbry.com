<?php Response::setMetaTitle(__('title.join')) ?>
<?php Response::setMetaDescription(__('description.join')) ?>
<?php Response::addJsAsset('/js/emailSettings.js') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{page.email_settings}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap" style="position: relative;">
      <?php echo View::render('mail/_settingsForm', [
        'tags' => $tags,
        'emails' => $emails,
        'error' => $error,
        'token' => $token
      ]) ?>
    </div>
  </section>
</main>
