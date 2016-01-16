<?php Response::setMetaDescription('Download/install the latest version of LBRY for Linux.') ?>
<?php ob_start() ?>
  <h1>Install LBRY on Linux <span class="icon-linux"></span></h1>
  <?php echo View::render('get/alphaNotice') ?>
  <div class="meta spacer1 text-center">Choose an install option.</div>
  <div class="row-fluid">
    <div class="span6">
      <h3>For the Efficient and Lazy</h3>
      <ol>
        <li>Open the terminal.</li>
        <li>Go to the directory you want to install in. If you're unsure, run <code>cd ~</code>.</li>
        <li>
          <p>Copy and paste.</p>
          <div class="code-bash">
            <code><span class="code-bash-kw2">mkdir</span> -p lbry</code>
            <code><span class="code-bash-kw1">cd</span> lbry</code>
            <code><span class="code-bash-kw2">wget</span> http:<span class="sy0">//</span>lbry.io<span class="sy0">/</span>dl<span class="sy0">/</span>lbry_setup.sh</code>
            <code><span class="code-bash-kw2">bash lbry_setup.sh</span></code>
            <code><span class="code-bash-kw1">lbrynet-console</span></code>
          </div>
        </li>
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
