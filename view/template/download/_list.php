<?php $title = $title ?? __('download.other') ?>
<div class="cover cover-light content content-light">
  <h3><?php echo $title ?></h3>
  <?php $buckets = array_fill(0, 3, []) ?>
  <?php $columns = 2 ?>
  <?php $index = 0 ?>
  <?php foreach ($osChoices as $osChoice): ?>
    <?php ob_start() ?>
    <?php list($url, $title, $icon) = $osChoice ?>
    <h4>
      <a href="<?php echo $url ?>" class="link-primary">
        <span class="<?php echo $icon ?> icon-fw"></span><?php echo $title ?>
      </a>
    </h4>
    <?php $buckets[floor($index++ / $columns)][] = ob_get_clean() ?>
  <?php endforeach ?>
  <?php foreach (array_filter($buckets) as $bucketRow): ?>
    <div class="row-fluid-always">
      <div class="span6"><?php echo implode('</div><div class="span6">', $bucketRow) ?></div>
    </div>
  <?php endforeach ?>
</div>