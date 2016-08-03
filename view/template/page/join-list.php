<?php Response::setMetaTitle(__('title.join')) ?>
<?php Response::setMetaDescription(__('description.join')) ?>
<?php echo View::render('nav/_header', ['isDark' => false ]) ?>
<main>
  <div class="content">
    <div class="row-fluid">
      <div class="span9">
        <h1><?php echo __('page.join') ?></h1>
        <p>
          <?php echo __('page.updates') ?>
        </p>
        <?php echo View::render('mail/_joinList', [
             'submitLabel' => 'Subscribe',
             'returnUrl' => '/join-list',
             'meta' => true,
             'listId' => Mailchimp::LIST_GENERAL_ID
         ]) ?>
      </div>
      <div class="span3">
        <h3><?php echo __('social.also') ?></h3>
        <?php echo View::render('social/_list') ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>