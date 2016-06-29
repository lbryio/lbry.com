<section class="post-author-spotlight cover cover-dark cover-dark-grad">
  <div class="content content-dark">
    <div class="row-fluid">
      <div class="span3">
        <img src="/img/team/<?php echo $photoImgSrc ?>" alt="<?php echo __('Photo of %name%', ['%name%' => $authorName]) ?>"/>
      </div>
      <div class="span9">
        <div class="meta">Author</div>
        <h3><?php echo $authorName ?></h3>
        <?php echo $authorBioHtml ?>
      </div>
    </div>
  </div>
</section>
