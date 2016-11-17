<?php $success = Session::getFlash('success') ?>
<?php $error = Session::getFlash('error') ?>

<?php if ($error): ?>
  <div class="notice notice-error spacer1"><?php echo $error ?></div>
<?php elseif ($success): ?>
  <div class="notice notice-success spacer1"><?php echo $success ?></div>
<?php endif ?>