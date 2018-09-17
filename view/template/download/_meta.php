<div class="meta">
  Version <?php echo $version ?>,
  <?php echo number_format($size, 1) ?> MB,
  built on <?php echo date('F d', $releaseTimestamp) ?>
  at <?php echo date('g:i:s A', $releaseTimestamp) ?> UTC
  <?php if ($os === OS::OS_LINUX): ?>
    <br/>
    Works with Ubuntu, Debian, or any distro with <code>apt</code> or <code>dpkg</code>.
    For other Linux flavors including Arch and Flatpak support or compiling from source, <a href="https://github.com/lbryio/lbry-desktop#install" class="link-primary">see our GitHub install page</a>.
  <?php elseif ($sourceLink): ?>
    <br/>
    Like source code? Go <a href="https://github.com/lbryio/lbry-desktop" class="link-primary">here</a>.
  <?php endif ?>
</div>