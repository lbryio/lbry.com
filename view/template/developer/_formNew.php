<form method="POST" action="/developer-program/post" class="form-inset">
  <h4 style="margin-top: 0">Receive Credits</h4>
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php elseif ($success): ?>
    <div class="notice notice-success spacer1"><?php echo $success ?></div>
  <?php endif ?>
  <div class="form-row">
    <label for="wallet">Wallet Address</label>
    <div class="form-input">
      <input type="text" name="wallet" value="<?php echo $defaultWalletAddress ?>"
             class="required standard input-wallet" placeholder="bYnFQUPTTDM1BYNCxgxKEav4FFQsrgDBoE">
    </div>
  </div>
  <div class="spacer-half">
    <input type="submit" value="Continue to GitHub" class="btn-primary">
  </div>
  <div class="meta">We require a GitHub account to prevent abuse. This will record your email (no spam) and mark you as interested in the lbry repo.
    No GitHub account? No problem! Join our <a href="https://slack.lbry.io" class="link-primary">Slack channel</a> and post an introduction in #tech.</div>
</form>