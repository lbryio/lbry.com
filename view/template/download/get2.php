<?php Response::setMetaDescription(__('Download/install the latest version of LBRY for %os%.', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span6">
    <div class="cover cover-light content">
      <h1>LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <?php echo View::render('download/_betaNotice') ?>
        <?php echo $downloadHtml ?>
      <?php else: ?>
        <?php echo View::render('download/_unavailable') ?>
      <?php endif ?>
    </div>
    <?php if ($downloadHtml): ?>
      <?php echo View::render('download/_reward') ?>
    <?php endif ?>
  </div>
  <div class="span6">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_developers') ?>
  </div>
</main>

<?php echo View::render('nav/footer') ?>
