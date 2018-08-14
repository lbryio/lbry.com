<?php $error = $error ?? null ?>
<?php $tag = $tag ?? null ?>
<?php $largeInput = $largeInput ?? false ?>
<form id="settings_form" action="/list/subscribe" method="POST" novalidate>
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php endif ?>
  <div class="mail-submit" >
    <input name="receive" type="radio" value="true" checked><label>Receive Email</label><br>
    <input name="receive" type="radio" value="false"><label>Receive No Email</label>
  </div>
</form>