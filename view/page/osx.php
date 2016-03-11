<?php Response::setMetaDescription('Download/install the latest version of LBRY for OS X.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on OS X <span class="icon-apple"></span> (command line)</h1>
  <?php echo View::render('get/alphaNotice') ?>
  <p>
    <a class="btn-primary" href="//lbry.io/osx.dmg">Download for OS X</a>
  </p>
  <p class="meta">Or, view the source and compile instructions on
    <a href="https://github.com/lbryio/lbry-setup/blob/master/README_OSX.md" class="link-primary">GitHub</a>.
  </p>
<?php $html = ob_get_clean() ?>
<?php echo View::render('get/get-shared', ['installHtml' => $html]) ?>