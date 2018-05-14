	<div class="cover cover-dark cover-dark-grad">
  <div class="content content-dark">
    <div class="row-fluid">
      <div class="span6">
        <h3><?php echo __('publish.next') ?></h3>
        <table class="table-layout">
          <tr>
            <td>
              <a href="/get" class="btn-alt btn-full-width"><?php echo __('global.get') ?></a>
            </td>
            <td>
              <?php echo __('publish.abundance') ?>
            </td>
          </tr>
        </table>
        <ul>
          <li><a href="/list/subscribe" class="link-primary"><?php echo __('email.subscribe') ?></a></li>
          <li>Join us on <a href="https://twitter.com/lbryio" target="_blank" class="link-primary"><span class="btn-label">Twitter</span><span class="icon icon-twitter"></span></a>
            <a href="https://facebook.com/lbryio" target="_blank" class="link-primary"><span class="btn-label">Facebook</span><span class="icon icon-facebook"></span></a>
            <a href="https://reddit.com/r/lbry" target="_blank" class="link-primary"><span class="btn-label">Reddit</span><span class="icon icon-reddit"></span></a>
            <a href="https://chat.lbry.io" target="_blank" class="link-primary"><span class="btn-label">Discord</span><span class="icon-comments icon-fw"></span></a></li>
        </ul>
      </div>
      <div class="span6">
        <h3><?php echo __('publish.keepl') ?></h3>
        <ul>
          <?php if (Request::getRelativeUri() != '/what'): ?>
            <li>Read "<a href="/what" class="link-primary">Art in the Internet Age</a>", an introductory essay</li>
          <?php endif ?>
          <?php if (Request::getRelativeUri() != '/team'): ?>
            <li>Find out about <a href="/team" class="link-primary">the team behind LBRY</a></li>
          <?php endif ?>
          <?php if (strpos(Request::getRelativeUri(), ContentActions::URL_NEWS) === false): ?>
            <li>Check out the latest <a href="/news" class="link-primary">news</a></li>
          <?php endif ?>
          <?php if (Request::getRelativeUri()!= '/faq'): ?> 
            <li>Read our <a href="/faq" class="link-primary">Frequently Asked Questions</a></li>
           <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
</div>
