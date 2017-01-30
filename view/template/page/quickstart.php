<?php NavActions::setNavUri('/learn') ?>
<?php Response::setMetaDescription('Be up and running with the LBRY API in just a few minutes.') ?>
<?php Response::setMetaTitle('LBRY Quickstart') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
<main class="content content-light markdown">
    <h1>Quickstart</h1>
    <p>This step-by-step guide will have running LBRY and interacting with the API in just a few minutes.</p>
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
        <code>
          lbrynet-daemon --no-launch
        </code>
      </p>
      <p>The first time you run the daemon, it must catch-up with most recent blockheaders. This can take several minutes.</p>
    </section>
    <section>
      <h3 id="api">3. The API</h3>
      <p>
        When running, the LBRY daemon provides a JSON-RPC server running at <code>https://localhost:5279/lbryapi</code>.
      </p>
      <p>
        It can be accessed via cURL or any other utility capable of making HTTPS GET and POST requests.
      </p>
      <p>
        To verify the LBRY daemon is running correctly and responding to requests, run:
      </p>
      <pre><code>curl --data "{ method: 'status' }" http://localhost:5279/lbryapi
(add response when this works)</code></pre>
      <p>This makes it easy to interact with the LBRY API in the programming language of your choice. Here's another example:</p>
      <pre><code>curl --data "{ method: 'resolve_name', params: [{ name: "what"}] }" http://localhost:5279/lbryapi
(add response when this works)</code></pre>
      <p>LBRY can be used to build everything from a censorship-proof image host, to a store for 3D printing files, to distribute large files or datasets, or use cases even we can't imagine!</p>
      <p><a class="btn-alt" href="http://lbryio.github.io/lbry/api/">View Full API Documentation</a></p>
    </section>
    <section>
      <h3 id="credits">4. Getting Credits</h3>
      <p>Many actions, such as reserving a name or purchasing paid content, require credits.</p>
      <p>To receive credits, first generate a wallet address:</p>
      <pre><code>curl --data "{ method: 'wallet_new_address' }" http://localhost:5279/lbryapi
I am a response</code></pre>
      <p>Use this address to get credits in one of two ways:</p>
      <div class="row-fluid">
        <div class="span6">
          <h4>4a) Receive Free Credits</h4>
          <p>
            All developers with a valid GitHub account are eligible to receive <?php echo AcquisitionActions::DEVELOPER_REWARD ?> free credits.
          </p>
          <a href="/developer-program" class="btn-alt">Claim Your Free Credits</a>
        </div>
        <div class="span6">
          <h4>4b) Purchase Credits</h4>
          <p>
            Credits can be bought on <a href="https://lbry.io/faq/exchanges" class="link-primary">a variety of exchanges</a>.
            After purchasing, send them to the address generated above.
          </p>
        </div>
      </div>
    </section>
    <section>
      <h3 id="community">5. Community & Issues</h3>
      <p>
        <a href="http://slack.lbry.io" class="link-primary">Join our Slack Channel</a> to interact with LBRY developers and other community members. Please visit the #dev room (note: this is not a default channel).
      </p>
      <p>
        Visit our <a href="https://github.com/lbryio" class="link-primary">GitHub page</a> to view the source code or report issues.
      </p>
    </section>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>