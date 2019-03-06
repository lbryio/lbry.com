<div class="clearfix">
  <span class="align-left"><span class="meta"><?php echo $metadata['category'] ?></span></span>

  <span class="align-right">
    <span class="badge badge--primary <?php echo isset($metadata['status']) ? 'bounty-award-' . $metadata['status'] : '' ?>">
      <?php echo i18n::formatCredits($metadata['lbc_award']) ?>
    </span>
  </span>
</div>
