<?php Response::setMetaDescription(__('description.get'))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>{{global.get}}</h1>
      <?php if (Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR)): ?>
        <div class="notice notice-error spacer1"><?php echo Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?></div>
        <?php Session::unsetKey(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?>
      <?php endif ?>

      <?php if (Session::get(Session::KEY_PREFINERY_USER_ID)): ?>
        <h3>You're In!</h3>
        <p>You'll be sent an invite when LBRY early access begins.</p>
        <p>And remember, friends don't let other friends miss out on content freedom.</p>
        <?php echo View::render('download/_refer') ?>
      <?php else: ?>
        <div class="spacer1">
          <h4>LBRY early access begins April 2017.</h4>
        </div>
        <?php echo View::render('download/_signup', ['allowInviteCode' => false]) ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_social') ?>
    <?php echo View::render('download/_publish') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>