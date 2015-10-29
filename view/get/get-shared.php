<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>

<main class="column-fluid">
  <div class="span6">
    <div class="cover cover-light content">
      <?php echo $installHtml ?>
    </div>
  </div>
  <div class="span6">
    <?php echo View::render('get/feedback') ?>
  </div>
</main>

<?php echo View::render('nav/footer') ?>