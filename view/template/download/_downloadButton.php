<?php if ($downloadUrl): ?>
  <div class="spacer-half">
    <a class="btn-<?php echo $buttonStyle?> btn-large"
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
  </div>
  <?php if ($meta): ?>
    <div class="meta">
        Version <?php echo $version ?>,
        <?php echo number_format($size, 1) ?> MB,
        built on <?php echo date('F d', $releaseTimestamp) ?>
        at <?php echo date('g:i:s A', $releaseTimestamp) ?> UTC
    </div>
    <?php if ($os === OS::OS_LINUX): ?>
      <div class="meta">
        Works with Ubuntu, Debian, or any distro with <code>apt</code> or <code>dpkg</code>.
        For other Linux flavors, <a href="https://github.com/lbryio/lbry-app" class="link-primary">see the source</a>.
      </div>
    <?php elseif ($sourceLink): ?>
      <div class="meta">
        Like source code? Go <a href="https://github.com/lbryio/lbry-app" class="link-primary">here</a>.<P><P>
      </div>
    <?php endif ?>
  <?php endif ?>
<?php else: ?>
  <a href="/get" class="btn-<?php echo $buttonStyle ?> btn-large">Download LBRY</a><BR>
<?php endif ?>
