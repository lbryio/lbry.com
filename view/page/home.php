<div class="bg-image-full" style="background-image: url(/img/cover-home2.jpg)"></div>
<?php Response::setMetaTitle(__('LBRY - Watch, Share, Earn')) ?>
<?php Response::setMetaDescription(__('Meet LBRY, a peer-to-peer, decentralized content marketplace.')) ?>
<?php echo View::render('nav/header', ['isDark' => true]) ?>
<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-dark">
      <div class="content content-wide content-dark">
        <div class="text-center">
          <h1 class="cover-title">Stream, Share, Earn.</h1>
        </div>
        <?php $labels = [
            __('making history'),
            __('empowering artists'),
            __('spreading knowledge'),
            __('sharing sustainably'),
            __('protecting speech'),
            __('building tomorrow'),
            __('eliminating middlemen'),
            __('furthering education'),
        ] ?>
        <?php shuffle($labels) ?>
        <div class="sale-call ">
          <span class="sale-call-verb"><?php echo __('Join') ?></span>
          <span class="sale-call-total-people"><?php echo $totalPeople ?></span>
          <span class="sale-call-prep">others in</span>
          <span class="sale-ctas label-cycle"  data-cycle-interval="5000">
            <span class="sale-cta"><?php echo implode('</span><span class="sale-cta">', $labels) ?></span>
          </span>
        </div>
        <div class="control-group spacer2 text-center">
          <div class="control-item">
            <a href="/get" class="btn-primary">Get LBRY</a>
          </div>
          <div class="control-item">
            <a href="/learn" class="btn-alt">Learn More</a>
          </div>
        </div>
        <div class="video" style="margin-bottom: 80px">
          <iframe width="1280" height="720" src="https://www.youtube.com/embed/BNtivEJKHxI" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="row-fluid content-constrained">
          <div class="span4">
            <h3><strong><?php echo __('Get Updates') ?></strong></h3>
            <?php echo View::render('mail/joinList', [
              'submitLabel' => 'Go',
              'listId' => Mailchimp::LIST_GENERAL_ID,
              'mergeFields' => ['CLI' => 'No'],
              'meta' => true,
              'returnUrl' => '/',
              'btnClass' => 'btn-alt'
            ]) ?>
          </div>
          <div class="span4 text-center">
            <div class="fb-page" data-href="https://www.facebook.com/lbryio" data-height="300" data-small-header="false" data-width="300"
                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
              <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/lbryio"><a href="https://www.facebook.com/lbryio">LBRY</a></blockquote></div>
            </div>
          </div>
          <div class="span4 text-center">
            <a width="300" class="twitter-timeline" href="https://twitter.com/LBRYio" data-widget-id="671104143034073088">Tweets by @LBRYio</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
