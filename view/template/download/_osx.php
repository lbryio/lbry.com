<div class="text-center">
  <p>
    <a class="btn-alt" <?php echo $downloadUrl ? 'download' : '' ?>
       href="<?php echo $downloadUrl ?: 'https://github.com/lbryio/lbry/releases' ?>"
      <?php /*
           data-facebook-track-id="XXXXX"
           data-twitter-track-id="XXXXX"
           data-analytics-category="Sign Up"
           data-analytics-action="Download"
           data-analytics-label="OSX"
           */ ?>
    >{{download.osx2}}</a>
  </p>
</div>