<?php foreach ([
    '/get' => __('nav.get'),
    '/learn' => __('nav.learn'),
    '/news' => __("News")
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label-desktop">
  <a href="https://twitter.com/lbryio" target="_blank"><span class="btn-label">Twitter</span> <span class="icon-fw icon-twitter"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://www.facebook.com/lbryio" target="_blank"><span class="btn-label">Facebook</span> <span class="icon-fw icon-facebook"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://reddit.com/r/lbry" target="_blank"><span class="btn-label">Reddit</span> <span class="icon-fw icon-reddit"></span> </a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://chat.lbry.io" target="_blank"><span class="btn-label">Discord</span><span class="icon-fw icon-comments"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://github.com/lbryio" target="_blank"><span class="btn-label">GitHub</span><span class="icon-github icon-fw"></span></a>
</div>
<?php /*
<div class="control-item no-label-desktop">
  <form action="/set-culture" method="POST">
    <select id="language-dropdown" name="culture">
      <?php foreach ($cultures as $culture): ?>
        <option value="<?php echo $culture ?>" <?php echo $culture == $selectedCulture ? 'selected="selected"' : '' ?>>
          <?php echo $culture ?>
        </option>
      <?php endforeach ?>
    </select>
  </form>
</div>
*/ ?>
