<?php Response::setMetaDescription(__('description.no-os')) ?>
<?php Response::setMetaTitle(__('global.get')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main class="column-fluid">
  <div class="span6">
    <?php echo View::render('download/_list', [
      'title' => __('download.select')
    ]) ?>
  </div>
  <div class="span6">
    <?php echo View::render('download/_social', [
      'cssClasses' => $socialCssClasses
    ]) ?>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
