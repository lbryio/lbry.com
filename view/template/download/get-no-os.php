<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php Response::setMetaTitle(__('Get LBRY')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main class="column-fluid">
  <div class="span6">
    <?php echo View::render('download/_list', [
      'title' => __('Select an OS')
    ]) ?>
  </div>
  <div class="span6">
    <?php echo View::render('download/_social', [
      'cssClasses' => $socialCssClasses
    ]) ?>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
