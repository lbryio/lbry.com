<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap">
      <h1>
        <?php echo __('download.for-os', ['%os%' => $osTitle]) ?>
      </h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php if ($downloadUrl): ?>

      <div style="margin-bottom: 2rem; text-align: center;">
        <p>Securely download the LBRY app here, and see what all the fuss is about!</p>
        <?php $metaHtml = $os !== OS::OS_ANDROID ? View::Render('download/_meta') : false ?>
        <?php echo View::Render('download/_downloadButton', [
          'buttonStyle' => 'primary'
        ])?>
      </div>

      <figure>
        <img src="<?php echo $osScreenshotSrc ?>" alt="Screenshot of LBRY"/>

        <?php if ($metaHtml): ?>
        <figcaption><?php echo $metaHtml ?></figcaption>
        <?php endif ?>
      </figure>

      <?php else: ?>

      <p>{{download.unavailable}}</p>

      <?php echo View::render('mail/_subscribeForm', [
        'tag' => $os,
        'submitLabel' => 'Join List',
        'hideDisclaimer' => true,
        'largeInput' => true,
        'btnClass' => 'btn-alt btn-large',
      ]) ?>

      <?php endif ?>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php echo View::render('download/_list', ['excludeOs' => $os]) ?>
      <!--/ <?php echo View::render('download/_social') ?> /-->
    </div>
  </section>
</main>
