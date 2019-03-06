<?php Response::setMetaDescription(__('description.meetup')) ?>
<?php Response::setMetaTitle(__('title.meetup')) ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/table2.jpg)">
    <div class="inner-wrap">
      <h1>Wanna Meet Up?</h1>
      <h3>LBRY is looking for ambassadors to spread the word to College campuses and Meetup groups worldwide!</h3>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Interested in bringing LBRY to your local college campus or Meetup group?</h3>
      <p> We're looking for folks to demonstrate our platform and latest technologies. What's in it for you? We'll provide you with LBRY credits for your group, LBRY swag, and presentation resources.</p>

      <h3>Okay. How do I get involved?</h3>
      <p>Enter your email below and we'll tell you more.</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => 'college',
        'submitLabel' => 'Sign me up',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large'
      ]) ?>
    </div>
  </section>
</main>
