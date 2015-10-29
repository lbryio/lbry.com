<?php Response::setMetaDescription('Download/install the latest version of LBRY for OS X.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on OS X <span class="icon-apple"></span> (command line)</h1>
  <?php echo View::render('get/alphaNotice') ?>
  <p>We are preparing an installer for OS X, in the interim, the most current version of install instructions
    <a href="https://github.com/lbryio/lbry-setup/blob/master/README_OSX.md" class="link-primary">can be found on GitHub</a>.
  </p>
  <a class="btn-primary" href="https://github.com/lbryio/lbry-setup/blob/master/README_OSX.md">View OS X Install Instructions</a>
<?php $html = ob_get_clean() ?>
<?php echo View::render('get/get-shared', ['installHtml' => $html]) ?>