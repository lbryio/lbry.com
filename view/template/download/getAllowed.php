<?php Response::setMetaDescription(__('description.allowed', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1><?php echo __('download.for-os', ['%os%' => $osTitle]) ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <?php echo View::render('download/_betaNotice') ?>
        <?php if (Session::get(Session::KEY_PREFINER_USED_CUSTOM_CODE)): ?>
          <div class="notice notice-info spacer1">
            It looks like you may have been invited via a custom code.
            <strong>If so, please check your email for a single-use code to claim credits after installing.</strong>
          </div>
        <?php endif ?>
        <?php echo $downloadHtml ?>
      <?php else: ?>
        <?php echo View::render('download/_unavailable', [
          'os' => $os
        ]) ?>
      <?php endif ?>
    </div>
    <?php if ($prefineryUser): ?>
      <div class="cover cover-light content content-stretch content-light">
        <?php echo View::render('download/_refer') ?>
      </div>
    <?php endif ?>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>