<h3 id="<?php echo trim(str_replace(' ', '-', strtolower($metadata['title']))) ?>">
  <?php echo $metadata['title'] ?>
  <?php if (isset($metadata['status'])): ?>
    <span class="badge <?php echo $metadata['status'] == "active" ? "badge--primary" : "badge-info"  ?>"><?php echo $metadata['status'] ?></span>
  <?php endif ?>
  <?php if (isset($metadata['location']) && $metadata['location']): ?>
    <span class="badge"><?php echo $metadata['location'] ?></span>
  <?php endif ?>
</h3>

<?php if (isset($metadata['url'])): ?>
  <div class="spacer-half">
    <a href="<?php echo $metadata['url']?>">Apply</a>
  </div>
<?php endif ?>

<div class="markdown">
  <?php echo $jobHtml ?>
</div>
