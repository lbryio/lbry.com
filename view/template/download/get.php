<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>
        <?php echo __('download.for-os2', ['%os%' => OS::OS_DETAIL($os)[5]]) ?>
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

          <br/><br/>

          <?php if ($metaHtml): ?>
          <?php echo $metaHtml ?>
          <?php endif ?>
        </div>

        <?php if ($os === OS::OS_ANDROID): ?>
          <figure>
            <img
              alt="Screenshot of LBRY"
              class="tall"
              src="<?php echo $osScreenshotSrc ?>"
            />
          </figure>
        <?php else: ?>
          <?php echo View::render('download/_videoIntro') ?>
        <?php endif ?>

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
    </div>
  </section>
</main>
