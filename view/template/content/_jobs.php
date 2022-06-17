<?php if (count($jobs)): ?>
  <?php foreach ($jobs as $job): ?>
    <?php echo View::render('content/_job', [
      'metadata' => $job[0],
      'jobHtml' => $job[1]
    ]) ?>
  <?php endforeach ?>
<?php else: ?>
  <div class="notice notice-warning spacer1">No jobs are currently open.</div>
<?php endif ?>
