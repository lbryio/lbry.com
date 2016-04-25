<?php Response::setMetaDescription('Provide feedback on your experience using LBRY.') ?>
<?php Response::setMetaTitle(__('Feedback')) ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main class="cover-stretch-wrap" >
  <div class="cover cover-dark cover-dark-grad">
    <div class="content-dark content" style="min-height: 100%">
      <div class="row-fluid" style="height: 100%">
        <div class="span9">
          <h1><?php echo __('Feedback') ?></h1>
          <?php echo View::render('download/feedback-prompt') ?>
          <iframe id="feedback-form-iframe" src="https://docs.google.com/forms/d/1zqa5jBYQMmrZO1utoF2Ok9ka-gXzXLDZKXNNoprufC8/viewform?embedded=true"
                  width="760" height="1720" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
        </div>
        <div class="span3">
          <?php echo View::render('social/sidebar') ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php echo View::render('nav/footer') ?>
<?php js_start() ?>
  $(function() {
    var count = 0;
    $('#feedback-form-iframe').load(function(){
      ++count;
      if (count == 2) //2nd load = a submit
      {
        ga('send', 'event', 'Sign Up', 'Alpha Test');
        twttr.conversion.trackPid('nu2ye');
        fbq('track', 'CompleteRegistration');
      }
    });
  });
<?php js_end() ?>
