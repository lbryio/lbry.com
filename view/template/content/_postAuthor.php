<div class="post-author-spotlight cover cover-light-alt cover-light-alt-grad">
  <div class="content">
    <div class="row-fluid">
      <div class="span3">
        <img src="<?php echo $photoImgSrc ?>" alt="<?php echo __('Photo of %name%', ['%name%' => $authorName]) ?>"/>
      </div>
      <div class="span9">
        <div class="meta">{{news.author}}</div>
        <h3><?php echo $authorName ?>
       <?php if (isset($authorEmail)): ?>
          <a href="mailto:<?php echo $authorEmail ?>" class="link-primary"><span class="icon icon-envelope"></span></a>
        <?php endif ?>
        <?php if (isset($authorGithub)): ?>
          <a href="https://github.com/<?php echo $authorGithub ?>" class="link-primary"><span class="icon icon-github"></span></a>
        <?php endif ?>
        <?php if (isset($authorTwitter)): ?>
          <a href="https://www.twitter.com/<?php echo $authorTwitter?>" class="link-primary"><span class="icon icon-twitter"></span></a>
        <?php endif ?></h3>
        <?php echo $authorBioHtml ?>
      </div>
    </div>
  </div>
</div>
