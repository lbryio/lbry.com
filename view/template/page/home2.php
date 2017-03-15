  <div class="bg-image-full" style="background-color: white" <?php //style="background-image: url(https://s3.amazonaws.com/files.lbry.io/cover-home2.jpg)" ?>></div>
<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isBordered' => false]) ?>
<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-light cover-center" style="background-color: white">
      <div class="content content-wide content-light" style="max-width: 800px">
        <div class="spacer2">
          <h1 class="cover-title cover-title-flat text-center">Content Freedom.</h1>
          <h2 class="cover-subtitle cover-title-flat">Watch, read or play what you choose. Earn 100% of the price you decide.</h2>
          <h3 class="cover-subtitle cover-title-flat">You control your data. You own the network. Indeed, you <em>are</em> the network.</h3>
          <h3 class="cover-subtitle cover-title-flat">Hollywood films, college lessons, amazing streamers and more are on LBRY, the first community-controlled media ________.</h3>
        </div>
        <div class="control-group spacer2 text-center">
          <div class="control-item">
            <a href="/get" class="btn-primary btn-large">Early Access</a>
          </div>
          <div class="control-item">
            <a href="/learn" class="btn-link btn-large">{{global.learn}}</a>
          </div>
        </div>
      </div>
      <div class="cover-special-message text-center">
        <p>GitHub user? <a href="/quickstart" class="link-primary">Try our API immediately.</a></p>
        <p>Early access begins April 2017.</p>
      </div>
      <div class="video" style="margin: 48px 0">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DjouYBEkQPY" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  </div>
</main>
<?php echo View::render('nav/_footer', ['isDark' => false, 'isBordered' => false]) ?>
