<?php foreach([
    '/get' => __('Get'),
    '/news' => __('News'),
    '/learn' => __('Learn')
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label-desktop">
  <a href="//twitter.com/lbryio"><span class="btn-label">Twitter</span> <span class="icon-fw icon-twitter"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="//www.facebook.com/lbryio"><span class="btn-label">Facebook</span> <span class="icon-fw icon-facebook"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="//reddit.com/r/lbry"><span class="btn-label">Reddit</span> <span class="icon-fw icon-reddit"></span> </a>
</div>
<div class="control-item no-label-desktop">
  <a href="http://slack.lbry.io"><span class="btn-label">Slack</span><span class="icon-slack icon-fw"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://github.com/lbryio"><span class="btn-label">GitHub</span><span class="icon-github icon-fw"></span></a>
</div>