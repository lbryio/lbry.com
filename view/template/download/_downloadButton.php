<?php if ($skipRender): ?>
<?php elseif ($downloadUrl): ?>
  <?php if ($os !== OS::OS_ANDROID): ?>
    <?php if ($isDownload): ?>
      <a class="button button--<?php echo $buttonStyle?>"
        download
        href="<?php echo $downloadUrl ?>"
        id="get-download-btn"
        data-facebook-track="1"
        data-analytics-category="Sign Up"
        data-analytics-action="Download"
        data-analytics-label="<?php echo $analyticsLabel ?>"
        title="Download LBRY App"
      ><?php echo $buttonLabel ?></a>
    <?php else: ?>
      <a class="button button--<?php echo $buttonStyle?>"
         href="<?php echo $downloadUrl ?>"
         id="get-download-btn"
         title="Download LBRY App"
      ><?php echo $buttonLabel ?></a>
    <?php endif ?>
  <?php else: ?>
    <a
      class="button button--google-play"
      data-analytics-action="Download"
      data-analytics-category="Sign Up"
      data-analytics-label="<?php echo $analyticsLabel ?>"
      data-facebook-track="1"
      href="<?php echo $downloadUrl ?>"
      title="Download our app"
    >Download</a>
  <?php endif ?>

  <?php if ($isAuto): ?>
    <?php js_start() ?>
    const anchor = document.getElementById('get-download-btn'); ga('send', 'event', anchor.getAttribute('data-analytics-category'), anchor.getAttribute('data-analytics-action'), anchor.getAttribute('data-analytics-label')); setTimeout(function() { window.location = anchor.getAttribute('href'); }, 500);
    <?php js_end() ?>
  <?php endif ?>
<?php else: ?>
  <a href="/get" class="button button--<?php echo $buttonStyle ?>">Download</a>
<?php endif ?>
