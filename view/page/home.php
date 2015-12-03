<div class="bg-image-full" style="background-image: url(/img/cover-home2.jpg)"></div>
<?php Response::setMetaTitle(__('LBRY - Watch, Share, Earn')) ?>
<?php Response::setMetaDescription(__('Learn about LBRY, a peer-to-peer, decentralized content marketplace.')) ?>
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
              <a href="/fund" class="btn-primary">Fund LBRY</a>
            </div>
            <div class="control-item">
              <a href="/learn" class="btn-alt">Learn More</a>
            </div>
          </div>
          <div class="video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/qMUbq3sbG-o?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php /*
 * <h1>Stream, Share, Earn.</h1>
            <div class="text-center">
              <h3 class="cover-subtitle">Join a fully distributed network that makes information open to everyone.</h3>
              <div class="control-group spacer1">
                <div class="control-item">
                  <a href="/get" class="btn-primary">Get LBRY</a>
                </div>
                <div class="control-item">
                  <a href="/what" class="btn-alt">Learn More</a>
                </div>
              </div>
            </div>
 */ ?>