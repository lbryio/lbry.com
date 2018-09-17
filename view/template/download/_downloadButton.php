<?php if ($downloadUrl): ?>
  <?php if ($os !== OS::OS_ANDROID): ?>
    <a class="btn-<?php echo $buttonStyle?> btn-large"
       download
       href="<?php echo $downloadUrl ?>"
       id="get-download-btn"
       data-facebook-track="1"
       data-analytics-category="Sign Up"
       data-analytics-action="Download"
       data-analytics-label="<?php echo $analyticsLabel ?>"
    ><?php echo $buttonLabel ?></a>
  <?php else: ?>
    <a href="<?php echo $downloadUrl ?>" class="btn--google-play">
      <img alt="<?php echo $buttonLabel ?>" src="https://play.google.com/intl/en_us/badges/images/badge_new.png"/>
    </a>
  <?php endif ?>
  <?php if ($isAuto): ?>
      <?php js_start() ?>
      var anchor = document.getElementById('get-download-btn');
      ga('send', 'event', anchor.getAttribute('data-analytics-category'), anchor.getAttribute('data-analytics-action'), anchor.getAttribute('data-analytics-label'));
      setTimeout(function() { window.location = anchor.getAttribute('href'); }, 500);
      <?php js_end() ?>
  <?php endif ?>
<?php else: ?>
  <a href="/get" class="btn-<?php echo $buttonStyle ?> btn-large">Download LBRY</a><BR>
<?php endif ?>
