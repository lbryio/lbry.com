<form method="POST" action="/signup" id="signup-form" class="hide">
  <div class="hide">
    <input type="hidden" name="referrer_id" value="<?php echo $referralCode ?>" />
  </div>
  <div class="form-row">
    <label for="email">
      <?php echo __('email.address') ?>
    </label>
    <div class="form-input">
      <input type="text" value="<?php echo $defaultEmail ?>" name="email" class="required standard" placeholder="someone@somewhere.com">
    </div>
  </div>
  <?php if ($allowInviteCode): ?>
    <div class="form-row">
      <label for="code_select">
        <?php echo __('email.code') ?>
      </label>
      <div class="form-input">
        <label class="label-radio">
          <input name="code_select" type="radio" value="" />
          {{email.nocode}}
        </label>
      </div>
      <div class="form-input">
        <label class="label-radio">
          <input name="code_select" type="radio" value="yes" />
          {{email.yescode}}
        </label>
      </div>
      <div class="form-input has-code">
        <input type="text" value="" name="code" class="required standard" placeholder="abc123">
      </div>
    </div>
  <?php else: ?>
    <div class="hide"><input name="code_select" type="radio" checked="checked" /></div>
  <?php endif ?>
  <div class="invite-submit has-code">
    <input type="submit" value="Access LBRY" name="subscribe" class="btn-alt">
  </div>
  <div class="invite-submit no-code">
    <input type="submit" value="Join List" name="subscribe" class="btn-alt">
  </div>
</form>
<?php js_start() ?>
(function(){
  var form = $('#signup-form'),
  codeRadioInputs = form.find('input[name="code_select"]');
  codeRadioInputs.change(function() {
    var selectedInput = codeRadioInputs.filter(':checked'),
        hasChoice = selectedInput.length,
        hasCode = selectedInput.val() == 'yes';

    form.find('.has-code')[hasChoice && hasCode ? 'show' : 'hide']();
    form.find('.no-code')[hasChoice && !hasCode ? 'show' : 'hide']();
    if (!hasCode)
    {
      form.find('input[name="code"]').val('');
    }
  }).change();

  form.show();
})();
<?php js_end() ?>