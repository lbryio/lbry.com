<?php if (!defined('FOOTER_RENDERED')): ?>
  <?php define('FOOTER_RENDERED', true) ?>
  <div class="footer">
    <?php if ($showLearnFooter): ?>
      <?php echo View::render('nav/_learnFooter') ?>
    <?php endif ?>
    <div class="footer-standard <?php echo $isDark ? 'footer-standard--dark' : 'footer-standard--light' ?> <?php echo isset($isBordered) && !$isBordered ? 'footer-noborder' : '' ?>">
      <nav class="control-group">
        <div class="control-item">
          <a href="/"><?php echo __('nav.home') ?></a>
        </div>
        <?php echo View::render('nav/_globalItems') ?>
        <div class="control-item no-label-desktop">
        <a href="https://shop.lbry.io" target="_blank"><span class="btn-label">LBRY Shop</span> <span class="icon-fw icon-shopping-cart"></span></a>
         </div>
        <div class="control-item">
          <a href="https://en.wikipedia.org/wiki/Free_Speech_Flag" class="footer-img-link">
            <img src="/img/Free-speech-flag.svg" alt="Free Speech Flag" height="30"/>
          </a>
        </div>
      </nav>
      <div>
        <a href="/join-us">LBRY is hiring!</a>
      </div>
    </div>
  </div>
<?php endif ?>
