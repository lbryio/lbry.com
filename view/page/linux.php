<?php Response::setMetaDescription('Download/install the latest version of LBRY for Linux.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on Linux <span class="icon-linux"></span></h1>
  <?php echo View::render('get/alphaNotice') ?>
  <div class="meta spacer1 text-center">Choose an install option.</div>
  <div class="row-fluid">
    <div class="span6">
      <h3>For the Efficient and Lazy</h3>
      <ol>
        <li><code>(mkdir lbry; cd lbry; wget https://raw.githubusercontent.com/lbryio/lbry-setup/master/lbry_setup.sh; chmod 755 lbry_setup.sh; ./lbry_setup.sh; bin/lbry/lbrycrdd -server -daemon)</code></li>
      </ol>
    </div>
    <div class="span6">
      <h3>For the Shrewd and Frivolous</h3>
      <ol>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbrycrd" class="link-primary">lbrycrd</a>, a miner for LBRY credits.</li>
        <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbry"  class="link-primary">lbry</a>, a console based application for using the LBRY protocol.</li>
      </ol>
    </div>
  </div>
<?php $html = ob_get_clean() ?>
<?php echo View::render('get/get-shared', ['installHtml' => $html]) ?>
