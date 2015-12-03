<?php $goalAmount = round(CreditApi::getTotalDollarSales() * 2, -4); ?>
<?php $percent = round(CreditApi::getTotalDollarSales() / $goalAmount * 100, 2); ?>
<div class="goal-wrap spacer1">
  <h4 class="text-center">
    <strong><?php echo __('At %amount% we\'ll release Android and iPhone applications.', ['%amount%' => I18n::formatCurrency($goalAmount)]) ?></strong>
    <a href="/goals" class="link-primary">See all goals</a>.
  </h4>
  <div class="goal-glass">
    <div class="goal-progress" style="width: <?php echo $percent ?>%">
    </div>
  </div>
  <div class="goal-amount"><span class="goal-number"><?php echo I18n::formatCurrency($goalAmount) ?></span></div>
  <div class="goal-stat">
    <span class="goal-number"><?php echo $percent ?>%</span>
    <span class="goal-label">funded</span>
  </div>
</div>