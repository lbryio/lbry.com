<?php echo View::render('nav/header', ['isDark' => false]) ?>
<div class="content">
  <h1>Participate</h1>
  <p>
    While the LBRY revolution will be bloodless, we still need more boots on the ground.
    If you're talented, want to participate, and believe in the ideals of LBRY, <a href="mailto:jeremy@lbry.io" class="link-primary">email Jeremy</a>.
  </p>
</div>
<div class="hero hero-pattern spacer2">
  <div class="hero-content content content-dark">
    <h2 class="hero-title">The Team</h2>
    <div class="row-fluid spacer1">
      <div class="span3 text-center spacer1">
        <img src="/img/jimmy-headshot.jpg" alt="photo of jimmy"/>
      </div>
      <div class="span9">
        <h4>
          Jimmy Kiselak
          <a href="mailto:jimmy@lbry.io" class="control-item"><span class="icon icon-envelope"></span></a>
        </h4>
        <div class="meta spacer1">Founder, Developer</div>
        <p>
          After graduating from RPI with a degree in physics and computer science, Jimmy found himself
          mired in government bureaucracy, spending too much time to get too little done.
        </p>
        <p>
          A Bitcoin fanatic since it's early days, Jimmy has long been interested in the benefits of decentralization.
          Ready to work on a project he believed in, Jimmy quit his job to start LBRY and here we are!
        </p>
      </div>
    </div>
    <div class="row-fluid spacer1">
      <div class="span3 text-center spacer1">
        <img src="/img/jeremy200.png" alt="photo of Jeremy"/>
      </div>
      <div class="span9">
        <h4>Jeremy Kauffman <a href="mailto:jeremy@lbry.io" class="control-item"><span class="icon icon-envelope"></span></a></h4>
        <div class="meta  spacer1">Founder, Director</div>
        <p>
          Because graduating from RPI with degrees in physics and computer science is the hip thing to do, Jeremy did the same.
        </p>
        <p>
          Jeremy is the founder of <a href="//usetopscore.com">TopScore</a>, a startup that processes millions of dollars monthly in event and activity registrations.
          He is a longtime BitTorrent community enthusiast.
        </p>
      </div>
    </div>
    <div class="row-fluid spacer1">
      <div class="span3 text-center spacer1">
        <img src="/img/brandon200.jpg" alt="Photo of Brandon"/>
      </div>
      <div class="span9">
        <h4>Brandon Ross <a href="mailto:contact@bdrosslaw.com" class="control-item"><span class="icon icon-envelope"></span></a></h4>
        <div class="meta  spacer1">Legal, Advisor</div>
        <p>
          Despite not getting degrees in physics and computer science from RPI, Brandon managed to win the total degree count with ornately adorned parchment in math, economics, engineering, and law.
        </p>
        <p>
          Brandon is the founder of <a href="//bdrosslaw.com">B.D. Ross Law</a>, a law firm focusing on IP concerns.

          He is also an early mover in the <a href="https://freestateproject.org/">Free State Project</a>. Brandon regularly tells Jeremy and Jimmy that he had this idea years ago.
        </p>
      </div>
    </div>
    <div class="row-fluid spacer1" style="padding-bottom: 20px <?php /*fix me*/ ?>">
      <div class="span3 text-center spacer1">
        <img src="/img/mm.png" alt="photo of you!"/>
      </div>
      <div class="span9">
        <h4>You</h4>
        <div class="meta  spacer1">Developer, Designer, Economist, Marketer, Investor, ???</div>
        <p>
          Do you think opening up information would facilitate human flourishing?
          Do you want to join a bright core of people with an obsession for upending broken systems?
          <a href="mailto:jeremy@lbry.io">Say hello.</a>
        
        </p>
      </div>
    </div>
  </div>
</div>
<div class="content text-center spacer2">
  <h3>Not Ready to Get Serious?</h3>
  <p>Join our mailing list for updates about LBRY.</p>
    <?php echo View::render('mail/joinGeneralList', [
        'submitLabel' => 'Subscribe'
    ]) ?>
</div>
<?php echo View::render('nav/footer') ?>
