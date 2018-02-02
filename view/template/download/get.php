<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <?php if (isset($downloadUrl)): ?>
      <h1><?php echo __('download.for-os', ['%os%' => $osTitle]) ?> <span class="<?php echo $osIcon ?>"></span></h1>
        <?php echo View::render('download/_button') ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php if (isset($downloadUrl)): ?>
      <?php echo View::render('download/_list', ['excludeOs' => $os]) ?>
    <?php else: ?>
      <?php echo View::render('download/_list') ?>
    <?php endif; ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>
