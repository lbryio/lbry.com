<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer1" style="background-image: url(https://spee.ch/@lbryteam/everyone-banner2.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content text-center">
        <h1 class="cover-title">{{page.team.header}}</h1>
        <h2 class="cover-subtitle">Team work makes the dream work.</h2>
      </div>
    </div>
  </div>
  <div class="content spacer2">
    <div class="meta text-center">
      Want to join this great group?
      <a href="/join-us" class="link-primary">See our hiring page</a>.
    </div>
    <h2>Leadership</h2>
    <?php foreach (['jeremy-kauffman', 'alex-grintsvayg'] as $bioSlug): ?>
      <div class="spacer2">
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      </div>
    <?php endforeach ?>
    <h2>Technical</h2>
    <?php foreach ([ 'kay-kurokawa', 'jack-robison', 'lex-berezhny',
                    'akinwale-ariwodola', 'sean-yesmunt', 'bill-bittner', 'amit-tulshyan', 'mark-beamer'] as $bioSlug): ?>
      <div class="spacer2">
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      </div>
    <?php endforeach ?>
    <h2>Business</h2>
    <?php foreach (['josh-finer',
                    'reilly-smith',
                    'tom-zarebczan',
                    'brinck-slattery',
                    'rob-smith'] as $bioSlug): ?>
      <div class="spacer2">
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      </div>
    <?php endforeach ?>
    <h2>{{page.team.advisory}}</h2>
    <?php foreach (['alex-tabarrok', 'ray-carballada', 'stephan-kinsella', 'michael-huemer'] as $bioSlug): ?>
      <div class="spacer2">
        <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
      </div>
    <?php endforeach ?>
    <h2>Join Us!</h2>
    <p>
      Our <a href="/join-us" class="link-primary">hiring page</a> contains information about working at LBRY.
    </p>
  </div>
  <?php echo View::render('nav/_learnFooter') ?>
</main>
<?php echo View::render('nav/_footer') ?>
