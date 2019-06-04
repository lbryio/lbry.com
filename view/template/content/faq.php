<?php Response::setMetaDescription(__('description.faq')) ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{page.faq.header}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <form method="get" action="/faq" id="faq-filter-form">
        <?php echo View::render('form/_select', [
          'choices' => $categories,
          'label' => 'Category',
          'name' => 'category',
          'selected' => $selectedCategory
        ]) ?>
      </form>

      <?php js_start() ?>
        if (window.location.href.includes("/faq?category"))
          document.querySelector("select").insertAdjacentHTML("afterbegin", "<option value='back-to-faq'>Back to FAQ</option>");

        document.getElementById("faq-filter-form").addEventListener("change", function() {
          this.submit();
        });
      <?php js_end() ?>

      <?php foreach ($postGroups as $category => $posts): ?>
        <?php if (count($posts)): ?>
          <h2><?php echo $categories[$category] ?></h2>

          <ul>
          <?php foreach ($posts as $post): ?>
            <li>
              <a href="<?php echo $post->getRelativeUrl() ?>">
                <?php echo $post->getTitle() ?>
              </a>
            </li>
          <?php endforeach ?>
          </ul>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>Do you have further questions or want to submit a question to our FAQ? <a href=" mailto:hello@lbry.com?subject=Question%20for%20the%20FAQ" rel="noopener noreferrer" target="_blank" title="">Send us an email</a>!</p>
    </div>
  </section>
</main>
