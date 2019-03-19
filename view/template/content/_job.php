<h3 id="<?php echo trim(str_replace(' ', '-', strtolower($metadata['title']))) ?>">
  <?php echo $metadata['title'] ?>
  <?php if (isset($metadata['status'])): ?>
  <small class="meta">/ <?php echo $metadata['status'] ?></small>
  <?php endif ?>

  <?php if (isset($metadata['location']) && $metadata['location']): ?>
  <small class="meta">/ <?php echo $metadata['location'] ?></small>
  <?php endif ?>
</h3>

<?php echo $jobHtml ?>

<?php if (isset($metadata['url'])): ?>
<a class="button button--primary" href="<?php echo $metadata['url']?>">Apply</a>
<?php endif ?>
