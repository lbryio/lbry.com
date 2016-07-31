<div class="notice notice-info">
  <p>{{download.unavailable}}</p>
  <?php if ($os == DownloadActions::OS_OSX): ?>
    <p>{{download.osx}}</p>
  <?php elseif ($os == DownloadActions::OS_WINDOWS): ?>
    <p>{{download.windows}}</p>
  <?php endif ?>
</div>