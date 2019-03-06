<small class="meta">
  Version <?php echo $version ?>,
  <?php echo number_format($size, 1) ?> MB,
  built on <?php echo date('F d', $releaseTimestamp) ?>
  at <?php echo date('g:i:s A', $releaseTimestamp) ?> UTC
  <br/>

  <?php if ($os === OS::OS_LINUX): ?>
    Works with Ubuntu, Debian, or any distro with <code>apt</code> or <code>dpkg</code>. For other Linux flavors including Arch and Flatpak support or compiling from source, <a href="https://github.com/lbryio/lbry-desktop#install">see our GitHub install page</a>.
  <?php elseif ($os === OS::OS_OSX): ?>
    Works with with macOS version 10.12.4 (Sierra), and higher.
  <?php elseif ($sourceLink): ?>
    Like source code? Go <a href="https://github.com/lbryio/lbry-desktop">here</a>.
  <?php endif ?>
</small>
