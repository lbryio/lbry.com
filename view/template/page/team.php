<?php NavActions::setNavUri('/learn') ?>
<?php Response::setMetaImage('https://lbry.io/img/cover-team.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content photo-grid spacer2">
    <h1>{{page.team.header}}</h1>
    <p>{{page.team.people}}</p>
    <div class="row-fluid">
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/jeremy-644x450.jpg" alt="Jeremy Kauffman"/>
        </div>
        <div>
          <h4>Jeremy Kauffman <a href="mailto:jeremy@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.jeremy.title}}</div>
          <p>
            {{page.team.jeremy.parag1}}
          </p>
          <p>
            {{page.team.jeremy.parag2}}
          </p>
          <p>
            {{page.team.jeremy.parag3}}
          </p>
        </div>
      </div>
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/zargham-644x450.jpg" alt="Michael Zargham"/>
        </div>
        <div>
          <h4>Michael Zargham <a href="mailto:zargham@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.zargham.title}}</div>
          <p>
           {{page.team.zargham.parag1}}
          </p>
          <p>
            {{page.team.zargham.parag2}}
          </p>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/josh-644x450.jpg" alt="Josh Finer"/>
        </div>
        <div>
          <h4>Josh Finer <a href="mailto:josh@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.josh.title}}</div>
          <p>
            {{page.team.josh.parag1}}
          <p>
            {{page.team.josh.parag2}}
          </p>
         </div>
      </div>
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/jimmy-644x450.jpg" alt="Jimmy Kiselak"/>
        </div>
        <div>
          <h4>
            Jimmy Kiselak
            <a href="mailto:jimmy@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a>
          </h4>
          <div class="meta spacer1">{{page.team.jimmy.title}}</div>
          <p>
            {{page.team.jimmy.parag1}}
          </p>
          <p>
            {{page.team.jimmy.parag2}}
          </p>
          <p>
            {{page.team.jimmy.parag3}}
          </p>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/mike-644x450.jpg" alt="Mike Vine"/>
        </div>
        <div>
          <h4>Mike Vine <a href="mailto:mike@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.mike.title}}</div>
          <p>
            {{page.team.mike.parag1}}
          </p>
          <p>
            {{page.team.mike.parag2}}
          </p>
        </div>
      </div>
      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/grin-644x450.jpg" alt="Alex Grin"/>
        </div>
        <div>
          <h4>Alex Grin <a href="mailto:grin@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.grin.title}}</div>
          <p>
            {{page.team.grin.parag1}}
          </p>
          <p>
            {{page.team.grin.parag2}}
          <p>
            {{page.team.grin.parag3}}
          </p>
        </div>
      </div>
    </div>
    <div class="row-fluid">

      <div class="span6  spacer2">
        <div class="photo-container">
          <img src="/img/jack-robison-644x450.jpg" alt="Jack Robison"/>
        </div>
        <div>
          <h4>Jack Robison <a href="mailto:jack@lbry.io" class="link-primary"><span class="icon icon-envelope"></span></a></h4>
          <div class="meta  spacer1">{{page.team.jack.title}}</div>
          <p>
            {{page.team.jack.parag1}}
          </p>
          <p>
            {{page.team.jack.parag2}}
          <p>
            {{page.team.jack.parag3}}
          </p>
        </div>
      </div>
      <div class="span6">
        <div class="photo-container">
          <img src="/img/spooner-644x450.jpg" alt="you!"/>
        </div>
        <div>
          <h4>{{page.team.you.header}}</h4>
          <div class="meta  spacer1">{{page.team.you.title}}</div>
          <p>
            {{page.team.you.parag1}}
          </p>
        </div>
      </div>
    </div>
    <h2>{{page.team.advisory}}</h2>
    <div class="row-fluid">
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/alex-tabarrok-644x450.jpg" alt="Alex Tabarrok"/>
        </div>
        <div>
          <h4>Alex Tabarrok</h4>
          <div class="meta  spacer1">Economic Advisor</div>
          <p>Alex Tabarrok is Bartley J. Madden Chair in Economics at the <a href="http://mercatus.org/" class="link-primary">Mercatus Center</a>
            and a professor of economics at <a href="https://gmu.edu" class="link-primary">George Mason University</a>. He specializes in intellectual property reform, the effectiveness of markets, and the justice system.
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
      </div>
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/stephan-644x450.jpg" alt="Stephan Kinsella"/>
        </div>
        <div>
          <h4>Stephan Kinsella</h4>
          <div class="meta  spacer1">Legal Advisor</div>
          <p>
            Stephan Kinsella is a registered patent attorney and has over twenty years’ experience in patent, intellectual property,
            and general commercial and corporate law. He is the founder and director of the <a href="http://c4sif.org/" class="link-primary">Center for the Study of Innovative Freedom</a>.
            Kinsella has published numerous articles and books on intellectual property law and legal topics including
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
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="photo-container">
          <img src="/img/huemer-644x450.jpg" alt="Michael Huemer"/>
        </div>
        <div>
          <h4>Michael Huemer</h4>
          <div class="meta  spacer1">Ethical Advisor</div>
          <p>
            Michael Huemer is Professor of Philosophy and Ethics at the <a href="//www.colorado.edu/" class="link-primary">University of Colorado</a>,
            where he has taught since 1998. He has published three single-author scholarly books
          (including <em><a href="http://www.amazon.com/Ethical-Intuitionism-Michael-Huemer/dp/0230573746" class="link-primary">Ethical Intuitionism</a></em>),
          one edited anthology, and more than fifty academic articles in  epistemology, ethics, political philosophy, and metaphysics.
          </p>
          <p>
          Huemer's articles have appeared in such journals as the <em>Philosophical Review</em>, <em>Mind</em>, the <em>Journal of Philosophy</em>, <em>Ethics</em>, and others.
          His materials are used as readings in classrooms nationwide. He received a B.A. from UC Berkeley and a Ph.D. from Rutgers University.
          </p>
        </div>
      </div>
      <div class="span6">
        <div class="photo-container">
          <img src="/img/spooner-644x450.jpg" alt="you!"/>
        </div>
        <div>
          <h4>You</h4>
          <div class="meta  spacer1">Technical or Media Advisor</div>
          <p>
            LBRY is seeking an extremely experienced technical advisor or an advisor with a strong background in the publishing and media space.
            If you're that person or have a suggestion,
            <a href="mailto:jeremy@lbry.io?subject=Advisor" class="link-primary">let us know</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php echo View::render('nav/learnFooter') ?>
</main>
<?php echo View::render('nav/footer') ?>
