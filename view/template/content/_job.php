<h3>
<?php echo $metadata['title'] ?><span class="badge <?php echo $metadata['status'] == "active" ? "badge-primary" : "badge-info"  ?>"><?php echo $metadata['status'] ?></span></h3>
<div class="markdown" <?php echo $jobHTML ?>
</div>
<?php if(isset($metadata['url'])): ?>
<a class="btn btn-alt" href="<?php echo $metadata['url']?>">Apply Here</a>
<?php endif ?>