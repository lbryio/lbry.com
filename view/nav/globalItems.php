<?php foreach([
    '/fund' => __('Fund'),
    '/get' => __('Get'),
    '//blog.lbry.io' => __('News'),
    '/learn' => __('Learn'),
//    '/what' => __('What'),
//    '/why' => __('Why'),
//    '/team' => __('Team')
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label">
  <a href="//twitter.com/lbryio"><span class="icon icon-twitter"></span><span class="btn-label">Twitter</span></a>
</div>
<div class="control-item no-label">
  <a href="//www.facebook.com/lbryio"><span class="icon icon-facebook"></span> <span class="btn-label">Facebook</span></a>
</div>
<div class="control-item no-label">
  <a href="//reddit.com/r/lbry"><span class="icon icon-reddit"></span><span class="btn-label">Reddit</span></a>
</div>
