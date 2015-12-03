<?php Response::setMetaTitle(__('LBRY Fund Goals')) ?>
<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="cover cover-dark cover-dark-grad">
    <div class="content content-dark">
      <?php echo View::render('fund/header') ?>
      <h2><?php echo __('Active Goal') ?></h2>
      <?php echo View::render('fund/currentGoal') ?>
      <h1><?php echo __('All Goals') ?></h1>
      <?php ob_start() ?>
      <p>Core development continues through 2016.</p>
      <?php $coreDevRewardHtml = ob_get_clean() ?>
      <?php ob_start() ?>
      <p>Android and iPhone so cool.</p>
      <?php $appRewardHtml = ob_get_clean() ?>
    </div>
    <div class="content content-light">
      <div class="sale-levels spacer2">
        <?php foreach([[
            'name' => 'Core Development Continues',
            'amount' => 25000,
            'rewardHtml' => $coreDevRewardHtml
        ], [
            'name' => 'Android and iPhone Apps',
            'amount' => 50000,
            'rewardHtml' => $appRewardHtml
        ]] as $goal): ?>
          <div class="sale-level">
            <h4 class="sale-level-label"><?php echo $goal['name'] ?></h4>
            <div class="sale-level-cost"><?php echo i18n::formatCurrency($goal['amount']) ?></div>
            <div class="row-fluid clear">
              <h6 class="sale-level-reward-title"><?php echo __('Reward') ?></h6>
              <div class="sale-level-reward"><?php echo $goal['rewardHtml'] ?></div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
