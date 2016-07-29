<?php Response::setMetaDescription('See upcoming LBRY projects and earn bounties for completing or assisting.') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="hero hero-quote hero-img spacer2" style="background-image: url(/img/fireworks.png)">
    <div class="hero-content-wrapper">
      <div class="hero-content text-center">
        <h1 class="cover-title">LBRY Bounties</h1>
        <h2 class="cover-subtitle">Earn money for building a better internet.</h2>
      </div>
    </div>
  </div>
  <section class="content content-light">
    <h3>Bounties</h3>
    <form method="get" action="/bounty" id="bounty-filter-form">
      <div class="clearfix">
        <div class="form-row align-left" style="margin-right: 10px">
          <label>Category</label>
          <select name="category">
            <?php foreach($categories as $category): ?>
              <option value="<?php echo $category ?>" <?php echo $selectedCategory == $category ? 'selected="selected"' : '' ?>>
                <?php echo $category ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-row align-left">
          <label>Completed</label>
          <select name="status">
            <?php foreach(['' => 'any', 'available' => 'available', 'completed' => 'completed'] as $statusVal => $statusLabel): ?>
              <option value="<?php echo $statusVal ?>"><?php echo $statusLabel ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </form>
    <?php js_start() ?>
      $('#bounty-filter-form').change(function() { $(this).submit(); });
    <?php js_end() ?>
  </section>
  <section class="content content-light">
    <div class="tile-fluid clearfix  spacer2">
      <?php foreach($bounties as $post): ?>
        <div class="span4">
          <a class="bounty-tile" href="<?php echo $post->getRelativeUrl() ?>">
            <div class="text-center spacer-half"><span class="icon-mega
              <?php $metadata = $post->getMetadata() ?>
              <?php switch($metadata['category']) {
                 case 'ci': echo 'icon-wrench'; break;
                 case 'android': echo 'icon-android'; break;
                 case 'ios': echo 'icon-apple'; break;
                 case 'browser': echo 'icon-globe'; break;
                 case 'cif': echo 'icon-wrench'; break;
                 case 'cig': echo 'icon-wrench'; break;
                default: echo 'icon-dollar'; break;
              } ?>
            "></span></div>
            <h3 class="link-primary"><?php echo $post->getTitle() ?></h3>
            <div class="clearfix">
              <span class="align-left"><span class="meta"><?php echo $metadata['category'] ?></span></span>
              <span class="align-right"><span class="badge badge-primary"><?php echo i18n::formatCredits($metadata['award']) ?></span></span>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
