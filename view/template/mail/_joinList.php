<?php $error = isset($error) ? $error : null ?>
<form action="/list-subscribe" method="post" novalidate>
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php elseif ($success): ?>
    <?php js_start() ?>
      ga('send', 'event', 'Sign Up', 'Join List', '<?php echo $listId ?>');
      twttr.conversion.trackPid('nty1x');
      fbq('track', '<?php echo $fbEvent ?>');
    <?php js_end() ?>
    <div class="notice notice-success spacer1"><?php echo $success ?></div>
  <?php endif ?>
  <?php if ($error || !$success): ?>
    <div class="mail-submit">
      <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?>"/>
      <input type="hidden" name="listId" value="<?php echo $listId ?>"/>
      <input type="hidden" name="listSig" value="<?php echo $listSig ?>"/>
      <input type="email" value="" name="email" class="required email standard" placeholder= "<?php echo __('email.placeholder') ?>">
      <input type="submit" value="<?php echo isset($submitLabel) ? $submitLabel : __('email.subs') ?>" name="subscribe" id="mc-embedded-subscribe" class="<?php echo $btnClass ?>">
      <?php if (isset($fbEvent)): ?>
        <input type="hidden" name="fbEvent" value="<?php echo $fbEvent ?>" />
      <?php endif ?>
      <?php if (isset($mergeFields)): ?>
        <input type="hidden" name="mergeFields" value="<?php echo htmlentities(serialize($mergeFields)) ?>" />
      <?php endif ?>
      <?php if (isset($meta) && $meta): ?>
        <div class="meta">
          {{email.disclaimer}}
        </div>
      <?php endif ?>
    </div>
  <?php endif ?>
</form>
