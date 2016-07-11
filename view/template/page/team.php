<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage('https://lbry.io/img/cover-team.jpg') ?>
<?php Response::setMetaDescription('LBRY is founded by a team passionate about connecting producers and consumers and breaking down broken models. Learn more about them.') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content photo-grid spacer2">
    <h1>The Team</h1>
    <p>LBRY is made possible by more people than we could ever list here. The founding team is listed below.</p>
    <?php foreach([
        ['jeremy-kauffman', 'michael-zargham'],
        ['josh-finer', 'alex-grintsvayg'],
        ['mike-vine', 'jimmy-kiselak', 'jack-robison'],
        ['job-evers-meltzer', 'reilly-smith', 'alex-liebowitz']
    ] as $bioRow): ?>
    <div class="row-fluid">
      <?php foreach($bioRow as $bioSlug): ?>
        <div class="<?php echo count($bioRow) == 2 ? 'span6' : 'span4' ?> spacer2">
          <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
        </div>
      <?php endforeach ?>
    </div>
    <?php endforeach ?>
    <div class="row-fluid">
      <div class="span3"></div>
      <div class="span6">
        <div class="photo-container">
          <img src="/img/team/spooner-644x450.jpg" alt="you!"/>
        </div>
        <div>
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
    <h2>Advisory Team</h2>
    <div class="row-fluid">
      <div class="span6 spacer2">
        <?php echo View::render('content/_bio', ['person' => 'alex-tabarrok']) ?>
      </div>
      <div class="span6 spacer2">
        <?php echo View::render('content/_bio', ['person' => 'stephan-kinsella']) ?>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <?php echo View::render('content/_bio', ['person' => 'michael-huemer']) ?>
      </div>
    </div>
  </div>
  <?php echo View::render('nav/_learnFooter') ?>
</main>
<?php echo View::render('nav/_footer') ?>
