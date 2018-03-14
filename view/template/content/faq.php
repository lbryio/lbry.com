<?php Response::setMetaDescription(__('description.faq')) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <section class="content content-readable spacer2">
    <h1>{{page.faq.header}}</h1>
    <form method="get" action="/faq" id="faq-filter-form">
      <div class="form-row">
        <label>Category</label>
        <?php echo View::render('form/_select', [
          'name' => 'category',
          'choices' => $categories,
          'selected' => $selectedCategory
        ]) ?>
      </div>
    </form>
    <?php js_start() ?>
      $('#faq-filter-form').change(function() { $(this).submit(); });
    <?php js_end() ?>

    <?php foreach($postGroups as $category => $posts): ?>
      <?php if (count($posts)): ?>
        <h2><?php echo $categories[$category] ?></h2>
        <?php foreach($posts as $post): ?>
          <div class="spacer1">
            <a href="<?php echo $post->getRelativeUrl() ?>" class="link-primary"><?php echo $post->getTitle() ?></a>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    <?php endforeach ?>
  </section>
</main>

<?php echo View::render('nav/_footer') ?>
