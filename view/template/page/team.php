<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone-banner2.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(https://spee.ch/3cb82a81e95c147686dbf90e9983640939461c53/everyone-banner3.jpg)">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{page.team.header}}</h1>
      <h2>Teamwork makes the dream work.</h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Leadership</h2>
    </div>

    <?php foreach (['jeremy-kauffman', 'alex-grintsvayg'] as $bioSlug): ?>
      <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
    <?php endforeach ?>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Technical</h2>
    </div>

    <?php foreach (['jack-robison', 'lex-berezhny', 'akinwale-ariwodola', 'sean-yesmunt', 'niko-storni', 'amit-tulshyan', 'mark-beamer'] as $bioSlug): ?>
      <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
    <?php endforeach ?>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Business</h2>
    </div>

    <?php foreach (['josh-finer', 'tom-zarebczan', 'brinck-slattery'] as $bioSlug): ?>
      <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
    <?php endforeach ?>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>{{page.team.advisory}}</h2>
    </div>

    <?php foreach (['alex-tabarrok', 'ray-carballada', 'stephan-kinsella', 'michael-huemer'] as $bioSlug): ?>
      <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
    <?php endforeach ?>
  </section>

</main>
