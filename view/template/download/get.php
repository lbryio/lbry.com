<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1><?php echo __('download.for-os', ['%os%' => $osTitle]) ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <p>
          This is a browser and wallet for the LBRY network.
          <a href="https://lbry.io/faq/what-is-lbry" class="link-primary">What is LBRY?</a>
        </p>
        <p>
          <strong>{{download.beta}}</strong>
          {{download.curse}}
        </p>
        <?php echo $downloadHtml ?>
      <?php else: ?>
        <p>{{download.unavailable}}</p>
        <?php echo View::render('download/_signup') ?>
      <?php endif ?>
    </div>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
    'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>