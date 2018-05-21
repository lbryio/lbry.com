<?php $url = urlencode(Request::getHostAndProto() . $post->getRelativeUrl()) ?>
<?php $title = urlencode($post->getTitle()) ?>
<div class="social-share-buttons">
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>&t=<?php echo $title ?>" title="Share on Facebook" target="_blank">
    <span class="icon-fw icon-facebook"></span>
  </a>
  <a href="https://twitter.com/intent/tweet?source=<?php echo $url ?>&text=<?php echo $title ?>%20<?php echo $url ?>&via=lbryio"
     target="_blank" title="Tweet">
    <span class="icon-fw icon-twitter"></span>
  </a>
  <a href="http://www.reddit.com/submit?url=<?php echo $url ?>&title=<?php echo $title ?>" target="_blank" title="Post to Reddit">
    <span class="icon-fw icon-reddit"></span>
  </a>
  <a href="http://www.tumblr.com/share?v=3&u=<?php echo $url ?>&t=<?php echo $title ?>&s=" target="_blank" title="Post to Tumblr">
    <span class="icon-fw icon-tumblr"></span>
  </a>
  <a href="mailto:?subject=<?php echo urlencode('LBRY: ') . $title ?>&body=<?php echo $url . urlencode("\n\n" . $post->getContentText(50, true)) ?>"
     title="Email a Friend">
    <span class="icon-fw icon-envelope"></span>
  </a>
</div>
