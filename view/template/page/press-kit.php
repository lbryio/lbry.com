<?php if (!isset($showHeader) || $showHeader): ?>
  <?php Response::setMetaDescription('description.press') ?>
  <?php NavActions::setNavUri('/learn') ?>
<?php endif ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--hero">
      <h1>{{press.title}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>For a current press-kit, please contact:</p>
      <?php echo View::render('content/_bio', ['person' => 'brinck-slattery']) ?>
    </div>
  </section>
</main>
