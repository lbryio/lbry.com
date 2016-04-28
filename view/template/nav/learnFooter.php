<div class="cover cover-dark  cover-dark-grad ">
  <div class="content content-dark">
    <div class="row-fluid">
      <div class="span6">
        <h3><?php echo __('Sounds Great. What\'s Next?') ?></h3>
        <table class="table-layout">
          <?php /*
          <tr>
            <td>
              <a href="/fund" class="btn-alt btn-full-width"><?php echo __('Buy') ?></a>
            </td>
            <td>
              <?php echo __('Pre-buy credits and support LBRY.') ?>
            </td>
          </tr>*/ ?>
          <tr>
            <td>
              <a href="/get" class="btn-alt btn-full-width"><?php echo __('Try LBRY') ?></a>
            </td>
            <td>
              <?php echo __('Experience digital abundance.') ?>
            </td>
          </tr>
        </table>
        <ul>
          <li><a href="/join-list" class="link-primary"><?php echo __('Subscribe to our email list') ?></a>.</li>
          <li>Join us on <a href="//twitter.com/lbryio" class="link-primary"><span class="btn-label">Twitter</span><span class="icon icon-twitter"></span></a>,
            <a href="//facebook.com/lbryio" class="link-primary"><span class="btn-label">Facebook</span><span class="icon icon-facebook"></span></a>,
                or <a href="//reddit.com/r/lbry" class="link-primary"><span class="btn-label">Reddit</span><span class="icon icon-reddit"></span></a>.</li>
        </ul>
      </div>
      <div class="span6">
        <h3><?php echo __('I Want To Know More') ?></h3>
        <ul>
          <?php if ($_SERVER['REQUEST_URI'] != '/what'): ?>
            <li>Read "<a href="/what" class="link-primary">Art in the Internet Age</a>", an introductory essay.</li>
          <?php endif ?>
          <?php if ($_SERVER['REQUEST_URI'] != '/team'): ?>
            <li>Find out about <a href="/team" class="link-primary">the team behind LBRY</a>.</li>
          <?php endif ?>
          <?php if ($_SERVER['REQUEST_URI'] != '/news'): ?>
            <li>Check out the latest <a href="/news" class="link-primary">news</a>.</li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
</div>