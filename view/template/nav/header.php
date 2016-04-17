<?php if (!defined('HEADER_RENDERED')): ?>
  <?php define('HEADER_RENDERED', 1) ?>
  <?php extract([
      'isDark' => false
  ], EXTR_SKIP) ?>
  <div class="header <?php echo $isDark ? 'header-dark' : 'header-light' ?>">
    <div class="header-content">
      <a href="/" class="primary-logo">
        <img src="<?php echo $isDark ? View::imagePath('header-logo-light.png') : View::imagePath('header-logo-dark2.png') ?>" alt="LBRY" />
        <?php /*
        <img src="<?php echo View::imagePath('header-logo-light.png') ?>" alt="LBRY" class="logo-light" />
        <img src="<?php echo View::imagePath('header-logo-dark.png') ?>" alt="LBRY" class="logo-dark" />
         */ ?>
      </a>
      <div class="mobile header-navigation-mobile">
        <a href="javascript:;" data-action="toggle-class" data-for=".header" data-class="header-open">
          <span class="icon icon-bars"></span>
          <span class="icon icon-close"></span>
        </a>
      </div>
      <div class="fullscreen header-navigation-fullscreen">
        <nav class="control-group">
          <?php echo View::render('nav/globalItems') ?>
        </nav>
      </div>
    </div>
  </div>
<?php endif ?>
