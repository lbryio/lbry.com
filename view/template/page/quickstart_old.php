<?php NavActions::setNavUri('/learn') ?>
<?php Response::setMetaDescription('Be up and running with the LBRY API in just a few minutes.') ?>
<?php Response::setMetaTitle('LBRY Quickstart') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
<main class="cover-stretch-wrap">
  <div class="cover cover-center cover-dark cover-dark-grad">
    <div class="content content-dark content-readable">
    <h1>Set Up</h1>
    <p>This step-by-step guide will have you running LBRY and interacting with the API in just a few minutes.</p>
    <p>This guide is for programmers and other technical users. For consumer usage of LBRY, please <a href="/get" class="link-primary">go here</a>.</p>
    <h3>What's Covered</h3>
    <ol class="table-of-contents">
      <li><a href="#installation" class="link-primary">Installation</a></li>
      <li><a href="#running-lbry" class="link-primary">Running LBRY</a></li>
      <li><a href="#api" class="link-primary">The API</a></li>
      <li><a href="#credits" class="link-primary">Credits</a></li>
      <li><a href="#community" class="link-primary">Community & Issues</a></li>
    </ol>
    <section>
      <h3 id="installation">1. Installation</h3>
      <p>The easiest way to install LBRY is to use a pre-packaged binary. We provide binaries for Windows, macOS, and Debian-based Linux.</p>
      <table class="content">
        <thead>
          <tr>
            <th>macOS <span class="icon-apple"></span></th>
            <th>Linux <span class="icon-linux"></span></th>
            <th>Windows <span class="icon-windows"></span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="https://lbry.io/get/lbry.dmg">Download DMG</a></td>
            <td><a href="https://lbry.io/get/lbry.deb">Download DEB</a></td>
            <td><a href="https://lbry.io/get/lbry.msi">Download MSI</a></td>
          </tr>
        </tbody>
      </table>
      <p>
        If you prefer to compile from source or are not on one of the above operating systems, follow
        <a class="link-primary" href="https://github.com/lbryio/lbry/blob/master/INSTALL.md">this guide</a>.
      </p>
    </section>
    <section>
      <h3 id="running-lbry">2. Running LBRY</h3>
      <p>
        Launch the deamon to run as a background process:
      </p>
      <p>
        <code class="code-bash"><span class="code-bash__prompt">$</span>lbrynet-daemon</code>
      </p>
      <p>The first time you run the daemon, it must catch-up with most recent blockheaders. This can take several minutes.</p>
      <div class="meta">macOS and Windows do not currently bundle the daemon separately. Just launch the full app and the API will still be available. This will be resolved in v0.9.</div>
    </section>
    <section>
      
    <section>
     

  </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
