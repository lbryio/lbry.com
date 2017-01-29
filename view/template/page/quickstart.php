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
      <li><a href="#api-basics" class="link-primary">API Basics</a></li>
      <li><a href="#credits" class="link-primary">Credits</a></li>
      <li><a href="#start-building" class="link-primary">Start Building</a></li>
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
      <h3 id="api-basics">3. API Basics</h3>
      <p>
        When running, the LBRY daemon provides a JSON-RPC server running at <code>https://localhost:5279/lbryapi</code>.
      </p>
      <p>
        It can be accessed via cURL or any other utility capable of making HTTPS GET and POST requests.
      </p>
      <p>
        To verify the LBRY daemon is running correctly and responding to requests, run:
      </p>
      <p>
        <code>
          curl --data "{ method: 'status' }" http://localhost:5279/lbryapi
        </code>
      </p>
      <p>
        You should receive a response like:
      </p>
      <p>
        <code>
          (will copy/paste once it works)
        </code>
      </p>
      <p>This makes it easy to interact with the LBRY API in the programming language of your choice.</p>
    </section>
    <section>
      <h3 id="credits">4. Getting Credits</h3>
      <p>Many actions, such as publishing or purchasing paid content, require credits.</p>
      <p>To receive credits, first generate a wallet address:</p>
      <p>
        <code>
          curl --data "{ method: 'wallet_new_address' }" http://localhost:5279/lbryapi<br/>
          I am a response
        </code>
      </p>
      <p>Use this address to get credits in one of two ways:</p>
      <div class="row-fluid">
        <div class="span6">
          <h4>4a) Get Credits For Free</h4>
          <p>
            All developers are eligible to receive <?php echo AcquisitionActions::DEVELOPER_REWARD ?> free credits.
            <a href="/credits-for-developers" class="link-primary">Go here</a> to claim them.</a>
          </p>
        </div>
        <div class="span6">
          <h4>4b) Purchase Credits</h4>
          <p>
            Credits can be bought on a variety of exchanges.
            Go <a href="https://lbry.io/faq/exchanges" class="link-primary">here</a> to see a full list.
            After purchasing them, send them to the address generated above.
          </p>
        </div>
      </div>
    </section>
    <section>
      <h3 id="community">6. Community & Issues</h3>
      <p>
        <a href="http://slack.lbry.io" class="link-primary">Join our Slack Channel</a> to interact with LBRY developers and other community members. Please visit the #dev room (this is not a default channel).
      </p>
      <p>
        Visit our <a href="https://github.com/lbryio" class="link-primary">GitHub</a> to view the source code or report issues.
      </p>
    </section>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>