<?php Response::setMetaTitle(__('title.unsubscribe')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>{{page.unsubscribe}}</h1>
    <?php if ($error ?? false): ?>
      <div class="notice notice-error spacer1"><?php echo $error ?></div>
    <?php else: ?>
      <div class="notice notice-success spacer1">{{email.confirm_unsubscribe}}</div>
    <?php endif ?>
  </div>
</main>
<?php echo View::render('nav/_footer', ['showLearnFooter' => $learnFooter ?? false]) ?>
