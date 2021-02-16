<small class="meta">
  Version <?php echo $version ?>

  <br/>

  <?php if ($os === OS::OS_LINUX): ?>
    For other Linux flavors including Arch and Flatpak support or compiling from source, <a href="https://github.com/lbryio/lbry-desktop#install">see our GitHub install page</a>.
  <?php elseif ($os === OS::OS_OSX): ?>
    Works with with macOS version 10.12.4 (Sierra), and higher.
  <?php elseif ($sourceLink): ?>
    Like source code? Go <a href="https://github.com/lbryio/lbry-desktop">here</a>.
  <?php endif ?>
</small>
