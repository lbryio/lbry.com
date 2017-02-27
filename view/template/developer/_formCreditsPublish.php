<?php js_start() ?>
lbry.quickstartForm('#form-new-publish-reward', "<?php echo $apiUrl ?>");
<?php js_end() ?>
<form method="POST" action="/quickstart/auth" class="form-inset" id="form-new-publish-reward">
  <h4 style="margin-top: 0">Publishing Reward</h4>
  <div class="notice notice-error spacer1 <?php echo isset($error) && $error ? '' : 'hide' ?>"><?php echo $error ?? null ?></div>
  <div class="notice notice-success spacer1 hide"></div>
  <div class="form-row">
    <label for="wallet">Wallet Address</label>
    <div class="form-input">
      <input type="text" name="wallet_address" value="<?php echo $defaultWalletAddress ?>"
             class="required standard " placeholder="bYnFQUPTTDM1BYNCxgxKEav4FFQsrgDBoE">
    </div>
  </div>
  <div class="form-row">
    <label for="wallet">Publishing Transaction ID</label>
    <div class="form-input">
      <input type="text" name="transaction_hash" value="<?php echo '' ?>"
             class="required standard " placeholder="e99240e60499b372371a4e461ca25506745686b4c8fa3dd646a83f44ad358255">
    </div>
  </div>
  <div class="submit-row">
    <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?? '/quickstart/credits#no-return' ?>" />
    <input type="hidden" name="formName" value="new_publish" />
    <input type="hidden" name="access_token" value="<?php echo Session::get(Session::KEY_GITHUB_ACCESS_TOKEN) ?>" />
    <input type="submit" value="Send" class="btn-primary" data-submit-label="Send" data-submitting-label="Sending credits..." />
  </div>
</form>