<?php if ($_GET['selectedItem']): ?>
  <?php NavActions::setNavUri($_GET['selectedItem']) ?>
<?php endif ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>