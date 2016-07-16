<h3>Share and Earn</h3>
<p>Earn <?php echo i18n::formatCredits(10) ?> for each user who joins via this URL:</p>
<p>
  <input type="text" value="https://lbry.io/get?r=<?php echo $referralCode ?>" style="width: 100%; border-color: #155B4A" readonly id="referral-url-input"/>
  <?php js_start() ?>
    $('#referral-url-input')
      .focus(function() { $(this).select(); })
      .click(function() { $(this).select(); });
  <?php js_end() ?>
</p>
<h3>Your Sharing Status</h3>
<p><strong><?php echo $prefineryUser['share_signups_count'] ?: 'Zero' ?> LBRYians</strong> have joined because of you.
<?php
  if ($prefineryUser['share_signups_count'] <= 0)
  {
    echo 'Don\'t fret, we still like you.';
  }
  elseif ($prefineryUser['share_signups_count'] <= 5)
  {
    echo 'Great start! Thanks for sharing.';
  }
  elseif ($prefineryUser['share_signups_count'] <= 10)
  {
    echo 'Well done! Thank you.';
  }
  elseif ($prefineryUser['share_signups_count'] <= 25)
  {
    echo 'You are really doing your part! Amazing.';
  }
  elseif ($prefineryUser['share_signups_count'] <= 100)
  {
    echo 'You are an elite LBRY sharer. Thank you much!';
  }
  else
  {
    echo 'Wow! You are too good at this. Please contact us at ' . Config::HELP_CONTACT_EMAIL . ' to make sure we can count all of these. We will also stop sending you an email for each referral, but you can always check back here.';
  }
?>
</p>
<div class="meta"><a href="/faq/referrals" class="link-primary">more on referrals</a></div>
