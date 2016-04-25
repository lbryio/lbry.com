<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php Response::setMetaTitle(__('Get LBRY')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main class="column-fluid">
  <div class="span6">
    <div class="cover cover-dark cover-dark-grad">
      <div class="content content-dark">
        <div class="meta  meta-large">
          <span class="icon-linux"></span> <span class="icon-apple"></span>
        </div>
        <h1><?php echo __('I use OS X or Linux and am prepared to have my world rocked.') ?></h1>
        <p class="pflow">Earn early adopter rewards for downloading our Alpha client.</p>
        <div class="spacer1">
          <?php echo View::render('mail/joinList', [
            'submitLabel' => 'Go',
            'listId' => Mailchimp::LIST_GENERAL_ID,
            'mergeFields' => ['CLI' => 'Yes'],
            'fbEvent' => 'Alpha',
            'returnUrl' => '/get?email=1',
            'btnClass' => 'btn-alt'
          ]) ?>
        </div>
        <?php if (!$isSubscribed): ?>
          <div class="meta">
            Already signed up or really hate sharing your email? <a href="/get?email=1" class="link-primary">Click here.</a>
          </div>
        <?php else: ?>
          <div class="content-inset">
            <ul class="no-style">
              <li>
                <a href="/linux" class="link-primary"><span class="icon-linux"></span> Linux</a>
              </li>
              <li>
                <a href="/osx" class="link-primary"><span class="icon-apple"></span> OS X</a>
              </li>
            </ul>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="span6">
    <div class="cover cover-light">
      <div class="content">
        <div class="meta meta-large">
          <span class="icon-mobile"></span> <span class="icon-windows"></span> <span class="icon-android"></span>
        </div>
        <h1><?php echo __('I want LBRY for mobile or Windows and would like my world-rocking at the earliest possible convenience.') ?></h1>
        <p class="pflow">LBRY is coming out on your favorite platform soon. Join our list to know when.</p>
        <?php echo View::render('mail/joinList', [
          'submitLabel' => 'Go',
          'returnUrl' => '/get',
          'listId' => Mailchimp::LIST_GENERAL_ID,
          'mergeFields' => ['CLI' => 'No'],
        ]) ?>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
