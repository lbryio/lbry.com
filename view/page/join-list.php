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
             'listId' => Mailchimp::LIST_GENERAL_ID
         ]) ?>
        <div class="meta">
          <?php echo __('You will receive 1-2 messages a month, only from LBRY, Inc. and only about LBRY.') ?>
          <?php echo __('You can easily unsubscribe at any time.') ?>
        </div>
      </div>
      <div class="span3">
        <h3><?php echo __('Also On') ?></h3>
        <div class="spacer1">
          <a href="//twitter.com/lbryio" class="link-primary"><span class="icon icon-twitter"></span><span class="btn-label">Twitter</span></a>
        </div>
        <div class="spacer1">
          <a href="//www.facebook.com/lbryio" class="link-primary"><span class="icon icon-facebook"></span> <span class="btn-label">Facebook</span></a>
        </div>
        <div class="spacer1">
          <a href="//reddit.com/r/lbry" class="link-primary"><span class="icon icon-reddit"></span><span class="btn-label">Reddit</span></a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>