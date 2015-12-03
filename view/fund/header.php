<?php $totalUSD = CreditApi::getTotalDollarSales() ?>
<?php $totalPeople = CreditApi::getTotalPeople() ?>
<div class="row-fluid">
  <div class="span6">
    <h1 class="text-center"><img src="/img/lbry-white-485x160.png" alt="Fund LBRY"/></h1>
  </div>
  <div class="span6" >
    <div class="cover-simple cover-center" style="min-height: 160px">
      <h2 class="text-center sale-title">
        <span class="sale-title-emphasis"><?php echo $totalPeople ?></span>
        <span class="sale-title-filler">people gave</span>
        <span class="sale-title-emphasis"><?php echo i18n::formatCurrency($totalUSD) ?></span>
        <span class="sale-title-filler">to</span>
        <span class="label-cycle sale-ctas">
          <span class="sale-cta"><?php echo implode('</span><span class="sale-cta">', [
              __('build a better future'),
              __('eliminate corporate middlemen'),
              __('keep art alive'),
              __('create a more sustainable internet'),
              __('protect freedom of speech'),
              __('reduce the cost of education'),
          ]) ?></span>
        </span>
      </h2>
    </div>
  </div>
</div>