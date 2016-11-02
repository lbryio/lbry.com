<h3>{{title.refer}}</h3>
<p>{{page.refer.earn1}} <?php echo i18n::formatCredits($prefineryUser['id'] < 75000 ? 10 : 5) ?> {{page.refer.earn2}}</p>
<p>
  <input type="text" value="<?php echo Request::getHostAndProto() ?>/get?r=<?php echo $referralCode ?>" style="width: 100%; border-color: #155B4A" readonly id="referral-url-input"/>
  <?php js_start() ?>
    $('#referral-url-input')
      .focus(function() { $(this).select(); })
      .click(function() { $(this).select(); });
  <?php js_end() ?>
</p>
<h3>{{page.refer.status}}</h3>
<p><?php echo __($prefineryUser['share_signups_count'] == 1  ? 'page.refer.referone' : 'page.refer.refermany',
                            ['%count%' => $prefineryUser['share_signups_count']]) ?>
  
<?php
  if ($prefineryUser['share_signups_count'] <= 0)
  {
    echo __('page.refer.count0');
  }
  elseif ($prefineryUser['share_signups_count'] <= 5)
  {
    echo __('page.refer.count1');
  }
  elseif ($prefineryUser['share_signups_count'] <= 10)
  {
    echo __('page.refer.count2');
  }
  elseif ($prefineryUser['share_signups_count'] <= 25)
  {
    echo __('page.refer.count3');
  }
  elseif ($prefineryUser['share_signups_count'] <= 100)
  {
    echo __('page.refer.count4');
  }
  else
  {
    echo 'Wow! You are too good at this. Please contact us at ' . Config::HELP_CONTACT_EMAIL . ' to make sure we can count all of these. We will also stop sending you an email for each referral, but you can always check back here.';
  }
?>
</p>
<div class="meta"><a href="/faq/referrals" class="link-primary">{{page.refer.more}}</a></div>
