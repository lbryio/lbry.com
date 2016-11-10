<?php $error = $error ?? null ?>
<form action="/list/subscribe" method="POST" novalidate>

  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php endif ?>

  <div class="mail-submit">
    <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?>"/>
    <input type="email" name="email" class="required email standard" placeholder="{{email.placeholder}}">
    <input type="submit" value="<?php echo $submitLabel ?? __('email.subs') ?>" name="subscribe" class="<?php echo $btnClass ?>">
    <div class="meta">{{email.disclaimer}}</div>
  </div>
</form>