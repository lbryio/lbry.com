<?php Response::setMetaDescription(__('description.speech-admin')) ?>
<?php Response::setMetaTitle(__('title.speech-admin')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/speech-admin.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        Run Your Own Spee.ch Clone/Web Server Hosting LBRY Content
      </h1>
      <h3 class="cover-item--outline">
        Interested in hosting a spee.ch-style website? We can help you build your own personal YouTube.
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>LBRY wants to help you set up your own personalized version of Spee.ch!</h3>
      <p> We're looking for users and communities that are interested in hosting a spee.ch-style website or a web portal into their own LBRY content. We'll walk you through the process of customizing and tweaking it to your liking.</p>
      <h3>Ready to get started?</h3>
      <p>Enter your email below and we'll get in touch with everything you need.</p>
      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'speech-admin',
        'submitLabel' => 'I want my own Spee.ch!',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
