<?php Response::setMetaDescription(__('description.3d-printing')) ?>
<?php Response::setMetaTitle(__('title.3d-printing')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>

<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(/img/3d-crypto-accepted-here.jpg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        3D printing meets Bitcoin
      </h1>
      <h3 class="cover-item--outline">
      </h3>
      <div class="spacer1">
        <a href="#about" class="btn-primary btn-large">Tell Me More!</a>
      </div>
    </div>
  </div>
  <div class="cover cover-light" id="about">
    <div class="content content-light content-readable">
      <h3>Wanna earn cryptocurrency for your 3D files?</h3>
      <p>Now you can buy and sell files at <strong>any price</strong> or share your files for free &amp; earn <strong>microtips</strong>!</p>
      <p> Like Bitcoin, LBRY (library) uses blockchain technology, enabling you to
      earn without a bank or 3rd party.<p>
        <img src="https://spee.ch/9/BitcoinMeets3Dprinting-01.png" alt=Bitcoin-Meets-3D-Printing style="width:750px;">
      <h3>Sounds futuristic. How do I start earning?</h3>
      <p>You can <a href="/get?src=FA">download the LBRY app here.</a> If you have any questions or need help, <a href="http://chat.lbry.io">join our Discord community.</a></p>
<div class="text-center spacer1"><a href="/get?src=FA" class="btn-primary btn-large">Get LBRY App</a></div>
    </div>
    <body align="center">
    <h3><strong>Open the app &amp; click a sign to download.</strong></h3>
       <a href="https://open.lbry.io/bitcoinacceptedhere"> <img style="padding:20px;" src="https://spee.ch/e/bitcoin3d.jpeg" alt="Bitcoin Accepted Here" title="Bitcoin Accepted Here" width="500px"></a>
       <a href="https://open.lbry.io/EthereumAcceptedHere"> <img style="padding:20px;" src="https://spee.ch/e/ethereum3d.jpeg" alt="Ethereum Accepted Here" title="Ethereum Accepted Here" width="500px"></a>
       <a href="https://open.lbry.io/BitcoinCashacceptedhere"> <img style="padding:20px;" src="https://spee.ch/a/bitcoincash3d.jpeg" alt="Bitcoin-Cash Accepted Here" title="Bitcoin-Cash Accepted Here" width="500px"></a>
       <a href="https://open.lbry.io/MoneroAcceptedHere"> <img style="padding:20px;" src="https://spee.ch/3/monero3d.jpeg" alt="Monero Accepted Here" title="Monero Accepted Here" width="500px"></a>
       <a href="https://open.lbry.io/DashAcceptedHere"> <img style="padding:20px;" src="https://spee.ch/5/dassh3d.jpeg" alt="Dash Accepted Here" title="Dash Accepted Here" width="500px"></a>
       <a href="https://open.lbry.io/LBRYCreditsAcceptedHere"> <img style="padding:20px;" src="https://spee.ch/0/lbry3d.jpeg" alt="LBRY Accepted Here" title="LBRY Accepted Here" width="500px"></a>
  </div>
  <div class="content content-light content-readable">
    <h3>We want to see your first 3D upload!</h3>
    <p>Send the lbry:// address and your wallet address to <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> <strong>to receive 10 Library Credits on us.</strong></p>
    <h3>Looking for more exclusive content?</h3>
    <p>Enter your email below and we'll send you updates on new releases from the best content creators.</p>
    <div>
      <p>Email <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> if you think you've got what it takes to be a LBRY designer.</p>
    </div>
    <?php echo View::render('mail/_subscribeForm', [
      'tag' => '3d-printing',
      'submitLabel' => 'Sign me up',
      'hideDisclaimer' => true,
      'largeInput' => true,
      'btnClass' => 'btn-alt btn-large',
    ]) ?>
  </div>
</main>
