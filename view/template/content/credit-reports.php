<?php Response::setMetaDescription('Quarterly reports regarding usage of LBRY credits by LBRY Inc.') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <section class="content content-readable spacer2">
    <h1>Quarterly Credit Reports</h1>
    <p>
      LBRY issues a quarterly report every 3 months in January, April, July, and October, covering the preceding 3 full months. These reports outline the corresponding transaction history as well as the current state of LBRY, Inc.'s balance sheet and anticipated future expenditures.
    </p>
    <table class="post-content-table full-table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Report</th>
          <th>Balance Sheet</th>
        </tr>
      </thead>

      <?php foreach ($posts as $post): ?>
        <tr>
          <td><?php echo strtoupper($post->getSlug()) ?></td>
          <td><a href="<?php echo $post->getRelativeUrl() ?>" class="link-primary">Report</a></td>
          <td><a href="<?php echo $post->getMetadataItem('sheet') ?>" class="link-primary">Sheet</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </section>
</main>
<?php echo View::render('nav/_footer') ?>
