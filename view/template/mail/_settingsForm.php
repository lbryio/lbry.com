<?php js_start() ?>
lbry.emailSettingsForm( '<?php echo json_encode($status) ?>');
<?php js_end() ?>
<?php $error = $error ?? null ?>
<?php $tag = $tag ?? null ?>
<?php $largeInput = $largeInput ?? false ?>
<form id="email_form" onsubmit="lbry.applyEmailEdit()" novalidate>
  <?php if ($error): ?>
    <div class="notice notice-error spacer1"><?php echo $error ?></div>
  <?php endif ?>
  <div class="mail-submit" >
  </div>
    <h2>Emails</h2>
    <h4>Choose which emails you want to receive LBRY news</h4>
    <div>
        <table id="email_table"></table>
        <div><button>Apply</button></div>
    </div>
</form>
<form id="tag_form" onsubmit=="lbry.applyTagEdit()" novalidate>
    <h2>Tags</h2>
    <h4>Any particular interests?</h4>
    <div>
        <table id="tag_table"></table>
        <div><button>Apply</button></div>
    </div>
</form>