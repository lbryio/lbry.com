<div class="cover cover-dark  cover-dark-grad ">
  <div class="content content-dark spacer2">
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
              <a href="/get" class="btn-alt btn-full-width"><?php echo __('Test') ?></a>
            </td>
            <td>
              <?php echo __('Test LBRY and earn credits.') ?>
            </td>
          </tr>
          <tr>
            <td>
              <a href="/join-list" class="btn-alt btn-full-width"><?php echo __('Subscribe') ?></a>
            </td>
            <td>
              <?php echo __('Know when LBRY launches.') ?>
            </td>
          </tr>
        </table>
        <ul>
          <li>Join us on <a href="//twitter.com/lbryio" class="link-primary"><span class="btn-label">Twitter</span><span class="icon icon-twitter"></span></a>,
            <a href="//facebook.com/lbryio" class="link-primary"><span class="btn-label">Facebook</span><span class="icon icon-facebook"></span></a>,
                or <a href="//reddit.com/r/lbry" class="link-primary"><span class="btn-label">Reddit</span><span class="icon icon-reddit"></span></a>.</li>
        </ul>
      </div>
      <div class="span6">
        <h3><?php echo __('I Want To Know More') ?></h3>
        <ul>
          <?php if ($_SERVER['REQUEST_URI'] != '/what'): ?>
            <li>Learn about <a href="/what" class="link-primary">exactly what LBRY is</a>.</li>
          <?php endif ?>
          <?php if ($_SERVER['REQUEST_URI'] != '/why'): ?>
            <li>Read about <a href="/why" class="link-primary">why we've created LBRY</a>.</li>
          <?php endif ?>
          <?php if ($_SERVER['REQUEST_URI'] != '/team'): ?>
            <li>Find out about <a href="/team" class="link-primary">the team behind LBRY</a>.</li>
          <?php endif ?>
          <?php /*
          <li>Access our
            <a href="https://docs.google.com/document/u/1/d/1F2kcuWa8ccGdDZwAyPs3tddvATjN9rcq3iKkyJp9SYM/edit?usp=drive_web"
               class="link-primary">business plan</a>.
          </li>
          <li>Watch our
            <a href="https://docs.google.com/presentation/u/1/d/1zaAPzh9cqvwVD5X7Ewn7_vuBWlJcjNPIfYuUg1rVhRo/present?noreplica=1&slide=id.p"
               class="link-primary">pitch deck</a>.
          </li>*/ ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php /*
 * <div class="content text-center spacer2">
    <h3>Not Ready to Get Serious?</h3>
    <p>Join our mailing list for updates about LBRY.</p>
 
  </div>
 */ ?>