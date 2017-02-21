<?php NavActions::setNavUri('/learn') ?>
<?php Response::setMetaDescription('Be up and running with the LBRY API in just a few minutes.') ?>
<?php Response::setMetaTitle('LBRY Quickstart') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
  <main >
    <div class="content content-light markdown">
      <h1>Developer Program</h1>
      <p>All developers with a GitHub account prior to January 31st, 2017 are eligible for <?php echo DeveloperActions::DEVELOPER_REWARD ?> free credits.</p>
      <p>To claim your credits, enter a wallet address in the form below and authenticate with GitHub.</p>
      <p>
        We will store your GitHub username and email address, but nothing else.
      </p>
      <form method="POST" action="/developer-program/post" class="form-inset">
        <h3 style="margin-top: 0">Receive Credits</h3>
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
        <input type="submit" value="Continue to GitHub" class="btn-primary">
      </form>
    </div>
  </main>
<?php echo View::render('nav/_footer') ?>