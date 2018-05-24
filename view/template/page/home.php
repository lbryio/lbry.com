<?php Response::setMetaTitle(__('title.home')) ?>
<?php Response::setMetaDescription(__('description.home')) ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isBordered' => false]) ?>
<main class="home">
  <div class="cover home__title cover-light">
    <h1 class="cover-title cover-title-flat text-center">Content Freedom</h1>
  </div>
  <div class="cover home__media">
    <a href="/get"><img alt="Picture of LBRY Browser" src="/img/lbry-ui.png" /></a>
  </div>
  <div class="cover cover-light content content-light content-wide home__copy">
    <div class="spacer2">
      <h2 class="cover-subtitle cover-title-flat">LBRY is a free, open, and community-run digital marketplace.</h2>
      <h3 class="cover-subtitle cover-title-flat">You own your data. You control the network. Indeed, you <em>are</em> the network.</h3>
      <h3 class="cover-subtitle cover-title-flat">Hollywood films, college lessons, amazing streamers and more are on the first media network ruled by <em>you</em>.</h3>
    </div>
    <div class="spacer2 text-center">
    <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary','meta' => false,])?>
  </div>
</main>
