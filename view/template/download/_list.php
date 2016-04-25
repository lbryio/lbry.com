<div class="cover cover-dark cover-dark-grad content content-dark">
  <h3>Other Systems</h3>
  <?php foreach($osChoices as $osChoice): ?>
    <?php list($url, $title, $icon) = $osChoice ?>
    <h4>
      <a href="<?php echo $url ?>" class="link-primary">
        <span class="<?php echo $icon ?>"></span> <?php echo $title ?>
      </a>
    </h4>
  <?php endforeach ?>
</div>