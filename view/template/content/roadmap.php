<?php Response::setMetaDescription(__('roadmap.description')) ?>
<?php Response::addJsAsset('/js/roadmap.js') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<?php js_start() ?>
  lbry.roadmap('#project-roadmap');
<?php js_end() ?>
<main>
  <div class="hero hero-quote hero-img hero-img-short spacer1" title="Here Be Dragons" style="background-image: url(/img/here-be-dragons.jpg)">
    <div class="hero-content-wrapper">
      <div class="hero-content text-center">
        <h1 class="cover-title">{{roadmap.title}}</h1>
        <h2 class="cover-subtitle">Future plans for the journey into the land of dragons.</h2>
      </div>
    </div>
  </div>
  <div style="max-width: 800px; margin: 0 auto">
    <p>Our top priorities, definitions of success, and target completion dates for key initiatives in <?php echo date('Y') ?> are outlined below.</p>
    <div class="roadmap-container" id="project-roadmap">
      <?php foreach ($items as $group => $groupItems): ?>
        <?php $firstItem = reset($groupItems) ?>
        <?php $isOpen = !isset($firstItem['project']) || !isset($firstItem['sort_key']) || $firstItem['sort_key'] === $projectMaxVersions[$firstItem['project']] ?>
      <?php /*
        <h2 class="roadmap-group-title" <?php echo !$isOpen ? 'style="display: none"' : '' ?>">
          <span class="roadmap-group-title-label">
            <?php echo $group ?> <?php echo isset($firstItem['sort_key']) && $firstItem['sort_key'] === $projectMaxVersions[$firstItem['project']] ? '(latest)' : '' ?>
          </span>
        </h2> */ ?>
        <div class="roadmap-group <?php echo !$isOpen ? 'roadmap-group-closed' : '' ?>">
          <?php $maxItems = isset($firstItem['sort_key']) ? 1 : count($groupItems) ?>
          <?php $index = 0 ?>
          <?php if (count($groupItems) > $maxItems): ?>
            <div class="text-center spacer1"><a href="javascript:;" class="link-primary show-all-roadmap-group-items">Show All Items for <?php echo $group ?></a></div>
          <?php endif ?>
          <?php foreach ($groupItems as $item): ?>
            <?php ++$index ?>
            <div class="roadmap-item" <?php echo $index != 1 && isset($firstItem['sort_key']) ? 'style="display: none"' : '' ?>>
              <?php if (isset($item['badge'])): ?>
                <div>
                  <?php if (isset($item['badge'])): ?>
                    <?php switch ($item['badge']): case "Complete": ?>
                    <span class=" badge badge-primary"><?php echo $item['badge'] ?></span><br/>
                    <?php break; case "In Progress":?>
                    <span class="badge badge-info"><?php echo $item['badge']?></span><br/>
                    <?php break; case "Planned": ?>
                    <span class="badge"><?php echo $item['badge']?></span><br/>
                    <?php break; endswitch;?>
                    <?php endif ?>
                </div>
              <?php endif ?>
              <h3 class="roadmap-item-title">
                <?php if (isset($item['url']) && $item['url']): ?>
                  <a href="<?php echo $item['url'] ?>" class="link-primary"><?php echo $item['name'] ?></a>
                <?php else: ?>
                  <?php echo $item['name'] ?>
                <?php endif ?>
              </h3>
              <div class="roadmap-item-date">
                <?php if (isset($item['quarter_date'])): ?>
                <?php echo $item['quarter_date'] ?>
                  <?php else: ?>
                <?php echo $item['date'] ? date('m-d-Y', strtotime($item['date'])) : '' ?>
                  <?php endif ?>
              </div>
              <div class="roadmap-item-content content markdown">
                <?php echo $item['body'] ?: '<em class="no-results">No description</em>' ?>
              </div>
            </div>
         <?php endforeach ?>
        </div>
      <?php endforeach ?>
        <?php /*
      <div class="text-center"><a href="javascript:;" class="link-primary show-all-roadmap-groups">Show Earlier Releases</a></div>
 */ ?>
    </div>
  </div>
  <?php echo View::render('nav/_learnFooter') ?>
</main>
<?php echo View::render('nav/_footer') ?>
