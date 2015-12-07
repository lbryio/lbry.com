<?php NavActions::setNavUri('/learn') ?>
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
          <p>LBRY is so simple your Grandma can use it. I’m ready to see blockchain technology become useful for regular people.</p>
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
        <img src="/img/jeremy-644x450.jpg" alt="photo of Jeremy Kauffman"/>-
      </div>
        <h4>Jeremy Kauffman <a href="mailto:jeremy@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
        <div class="meta  spacer1">Founder, Director</div>
        <p>
          Jeremy is the founder and CEO of <a href="//usetopscore.com" class="link-primary">TopScore</a>, a startup that
          processes millions of dollars monthly in event and activity registrations.
          Jeremy attended <a href="//rpi.edu" class="link-primary">Rensselaer Polytechnic Institute</a>, where he received degrees in physics and computer science.
        </p>
        <p>
          Jeremy knows how to build and scale a startup starting from day one. He knows how to deliver usable products and get those products in front of the right people.
        </p>
        <p>
          Jeremy is responsible for the packing, presentation, and strategy of LBRY, as well as some design aspects. He is a longtime BitTorrent community enthusiast.
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
          Because graduating from RPI with degrees in physics and computer science is the hip thing to do, Jimmy did the same.
          After, he found himself mired in government bureaucracy, spending too much time to get too little done.
        </p>
        <p>
          Ready to work on a project he believed in, Jimmy quit his national security job to start LBRY.
          Jimmy created the LBRY protocol and the first LBRY application.
        </p>
        <p>    
          Jimmy is a Bitcoin fanatic and has been since its early days. He has long been interested in the benefits of decentralization.
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
            With a humble BA in Philosophy from <a href="http://tulane.edu/" class="link-primary">Tulane University</a>, Mike has 
            built a successful financial services marketing company, <a href="http://www.centinel.net/" class="link-primary">Centinel Consulting</a>. 
            Centinel has helped clients grow from close to nothing to hundreds of thousands of visitors. He manages
            email marketing lists and social media accounts of the same size.
          </p>
          <p>
            Mike has been involved with the Bitcoin community since the early days. His friends have launched companies like 
            <a class="link-primary" href="//lamassu.is">Lamassu BTM</a>,
            <a class="link-primary" href="//coinapult.com">Coinapult</a>,
            <a class="link-primary" href="//shapeshift.io">Shapeshift</a>.
            Now, he wants a turn to help change the world by harnessing blockchain technology. 
            Mike heads up LBRY’s marketing efforts and serves as an ambassador for our platform to media, investors, and the public.
          </p>
      </div>
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/jack-robison-644x450.jpg" alt="photo of Jack Robison"/>
        </div>
         <h4>Jack Robison <a href="mailto:jack@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">Core Developer</div>
          <p>
            Jack's path to developer with LBRY is fairly typical:
            <a href="http://www.masslive.com/localbuzz/index.ssf/2009/06/actionreaction_how_one_teens_c.html" class="link-primary">
              face sixty years in prison for innocent chemistry experiments</a>; lose interest in chemistry;
            <a href="https://www.youtube.com/watch?v=dXZi4UZjiiI&t=10" class="link-primary">program insane electric guitars for Kiss</a>;
            decide to revolutionize the internet.
          </p>
          <p>
            Jack was one of the first people to discover LBRY and took to it so fast he may understand more 
            about it than anyone.
          <p>
            Jack has Asperger's Syndrome and is actively involved in the autism community. He was a regular on Wrong Planet's 
            <a href="https://www.youtube.com/user/theWrongPlanet" class="link-primary">Autism Talk TV</a>, has appeared on
            <em>National Public Radio</em>, the <em>New York Times</em>, and presents around the country.
          </p>
      </div>
    </div>
    <h2>Advisory Team</h2>
    <div class="row-fluid">
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/alex-tabarrok-644x450.jpg" alt="Photo of Alex Tabarrok"/>
        </div>
        <h4>Alex Tabarrok</h4>
        <div class="meta  spacer1">Advisor, Economics</div>
        <p>Alex Tabarrok is Bartley J. Madden Chair in Economics at the <a href="http://mercatus.org/" class="link-primary">Mercatus Center</a> 
          and a professor of economics at <a href="//gmu.edu" class="link-primary">George Mason University</a>. He specializes in intellectual property reform, the effectiveness of markets, and the justice system.
        </p>
        <p>Tabarrok is the coauthor, with Mercatus colleague Tyler Cowen, of the popular economics blog <a class="link-primary" href="http://www.marginalrevolution.com/"><em>Marginal Revolution</em></a> 
          and cofounder of the online educational platform <a class="link-primary" href="http://mruniversity.com/">Marginal Revolution University</a>. 
          He is the coauthor of 
          <em><a href="http://www.amazon.com/Modern-Principles-Economics-Tyler-Cowen/dp/1429239972" class="link-primary">Modern Principles of Economics</a></em>, 
          and author of the recent book
          <em><a href="http://www.amazon.com/Launching-The-Innovation-Renaissance-Market-ebook/dp/B006C1HX24" class="link-primary">Launching the Innovation Renaissance</em></a>. 
          His articles have appeared in the<em> New York Times</em>, the<em> Washington Post</em>, the<em> Wall Street Journal</em>, and many 
          other prestigious publications.
        </p> 
        <p>Tabarrok received his PhD in economics from 
          <a class="link-primary" href="http://en.wikipedia.org/wiki/George_Mason_University" title="George Mason University">George Mason University</a>.
        </p>
      </div>
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/stephan-644x450.jpg" alt="Photo of Stephan Kinsella"/>
        </div>
        <h4>Stephan Kinsella</h4>
        <div class="meta  spacer1">Advisor, Legal</div>
        <p>
          Stephan is a registered patent attorney and has over twenty years’ experience in patent, intellectual property, 
          and general commercial and corporate law. He is the founder and director of the <a href="http://c4sif.org/" class="link-primary">Center for the Study of Innovative Freedom</a>.
          Stephan has published numerous articles and books on intellectual property law and legal topics including 
          <a href="http://www.amazon.com/International-Investment-Political-Dispute-Resolution/dp/0379215225" class="link-primary">
            <em>International Investment, Political Risk, and Dispute Resolution: A Practitioner’s Guide</em>
          </a>
          and 
          <a href="https://mises.org/library/against-intellectual-property-0" class="link-primary">
            <em>Against Intellectual Property</em>
          </a>.
        </p>
        <p> 
          He received an LL.M. in international business law from <a href="http://www.kcl.ac.uk/" class="link-primary">King’s College London</a>, a JD from the Paul M. Hebert Law Center at 
          <a href="//lsu.edu" class="link-primary">Lousiana State University</a>, 
          as well as BSEE and MSEE degrees. His websites are <a href="stephankinsella.com" class="link-primary">stephankinsella.com</a>
          and <a href="kinsellalaw.com" class="link-primary">kinsellalaw.com</a>
        </p>
      </div>
    </div>
    <h2>Newest Member</h2>
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
  <?php echo View::render('nav/learnFooter') ?>
</main>
<?php echo View::render('nav/footer') ?>
