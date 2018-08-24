<div>
  <?php foreach ($jobs as $job): ?>
    <?php echo View::render('content/_job', [
        'metadata' => $job[0],
        'jobHtml' => $job[1]
    ]) ?>
  <?php endforeach ?>
</div>
