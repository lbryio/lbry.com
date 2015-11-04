<div class="bg-image-full" style="background-image: url(/img/cover-home2.jpg)"></div>
<?php Response::setMetaTitle(__('LBRY - Watch, Share, Earn')) ?>
<?php Response::setMetaDescription(__('Learn about LBRY, a peer-to-peer, decentralized content marketplace.')) ?>
<?php echo View::render('nav/header', ['isDark' => true]) ?>
<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-dark cover-center">
      <h2 class="cover-title">Check it out!</h2>
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
      <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/EHljV6Tg24Y" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</main>
