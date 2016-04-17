<?php Response::setMetaDescription('Download/install the latest version of LBRY for Linux.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on Linux <span class="icon-linux"></span></h1>
  <?php echo View::render('get/alphaNotice') ?>
  <div class="meta spacer1 text-center">Choose an install option.</div>
  <div class="row-fluid">
    <div class="span6">
      <h3>For the Efficient and Lazy</h3>
      <p>
        <a class="btn-primary" download href="//lbry.io/lbry-linux-latest.deb">Download</a>
      </p>
    </div>
    <div class="span6">
      <h3>For the Shrewd and Frivolous</h3>
      <ol>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbryum" class="link-primary">lbryum</a>, a lightweight client for LBRY.</li>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbry"  class="link-primary">lbry</a>, a console based application for using the LBRY protocol.</li>
      </ol>
    </div>
  </div>
<?php $html = ob_get_clean() ?>
<?php echo View::render('get/getSharedCli', ['installHtml' => $html]) ?>
