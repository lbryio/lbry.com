<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone-banner2.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>

<main class="ancillary">
    <section class="hero hero--half-height" style="background-image: url(https://spee.ch/3cb82a81e95c147686dbf90e9983640939461c53/everyone-banner3.jpg)">
        <div class="inner-wrap inner-wrap--center-hero">
            <h1>The Team</h1>
            <h2>Teamwork makes the dream work</h2>
        </div>
    </section>

    <?php echo View::render('content/_bio', ['person' => $slug, 'showName' => true]) ?>

</main>

