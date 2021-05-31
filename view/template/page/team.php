<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone-banner2.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(https://spee.ch/3cb82a81e95c147686dbf90e9983640939461c53/everyone-banner3.jpg)">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>The Team</h1>
      <h2>Teamwork makes the dream work</h2>
    </div>
  </section>

  <?php $teams = [
    "Leadership" => ['jeremy-kauffman', 'alex-grintsvayg'],
    "Technical" => ['lex-berezhny', 'brannon-king', 'jack-robison', 'akinwale-ariwodola',
                    'andrey-beletsky', 'niko-storni', 'mark-beamer', 'roy-lee', 'johnny-nelson'],
    "Growth" => ['julian-chandra', 'drew-hancock'],
    "Business" => ['josh-finer', 'tom-zarebczan'],
    "Advisory Team" => ['alex-tabarrok', 'ray-carballada', 'stephan-kinsella', 'michael-huemer'],
  ] ?>

  <?php foreach ($teams as $team => $members): ?>
    <section>
      <div class="inner-wrap">
        <h2><?php echo $team ?></h2>
      </div>
      <div class="inner-wrap team-members">
          <?php foreach ($members as $bioSlug): ?>
            <?php echo View::render('content/_bioCircle', ['slug' => $bioSlug]) ?>
          <?php endforeach ?>
      </div>
    </section>
  <?php endforeach ?>

</main>
