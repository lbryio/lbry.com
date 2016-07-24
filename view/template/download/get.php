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

      <?php if (Session::get(Session::KEY_PREFINERY_USER_ID)): ?>
        <?php echo View::render('download/_refer') ?>
      <?php else: ?>
        <p>LBRY is currently in invite only mode. Enter your email to join the waitlist, or your email and invite code for access.</p>
        <?php echo View::render('download/_signup') ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_social') ?>
    <?php echo View::render('download/_publish') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>
