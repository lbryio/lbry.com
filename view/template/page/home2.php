
<div class="bg-image-full" style="background-color: white" <?php //style="background-image: url(https://s3.amazonaws.com/files.lbry.io/cover-home2.jpg)" ?>></div>
<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isLogoOnly' => false]) ?>
<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-light cover-center">
      <div class="content content-wide content-light" style="max-width: 800px">
        <div class="spacer2">
          <h1 class="cover-title cover-title-flat">Content Freedom</h1>
          <h2 class="cover-subtitle cover-title-flat">Watch, read or play what you choose. Earn 100% of the price you decide.</h2>
          <h3 class="cover-subtitle cover-title-flat">You control your data. You own the network. Indeed, you <em>are</em> the network.</h3>
          <h3 class="cover-subtitle cover-title-flat">Find Hollywood films, college lessons, amazing streamers and more on the first open, global, and community-controlled digital bazaar.</h3>
        </div>
        <div class="control-group spacer2 text-center">
          <div class="control-item">
            <a href="/get" class="btn-primary btn-large">Join LBRY</a>
          </div>
          <div class="control-item">
            <a href="/learn" class="btn-link btn-large">{{global.learn}}</a>
          </div>
        </div>
      </div>
      <div class="video" style="margin: 48px 0">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DjouYBEkQPY" frameborder="0" allowfullscreen></iframe>
      </div>
      <?php /*
      <div class="content content-dark">
        <div class="row-fluid">
          <div class="span4">
            <h3><?php echo __('email.updates') ?></h3>
            <?php echo View::render('mail/_subscribeForm', ['submitLabel' => __('email.go'), 'btnClass' => 'btn-alt']) ?>
          </div>
          <div class="span4 text-center">
            <div class="fb-page" data-href="https://www.facebook.com/lbryio" data-height="300" data-small-header="false" data-width="300"
                 data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
              <div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/lbryio"><a href="https://www.facebook.com/lbryio">LBRY</a></blockquote></div>
            </div>
          </div>
          <div class="span4 text-center">
            <a width="300" class="twitter-timeline" href="https://twitter.com/LBRYio" data-widget-id="671104143034073088">{{social.tweets}}</a>
          </div>
        </div> */ ?>
    </div>
  </div>
  </div>
</main>
<?php echo View::render('nav/_footer', ['isDark' => false]) ?>
