<?php Response::setMetaDescription(__('description.no-os')) ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/og-image.png?_cache=' . date('Y-m-d')) ?>
<?php Response::setMetaTitle(__('global.get')) ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>Use LBRY on your preferred platform</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php echo View::render('download/_list', [
        'title' => __('download.select')
      ]) ?>
    </div>
  </section>
</main>
