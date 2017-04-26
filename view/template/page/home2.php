  <div class="bg-image-full" style="background-color: white" <?php //style="background-image: url(https://s3.amazonaws.com/files.lbry.io/cover-home2.jpg)" ?>></div>
<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isBordered' => false]) ?>
<main class="column-fluid column-fluid--home">
  <div class="span6">
    <div class="cover cover-light cover-center content content-light">
      <div class="spacer1"  style="max-width: 800px">
        <h1 class="cover-title cover-title-flat text-center">Content Freedom</h1>
        <h2 class="cover-subtitle cover-title-flat">LBRY is a free, open, and community-run digital marketplace.</h2>
        <h3 class="cover-subtitle cover-title-flat">You own your data. You control the network. Indeed, you <em>are</em> the network.</h3>
        <h3 class="cover-subtitle cover-title-flat">Hollywood films, college lessons, amazing streamers and more are on the first media network ruled by <em>you</em>.</h3>
      </div>
      <div class="spacer2 text-center">
        <a href="/get" class="btn-primary btn-large">Early Access</a>
        <a href="/learn" class="btn-link btn-large">{{global.learn}}</a>
      </div>
      <div class="cover-special-message spacer1 text-center">
        <p>Want a super early version and willing to suffer?<br/>
          <a href="https://slack.lbry.io" class="link-primary">Join our Slack</a>.</p>
      </div>
    </div>
  </div>
  <div class="span6" style="max-height: calc(100vh - 78px)">
    <div  class="cover cover-center">
      <img style="box-shadow: 0 0 10px rgba(0,0,0,0.8); max-height: calc(100vh - 126px)" src="/img/lbry-ui.png" />
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer', ['isDark' => false, 'isBordered' => false]) ?>
