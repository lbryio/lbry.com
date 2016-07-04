<?php Response::setMetaDescription(__('Download/install the latest version of LBRY.'))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>Get LBRY</h1>
      <?php if (Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR)): ?>
        <div class="notice notice-error spacer1"><?php echo Session::get(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?></div>
        <?php Session::unsetKey(Session::KEY_DOWNLOAD_ACCESS_ERROR) ?>
      <?php endif ?>

      <?php if (Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE)): ?>
        <div class="notice notice-info spacer1">
          <p>You are currently on the wait list. Move up the list and earn <?php echo i18n::formatCredits(25) ?> per referral by sharing this URL:</p>
          <p><a href="/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?>">https://lbry.io/get?r=<?php echo Session::get(Session::KEY_DOWNLOAD_REFERRAL_CODE) ?></a></p>
        </div>
      <?php endif ?>

      <p>LBRY is currently in invite only mode. Enter your email to join the waitlist, or your email and invite code for access.</p>
      <form method="POST" action="/signup" id="signup-form" class="hide">
        <div class="hide">
          <input type="hidden" name="referrer_id" value="<?php echo $_GET['r'] ?: $_POST['r'] ?>" />
        </div>
        <div class="form-row">
          <label for="email">
            <?php echo __('Email') ?>
          </label>
          <div class="form-input">
            <input type="text" value="" name="email" class="required standard" placeholder="someone@somewhere.com">
          </div>
        </div>
        <div class="form-row">
          <label for="code_select">
            <?php echo __('Invite Code') ?>
          </label>
          <div class="form-input">
            <label class="label-radio">
              <input name="code_select" type="radio" value="" />
              None, but I want in as soon as possible!
            </label>
          </div>
          <div class="form-input">
            <label class="label-radio">
              <input name="code_select" type="radio" value="yes" />
              Yes
            </label>
          </div>
          <div class="form-input has-code">
            <input type="text" value="" name="code" class="required standard" placeholder="abc123">
          </div>
        </div>
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
              choice = selectedInput.val(),
              hasChoice = selectedInput.length,
              hasCode = choice == 'yes';

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
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/footer') ?>
