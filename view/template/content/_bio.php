<?php ob_start() ?>
<div class="photo-container">
  <img src="<?php echo $imgSrc ?>" alt="<?php echo $name ?>"/>
</div>
<?php $photoHtml = ob_get_clean() ?>
<?php ob_start() ?>
<h4>
  <?php echo $name ?>
  <?php if (isset($email)): ?>
    <a href="mailto:<?php echo $email ?>" class="link-primary"><span class="icon icon-envelope"></span></a>
  <?php endif ?>
</h4>
<div class="meta spacer1"><?php echo $role ?></div>
<div class="markdown">
  <?php echo $bioHtml ?>
</div>
<?php $fullBioHtml = ob_get_clean() ?>
<?php if ($orientation == 'horizontal'): ?>
  <div class="row-fluid">
    <div class="span4"><?php echo $photoHtml ?></div>
    <div class="span8"><?php echo $fullBioHtml ?></div>
  </div>
<?php else: ?>
  <?php echo $photoHtml ?>
  <?php echo $fullBioHtml ?>
<?php endif ?>
