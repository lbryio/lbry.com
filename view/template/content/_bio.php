<div class="row-fluid">
  <div class="span4">
    <img src="<?php echo $imgSrc ?>" alt="<?php echo $name ?>"/>
  </div>
  <div class="span8">
    <h4>
      <?php echo $name ?>
      <?php if (isset($email)): ?>
        <a href="mailto:<?php echo $email ?>" class="link-primary"><span class="icon icon-envelope"></span></a>
      <?php endif ?>
      <?php if (isset($github)): ?>
        <a href="https://github.com/<?php echo $github ?>" class="link-primary"><span class="icon icon-github"></span></a>
      <?php endif ?>
      <?php if (isset($twitter)): ?>
        <a href="https://www.twitter.com/<?php echo $twitter?>" class="link-primary"><span class="icon icon-twitter"></span></a>
      <?php endif ?>
    </h4>
    <div class="meta spacer1"><?php echo $role ?></div>
    <div class="markdown">
      <?php echo $bioHtml ?>
    </div>
  </div>
</div>
