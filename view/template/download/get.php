<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1><?php echo __('download.for-os', ['%os%' => $osTitle]) ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadUrl): ?>
        <p>
          Securely download the LBRY app here, and see what all the fuss is about!
        </p>
        <p>
        </p>
        <div class="text-center">
          <?php $metaHtml = $os !== OS::OS_ANDROID ? View::Render('download/_meta') : false ?>
          <div class="<?php echo $metaHtml ? 'spacer-half' : 'spacer1' ?>">
            <?php echo View::Render('download/_downloadButton', [
                'buttonStyle' => 'alt'
            ])?>
          </div>
          <?php if ($metaHtml): ?>
            <div class="spacer1">
              <?php echo $metaHtml ?>
            </div>
          <?php endif ?>
          <img src="<?php echo $osScreenshotSrc ?>" />
        </div>
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
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', ['excludeOs' => $os]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>
