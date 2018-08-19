<?php $formId = 'email_form' ?>
<?php js_start() ?>
  lbry.emailSettingsForm("#<?php echo $formId ?>", '<?php echo json_encode($status) ?>', <?php echo json_encode($token) ?>);
<?php js_end() ?>
<noscript>
  Javascript is required to securely send your unsubscribe information. Email <a href="mailto:help@lbry.io" class="link-primary">help@lbry.io</a> for manual unsubscription.
</noscript>
<form id="<?php echo $formId ?>" novalidate style="display: none">
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php endif ?>
  <div class="notice notice-success hide">Your email preferences have been updated.</div>
  <div class="email-section">
    <div class="notice notice-error hide spacer1"></div>
    <h2>Emails</h2>
    <h4>Choose which emails you want to receive LBRY news</h4>
    <table></table>
  </div>
  <div class="tag-section">
    <h2>Tags</h2>
    <h4>Any particular interests?</h4>
    <div class="notice notice-error hide"></div>
    <table id="tag_table"></table>
    <div>
      <input type="submit" value="Save" class="btn-primary">
    </div>
  </div>
</form>