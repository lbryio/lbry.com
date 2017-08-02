<div class="text-center">
  <p>
    <a id="linux-download" class="btn-alt btn-large" <?php echo $downloadUrl ? 'download' : '' ?>
       href="<?php echo $downloadUrl ?: 'https://github.com/lbryio/lbry-app/releases' ?>"
         data-facebook-track="1"
   <?php  /*         data-twitter-track-id="XXXXX"           */ ?>
         data-analytics-category="Sign Up"
         data-analytics-action="Download"
         data-analytics-label="Linux"
    >{{download.deb}}</a>
  </p>
  <div class="meta">
    {{download.works}}
    Prefer to build from source? Go <a href="https://github.com/lbryio/lbry-app" class="link-primary">here</a>.
  </div>
</div>

