<?php Response::setMetaDescription(__('Download/install the latest version of LBRY for %os%.', ['%os%' => $osTitle]))  ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span7">
    <div class="cover cover-dark cover-dark-grad content content-stretch content-dark">
      <h1>LBRY for <?php echo $osTitle ?> <span class="<?php echo $osIcon ?>"></span></h1>
      <?php if ($downloadHtml): ?>
        <?php echo View::render('download/_betaNotice') ?>
        <h4>Download</h4>
        <?php echo $downloadHtml ?>
        <h4>Claim Credits</h4>
        <?php if ($prefineryUser): ?>
          <p>After download, use email <strong><?php echo $prefineryUser['email'] ?></strong> and the code you received via email to receive your credits.</p>
          <div class="meta">If you received a printed code and it does not work after you download, check your email for a different code.</div>
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