<section>
<h3 id="<?php echo trim(str_replace(' ', '-', strtolower($metadata['title']))) ?>">
  <?php echo $metadata['title'] ?>

  <?php if (isset($metadata['location']) && $metadata['location']): ?>
  <small class="meta"><?php echo $metadata['location'] ?></small>
  <?php endif ?>
</h3>
    <br/>
    <a class="button button--primary" href="https://docs.google.com/forms/d/e/1FAIpQLSdotoPPQcTiWGct640IildtWg_Fh68Z5KgUwYFO7rtlZPBHJw/viewform?usp=sf_link">Apply</a>
    <br/>
    <br/>
<?php echo $jobHtml ?>

</section>