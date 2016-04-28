<?php foreach([
//    '/fund' => __('Fund'),
    '/get' => __('Get'),
    '/news' => __('News'),
    '/learn' => __('Learn')
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label-desktop">
  <a href="//twitter.com/lbryio"><span class="btn-label">Twitter</span> <span class="icon icon-twitter"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="//www.facebook.com/lbryio"><span class="btn-label">Facebook</span> <span class="icon icon-facebook"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="//reddit.com/r/lbry"><span class="btn-label">Reddit</span> <span class="icon icon-reddit"></span> </a>
</div>