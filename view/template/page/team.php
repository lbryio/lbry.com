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
          <div class="meta  spacer1">{{page.team.alex.title}}</div>
          <p>{{page.team.alex.parag1}}
          </p>
          <p>{{page.team.alex.parag2}}
          </p>
          <p>{{page.team.alex.parag3}}
          </p>
        </div>
      </div>
      <div class="span6 spacer2">
        <div class="photo-container">
          <img src="/img/stephan-644x450.jpg" alt="Stephan Kinsella"/>
        </div>
        <div>
          <h4>Stephan Kinsella</h4>
          <div class="meta  spacer1">{{page.team.stephan.title}}</div>
          <p>
            {{page.team.stephan.parag1}}
          </p>
          <p>
            {{page.team.stephan.parag2}}
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
          <div class="meta  spacer1">{{page.team.michael.title}}</div>
          <p>
            {{page.team.michael.parag1}}
          </p>
          <p>
          {{page.team.michael.parag2}}
          </p>
        </div>
      </div>
      <div class="span6">
        <div class="photo-container">
          <img src="/img/spooner-644x450.jpg" alt="you!"/>
        </div>
        <div>
          <h4>{{page.team.you.header}}</h4>
          <div class="meta  spacer1">{{page.team.you.advheader}}</div>
          <p>
            {{page.team.you.advtext}}
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php echo View::render('nav/learnFooter') ?>
</main>
<?php echo View::render('nav/footer') ?>
