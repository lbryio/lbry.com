<div class="photo-container">
  <img src="<?php echo $imgSrc ?>" alt="<?php echo $name ?>"/>
</div>
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
