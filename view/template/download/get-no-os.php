<?php Response::setMetaDescription(__('description.no-os')) ?>
<?php Response::setMetaTitle(__('global.get')) ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--hero">
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
