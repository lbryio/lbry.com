<?php if (!defined('HEADER_RENDERED')): ?>
  <?php define('HEADER_RENDERED', 1) ?>
  <?php extract([
      'isDark' => false,
      'isAbsolute' => false,
      'isLogoOnly' => false,
      'isBordered' => true
  ], EXTR_SKIP) ?>
  <div class="header <?php echo $isAbsolute ? 'header-absolute' : '' ?> <?php echo $isDark ? 'header-dark' : 'header-light' ?> <?php echo !$isBordered ? 'header-noborder' : '' ?>">
    <div class="header-content">
      <a href="/" class="primary-logo">
        <img src="<?php echo $isDark ? View::imagePath('lbry-white.svg') : View::imagePath('lbry-dark.svg') ?>" alt="LBRY" />
      </a>
      <?php if (!$isLogoOnly): ?>
        <div class="mobile header-navigation-mobile">
          <a href="javascript:;" data-action="toggle-class" data-for=".header" data-class="header-open">
            <span class="icon icon-bars"></span>
            <span class="icon icon-close"></span>
          </a>
        </div>
        <div class="fullscreen header-navigation-fullscreen">
          <nav class="control-group">
            <?php echo View::render('nav/_globalItems') ?>
          </nav>
        </div>
      <?php endif ?>
    </div>
  </div>
<?php endif ?>
