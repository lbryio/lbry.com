<?php $reward = CreditApi::getCurrentTestCreditReward() ?>
<h3>Test and Earn</h3>
<?php echo View::render('download/_feedbackPrompt') ?>
<ol>
  <li>Open LBRY.</li>
  <li>Search and stream <code>wonderfullife</code>. Continue to play as you desire.</li>
  <li><a href="/feedback" class="btn btn-alt">Provide Your Feedback</a></li>
</ol>
<p>
  In addition to <?php echo i18n::formatCredits($reward) ?>, your feedback will be personally read by the developers and help signal
  interest in LBRY to investors.
</p>
<?php /*
     <?php $reward = CreditApi::getCurrentTestCreditReward() ?>
    <div class="cover cover-dark cover-dark-grad content content-dark">
      <h1>Test and Earn</h1>
      <?php echo View::render('download/feedback-prompt') ?>
      <h3>Test Your Install</h3>
      <ol>
        <li>Double click the app (LBRY will open in your browser)</li>
        <li>Search and stream <code>wonderfullife</code></li>
        <li>Continue to play as you desire</li>
      </ol>
      <h3>Feedback</h3>
      <p>
        In addition to <?php echo i18n::formatCredits($reward) ?>, your feedback will be personally read by the developers and help signal
        interest in LBRY to investors.
      </p>
      <a href="/feedback" class="btn-alt">Provide Your Feedback</a>
    </div> */ ?>