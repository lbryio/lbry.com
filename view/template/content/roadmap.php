<?php Response::setMetaDescription(__('roadmap.description')) ?>

<main class="ancillary">
  <section class="hero hero--half-height" style="background-image: url(/img/here-be-dragons.jpg); background-position: center;">
    <div class="inner-wrap">
      <h1>{{roadmap.title}}</h1>
      <h2>Future plans for the journey into the land of dragons</h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <p>Our top priorities, definitions of success, and target completion dates for key initiatives in <?php echo date('Y') ?> are outlined below.</p>
      <div class="roadmap-container" id="project-roadmap">
        <?php foreach ($items as $item): ?>
          <div class="roadmap-item">
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
    </div>
  </section>
</main>
