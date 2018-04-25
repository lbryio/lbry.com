<?php Response::setMetaDescription('Like contributing to digital freedom and making money? Why not both? LBRY is hiring!') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam/everyone.jpg') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <section class="post-content">

    <div class="content">
      <h1 id="join">Join Team Content Freedom</h1>

      <p>
        Changing the landscape of content distribution is no easy task. LBRY is growing rapidly, and we're always looking for great people
        to join us. If you're looking for a challenging and rewarding pursuit, if you want to work with a team that shares your passion and
        curiosity, you've come to the right place.
      </p>

      <img src="https://spee.ch/@lbryteam:6/everyone.jpg" alt="LBRY Team Photo from November 2017" />
      <div class="meta text-center spacer1">
        Fortunately, photo shoots are not a regular job activity.
      </div>

      <h2 id="about">About LBRY</h2>

      <p>
        Some things to know about working at LBRY:
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
          We are extremely transparent, organizationally flat, and open-minded. While you will have clearly delineated responsibilities, you are welcome and
          encouraged to contribute beyond those areas. We judge ideas and results, not ranks and titles.
        </li>
        <li>
          We believe great results can only come from great people. If you’re interested in
          working <a href="/team">alongside people</a> who are bright, creative, and diligent, this is the place.
        </li>
      </ul>

      <h2 id="looking">Who We're Looking For</h2>

      <p>
        There's no one kind of LBRYian. We value people who can bring new perspectives to our team. Here are some traits that are important to us:
      </p>

      <ul>
        <li>
          Ability to solve complex problems in simple ways. LBRY has many moving parts, but we try our hardest to power it with simple code.
          Your job is not just to solve problems, but to solve problems in a way that will last and can easily be picked up by other people.
        </li>
        <li>
          Knack for user-experience and user-perspective. Even if you're designing the guts of our DHT, what you create ultimately has to work for real people. Our user base ranges from casual
          web surfers to crypto-nerd power users and you'll need an ability to understand how to create solutions that work for both.
        </li>
        <li>
          Reliable and independent. We expect a lot out of you, but we won't keep tabs on you. You must thrive in that kind of environment.
        </li>
        <li>
          No degree, credential, or age requirements. If you can do the work, we don't care how you got the skills.
        </li>
        <li>
          Someone who appreciates that our CTO would <a href="https://gist.github.com/lyoshenka/0a43205aa9a072b196ff87e2c689a8b9">create this document</a> and then link it in a job posting.
        </li>
      </ul>


      <h2 id="positions">Positions</h2>
      <em>If a position is marked paused, you are still welcome to contact us. For blockchain, protocol, and application engineers, we will be hiring regularly throughout 2018.</em>
      <div>
        <?php /**
         * Jobs partial goes here! Previous job markup left below, can be deleted after ticket is finished.
         */ ?>
        <?php /*
        <h3 id="blockchain-engineer">Blockchain Engineer <span class="badge badge-primary">Active</span></h3>
        <p>
          This position involves working directly on the LBRY <a href="https://github.com/lbryio/lbrycrd">blockchain</a>, written in C++.
        </p>
        <p>
          Competence with cryptography, security, and networks is mandatory. Experience with blockchain is beneficial but not required.
        </p>
        <p>
          Blockchain work is like being a goalkeeper: good work goes under-appreciated, but mistakes are catastrophic. You must be the kind of masochist that enjoys this.
        </p>
        <h3 id="protocol-engineer">Protocol Engineers <span class="badge badge-info">Paused</span></h3>
        <p>
          The LBRY protocol consists of a <a href="https://lbry.io/api">set of APIs</a> provided via a daemon. This daemon is comprised of several sub-components, and interacts with the blockchain, wallet, and other remote daemons that constitute the LBRY data network.
        </p>
        <p>
          The LBRY <a href="https://github.com/lbryio/lbry">daemon</a> and <a href="https://github.com/lbryio/lbryum">wallet</a> are both written in Python, but maybe you're the one to rewrite them in Go (we're kidding) (probably).
        </p>
        <p>Competence with security, operating systems, and networks is mandatory. Experience with peer-to-peer technology is beneficial but not required.</p>

*/ ?>
      </div>
      <h2 id="applying">Applying</h2>
      <h4 id="how-to-apply">How To Apply</h4>
      <p>
        Contact <a href="mailto:joinus@lbry.io">joinus@lbry.io</a> if interested in a position. Please include the following:
      </p>
      <ol>
        <li>A resume, LinkedIn profile, or other resource that would serve as a work history.</li>
        <li>A code sample. Preferably a link to a public repository for a project you have built or significantly contributed to.</li>
        <li>One sentence about why you'd like to work for LBRY.</li>
      </ol>

      <h4 id="process">The Process</h4>
      <p>
        We use a 3-step hiring process:
      </p>
      <ol>
        <li>A brief (20-30 minute) non-technical, introductory phone call with either the CEO or CTO.</li>
        <li>
          <p>A compensated code contribution (4 hours minimum) on the repository you'd be working on.</p>
          <table class="full-table">
            <thead>
              <tr>
                <th>Project</th>
                <th>Position</th>
                <th>Issues</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="https://github.com/lbryio/lbry">lbry</a></td>
                <td>Protocol Engineer</td>
                <td><a href="https://github.com/lbryio/lbry/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
              </tr>
              <tr>
                <td><a href="https://github.com/lbryio/lbry-app">lbry-app</a></td>
                <td>Application or UX Engineer</td>
                <td><a href="https://github.com/lbryio/lbry-app/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
              </tr>
              <tr>
                <td><a href="https://github.com/lbryio/lbrycrd">lbrycrd</a></td>
                <td>Blockchain Engineer</td>
                <td><a href="https://github.com/lbryio/lbrycrd/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
              </tr>
              <tr>
                <td><a href="https://github.com/lbryio/lbry.io">lbry.io</a></td>
                <td>Web Developer</td>
                <td><a href="https://github.com/lbryio/lbry.io/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
              </tr>
            </tbody>
          </table>
          <p>
            We ask all potential full-time contributors to take on a potential issue on the project they'd be working on. Issues tagged "good first issue" are suitable for this purpose, though you are welcome to work on another issue or even something not filed at all.
          </p>
          <p>
            The issue you choose does not necessarily need to be fully completed, and we don't expect a perfect first contribution. Open a pull request as soon as you'd like any feedback from one of our developers. We compensate at or above market rates for all accepted pull requests.
          </p>
          <p>
            For questions or problems with a particular issue, please comment directly on the GitHub issue. For setup or environment trouble, open a separate issue. You can also join #dev in <a href="https://chat.lbry.io">our chat</a> to interact with other community members.
          </p>
        </li>
        <li>
          <p>A longer (1-2 hours) meeting with the team members you'd be working directly with, as well as the CEO and/or CTO.</p>
        </li>
      </ol>
      <p>Steps 1 and 2 may be completed in either order (i.e. you're welcome to try contributing before the introductory call).</p>

      <h2 id="referrals">Referrals</h2>
      <p>
        Know someone who'd be a great fit? Tell them about us, send them a link this page, or show up at their house unexpectedly with a
        box of candy and a persuasive pitch. If we hire them, we'll pay you $5,000. That's what we call a win-win.
      </p>

      <h2 id="other-work">Other Work</h2>
      <p>
        Interested in contributing but not ready for commitment? We have a <a href="/faq/contributing">guide for contributors</a> to help you find other ways to get
        involved. If none of that suits your fancy, join our <a href="https://chat.lbry.io">Discord chat</a> and we'll help you find something you'll love.
      </p>

    </div>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
