<?php Response::setMetaDescription(__('description.allowed', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>{{download.for-os}}LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span>{{download.for-os2}}</h1>
      <?php if ($downloadHtml): ?>
        <?php echo View::render('download/_betaNotice') ?>
        <h4>{{download.verb}}</h4>
        <?php echo $downloadHtml ?>
        <h4>{{download.credits}}</h4>
        <?php if ($prefineryUser): ?>
          <p>{{download.email1}}<strong><?php echo $prefineryUser['email'] ?></strong>{{download.email2}}</p>
          <div class="meta">{{download.email3}}</div>
        <?php endif ?>
      <?php else: ?>
        <?php echo View::render('download/_unavailable', [
          'os' => $os
        ]) ?>
      <?php endif ?>
    </div>
    <?php if ($prefineryUser): ?>
      <div class="cover cover-light content content-stretch content-light">
        <?php echo View::render('download/_refer') ?>
      </div>
    <?php endif ?>
  </div>
  <div class="span5">
    <?php echo View::render('download/_list', [
      'excludeOs' => $os
    ]) ?>
    <?php echo View::render('download/_social') ?>
  </div>
</main>

<?php echo View::render('nav/_footer') ?>