<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/og-image.png?_cache=' . date('Y-m-d')) ?>
<?php NavActions::setNavUri('/get') ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>
        <?php echo __('download.for-os2', ['%os%' => OS::OS_DETAIL($os)[4]]) ?>
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

          <?php if ($os === OS::OS_ANDROID): ?>
            <p style="font-size: 0.8rem;">You can also <a href="http://lbry.com/releases/lbry-android.apk" title="Download our Android app directly">download</a> our Android app directly</p>
          <?php endif ?>

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
          <video
            autoplay
            loop
            poster="https://spee.ch/f/2019-08-lbry-interface-poster.jpg"
            playsinline
            style="display: block; margin-right: auto; margin-left: auto; max-width: 700px; "
          >
            <source src="https://spee.ch/b/2019-09-lbry-interface-webm-2.webm" type="video/webm"/>
            <source src="https://spee.ch/0/2019-09-lbry-interface-mp4-2.mp4" type="video/mp4"/>
          </video>
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
