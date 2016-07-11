<?php Response::setMetaDescription(__('Download/install the latest version of LBRY.'))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>Get LBRY</h1>
      <?php if (Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR)): ?>
        <div class="notice notice-error spacer1"><?php echo Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?></div>
        <?php Session::unsetKey(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?>
      <?php endif ?>

      <?php if (Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE)): ?>
        <div class="notice notice-info spacer1">
          <p>You are currently on the wait list. Move up the list and earn <?php echo i18n::formatCredits(10) ?> per referral by sharing this URL:</p>
          <p><a href="/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?>">https://lbry.io/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?></a></p>
        </div>
      <?php endif ?>

      <p>LBRY is currently in invite only mode. Enter your email to join the waitlist, or your email and invite code for access.</p>
      <?php echo View::render('download/_signup') ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>
