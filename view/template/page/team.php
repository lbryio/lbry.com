<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone-banner2.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(https://spee.ch/3cb82a81e95c147686dbf90e9983640939461c53/everyone-banner3.jpg)">
    <div class="inner-wrap">
      <h1>{{page.team.header}}</h1>
      <h2>Teamwork makes the dream work.</h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>Want to join this great group? <a href="/join-us" class="link-primary">See our hiring page</a>.</p>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Leadership</h2>
      <?php foreach (['jeremy-kauffman', 'alex-grintsvayg'] as $bioSlug): ?>
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      <?php endforeach ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Technical</h2>
      <?php foreach ([ 'kay-kurokawa', 'jack-robison', 'lex-berezhny', 'akinwale-ariwodola', 'sean-yesmunt', 'niko-storni', 'amit-tulshyan', 'mark-beamer'] as $bioSlug): ?>
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      <?php endforeach ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Business</h2>
      <?php foreach (['josh-finer', 'tom-zarebczan', 'brinck-slattery', 'rob-smith'] as $bioSlug): ?>
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      <?php endforeach ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>{{page.team.advisory}}</h2>
      <?php foreach (['alex-tabarrok', 'ray-carballada', 'stephan-kinsella', 'michael-huemer'] as $bioSlug): ?>
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      <?php endforeach ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h2>Join Us</h2>
      <p>Our <a href="/join-us" class="link-primary">hiring page</a> contains information about working at LBRY.</p>
    </div>
  </section>
</main>
