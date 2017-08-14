<form method="POST" action="/signup" id="signup-form">
  <?php if (Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR)): ?>
    <div class="notice notice-error spacer1"><?php echo Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?></div>
    <?php Session::unsetKey(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?>
  <?php endif ?>
  <div class="form-row">
    <label for="email">
      <?php echo __('email.address') ?>
    </label>
    <div class="form-input">
      <input type="text" value="<?php echo htmlspecialchars($defaultEmail) ?>" name="email" class="required standard input-large" placeholder="someone@somewhere.com">
    </div>
  </div>
  <div class="invite-submit">
    <input type="submit" value="Join List" name="subscribe" class="btn-alt btn-large">
  </div>
</form>