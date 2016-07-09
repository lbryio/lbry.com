<?php Response::setMetaDescription(__('Download/install the latest version of LBRY for %os%.', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <?php echo View::render('download/_betaNotice') ?>
        <?php echo $downloadHtml ?>
      <?php else: ?>
        <?php echo View::render('download/_unavailable', [
          'os' => $os
        ]) ?>
      <?php endif ?>
      <h3>Share and Earn</h3>
      <p>Earn <?php echo i18n::formatCredits(10) ?> per referral by sharing this URL:</p>
      <p><a href="/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?>" class="link-primary">https://lbry.io/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?></a></p>
      <?php echo View::render('download/_reward', [
        'inviteCode' => $inviteCode
      ]) ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>