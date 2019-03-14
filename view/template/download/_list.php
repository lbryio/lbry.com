<?php $title = $title ?? __('download.other') ?>

<aside>
  <h3><?php echo $title ?></h3>
  <?php $buckets = array_fill(0, 3, []) ?>
  <?php $columns = 2 ?>
  <?php $index = 0 ?>

  <?php foreach ($osChoices as $osChoice): ?>
    <?php ob_start() ?>
    <?php list($url, $title, $icon) = $osChoice ?>
    <a href="<?php echo $url ?>">
      <span class="<?php echo $icon ?> icon-fw"></span><?php echo $title ?>
    </a>
    <?php $buckets[floor($index++ / $columns)][] = ob_get_clean() ?>
  <?php endforeach ?>

  <ul class="download-cards">
    <?php foreach (array_filter($buckets) as $bucketRow): ?>
    <li class="download-card"><?php echo implode("</li> <li class='download-card'>", $bucketRow) ?></li>
    <?php endforeach ?>
  </ul>
</aside>
