<?php Response::setMetaDescription(__('YouTube has Reefer Madness')) ?>
<?php Response::setMetaTitle(__('YouTube is censoring cannabis-related videos. LBRY won\'t.')) ?>
<?php Response::addMetaImage('https://lbry.io/img/greens_mini.jpg') ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/greens_mini.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        YouTube Has Reefer Madness
      </h1>
      <h3 class="cover-item--outline">
        YouTube is erasing thousands of cannabis-related videos. Have you had enough?
      </h3>
    </div>
    <div class="spacer2 text-center">
<a class="btn-primary btn-large" href="https://lbry.io/youtube">Join our YouTube Partner Program</a>
</div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>YouTube is purging drug-related content.</h3>
      <p>Over the past few months, YouTube has been <a href="https://www.leafly.com/news/industry/youtube-continues-its-cannabis-purge-and-nobody-knows-why">quietly deleting</a> hundreds of cannabis-related channels. Their vague content rules demand that drug use be “contextualized” (a term without any real definition), which means they get to pick and choose who’s allowed to talk about drugs.</p>
      <p>It’s no surprise that the channels that are disappearing aren’t exactly household names - a psychonaut with a small audience or budding cannabis chef won’t get the benefit of the doubt that Doug Benson or Vice will. </p>
      <p>As long as YouTube depends on revenue from advertisers, you can expect to see more and more of these periodic spasms of censorship.</p>
      <h3>We can do better.</h3>
      <p>At LBRY, we don’t want to pick winners and losers. We don’t rely on advertisers for revenue. Instead, we make it possible for creators to be compensated directly by their fans.</p>
      <p>Ready to get off the YouTube merry go round? Use the link below to join our YouTube Partner Program and mirror your videos to LBRY. </p>
    </div>
    <div class="spacer2 text-center">
<a class="btn-primary btn-large" href="https://lbry.io/youtube">Join our Partner Program</a>
</div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
