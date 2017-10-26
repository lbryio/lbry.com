<?php js_start() ?>
  lbry.quickstartForm('#form-new-developer-reward', "<?php echo $apiUrl ?>");
<?php js_end() ?>
<form method="POST" action="/quickstart/auth" class="form-inset" id="form-new-developer-reward">
  <h4 style="margin-top: 0">Receive Credits</h4>
  <div class="notice notice-error spacer1 <?php echo isset($error) && $error ? '' : 'hide' ?>"><?php echo $error ?? null ?></div>
  <div class="notice notice-success spacer1 hide"></div>
  <div class="form-row">
    <label for="wallet">Wallet Address</label>
    <div class="form-input">
      <input type="text" name="wallet_address" value="<?php echo htmlspecialchars($defaultWalletAddress) ?>"
             class="required standard " placeholder="bYnFQUPTTDM1BYNCxgxKEav4FFQsrgDBoE">
    </div>
  </div>
  <div class="submit-row spacer-half">
    <input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?? '/quickstart/credits#no-return' ?>" />
    <input type="hidden" name="formName" value="new_developer" />
    <input type="hidden" name="access_token" value="<?php echo Session::get(Session::KEY_GITHUB_ACCESS_TOKEN) ?>" />
    <input type="submit" value="Send" class="btn-primary" data-submit-label="Send" data-submitting-label="Sending credits..." />
  </div>
  <div class="meta">
    We require a GitHub account to prevent abuse. This will record your email (no spam) and mark you as interested in the lbry repo.
    No GitHub account or no public commits? No problem! Join our <a href="https://chat.lbry.io" class="link-primary">Discord chat</a> and
    post an introduction in #tech.
  </div>
</form>
