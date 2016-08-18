<div class="notice notice-info">
  <p>{{download.unavailable}}</p>
  <?php if ($os == Os::OS_OSX): ?>
    <p>{{download.osx}}</p>
  <?php elseif ($os == Os::OS_WINDOWS): ?>
    <p>{{download.windows}}</p>
  <?php endif ?>
</div>