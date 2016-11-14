<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/cover-team.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content photo-grid spacer2">
    <h1>{{page.team.header}}</h1>
    <p>{{page.team.people}}</p>
    <?php $rowCount = 0 ?>
    <?php foreach([
        ['jeremy-kauffman', 'alex-grintsvayg'],
        ['josh-finer', 'job-evers-meltzer'],
        ['jack-robison',  'alex-liebowitz', 'jimmy-kiselak'],
        ['kay-kurokawa', 'reilly-smith', 'you']
    ] as $bioRow): ?>
    <div class="row-fluid">
      <?php ++$rowCount ?>
      <?php foreach($bioRow as $bioSlug): ?>
        <div class="<?php echo $rowCount <= 2 ? 'span6' : 'span4' ?> spacer2">
          <?php echo View::render('content/_bio', ['person' => $bioSlug]) ?>
        </div>
      <?php endforeach ?>
    </div>
    <?php endforeach ?>
    <h2>{{page.team.advisory}}</h2>
    <div class="row-fluid">
      <div class="span6 spacer2">
        <?php echo View::render('content/_bio', ['person' => 'alex-tabarrok']) ?>
      </div>
      <div class="span6 spacer2">
        <?php echo View::render('content/_bio', ['person' => 'ray-carballada']) ?>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <?php echo View::render('content/_bio', ['person' => 'stephan-kinsella']) ?>
      </div>
      <div class="span6">
        <?php echo View::render('content/_bio', ['person' => 'michael-huemer']) ?>
      </div>
    </div>
  </div>
  <?php echo View::render('nav/_learnFooter') ?>
</main>
<?php echo View::render('nav/_footer') ?>
