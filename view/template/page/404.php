<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>{{page.notfound}}</h1>
    <p>{{page.funnier}}</p>
    <?php echo View::render('nav/_errorFooter') ?>
  </div>
</main>