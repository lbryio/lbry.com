<?php Response::setMetaDescription(__('description.get'))  ?>
<?php Response::addJsAsset('https://cdn.optimizely.com/js/9525271075.js') ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/lbry-ui.png') ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span12">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1><?php echo __('download.for-os', ['%os%' => $osTitle]) ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadUrl): ?>
        <p>
          This is the latest version of the LBRY App.
        </p>
        <p>
          <strong>{{download.beta}}</strong>
          {{download.curse}}
        </p>
        <div class="text-center">
          <p>
            <a class="btn-alt btn-large"
               download
               href="<?php echo $downloadUrl ?>"
               data-facebook-track="1"
               data-analytics-category="Sign Up"
               data-analytics-action="Download"
               data-analytics-label="<?php echo $analyticsLabel ?>"
            ><?php echo $buttonLabel ?></a>
            <br/>
            <span class="meta">
              <?php echo $version ?>,
              <?php echo number_format($size, 1) ?>MB,
              built on <?php echo date('F d', $releaseTimestamp) ?>
              at <?php echo date('H:i:s', $releaseTimestamp) ?>
            </span>
          </p>
          <div class="meta">
            <?php if ($os === OS::OS_LINUX): ?>
              {{download.works}}
            <?php endif ?>
            Like source code? Go <a href="https://github.com/lbryio/lbry-app" class="link-primary">here</a>.<P><P>
            <img src="https://spee.ch/5a3e08d52dd2d7cb1c63a480b45dea8b4679cf01/lbryget-gif-mastertest.gif" />
                <?php echo View::render('download/_list', [
                  'excludeOs' => $os
                ]) ?>
                <?php echo View::render('download/_social') ?>
          </div>
        </div>
      <?php else: ?>
        <p>{{download.unavailable}}</p>
        <?php echo View::render('download/_signup') ?>
      <?php endif ?>
    </div>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>
