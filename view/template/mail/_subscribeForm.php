<?php $error = $error ?? null ?>
<?php $tag = $tag ?? null ?>
<?php $largeInput = $largeInput ?? false ?>
<form id="mail_form" action="/list/subscribe" method="POST" novalidate>

  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php endif ?>

  <div class="mail-submit">
    <input type="email" name="email" class="required email standard <?php echo $largeInput ? 'input-large' : '' ?>" placeholder="{{email.placeholder}}">
    <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?>"/>
    <?php if ($tag): ?>
      <input type="hidden" name="tag" value="<?php echo $tag ?>"/>
    <?php endif ?>

    <input type="submit" value="<?php echo $submitLabel ?? __('email.subs') ?>" name="subscribe" class="<?php echo $btnClass ?>">

    <?php if (!($hideDisclaimer ?? false)): ?>
      <div class="meta">{{email.disclaimer}}</div>
    <?php endif ?>
    <?php js_start() ?>
      $("#mail_form").submit(function() {
      fbq('track', 'Lead');
      });
    <?php js_end() ?>
  </div>
</form>