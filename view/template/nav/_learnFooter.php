<div class="cover <?php echo $isDark ? 'cover-dark cover-dark-grad' : 'cover-light-alt cover-light-alt-grad' ?> ">
  <div class="content <?php echo $isDark ? 'content-dark' : 'content-light' ?>">
    <div class="row-fluid">
      <div class="span6">
        <h3><?php echo __('publish.next') ?></h3>
        <table class="table-layout">
          <tr>
            <td>
              <a href="/get" class="<?php echo $isDark ? 'btn-alt' : 'btn-primary' ?> btn-full-width"><?php echo __('global.get') ?></a>
            </td>
            <td>
              <?php echo __('publish.abundance') ?>
            </td>
          </tr>
        </table>
        <ul>
          <li><a href="/join-list" class="link-primary"><?php echo __('email.subscribe') ?></a>.</li>
          <li>Join us on <a href="https://twitter.com/lbryio" class="link-primary"><span class="btn-label">Twitter</span><span class="icon icon-twitter"></span></a>,
            <a href="https://facebook.com/lbryio" class="link-primary"><span class="btn-label">Facebook</span><span class="icon icon-facebook"></span></a>,
                or <a href="https://reddit.com/r/lbry" class="link-primary"><span class="btn-label">Reddit</span><span class="icon icon-reddit"></span></a>.</li>
        </ul>
      </div>
      <div class="span6">
        <h3><?php echo __('publish.keepl') ?></h3>
        <ul>
          <?php if (Request::getRelativeUri() != '/what'): ?>
            <li>Read "<a href="/what" class="link-primary">Art in the Internet Age</a>", an introductory essay.</li>
          <?php endif ?>
          <?php if (Request::getRelativeUri() != '/team'): ?>
            <li>Find out about <a href="/team" class="link-primary">the team behind LBRY</a>.</li>
          <?php endif ?>
          <?php if (strpos(Request::getRelativeUri(), '/news') === false): ?>
            <li>Check out the latest <a href="/news" class="link-primary">news</a>.</li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
</div>