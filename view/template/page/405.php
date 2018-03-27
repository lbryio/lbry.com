<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>{{page.badmethod}}</h1>
    <p>{{page.badmethod_details}}</p>
    <?php echo View::render('nav/_errorFooter') ?>
  </div>
</main>
