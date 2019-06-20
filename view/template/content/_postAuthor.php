<section class="person-bio --author">
  <div class="inner-wrap">
    <figure class="author">
      <img src="<?php echo $photoImgSrc ?>" alt="<?php echo __('Photo of %name%', ['%name%' => $authorName]) ?>"/>

      <figcaption>
        <?php echo $authorName ?>

        <?php if (isset($authorEmail)): ?>
        &middot;
        <a href="mailto:<?php echo $authorEmail ?>" class="link-primary">
          <span class="icon icon-envelope"></span>
        </a>
        <?php endif ?>

        <?php if (isset($authorGithub)): ?>
        &middot;
        <a href="https://github.com/<?php echo $authorGithub ?>" class="link-primary">
          <span class="icon icon-github"></span>
        </a>
        <?php endif ?>

        <?php if (isset($authorTwitter)): ?>
        &middot;
        <a href="https://www.twitter.com/<?php echo $authorTwitter?>" class="link-primary">
          <span class="icon icon-twitter"></span>
        </a>
        <?php endif ?>
      </figcaption>
    </figure>

    <div class="bio">
      <?php echo $authorBioHtml ?>
    </div>
  </div>
</section>
