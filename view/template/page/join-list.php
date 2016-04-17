<?php Response::setMetaTitle(__('Join LBRY Email List')) ?>
<?php Response::setMetaDescription(__('Join our email list and receive updates about LBRY via email.')) ?>
<?php echo View::render('nav/header', ['isDark' => false ]) ?>
<main>
  <div class="content">
    <div class="row-fluid">
      <div class="span9">
        <h1><?php echo __('Join Email List') ?></h1>
        <p>
          <?php echo __('Join our email list and receive updates about LBRY via email.') ?>
        </p>
        <?php echo View::render('mail/joinList', [
             'submitLabel' => 'Subscribe',
             'returnUrl' => '/join-list',
             'meta' => true,
             'listId' => Mailchimp::LIST_GENERAL_ID
         ]) ?>
      </div>
      <div class="span3">
        <?php echo View::render('social/sidebar') ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>