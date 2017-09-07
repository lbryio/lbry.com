<?php Response::setMetaDescription('Join Us') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <section class="post-content">

    <div class="content">
      <h1>Help Us Create Content Freedom</h1>

      <p>
        Changing the landscape of content distribution is no easy task. LBRY is growing rapidly, and we're always looking for great people
        to join us. If you're looking for a challenging and rewarding pursuit, if you want to work with a team that shares your passion and
        curiosity, you've come to the right place.
      </p>

      <h2>About LBRY</h2>

      <p>
        LBRY is an unusual company in several ways:
      </p>

      <ul>
        <li>
          We understand the importance of <a href="http://blog.deliveringhappiness.com/the-motivation-trifecta-autonomy-mastery-and-purpose">autonomy, mastery, and purpose</a>.
        </li>
        <li>
          We judge you entirely by what you produce. We don’t care how long you work, where you work, how you work or what credentials you
          have. We care about what you get done.
        </li>
        <li>
          We are extremely transparent, flat, and open-minded. While you will have clearly delineated responsibilities, you are welcome and
          encouraged to contribute beyond those areas. We judge ideas and results, not ranks and titles.
        </li>
        <li>
          <a href="/team">Everyone here</a> is from Lake Wobegon. Great results can only come from great people. If you’re interested in
          working with people who are exceptionally bright, creative, and diligent, LBRY is a strong choice.
        </li>
      </ul>

      <h2>Who We're Looking For</h2>

      <p>
        There's no one kind of LBRYian. We value people who can bring new perspectives to our team. Here are some traits that are important to us:
      </p>

      <ul>
        <li>
          Ability to solve complex problems in simple ways. LBRY has many moving parts, but we try our hardest to power it with simple code.
          Your job is not just to solve problems, but to solve problems in a way that will last and can easily be picked up by other people.
        </li>
        <li>
          Knack for user experience and design. Our user base ranges from casual web surfers to cryptonerd power users. You'll need an ability to
          understand how to create solutions that work for both.
        </li>
        <li>
          Reliable and independent. We expect a lot out of you, but we won't keep tabs on you. You must thrive in that kind of environment.
        </li>
        <li>
          No degree, credential, or age requirements. If you can do the work, we don't care how you got the skills.
        </li>
      </ul>

      <h2>Available Positions</h2>

      <p>
        Send your resume/LinkedIn profile and examples of your previous work to <a href="mailto:joinus@lbry.io">joinus@lbry.io</a>.
      </p>

      <h4>Backend Developer</h4>

      <p>
        We're seeking a developer to work on the core LBRY platform. As our network multiplies in size, we need to keep it working smoothly.
        You'll be working on the LBRY <strong>protocol</strong> and <strong>DHT</strong>, so experience with <strong>distributed systems</strong>
        is a plus. Our code is primarily in <strong>Python</strong> and uses the <strong>Twisted</strong> framework.
      </p>

      <h4>API Developer</h4>

      <p>
        Do you have strong opinions on API design? Know when to use a 303, and when a 307 is more appropriate? This is the perfect role for you.
        Our current stack includes <strong>Go</strong>, <strong>SQL</strong>, and the <strong>AWS</strong> platform,
      </p>

      <h4>Frontend Developer</h4>

      <p>
        Much of the LBRY's innovations happen under the hood, but the real magic comes from sparing the end-user the details. Our app provides
        a simple, intuitive way to interact with LBRY, without requiring any knowledge of blockchains or DHTs. We use a modern
        <strong>React</strong> UI stack, with <strong>Electron</strong> to help abstract the OS. If your passion is a clean interface and
        a delightful user experience, holler at us.
      </p>

      <h2>Other Work</h2>

      <p>
        Interested in contributing but not ready for commitment? We have several <a href="/bounty">smaller projects</a> available for anyone
        who wants to do them. We also have a <a href="/faq/contributing">guide for contributors</a> to help you find other ways to get
        involved. If none of that suits your fancy, join our <a href="https://slack.lbry.io">Slack channel</a> we'll help you find something
        you'll love.
      </p>

    </div>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
