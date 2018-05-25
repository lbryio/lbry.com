<?php Response::setMetaDescription(__('description.3d-contest')) ?>
<?php Response::setMetaTitle(__('title.3d-contest')) ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>

<main>
  <div class="cover cover-dark cover-center cover-full cover--dark-overlay" style="background-image: url(https://spee.ch/3/genius-chess-printed.jpeg)">
    <div class="content content-dark text-center">
      <h1 class="cover-title cover-title-tile cover-item--outline">
        3D Chess Design Contest
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
      <h3>Are you a 3D designer?</h3>
      <h4>Design a chess set that sparks our imagination & win $100 in cryptocurrency.</h4>
      <h3>
        <img src="https://spee.ch/6/3D-chess-awards-Submission-DEadlinre.jpeg" alt=3D-Chess-Contest-Image style="width:650px;">
      <h3>I'm game. How do I enter?</h3>
      <div>
      <p>Upload your chess set design (use a zip folder for multiple files) in either STL or OBJ format to the LBRY (library) network. Once finished, email the lbry:// address (automatically recieve 10 Library Credits for your first upload) to <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> by July 4th.<p>
      </div>
      <p>You can <a href="/get?src=FA">download the LBRY app here.</a> If you have any questions or need help, <a href="http://chat.lbry.io">join our Discord community.</a></p>
<div class="text-center spacer1"><a href="/get?src=FA" class="btn-primary btn-large">Get LBRY App</a></div>
    </div>
    <body align="center">
    <h3><strong>Open the app &amp; click a set to download.</strong></h3>
    <h3><strong>GET PAID</strong> to upload <strong>AND/OR</strong> print!</h3>
       <a href="https://open.lbry.io/geniuschess"> <img style="padding:20px;" src="https://spee.ch/e/Grey-Genius-Chess.jpeg" alt="Grey Genius Chess Set" title="Grey Genius Chess Set" width="500px"></a>
       <a href="https://open.lbry.io/geniuschess"> <img style="padding:20px;" src="https://spee.ch/0/White-Genius-Chess.jpeg" alt="White Genius Chess Set" title="White Genius Chess Set" width="500px"></a>
       <div>
         <h4>Genius Chess Sets with Lightbulb Pawns</h4>
         <p>Set A (Gray): Socrates King, Aristotle Queen, Goethe Bishops, Plato Knights, Edison Rooks</p>
         <p>Set B (White): Einstein King, da Vinci Queen, Franklin Bishops, Darwin Knights, Tesla Rooks</p>
       </div>
       <a href="https://open.lbry.io/cryptocurrencychess"> <img style="padding:20px;" src="https://spee.ch/3/Gold-Crypto-Chess2.jpeg" alt="Cryptocurrency Chess Set" title="Cryptocurrency Chess Set" width="500px"></a>
       <a href="https://open.lbry.io/cryptocurrencychessnonmineable"> <img style="padding:20px;" src="https://spee.ch/d/Blue-Crypto-Chess.jpeg" alt="Cryptocurrency Chess Set Non-mineable" title="Cryptocurrency Chess Set Non-mineable" width="500px"></a>
       <div>
         <h4>Cryptocurrency Chess Sets with U.S. Dollar Pawns</h4>
         <p>Set A (Gold): Bitcoin King, Ethereum Queen, Dash Bishops, Litecoin Knights, Monero Rooks</p>
         <p>Set B (Blue): Ripple King, EOS Queen, IOTA Bishops, Stellar Knights, NEO Rooks</p>
       </div>
  </div>
  <div class="content content-light content-readable">
    <h3><strong>GET PAID!</strong></h3>
    <p>Send the lbry:// address of your first LBRY upload to <a href="mailto:james@lbry.io" class="link-primary"><span class="btn-label">james@lbry.io</span></a> <strong>& receive 10 Library Credits on us.</strong>
    <div>
      Print out a LBRY chess set from above and <strong>get paid 10 more Library Credits!</strong> Details attached to the files.</p>
    </div>
    <h3>Looking for more exclusive content?</h3>
    <p>Enter your email below and we'll send you updates on new releases from the best content creators.</p>
    <?php echo View::render('mail/_subscribeForm', [
      'tag' => '3d-contest',
      'submitLabel' => 'Sign me up',
      'hideDisclaimer' => true,
      'largeInput' => true,
      'btnClass' => 'btn-alt btn-large',
    ]) ?>
  </div>
</main>
