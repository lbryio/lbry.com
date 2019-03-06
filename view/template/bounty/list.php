<?php Response::setMetaDescription('See upcoming LBRY projects and earn bounties for completing or assisting.') ?>
<?php NavActions::setNavUri('/learn') ?>

<main class="ancillary">
  <section class="hero" style="background-image: url(/img/gold-piles.jpg)">
    <div class="inner-wrap">
      <h1 class="cover-title">LBRY Bounties</h1>
      <h2 class="cover-subtitle">Earn money for building a better internet.</h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <h3>Bounties</h3>
      <p>Complete challenges and earn LBRY Credits. <a class="link-primary" href="/faq/bounties">Learn more</a>.</p>
      <form method="get" action="/bounty" id="bounty-filter-form">
        <div class="clearfix">
          <div class="form-row align-left" style="margin-right: 10px">
            <label>Category</label>
            <?php echo View::render('form/_select', [
                'name' => 'category',
                'choices' => $categories,
                'selected' => $selectedCategory
            ]) ?>
          </div>
          <div class="form-row align-left">
            <label>Status</label>
            <select name="status">
              <?php foreach ($statuses as $statusVal => $statusLabel): ?>
                <option value="<?php echo $statusVal ?>" <?php echo $selectedStatus == $statusVal ? 'selected="selected"' : '' ?>><?php echo $statusLabel ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </form>
      <?php js_start() ?>
        $('#bounty-filter-form').change(function() { $(this).submit(); });
      <?php js_end() ?>
    </div>
  </section>

    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php if (count($bounties)): ?>
        <?php $index = 0 ?>
        <?php foreach ($bounties as $post): ?>
          <?php $metadata = $post->getMetadata() ?>
          <div class="span4">
            <a class="bounty-tile" href="<?php echo $post->getRelativeUrl() ?>">
              <div class="text-center spacer-half"><span class="icon-mega
                <?php switch ($metadata['category']) {
                   case 'android': echo 'icon-android'; break;
                   case 'osx':
                   case 'ios':
                     echo 'icon-apple'; break;
                   case 'browser': echo 'icon-globe'; break;
                   case 'web': echo 'icon-link'; break;
                   case 'daemon': echo 'icon-server'; break;
                   case 'human': echo 'icon-users'; break;
                   case 'chat': echo 'icon-comments'; break;
                   case 'code': echo 'icon-code'; break;
                   case 'design': echo 'icon-image'; break;
                   default: echo 'icon-dollar'; break;
                } ?>
              "></span></div>
              <h3 class="link-primary"><?php echo $post->getTitle() ?></h3>
              <?php echo View::render('bounty/_meta', ['metadata' => $metadata]) ?>
            </a>
          </div>
          <?php if (++$index % 3 == 0): ?>
            </div><div class="row-fluid">
          <?php endif ?>
        <?php endforeach ?>
      <?php else: ?>
        <p><em class="no-results">{{bounty.list.noresults}}</em></p>
      <?php endif ?>
    </div>
  </section>
</main>
