<?php Response::setMetaDescription('Download/install the latest version of LBRY for Linux.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on Linux <span class="icon-linux"></span></h1>
  <?php echo View::render('get/alphaNotice') ?>
  <div class="meta text-center">Choose your install level.</div>
  <div class="row-fluid">
    <div class="span6">
      <h3>Casuals</h3>
      <p>
        <a class="btn-primary" download href="//lbry.io/lbry-linux-latest.deb">Download .deb</a>
      </p>
    </div>
    <div class="span6">
      <h3><strike>Masochists</strike> Professionals</h3>
      <ol>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbryum" class="link-primary">lbryum</a>, a lightweight client for LBRY.</li>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbry"  class="link-primary">lbry</a>, a console based application for using the LBRY protocol.</li>
      </ol>
    </div>
  </div>
<?php $html = ob_get_clean() ?>
<?php echo View::render('get/getSharedApp', ['installHtml' => $html]) ?>
