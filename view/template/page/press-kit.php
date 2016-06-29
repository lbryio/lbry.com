<?php Response::setMetaDescription('LBRY Press Kit. Information and media for those who want to report on LBRY.') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content content-light">
    <h1>LBRY Press Kit</h1>
    <p>
      Information and media for those who want to write or report on LBRY.
      Any information or media on this page or in our kit can be re-used or otherwise published without attribution.
    </p>
    <section>
      <h3>Download Kit</h3>
      <a href="/press-kit.zip" class="btn-primary"><span class="icon icon-download"></span><span class="btn-label">Download ZIP</span></a>
    </section>
    <section>
      <h3>What is LBRY?</h3>
      <?php echo ParsedownExtra::instance()->text(trim(file_get_contents(ROOT_DIR . '/posts/press.md'))) ?>
    </section>
    <section>
      <h3>Logos and Product Images</h3>
      <div class="column-fluid">
        <?php foreach(glob(ROOT_DIR . '/web/img/press/*') as $imgPath): ?>
          <div class="span6">
            <div style="margin: 10px">
              <?php $imgUrl = str_replace(ROOT_DIR . '/web', '', $imgPath) ?>
              <h4><?php echo str_replace('/img/press/', '', $imgUrl) ?></h4>
              <a href="<?php echo $imgUrl ?>"><img src="<?php echo $imgUrl ?>"/></a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </section>
  </div>
</main>