<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap">
      <h1>{{page.badrequest}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p><?php echo $error ?? __('page.badrequest_details') ?></p>
      <?php echo View::render('nav/_errorFooter') ?>
    </div>
  </section>
</main>
