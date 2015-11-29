<div class="bg-image-full" style="background-image: url(/img/cover-home2.jpg)"></div>
<?php Response::setMetaTitle(__('LBRY - Watch, Share, Earn')) ?>
<?php Response::setMetaDescription(__('Learn about LBRY, a peer-to-peer, decentralized content marketplace.')) ?>
<?php echo View::render('nav/header', ['isDark' => true]) ?>
<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-dark cover-center">
      <h2 class="cover-title">Watch, Share, Earn.</h2>
      <div class="text-center">
        <h3 class="cover-subtitle">Join a fully distributed network that makes information open to everyone.</h3>
        <div class="control-group spacer1">
          <div class="control-item">
            <a href="/get" class="btn-primary">Test LBRY</a>
          </div>
          <div class="control-item">
            <a href="/what" class="btn-alt">Learn More</a>
          </div>
        </div>
      </div>
      <div class="video" style="margin-bottom: 80px">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/qMUbq3sbG-o?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
        <div class="row-fluid content-constrained">
          <div class="span6 text-center">
            <div class="fb-page" data-href="https://www.facebook.com/lbryio" data-height="300" data-small-header="false" data-width="400"
                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
              <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/lbryio"><a href="https://www.facebook.com/lbryio">LBRY</a></blockquote></div>
            </div>
          </div>
          <div class="span6 text-center">
            <a width="400" class="twitter-timeline" href="https://twitter.com/LBRYio" data-widget-id="671104143034073088">Tweets by @LBRYio</a>
          </div>
        </div>
    </div>
  </div>
</main>
