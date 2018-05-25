<?php Response::setMetaDescription(__('description.shirt-contest')) ?>
<?php Response::setMetaTitle(__('title.shirt-contest')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>

<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(https://spee.ch/d/tshirt-banner-2-02.jpeg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        T-shirt Design Contest
      </h1>
      <h3 class="cover-item--outline">
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Are you a graphic designer?</h3>
      <h4>Impress us with a t-shirt design & earn $100 in cryptocurrency.</h4>
      <h3>
        <img src="https://spee.ch/a/Tshirt-design-deadline-02.jpeg" alt=3D-Chess-Contest-Image style="width:650px;">
      <h3>I'm game. How do I enter?</h3>
      <div>
      <p>Make a creative design that encompasses the freedom of speech/censorship free message of LBRY. Once you finish your design email it to <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> by July 4th.<p>
      </div>
      <h4>Also checkout our <a href="https://lbry.io/3d-contest" class="link-primary"><span class="btn-label">3D Chess Set Design Contest</span></a></h4>
    <body align="center">
  <div class="content content-light content-readable">
    <h3>Want to keep updated on future contests?</h3>
    <p>Enter your email below and we'll send you updates on new contests.</p>
    <?php echo View::render('mail/_subscribeForm', [
      'tag' => '3d-contest',
      'submitLabel' => 'Sign me up',
      'hideDisclaimer' => true,
      'largeInput' => true,
      'btnClass' => 'btn-alt btn-large',
    ]) ?>
  </div>
</main>
