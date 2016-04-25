<?php Response::setMetaTitle(__('Fund LBRY')) ?>
<?php Response::setMetaDescription('Contribute to the future of LBRY and buy credits for the LBRY network at pre-release prices.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="cover cover-dark cover-dark-grad">
    <div class="row-fluid">
      <div class="span9 spacer2">
        <?php echo View::render('fund/header') ?>
        <h2>TEST TEST TEST TEST TEST - You probably don't want to be here</h2>
        <h3>Current Goal</h3>
        <div class="content content-dark">
          <?php echo View::render('fund/currentGoal') ?>
        </div>
        <h3>Select Your Level</h3>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('A personal thank you in the source code, recording your contribution for eternity.') ?></li>
            <li><?php echo __('Early access to LBRY test releases.') ?></li>
            <li><?php echo __('Insider newsletter about our work on LBRY.') ?></li>
          </ul>
        <?php $basicRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('Record personal message of up to 140 characters in LBRY source code for eternity.') ?></li>
            <li><?php echo __('1 year of basic support from LBRY.') ?></li>
          </ul>
        <?php $standardRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('LBRY T-shirt') ?></li>
            <li><?php echo __('Invitation to join private LBRY team chat.') ?></li>
          </ul>
        <?php $optimalRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('Meet with core LBRY team members for thirty minute video chat.') ?></li>
            <li><?php echo __('Something else awesome?') ?></li>
            <li><?php echo __('We will kiss you on the face (no tongue).') ?></li>
          </ul>
        <?php $prometheusRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('Any LBRY team member will give a presentation on LBRY in your city or most places on earth.') ?></li>
            <li><?php echo __('You pick one of the ten founding publications to the LBRY blockchain.') ?></li>
            <li><?php echo __('We will kiss you on the face, with tongue.') ?></li>
          </ul>
        <?php $apolloRewardHtml = ob_get_clean() ?>
        <?php $maxCreditAmount = 100 ?>
        <div class="sale-levels spacer2">
          <?php foreach([[
              'id' => 'basic',
              'label' => __('Basic'),
              'cost' => 10,
              'rewardHtml' => $basicRewardHtml
          ], [
              'id' => 'standard',
              'label' => __('Standard'),
              'cost' => 25,
              'rewardHtml' => $standardRewardHtml
          ], [
              'id' => 'optimal',
              'label' => __('Optimal'),
              'cost' => 100,
              'rewardHtml' => $optimalRewardHtml
          ], [
              'id' => 'prometheus ',
              'label' => __('Prometheus'),
              'cost' => 1000,
              'rewardHtml' => $prometheusRewardHtml
          ], [
              'id' => 'apollo',
              'label' => __('Apollo'),
              'cost' => 10000,
              'rewardHtml' => $apolloRewardHtml
          ]] as $level): ?>
            <?php $creditCost = min($level['cost'], $maxCreditAmount) ?>
            <div class="sale-level sale-level-clickable">
              <h4 class="sale-level-label"><?php echo $level['label'] ?></h4>
              <div class="sale-level-cost"><?php echo i18n::formatCurrency($level['cost']) ?></div>
              <div class="row-fluid clear">
                <div class="span3 spacer1">
                  <h6 class="sale-level-reward-title"><?php echo __('Credit Reward') ?></h6>
                  <?php $creditsToday = $creditCost * $creditsPerDollar ?>
                  <?php $creditFall = $creditsToday - $creditCost * $creditsPerDollarTomorrow ?>
                  <div class="sale-level-credits"><?php echo i18n::formatCredits($creditsToday) ?></div>
                  <div class="sale-level-help">
                    <?php echo __('This reward falls by %amount% tomorrow!', [
                        '%amount%' => i18n::formatCredits($creditFall)
                    ]) ?>
                  </div>
                </div>
                <div class="span9">
                  <h6 class="sale-level-reward-title"><?php echo __('Additional Rewards') ?></h6>
                  <div class="sale-level-reward"><?php echo $level['rewardHtml'] ?></div>
                </div>
              </div>
              <input name="fund-id" value="<?php echo $level['id'] ?>" type="radio" class="sale-level-radio"/>
            </div>
          <?php endforeach ?>
        </div>
        <div class="sale-checkout-acknowledgements spacer2">
          <h4><?php echo __('Acknowledgements') ?></h4>
          <div class="content content-dark">
            <div class="form-row">
              <label for="fund-not-investment">
                <input type="checkbox" id="fund-not-investment" value="not_investment">
                <?php echo __('I am making this purchase to acquire LBC for my own personal use on the LBRY network.') ?>
                <?php echo __('I am not acquiring LBC for speculation purposes, investment purposes, or with any intent to resell.') ?>
              </label>
            </div>
            <div class="form-row">
              <label for="fund-not-guaranteed">
                <input type="checkbox" id="fund-not-guaranteed" value="not_guaranteed">
                <?php echo __('I acknowledge that LBRY is a new, unproven venture.') ?>
                <?php echo __('I understand and accept that LBRY may fail for any number of reasons and there is no guarantee my credits will be redeemable.') ?>
              </label>
            </div>
          </div>
        </div>
        <div class="sale-checkout-select">
          <h4><?php echo __('Select Payment') ?></h4>
          <div class="control-group">
            <div class="control-item control-item-img">
              <a href="/fund-after"><img src="/img/bitcoin-button-126x48.png"  alt="<?php echo __('Pay with Bitcoin') ?>" /></a>
            </div>
            <div class="control-item control-item-img">
              <a href="/fund-after" ><img src="/img/paypal-button-170x32.png" style="margin-top: 5px" alt="<?php echo __('Pay with PayPal') ?>" /></a>
            </div>
            <div class="control-item" style="vertical-align: top; margin-top: 7px;">
              <a href="/fund-after" class="btn-alt"><span class="icon-shopping-cart" style="margin-right: 2px"></span> <?php echo __('Pay with Credit') ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="span3">
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('Where does my money go?') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('These funds will fund the develop of LBRY on all platforms, spur the LBRY ecosystem, and generally help LBRY launch as a race car rather than a bus.') ?>
            </p>
            <p>
              <?php echo __('LBRY will launch even if 0 credits are sold.') ?>
              <?php echo __('Funds will be administered with complete transparency.') ?>
            </p>
            <a class="link-primary" href="/learn"><?php echo __('Learn More') ?></a>
          </div>
        </div>
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('What do I get?') ?> <?php echo __('What is LBC?') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('Anytime someone publishes or accesses data via the LBRY network, LBRY Credits, or LBC, are required.') ?>
            </p>
            <p>
              <?php echo __('There are two primary reasons to buy LBC now:') ?><br/>
              <?php echo __('1) This is probably the cheapest they will ever be.') ?><br/>
              <?php echo __('2) You will help build the greatest information sharing network the world has ever seen.') ?>
            </p>
            <a class="link-primary" href="/learn"><?php echo __('Learn More') ?></a>
          </div>
        </div>
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('Why can I only buy up to $100 worth of credits?') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('We have limited the maximum credit purchase because this pre-buy program is only intended to sell you credits for your own personal use, not for purposes of speculation or investment.') ?>
            </p>
            <p>
              <?php echo __('However, we do want to allow those who want to contribute larger amounts to be able to do so, so we\'ve come up with some exciting non-credit rewards.') ?>
            </p>
          </div>
        </div>
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('I want to talk to someone or have another question.') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('Finding our %learn_page_title% page too complicated or too simple? Just want to talk to someone about your day? We\'re here at %address%.', [
                  '%learn_page_title%' => '<a href="/" class="link-primary">' . __('Learn') . '</a>',
                  '%address%' => '<a href="mailto:fund@lbry.io" class="link-primary">fund@lbry.io</a>',
              ]) ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
