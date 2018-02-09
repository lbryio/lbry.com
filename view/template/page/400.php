<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>{{page.badrequest}}</h1>
    <p><?php echo $error ?? __('page.badrequest_details') ?></p>
    <?php echo View::render('nav/_errorFooter') ?>
  </div>
</main>
