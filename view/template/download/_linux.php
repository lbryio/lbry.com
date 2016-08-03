<div class="text-center">
  <p>
    <a id="linux-download" class="btn-alt" <?php echo $downloadUrl ? 'download' : '' ?>
       href="<?php echo $downloadUrl ?: 'https://github.com/lbryio/lbry/releases' ?>"
      <?php /*
         data-facebook-track-id="XXXXX"
         data-twitter-track-id="XXXXX"
         data-analytics-category="Sign Up"
         data-analytics-action="Download"
         data-analytics-label="Linux"
          */ ?>
    >{{download.deb}}</a>
  </p>
  <div class="meta">
    {{download.works}}
    Prefer to build from source? Go <a href="https://github.com/lbryio/lbry" class="link-primary">here</a>.
  </div>
</div>

