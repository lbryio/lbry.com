<?php $reward = CreditApi::getCurrentTestCreditReward() ?>
<div class="cover cover-light-alt cover-light-alt-grad content content-light">
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
</div>
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