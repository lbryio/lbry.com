<?php Response::setMetaDescription(__('roadmap.description')) ?>

<main class="ancillary">
  <section class="hero hero--half-height" style="background-image: url(/img/here-be-dragons.jpg); background-position: center;">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{roadmap.title}}</h1>
      <h2>Future plans for the journey into the land of dragons</h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
        <div class="notice notice-warning spacer1 ">
            For 2021, LBRY is not maintaining a public roadmap. Development is more active than ever and can be tracked on our <a href="https://github.com/lbryio">public GitHub</a>.
        </div>
      <p>Top priorities, definitions of success, status, and target completion dates for key initiatives in
        <select id="roadmap-year-select">
          <?php foreach ($years as $aYear): ?>
              <option value="<?php echo $aYear ?>" <?php echo $aYear == $year ? 'selected="selected"' : '' ?>>
                <?php echo $aYear ?>
              </option>
          <?php endforeach ?>
        </select>
        <?php js_start() ?>
          $('#roadmap-year-select').change(function() { window.location = '/roadmap/' + $(this).val(); });
        <?php js_end() ?>
      </p>
      <div class="roadmap-container" id="project-roadmap">
        <?php if (count($items)): ?>
          <?php foreach ($items as $item): ?>
          <div class="roadmap-item" id="<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $item['name']))) ?>">
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
        <?php else: ?>
          <div class="notice notice-warning">No roadmap items found for this year.</div>
        <?php endif ?>
      </div>
    </div>
  </section>
</main>
