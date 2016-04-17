<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span6">
    <div class="cover cover-light content">
      <?php echo $installHtml ?>
    </div>
  </div>
  <div class="span6">
    <?php $reward = CreditApi::getCurrentTestCreditReward() ?>
    <div class="cover cover-dark cover-dark-grad content content-dark">
      <h1>Test and Earn</h1>
      <?php echo View::render('get/feedback-prompt') ?>
      <h3>Test Your Install</h3>
      <ol>
        <li>Run <code>lbrynet-console</code> from the command line</li>
        <li>Enter <code>get wonderfullife</code></li>
        <li>Continue to play as you desire</li>
      </ol>
      <h3>Feedback</h3>
      <p>
        In addition to <?php echo i18n::formatCredits($reward) ?>, your feedback will be personally read by the developers and help signal
        interest in LBRY to investors.
      </p>
      <a href="/feedback" class="btn-alt">Provide Your Feedback</a>
    </div>
  </div>
</main>

<?php echo View::render('nav/footer') ?>