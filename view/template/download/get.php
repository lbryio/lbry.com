<?php Response::setMetaDescription(__('Download/install the latest version of LBRY for %os%.', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if (!$hasMatchingInvite && !Session::get(Session::KEY_LIST_SUB_SUCCESS)): ?>
        <?php if ($hasInvite): ?>
          <div class="notice notice-error spacer1">Please enter a valid code.</div>
        <?php endif ?>
        <p>LBRY is currently in invite only mode. Enter your code below for access:</p>
        <form method="POST" action="/get">
          <div class="invite-submit">
            <input type="text" value="" name="invite" class="required standard" placeholder="abc123">
            <input type="submit" value="Access LBRY" name="subscribe" class="btn-alt">
          </div>
        </form>
      <?php else: ?>
        <p>Your code does not grant access until July 4th, 2016. Enter your email address below for a reminder.</p>
        <?php echo View::render('mail/joinList', [
          'submitLabel' => 'Go',
          'returnUrl' => '/get',
          'meta' => true,
          'btnClass' => 'btn-alt',
          'listId' => Mailchimp::LIST_GENERAL_ID,
          'mergeFields' => ['CLI' => 'No'],
        ]) ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/footer') ?>
