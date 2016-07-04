<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://lbry.io/img/xkcd-comic.png') ?>
<?php Response::setMetaDescription('Learn about the inspiration behind LBRY\'s revolutionary content distribution system.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/cover-jcole.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content">
        <blockquote>
          <p>If you made the music, and you made the art, and you put it into the world, I should be able to use it. I'ma pay you, I'ma give you a percentage, but... you was inspired by the world; allow the world to be inspired by your [work] and to use your [work].</p>
        </blockquote>
        <cite>J. Cole, <em><a href="https://www.youtube.com/watch?v=UMCGOAGb4Y0&amp;t=470s">Note to Self</a></em></cite>
      </div>
    </div>
  </div>
  <div class="content"><h1>Why?</h1></div>
  <div class="content spacer2">
    <h3>The World We Live In</h3>
    <p>Annual internet video traffic is approximately 500 exabytes (500,000,000,000 GB)<sup><a href="http://www.cisco.com/c/en/us/solutions/collateral/service-provider/ip-ngn-ip-next-generation-network/white_paper_c11-481360.html">1</a></sup>.
    Every second, over 10,000 hours of video are streamed.
    The technical term for the quantity of videos people watch every year is a million jillion. You know this.</p>

    <p>What you may not know: <em>video distribution is fundamentally flawed</em>.</p>
    <p>
      The fatal flaw of existing systems is their centralized, top-down design. The consequences:
    </p>
    <ol>
      <li><p><strong>Increased costs to consumers.</strong> Providers bear significant infrastructure costs, regulatory and compliance costs,
        and must create complex systems to govern a simple process (copying a number).</p></li>
      <li><p><strong>Terrible consumer experience.</strong>
          Centralization leads to fragmentation, as providers compete to lock numbers in digit dungeons.</p>
      </li>
      <li>
        <p><strong>Poor producer experience.</strong>
          The primary want of a producer is to be paid for making things. Instead, producers frequently lose control of their content and
          lose profits to the inefficiency of current systems.</p>
      </li>
    </ol>
    <p>Similar issues of economics and experience exist for consumers and producers of information of all kinds (e.g. news, facts), not just videos.</p>

    <p>LBRY solves these problems and throws in some other sweet innovations just for funsies.</p>
  </div>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/cover-swartz.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content">
        <blockquote>
          <p>Information is power.</p>
          <p>But like all power, there are those who want to keep it for themselves.
        </blockquote>
        <cite>Aaron Swartz</cite>
      </div>
    </div>
  </div>
  <div class="content spacer2">
    <h3>An Alternative</h3>
    <p>LBRY avoids the mistakes of centralization and middlemen. It says:</p>
    <ol>
      <li>
        <p>
          <strong>Information isn't a thing</strong>
          Things are physical and exist in the world. When I have a thing, you can't. Economists call this <em>rivalry</em><sup><a href="//en.wikipedia.org/wiki/Rivalry_%28economics%29">?</a></sup>.
        </p>
        <p>
          Information is non-rival. Information is just a number. There is nothing easier to replicate than information.
          LBRY embraces (and adores) this reality.
        </p>
        <p>
          LBRY breaks information into thousands of identifiable tiny pieces and spreads them throughout the internet, reducing costs
          for both providers and consumers.
        </p>
        <div class="spacer2">
          <img src="/img/xkcd-comic.png" alt="XKCD #1228 Prometheus"/>
          <div class="meta text-center"><a href="https://xkcd.com/1228/">XKCD #1228</a></div>
        </div>
      </li>
      <li>
        <p>
          <strong>Connecting creators and consumers directly is best.</strong>
          Do we need middlemen spending billions to extract their rent and police others?
          A better system allows consumers to easily and directly pay content creators.
          We want to eliminate extortionists charging tolls.
        </p>
        <p>
          On LBRY, publishers sell directly to patrons. Publishers can charge a set fee per decryption key for content or create an assurance contract for unpublished content.
        </p>
      </li>
      <li>
        <p><strong>It's Up to Us.</strong> A smart guy once said that power corrupts and absolute power corrupts absolutely.</p>
        <p>
          LBRY leaves no one in charge (including us). It puts power in the hands of individuals and users rather than corporations and executives.
        </p>
        <p>We think that world will be more creative, more charitable, and more fair. We hope you'll join us in creating it.</p>
      </li>

    </ol>
    <h3>What LBRY Isn't</h3>
    <p>LBRY's fully decentralized nature makes restricting content impossible. Since LBRY also aims to unseat gigantic, established media players,
      we fear it may attract undeserved legal attention. So we'd like to be clear from day one:</p>
    <p>
      <strong>LBRY is not about facilitating piracy.</strong>
      LBRY is about creating a network where creators and patrons can directly interact without relying on anyone in the middle. We've made choices
      about publisher identities and how addresses are reserved that are specifically designed to combat undue profiteering.</p>
  </div>
  <?php echo View::render('nav/learnFooter') ?>
</main>
<?php echo View::render('nav/footer') ?>
<?php /* It is inspired by Bitcoin, BitTorrent, and&nbsp;a comment by Julian Assange<sup><a class="link-primary" href="https://wikileaks.org/Transcript-Meeting-Assange-Schmidt.html#731">1</a></sup>.</p> */ ?>
