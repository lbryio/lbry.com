<?php Response::setMetaDescription(__('Download/install the latest version of LBRY for %os%.', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-light content">
      <h1>LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <?php $socialCssClasses = 'cover cover-light content content-light' ?>
        <?php echo View::render('download/_betaNotice') ?>
        <?php echo $downloadHtml ?>
        <?php echo View::render('download/_reward') ?>
      <?php else: ?>
        <?php $socialCssClasses = 'cover cover-dark cover-dark-grad content content-dark' ?>
        <?php echo View::render('download/_unavailable') ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php $socialCssClasses = 'cover cover-dark cover-dark-grad content content-dark' ?>
    <?php echo View::render('download/_social', [
      'cssClasses' => $socialCssClasses
    ]) ?>
  </div>
</main>

<?php echo View::render('nav/footer') ?>
