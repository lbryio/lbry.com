<div class="post-author-spotlight cover cover-light-alt cover-light-alt-grad">
  <div class="content">
    <div class="row-fluid">
      <div class="span3">
        <img src="<?php echo $photoImgSrc ?>" alt="<?php echo __('Photo of %name%', ['%name%' => $authorName]) ?>"/>
      </div>
      <div class="span9">
        <div class="meta">{{news.author}}</div>
        <h3><?php echo $authorName ?></h3>
        <?php echo $authorBioHtml ?>
        <?php echo $BioHtml ?>
      </div>
    </div>
  </div>
</div>
