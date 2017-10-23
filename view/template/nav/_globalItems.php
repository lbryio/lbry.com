<?php foreach([
    '/get' => __('nav.get'),
    '/learn' => __('nav.learn')
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label-desktop">
  <a href="https://twitter.com/lbryio"><span class="btn-label">Twitter</span> <span class="icon-fw icon-twitter"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://www.facebook.com/lbryio"><span class="btn-label">Facebook</span> <span class="icon-fw icon-facebook"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://reddit.com/r/lbry"><span class="btn-label">Reddit</span> <span class="icon-fw icon-reddit"></span> </a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://discord.gg/YjYbwhS"><span class="btn-label">Discord</span><img style="width:25px;height:25px" src="https://camo.githubusercontent.com/4b028e8e841f57ee96b472fa88ea7ed66ddd3720/687474703a2f2f692e696d6775722e636f6d2f65597779386c632e706e67"></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://github.com/lbryio"><span class="btn-label">GitHub</span><span class="icon-github icon-fw"></span></a>
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
