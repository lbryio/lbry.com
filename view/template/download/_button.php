<?php if (isset($downloadUrl)): ?>
   <a class="btn-alt btn-large"
     download
     href="<?php echo $downloadUrl ?>"
     id="get-download-btn"
     data-facebook-track="1"
     data-analytics-category="Sign Up"
     data-analytics-action="Download"
     data-analytics-label="<?php echo $analyticsLabel ?>"
  ><?php echo $buttonLabel ?></a>
  <?php if ($isAuto): ?>
    <?php js_start() ?>
      var anchor = document.getElementById('get-download-btn');
      ga('send', 'event', anchor.getAttribute('data-analytics-category'), anchor.getAttribute('data-analytics-action'), anchor.getAttribute('data-analytics-label'));
      setTimeout(function() { window.location = anchor.getAttribute('href'); }, 500);
    <?php js_end() ?>
  <?php endif ?>
  <br/>
  <span class="meta">
    <?php echo $version ?>,
    <?php echo number_format($size, 1) ?>MB,
    built on <?php echo date('F d', $releaseTimestamp) ?>
    at <?php echo date('H:i:s', $releaseTimestamp) ?>
  </span>
<?php elseif ($os === 'linux') : ?>
  <a href="/linux" class="btn-primary btn-large spacer1">Download LBRY</a><BR>  
<?php else : ?>
  <a href="/get" class="btn-primary btn-large spacer1">Download LBRY</a><BR>
<?php endif ?>
