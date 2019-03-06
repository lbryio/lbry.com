<section class="person-bio" id="<?php echo str_replace(' ', '-', strtolower($name)) ?>">
  <div class="inner-wrap">
    <figure class="author">
      <img src="<?php echo $imgSrc ?>" alt="Photo of <?php echo $name ?>"/>

      <figcaption>
        <?php echo $name ?>

        <?php if (isset($email)): ?>
        &middot;
        <a href="mailto:<?php echo $email ?>" class="link-primary">
          <span class="icon icon-envelope"></span>
        </a>
        <?php endif ?>

        <?php if (isset($github)): ?>
        &middot;
        <a href="https://github.com/<?php echo $github ?>" class="link-primary">
          <span class="icon icon-github"></span>
        </a>
        <?php endif ?>

        <?php if (isset($twitter)): ?>
        &middot;
        <a href="https://www.twitter.com/<?php echo $twitter?>" class="link-primary">
          <span class="icon icon-twitter"></span>
        </a>
        <?php endif ?>

        <br/>
        <?php echo $role ?>
      </figcaption>
    </figure>

    <div class="bio">
      <?php echo $bioHtml ?>
    </div>
  </div>
</section>
