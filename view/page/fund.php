<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php Response::setMetaTitle(__('Get LBRY')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="cover cover-dark cover-dark-grad">
    <div class="row-fluid">
      <div class="span9 spacer2">
        <div class="row-fluid">
          <div class="span7">
            <h1 class="text-center"><img src="/img/lbry-white-485x160.png" alt="Fund LBRY"/></h1>
          </div>
          <div class="span5" >
            <div class="cover-simple cover-center" style="min-height: 160px">
              <h2 class="text-center sale-title">
                <span class="sale-title-emphasis"><?php echo $totalPeople ?></span>
                <span class="sale-title-filler">have given</span>
                <span class="sale-title-emphasis"><?php echo i18n::formatCurrency($totalUSD) ?></span>
                <span class="sale-title-filler">to</span>
                <br/>
                <span class="label-cycle">
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
        <h3>Select Your Level</h3>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('A personal thank you in the source code, recording your contribution for eternity.') ?></li>
            <li><?php echo __('1 year of support from LBRY.') ?></li>
            <li><?php echo __('Early access to all LBRY Releases.') ?></li>
          </ul>
        <?php $basicRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('LBRY .') ?></li>
            <li><?php echo __('Thing.') ?></li>
          </ul>
        <?php $standardRewardHtml = ob_get_clean() ?>
        <?php ob_start() ?>
          <ul>
            <li><?php echo __('All above rewards.') ?></li>
            <li><?php echo __('LBRY T-shirt') ?></li>
            <li><?php echo __('Join LBRY Team Chat') ?></li>
          </ul>
        <?php $premiumRewardHtml = ob_get_clean() ?>
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
              'id' => 'premium',
              'label' => __('Premium'),
              'cost' => 100,
              'rewardHtml' => $premiumRewardHtml
          ]] as $level): ?>
            <div class="sale-level">
              <h4 class="sale-level-label"><?php echo $level['label'] ?></h4>
              <div class="sale-level-cost"><?php echo i18n::formatCurrency($level['cost']) ?></div>
              <div class="row-fluid clear">
                <div class="span3 spacer1">
                  <h6 class="sale-level-reward-title"><?php echo __('Credit Reward') ?></h6>
                  <?php $creditsToday = $level['cost'] * $creditsPerDollar ?>
                  <?php $creditFall = $creditsToday - $level['cost'] * $creditsPerDollarTomorrow ?>
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
              <a href="/fund"><img src="/img/bitcoin-button-126x48.png"  alt="<?php echo __('Pay with Bitcoin') ?>" /></a>
            </div>
            <div class="control-item control-item-img">
              <a href="/fund" ><img src="/img/paypal-button-170x32.png" style="margin-top: 5px" alt="<?php echo __('Pay with PayPal') ?>" /></a>
            </div>
            <div class="control-item" style="vertical-align: top; margin-top: 7px;">
              <a href="/fund" class="btn-alt"><span class="icon-shopping-cart" style="margin-right: 2px"></span> <?php echo __('Pay with Credit') ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="span3">
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('Where Does My Money Go?') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('These funds will fund the develop of LBRY on all platforms, spur the LBRY ecosystem, and generally help LBRY launch as a race car rather than a bus.') ?>
            </p>
            <p>
              <?php echo __('LBRY will launch even if $0 is raised.') ?>
              <?php echo __('Funds will be administered with complete transparency.') ?>
            </p>
            <a class="link-primary" href="/learn"><?php echo __('Learn More') ?></a>
          </div>
        </div>
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('What Do I Get?') ?> <?php echo __('What is LBC?') ?></h4>
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
          <h4 class="sale-question"><?php echo __('Why Can I Only Buy Up To $100?') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('This pre-buy program is only intended to sell you credits for your own personal use, not for speculation.') ?>
            </p>
            <p>
              <?php echo __('If you wish to contribute more than $100 to this project, we would happily receive your money as a donation.') ?>
            </p>
          </div>
        </div>
        <div class="sale-question-bubble">
          <h4 class="sale-question"><?php echo __('I Want To Talk To Someone Or Have Another Question.') ?></h4>
          <div class="sale-question-answer">
            <p>
              <?php echo __('This is a way to talk to someone.') ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
