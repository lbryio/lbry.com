<?php $reward = CreditApi::getCurrentTestCreditReward() ?>
<p>
  {{download.earn1}} <?php echo i18n::formatCredits($reward) ?>* {{download.earn2}}
</p>
<div class="meta spacer1">
  {{download.worth}}
</div>

