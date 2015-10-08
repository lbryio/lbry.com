<?php echo View::render('nav/header', ['isDark' => false]) ?>
<div class="content spacer1">
  <h1>Get LBRY</h1>
</div>
<div class="hero hero-pattern spacer2">
  <div class="hero-content content content-dark">
    <h2 class="hero-title text-center">LBRY is temporarily invite-only.</h2>
    <div class="row-fluid">
      <div class="span6">
        <h3 class="hero-title-small">I Have An Invite Code</h3>
        <p>Enter your code below.</p>
        <?php if ($inviteError): ?>
          <div class="notice notice-error spacer1"><?php echo $inviteError ?></div>
        <?php endif ?>
        <form action="/get" method="post" novalidate>
          <div class="mail-submit">
            <input type="text" value="" name="invite" placeholder="BANANA">
            <input type="submit" value="Go" name="submit" class="btn-alt">
          </div>
        </form>
      </div>
      <div class="span6">
        <h3 class="hero-title-small">Tell Me When LBRY Is Public</h3>
        <p>LBRY is launching soon. Be the first to know.</p>
        <?php echo View::render('mail/joinGeneralList', [
            'submitLabel' => 'Subscribe'
        ]) ?>
      </div>
    </div>
  </div>
</div>
<?php if ($fullPage): ?>
  <div class="content">
    <h3>Want To Know More?</h3>
    <p>Learn about <a href="/what" class="link-primary">what LBRY does</a>,
      <a href="/why" class="link-primary">why we made it</a>, or
      <a href="//blog.lbry.io" class="link-primary">read the latest news</a>.</p>
  </div>
<?php endif ?>
<?php echo View::render('nav/footer') ?>