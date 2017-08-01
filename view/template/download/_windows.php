<div class="text-center">
  <p>
    <a class="btn-alt btn-large" <?php echo $downloadUrl ? 'download' : '' ?>
       href="<?php echo $downloadUrl ?: 'https://github.com/lbryio/lbry-app/releases' ?>"
      <?php 
           data-facebook-track-id="1618717031725766" /*
           data-twitter-track-id="XXXXX"           */ ?>
           data-analytics-category="Sign Up"
           data-analytics-action="Download"
           data-analytics-label="Windows"
    >{{download.windows}}</a>
  </p>
</div>
