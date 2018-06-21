<?php foreach ([
  "/learn" => __("nav.learn"),
  "/team" => __("Team"),
  "/news" => __("News"),
  "/get" => __("Get the App")
] as $url => $label): ?>
  <a class="navigation__item<?php echo $selectedItem === $url ? ' active' : ''?>" href="<?php echo $url ?>">
    <?php echo $label ?>
  </a>
<?php endforeach ?>
