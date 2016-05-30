<br/>
<p>LBRY is coming out on your favorite platform soon. Join our list to know when.</p>
<div class="spacer2">
  <?php echo View::render('mail/joinList', [
    'submitLabel' => 'Go',
    'returnUrl' => '/get',
    'meta' => true,
    'btnClass' => 'btn-alt',
    'listId' => Mailchimp::LIST_GENERAL_ID,
    'mergeFields' => ['CLI' => 'No'],
  ]) ?>
</div>
<p>Can't wait? View the source and compile instructions on
  <a href="https://github.com/lbryio/lbry" class="link-primary">GitHub</a>.
</p>
