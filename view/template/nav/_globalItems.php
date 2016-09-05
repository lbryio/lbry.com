<?php foreach([
    '/get' => __('nav.get'),
    '/news' => __('nav.news'),
    '/learn' => __('nav.learn')
] as $url => $label): ?>
  <div class="control-item">
    <a href="<?php echo $url ?>" <?php echo $selectedItem === $url ? 'class="nav-active"' : ''?>><?php echo $label ?></a>
  </div>
<?php endforeach ?>
<div class="control-item no-label-desktop">
  <a href="https://twitter.com/lbryio"><span class="btn-label">Twitter</span> <span class="icon-fw icon-twitter"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://www.facebook.com/lbryio"><span class="btn-label">Facebook</span> <span class="icon-fw icon-facebook"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://reddit.com/r/lbry"><span class="btn-label">Reddit</span> <span class="icon-fw icon-reddit"></span> </a>
</div>
<div class="control-item no-label-desktop">
  <a href="http://slack.lbry.io"><span class="btn-label">Slack</span><span class="icon-slack icon-fw"></span></a>
</div>
<div class="control-item no-label-desktop">
  <a href="https://github.com/lbryio"><span class="btn-label">GitHub</span><span class="icon-github icon-fw"></span></a>
</div>
<div class="control-item no-label-desktop">
  <form id="language-form" action="/set-culture" method="POST">
      <select id="language-dropdown" name="culture">
          <option>en_US</option>
          <option>pt_PT</option>
      </select>
  </form>
</div>

<script type="text/javascript">
    var _currentLang = '<?php echo i18n::getLanguage()."_".i18n::getCountry() ?>';
</script>
