<?php Response::setMetaDescription($post->getTitle()) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header') ?>
  <main>
    <section class="post-content">
      <div class="content">
        <br/>
        <div class="meta">
          <a href="/credit-reports">« Credit Reports</a>
        </div>
        <h1><?php echo htmlentities($post->getTitle()) ?></h1>
        <h2>Sheet</h2>
        <a href="<?php echo $sheetUrl ?>">Sheet</a>
        <?php echo $post->getContentHtml() ?>
      </div>
    </section>
  </main>
<?php echo View::render('nav/_footer') ?>
