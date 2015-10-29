<?php Response::setMetaImage('http://lbry.io/img/cover-team.jpg') ?>
<?php Response::setMetaDescription('LBRY is founded by a team passionate about connecting producers and consumers and breaking down broken models. Learn more about them.') ?>

<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>About Us</h1>
  </div>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/cover-team.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content">
        <blockquote class="blockquote-large">
          <p>Working with LBRY is a chance to align philosophy and profit.</p>
        </blockquote>
        <cite>Mike Vine <em>Technology Evangelist</em></cite>
      </div>
    </div>
  </div>
  <div class="content photo-grid spacer2">
    <h2>The Team</h2>
    <div class="row-fluid">
    <div class="span6  spacer2">
      <div class="photo-container">
        <img src="/img/jeremy-644x450.jpg" alt="photo of Jeremy Kauffman"/>
      </div>
        <h4>Jeremy Kauffman <a href="mailto:jeremy@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
        <div class="meta  spacer1">Founder, Director</div>
        <p>
          Because graduating from RPI with degrees in physics and computer science is the hip thing to do, Jeremy did the same. Jeremy is also the founder and CEO of <a href="//usetopscore.com" class="link-primary">TopScore</a>, a startup that processes millions of dollars monthly in event and activity registrations.
        </p>
        <p>
           Jeremy has been responsible for the packing, presentation, and strategy of LBRY, as well as some design aspects. Jeremy is a longtime BitTorrent community enthusiast.
        </p>
      </div>
      <div class="span6  spacer2">
        <div class="photo-container">
              <img src="/img/jimmy-644x450.jpg" alt="photo of Jimmy Kiselak"/>
        </div>
        <h4>
          Jimmy Kiselak
          <a href="mailto:jimmy@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a>
        </h4>
        <div class="meta spacer1">Founder, Developer</div>
        <p>
          After graduating from RPI with a degree in physics and computer science, Jimmy found himself mired in government bureaucracy, spending too much time to get too little done. Jimmy has been a Bitcoin fanatic since its early days as well as long been interested in the benefits of decentralization.
        </p>
        <p>
          Ready to work on a project he believed in, Jimmy quit his national security job to start LBRY several months ago. Jimmy created the LBRY protocol and the first LBRY application.
        </p>
      </div>

    </div>
    <div class="row-fluid">
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/mike-644x450.jpg" alt="photo of Mike Vine"/>
        </div>
         <h4>Mike Vine <a href="mailto:mike@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">Technology Evangelist</div>
          <p>
            With a humble BA in Philosophy from Tulane University, Mike has built a successful financial services marketing company, Centinel Consulting. Centinel recently built a client’s website from 20K visitors per month to 150K, and manages email marketing lists and social media accounts with hundreds of thousands of followers.
          </p>
          <p>
            Mike has been involved with the Bitcoin community since the early days. His friends have launched companies like Lamassu BTM, Coinapult, and Shapeshift. Now, he wants a turn to help change the world by harnessing blockchain technology. Mike heads up LBRY’s marketing efforts and serves as an ambassador for our platform to media, investors, and the public.
          </p>
      </div>
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/stephan-644x450.jpg" alt="Photo of Stephan Kinsella"/>
        </div>
          <h4>Stephan Kinsella</h4>
          <div class="meta  spacer1">Advisor, Legal</div>
          <p>
            Stephan is a registered patent attorney in Houston and a former partner in the Intellectual Property Practice Group of Duane Morris LLP
            and General Counsel for Applied Optoelectronics, Inc. He has over twenty years’ law firm and in-house experience in patent, IP, 
            and general commercial and corporate law. Stephan has published numerous articles and books on IP law and legal topics including 
            <a href="http://www.amazon.com/International-Investment-Political-Dispute-Resolution/dp/0379215225" class="link-primary">
              International Investment, Political Risk, and Dispute Resolution: A Practitioner’s Guide
            </a>  (Oxford University Press, 2005)
            and 
            <a href="https://mises.org/library/against-intellectual-property-0" class="link-primary">
              Against Intellectual Property
            </a>  (Mises Institute, 2008). 
          </p>
          <p> 
            He received an LL.M. in international business law from King’s College London, a JD from the Paul M. Hebert Law Center at LSU, 
            and BSEE and MSEE degrees from LSU. His websites are <a href="stephankinsella.com" class="link-primary">stephankinsella.com</a>
            and <a href="kinsellalaw.com" class="link-primary">kinsellalaw.com</a>
          </p>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span3"></div>
      <div class="span6">
        <img src="/img/spooner-644x450.jpg" alt="photo of you!"/>
        <h4>You</h4>
          <div class="meta  spacer1">Developer, Designer, Economist, Marketer, Investor, ???</div>
          <p>
            Do you think opening up information would facilitate human flourishing?
            Do you want to join a bright core of people with an obsession for upending broken systems?
            <a href="mailto:jeremy@lbry.io" class="link-primary">Say hello.</a>

          </p>
      </div>
    </div>
  </div>
  <div class="content text-center spacer2">
    <h3>Not Ready to Get Serious?</h3>
    <p>Join our mailing list for updates about LBRY.</p>
      <?php echo View::render('mail/joinList', [
          'submitLabel' => 'Subscribe',
          'listId' => Mailchimp::LIST_GENERAL_ID
      ]) ?>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
