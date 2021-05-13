<?php Response::setMetaDescription('Like contributing to digital freedom or making money? Why not both! LBRY is hiring.') ?>
<?php Response::addMetaImage('https://spee.ch/@lbryteam:6/everyone.jpg') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(https://spee.ch/@lbryteam:6/everyone-apr-2018.jpg); background-position: center;">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>Join Team Content Freedom</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>Changing the landscape of content distribution is no easy task. LBRY is growing rapidly, and we're looking for great people to join us. If you want a challenging and rewarding pursuit on a team that shares your passion and curiosity, you've come to the right place.</p>

      <h2 id="about">About LBRY</h2>

      <p>Some things to know about working at LBRY:</p>

      <ul>
        <li>
          We value <a href="http://blog.deliveringhappiness.com/the-motivation-trifecta-autonomy-mastery-and-purpose">autonomy, mastery, and purpose</a>.
        </li>
        <li>
          We judge you by your work. We don't care about credentials, ranks, how long you work, or where you work from.
          We care about what you get done.
        </li>
        <li>
          We are extremely transparent, organizationally flat, and open-minded. There are no pure managers -- everyone's a doer.
          While you will have clear responsibilities, you're welcome to contribute at any level or area of the company.
        </li>
        <li>
          We believe great results come from great people.
          If you're interested in working <a href="/team">with a team of</a> bright, creative, and diligent people, this is the place.
        </li>
      </ul>

      <h2 id="looking">Who We're Looking For</h2>

      <p>There's no one kind of LBRYan. We value people who can bring new perspectives to our team. Here are some traits that are important to us:</p>

      <ul>
        <li>Ability to solve complex problems in simple ways. LBRY has many moving parts, but we try our hardest to power it with simple processes and code. Your job is not just to solve problems, but to solve problems in a way that will last and can easily be picked up by other people.</li>
        <li>Knack for user-experience and user-perspective. Whether you're meeting with creators or designing the guts of our DHT, what you do ultimately has to work for other people. Our user base ranges from casual viewers to crypto-nerd power users and you'll need an ability to understand how to create solutions for everyone.</li>
        <li>Thinking in tradeoffs. There are few one-sided answers in our work. How well can you navigate the <a href="https://cdixon.org/2014/03/16/theres-just-a-tremendous-amount-of-craftsmanship-in-between-a-great-idea-and-a-great-product">idea maze</a> of possibilities and competing priorites?</li>
        <li>Reliable and independent. We expect a lot out of you, but we won't keep tabs on you. You must thrive in that kind of environment.</li>
        <li>No degree, credential, or age requirements. If you can do the work, we don't care how you got the skills.</li>
        <li>For engineers, someone who appreciates that our CTO would <a href="https://grin.io/coding-maxims">create this document</a> and then link it in a job posting.</li>
      </ul>

      <h2 id="positions">Positions</h2>
      <?php echo View::render('content/_jobs') ?>

      <h2 id="applying">Hiring Process</h2>
      <p>Click "Apply" below any job listed above to begin the process. We use a 3-step hiring process:</p>

      <h3>1. Intro Call</h3>
      <p>
        A brief (30 minute max), non-technical, introductory phone call with either the CEO, CTO, CMO, and/or appropriate lead.
        We'll discuss what kind of work you want to do, what we're looking for, deal breakers on both sides, and any questions you have.
      </p>

      <h3>2. Code Contribution or Trial Task</h3>
      <p>Non-technical hires will be asked to complete a compensated trial task after they apply and complete step 1.</p>
      <p>Technical hires are required to complete a (compensated) code contribution to the repository they'd be working on.
        Issues tagged "good first issue" are suitable for this purpose, though you are welcome to work on another issue or even
        something that's not filed at all. You can work at your own pace -- there's no time limit. Successful candidates usually
        spend 4 to 16 hours doing this.</p>

      <p><strong>Steps 1 and 2 may be completed in either order</strong>. Engineers are welcome to contribute a pull request before the introductory call.</p>

      <table class="full-table">
        <thead>
          <tr>
            <th>Project(s)</th>
            <th>Position</th>
            <th>Issues</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td><a href="https://github.com/lbryio/lbrycrd">lbrycrd</a></td>
            <td>Blockchain Engineer</td>
            <td><a href="https://github.com/lbryio/lbrycrd/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
          </tr>

          <tr>
            <td>
              <a href="https://github.com/lbryio/lbry-sdk">lbry-sdk (client)</a>
            </td>
            <td>Protocol Engineer</td>
            <td><a href="https://github.com/lbryio/lbry-sdk/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
          </tr>

          <tr>
            <td>
              <a href="https://github.com/lbryio/lbry-desktop">lbry-desktop</a><br>
              <a href="https://github.com/lbryio/lbry-android">lbry-android</a>
              </ul>
            </td>
            <td>Application Engineer</td>
            <td><a href="https://github.com/lbryio/lbry-desktop/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
          </tr>

          <tr>
            <td>
              <a href="https://github.com/lbryio/lbrytv">lbrytv</a><br>
              <a href="https://github.com/lbryio/chainquery">chainquery</a>
            </td>
            <td>API Engineer</td>
            <td><a href="https://github.com/lbryio/lbrytv/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22">good first issues</a></td>
          </tr>

        </tbody>
      </table>

      <p>The issue you choose does not necessarily need to be fully completed, and we don't expect a perfect first contribution. Open a
        pull request as soon as you'd like any feedback from one of our developers. We offer cryptocurrency for accepted and good-faith attempts at a pull request.</p>

      <p>For questions or problems with a particular issue, please comment directly on the GitHub issue. For setup or environment trouble,
        open a separate issue or email the contact listed in the project <code>README</code>. You can also join
        <code>#developers</code> in <a href="https://chat.lbry.org">the chat</a> to interact with other community members.</p>

      <h3>3. Meet the Team</h3>

      <p>
        A longer meeting with the team members you'd be working directly with, as well as at least one of the CEO, CTO, or CMO.
        We'll go deeper into the specific role, how you can best fit with the team, and what expectations we have for each other.
        We may also ask you about your code contribution and your knowledge of key skills and technologies.
      </p>

      <p>
        After this we'll make a hiring decision.
      </p>

      <h2 id="benefits">Benefits</h2>
      <ul style="list-style-type: none">
        <li>💵 Competitive salary and equity.</li>
        <li>⚕️ Health insurance reimbursement.</li>
        <li>🕰️ Flexible work hours.</li>
        <li>🌴 Take as much time off as you want.</li>
        <li>💻 Work-related expenses covered: laptop, software licenses, coffee, whatever helps you work better.</li>
        <li>📚 Any books you want to read. It's LBRY, after all.</li>
      </ul>

      <h2 id="referrals">Referrals</h2>
      <p>
        Know someone who'd be a great fit? Tell them about us, send them a link to this page, or show up at their house unexpectedly
        with a box of candy and a persuasive pitch. If we hire them, we'll pay you $5,000. That's what we call a win-win.
      </p>

      <h2 id="other-work">Other Work</h2>
      <p>Interested in contributing but not ready for commitment? We have a <a href="https://lbry.tech/contribute">guide for contributors</a>
        to help you find other ways to get involved. If none of that suits your fancy, join the
        <a href="https://chat.lbry.org">Discord chat</a> and we'll help you find something you'll love.</p>
    </div>
  </section>
</main>
