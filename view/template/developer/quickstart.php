<?php NavActions::setNavUri('/learn') ?>
<?php Response::addJsAsset('/js/quickstart.js') ?>
<?php Response::setMetaDescription('Be up and running with the LBRY API in just a few minutes.') ?>
<?php Response::setMetaTitle('LBRY Quickstart') ?>
<?php echo View::render('nav/_header', ['isDark' => false, 'isAbsolute' => false]) ?>
<main class="cover-stretch-wrap">
  <div class="cover cover-center cover-dark cover-dark-grad">
    <div class="quickstart">
      <?php if ($currentStep === 'all'): ?>
        <div class="content content-dark">
          <div class="meta"><a href="/quickstart" class="link-primary">Quickstart Home</a></div>
          <h1>Quickstart</h1>
        </div>
        <?php foreach(array_filter(array_keys($stepLabels)) as $step): ?>
          <section>
            <div class="content content-dark">
              <?php echo View::render('developer/_quickstart' . ucfirst($step)) ?>
            </div>
          </section>
        <?php endforeach ?>
      <?php elseif ($stepNum > 0): ?>
        <div class="content content-dark">
          <h1>Quickstart: <?php echo $stepLabels[$currentStep] ?></h1>
        </div>
        <ol class="quickstart__progress-bar">
          <?php $stepCounter = 0 ?>
          <?php foreach($stepLabels as $step => $stepLabel): ?>
            <li class="<?php echo $currentStep == $step ? 'active' : '' ?> <?php echo ++$stepCounter <= $stepNum ? 'completed' : '' ?>">
              <a href="/quickstart<?php echo $step ? '/' . $step : '' ?>"><?php echo $stepLabel ?></a>
            </li>
          <?php endforeach ?>
        </ol>
        <div class="content content-dark">
          <div class="spacer2">
            <?php echo View::render('developer/_quickstart' . ucfirst($currentStep)) ?>
          </div>
          <?php if ($nextStep): ?>
            <div>
              <a href="/quickstart/<?php echo $nextStep ?>" class="btn-alt">Next: <?php echo $stepLabels[$nextStep] ?> &raquo;</a>
            </div>
          <?php endif ?>
        </div>
      <?php else: ?>
        <div class="content content-dark">
          <?php echo View::render('developer/_quickstartHome', [
            'firstStep' => array_keys($stepLabels)[1]
          ]) ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>
