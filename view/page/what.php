<?php Response::setMetaDescription('Access information and content in ways you never dreamed possible. Earn credits for your unused bandwidth and diskspace.') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>What is LBRY?</h1>
  </div>
  <div class="hero hero-pattern spacer2">
    <div class="hero-content text-center">
      <h2 class="hero-title">A revolution in accessing and publishing information.</h2>
      <div class="row-fluid hero-tile-row">
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-money icon-mega"></span>
          </div>
          <h4>
            <strong>Hosts</strong> earn credits for providing bandwidth and disk space.
          </h4>
        </div>
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-mega icon-gears"></span>
          </div>
          <h4>
            <strong>Miners</strong> earn credits for securing balances and metadata.
          </h4>
        </div>
        <div class="span4 hero-tile">
          <div class="spacer1">
            <span class="icon-chain-broken icon-mega"></span>
          </div>
          <h4>
            <strong>Patrons</strong> spend credits to access content without gatekeepers.
          </h4>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="spacer2">
      <h3>Tell Me More</h3>
      <p>LBRY allows anyone to publish content to a location like this:</p>
      <p class="text-center"><code>lbry://wonderfullife</code></p>
      <p>Others can access this resource, either for free or for credits. Let's look at an example:</p>
      <ol>
        <li>Ernest wants to release his comedy-horror film, "Ernie Goes To Guantanamo Bay".</li>
        <li>The content is encrypted and sliced into many pieces. These pieces are stored by <strong>hosts</strong>.</li>
        <li>Ernest reserves <code>lbry://erniebythebay</code>, a shortname pointing to his content.</li>
        <li>When Ernest reserves the location, he also submits metadata, such as a description and thumbnail. This information is stored by <strong>miners</strong> in the LBRY blockchain.</li>
        <li>Hilary, a <strong>patron</strong>, browses the LBRY network and wants to watch the movie.
          Her LBRY client collects the pieces from the <strong>hosts</strong> and reassembles them.</li>
        <li>Hilary pays Ernest for the decryption key, allowing her to watch the film.</li>
      </ol>
    </div>
  </div>
  <div class="hero hero-pattern">
    <div class="hero-content">
      <h2 class="text-center hero-title">If BitTorrent + BitCoin Had a Baby</h2>
      <div class="row-fluid  hero-tile-row">
        <div class="span4 hero-tile">
          <span class="icon-mega icon-cloud"></span>
          <h3>Decentralized Metadata</h3>
          <p>Information about content is embedded in a blockchain, eliminating centralized failure points. Metadata and data are completely decoupled so that <strong>hosts</strong> never see metadata and <strong>miners</strong> never see data.</p>
        </div>
        <div class="span4 hero-tile">
          <span class="icon-mega icon-shopping-cart"></span>
          <h3>Marketized Data-Transfer</h3>
          <p><strong>Patrons</strong> request content for free or offer credits for faster speeds or access. <strong>Hosts</strong> share or sell  surplus bandwidth and disk space.</p>
        </div>
        <div class="span4 hero-tile">
          <span class="icon-mega icon-link"></span>
          <h3>Memorable URIs</h3>
          <p>
            <strong>Publishers</strong> can choose friendly resource indicators like <code>lbry://wonderfullife</code> instead of ugly BitTorrent magnet URIs.
            URIs are <em>reserved</em> rather than owned, creating strong incentive for rights holders to use LBRY.
          </p>
        </div>
      </div>
      <div class="row-fluid  hero-tile-row">
        <div class="span4 hero-tile">
          <span class="icon-mega icon-usd" style="font-size: 180px"></span>
          <h3>Payments to Publishers</h3>
          <p><strong>Publishers</strong> may embed an address to receive payment for data. Publishers can also create assurance contracts<sup><a href="//en.wikipedia.org/wiki/Assurance_contract">?</a></sup> for new content.</p>
        </div>
        <div class="span4 hero-tile">
          <span class="icon-mega icon-lock"></span>
          <h3>Improved Privacy</h3>
          <p>LBRY uses novel techniques to protect publishers, providers, and consumers.
            <strong>Hosts</strong> only have small portions of an encrypted file with no information of the contents.
          </p>
        </div>
        <div class="span4 hero-tile">
          <span class="icon-mega icon-code"></span>
          <h3>Designed for Developers</h3>
          <p>LBRY is designed to allow others to create applications powered by it’s distributed, robust data store.</p>
        </div>
      </div>
    </div>
  </div>
  <?php echo View::render('nav/learnFooter') ?>
</main>
<?php echo View::render('nav/footer') ?>
