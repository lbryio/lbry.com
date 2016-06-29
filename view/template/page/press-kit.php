<?php if (!isset($showHeader) || $showHeader): ?>
  <?php Response::setMetaDescription('LBRY Press Kit. Information and media for those who want to report on LBRY.') ?>
  <?php NavActions::setNavUri('/learn') ?>
  <?php echo View::render('nav/header', ['isDark' => false]) ?>
<?php endif ?>
<main>
  <div class="content content-light markdown">
    <h1>LBRY Press Kit</h1>
    <p>
      Information and media for those who want to write or report on LBRY.
      Any information or media on this page or in our kit can be re-used or otherwise published without attribution.
    </p>
    <h3>Download Media Archive</h3>
    <div class="spacer-half">
    <a href="/press-kit.zip" class="btn-primary"><span class="icon icon-download"></span><span class="btn-label">Download ZIP</span></a>
    </div>
    <p>This archive includes all logos, screenshots, and bios, but does not include all text on this page.</p>

    <?php echo  View::render('press-kit.md') ?>

    <h3 id="images">Logos and Product Images</h3>
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

    <h3>Founding Team</h3>
    <?php foreach(['jeremy-kauffman', 'michael-zargham', 'josh-finer', 'alex-grintsvayg', 'mike-vine', 'jimmy-kiselak', 'jack-robison'] as $person): ?>
      <?php list($metadata, $bioHtml) = View::parseMarkdown('bio/' . $person . '.md') ?>
      <section class="row-fluid">
        <div class="span3">
          <img src="/img/team/<?php echo $person ?>-644x450.jpg" alt="<?php echo $metadata['name'] ?>"/>
        </div>
        <div class="span9">
          <h4>
            <?php echo $metadata['name'] ?>
            <?php if (isset($metadata['email'])): ?>
              <a href="mailto:<?php echo $metadata['email'] ?>" class="link-primary"><?php echo $metadata['email'] ?></a>
            <?php endif ?>
          </h4>
          <div class="meta spacer1"><?php echo $metadata['role'] ?></div>
          <div class="markdown">
            <?php echo $bioHtml ?>
          </div>
        </div>
      </section>
    <?php endforeach ?>
    <h3>Advisory Team</h3>
    <?php foreach(['alex-tabarrok', 'stephan-kinsella', 'michael-huemer'] as $person): ?>
      <?php list($metadata, $bioHtml) = View::parseMarkdown('bio/' . $person . '.md') ?>
      <section class="row-fluid">
        <div class="span3">
          <img src="/img/team/<?php echo $person ?>-644x450.jpg" alt="<?php echo $metadata['name'] ?>"/>
        </div>
        <div class="span9">
          <h4>
            <?php echo $metadata['name'] ?>
          </h4>
          <div class="meta spacer1"><?php echo $metadata['role'] ?></div>
          <div class="markdown">
            <?php echo $bioHtml ?>
          </div>
        </div>
      </section>
    <?php endforeach ?>
  </div>
</main>