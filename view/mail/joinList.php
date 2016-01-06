<form action="/list-subscribe" method="post" novalidate>
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php elseif ($success): ?>
    <?php js_start() ?>
      ga('send', 'event', 'Sign Up', 'Join List', '<?php echo $listId ?>');
      twttr.conversion.trackPid('nty1x');
      fbq('track', "Lead");
    <?php js_end() ?>
    <div class="notice notice-success spacer1"><?php echo $success ?></div>
  <?php endif ?>
  <div class="mail-submit">
    <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?>"/>
    <input type="hidden" name="listId" value="<?php echo $listId ?>"/>
    <input type="email" value="" name="email" class="required email standard" placeholder="someone@somewhere.com">
    <input type="submit" value="<?php echo isset($submitLabel) ? $submitLabel : 'Subscribe' ?>" name="subscribe" id="mc-embedded-subscribe" class="<?php echo $btnClass ?>">
    <?php if (isset($mergeFields)): ?>
    <input type="hidden" name="mergeFields" value="<?php echo htmlentities(serialize($mergeFields)) ?>" />
    <?php endif ?>
    <?php if (isset($meta) && $meta): ?>
      <div class="meta">
        <?php echo __('You will receive 1-2 messages a month, only from LBRY, Inc. and only about LBRY.') ?>
        <?php echo __('You can easily unsubscribe at any time.') ?>
      </div>
    <?php endif ?>
  </div>
</form>