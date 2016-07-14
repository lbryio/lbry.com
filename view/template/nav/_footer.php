<?php if (!defined('FOOTER_RENDERED')): ?>
  <?php define('FOOTER_RENDERED', true) ?>
  <div class="footer">
    <div class="content">
      <nav class="control-group">
        <div class="control-item">
          <a href="/"><?php echo __('Home') ?></a>
        </div>
        <?php echo View::render('nav/_globalItems') ?>
        <div class="control-item">
          <a href="//en.wikipedia.org/wiki/AACS_encryption_key_controversy" class="footer-img-link">
            <img src="/img/Free-speech-flag.svg" alt="Free Speech Flag" height="30"/>
          </a>
        </div>
      </nav>
    </div>
  </div>
<?php endif ?>
