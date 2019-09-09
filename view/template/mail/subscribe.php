<?php Response::setMetaTitle(__('title.join')) ?>
<?php Response::setMetaDescription(__('description.join')) ?>

<main class="ancillary">
  <section class="hero hero--plain">
    <div class="inner-wrap">
      <h1>{{page.join}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap" style="position: relative;">
      <?php if ($confirmSuccess ?? false): ?>
        <?php if (IS_PRODUCTION): ?>
          <?php js_start() ?>
            ga('send', 'event', 'Sign Up', 'Join List', 'lbryians');
            twttr.conversion.trackPid('nty1x');
            fbq('track', 'Lead');
          <?php js_end() ?>
        <?php endif ?>
        <div class="notice notice-success spacer1">{{email.confirm_success}}</div>
      <?php elseif ($subscribeSuccess ?? false): ?>
        <div class="notice notice-success spacer1">{{email.subscribe_needs_confirm}}</div>
        <a class="link-primary" href="<?php echo $nextUrl ?? '/' ?>">{{email.return}}</a>
      <?php else: ?>
        <p>{{page.updates}}</p>
        <?php if ($error ?? false): ?>
          <div class="notice notice-error spacer1"><?php echo $error ?></div>
        <?php endif ?>
        <?php echo View::render('mail/_subscribeForm', ['returnUrl' => $nextUrl ?? '/']) ?>
      <?php endif ?>
    </div>
  </section>
</main>
