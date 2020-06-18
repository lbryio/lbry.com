<?php if (!isset($showHeader) || $showHeader): ?>
  <?php Response::setMetaDescription('description.press') ?>
  <?php NavActions::setNavUri('/learn') ?>
<?php endif ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{press.title}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>For a current press-kit, please <a href="https://open.lbry.com/@lbry:3f/LBRY_presskit:d" class="link-primary">see our post on LBRY.</a></p>
    </div>
  </section>
</main>
