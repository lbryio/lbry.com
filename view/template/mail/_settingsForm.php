<?php $formId = 'email_form' ?>
<?php js_start() ?>
  lbry.emailSettingsForm("#<?php echo $formId ?>", <?php echo json_encode($tags) ?>,  <?php echo json_encode($token) ?>);
<?php js_end() ?>

<noscript>
  Javascript is required to securely send your unsubscribe information. Email <a href="mailto:help@lbry.com" class="link-primary">help@lbry.com</a> for manual unsubscription.
</noscript>

<?php if ($error): ?>
  <div class="notice notice-error spacer1"><?php echo $error ?></div>
<?php else: ?>
  <form id="<?php echo $formId ?>" novalidate style="display: none">
    <section class="email-section">
        <div style="min-height: 33px"> <?php //hack fix to prevent jumping?>
            <div class="notice notice-error hide spacer-half"></div>
            <div class="notice notice-success hide spacer-half">Your email preferences have been updated.</div>
        </div>
      <h4><?php echo count($emails) > 1 ? 'Receiving Addresses' : 'Do You Want To Receive Mail?' ?></h4>
      <?php if (count($emails) > 1): ?>
        <div class="meta spacer-half">Uncheck all boxes if you want to receive no future messages.</div>
      <?php endif ?>

      <?php $emailIndex = 0 ?>

      <?php foreach ($emails as $email => $enabled): ?>
        <?php $emailId = 'email_' . (++$emailIndex) ?>
        <checkbox-element>
          <input id="<?php echo $emailId ?>" name="<?php echo $emailId ?>" type="checkbox"<?php echo $enabled ? " checked" : "" ?> value="<?php echo urlencode($email) ?>"/>
          <label for="<?php echo $emailId ?>"><?php echo count($emails) > 1 ? $email : __('Yes') . ' (' . $email . ')' ?></label>
          <checkbox-toggle/>
        </checkbox-element>
      <?php endforeach ?>
    </section>

    <section class="tag-section spacer1">
        <div style="min-height: 33px"> <?php //hack fix to prevent jumping?>
            <div class="notice notice-error hide spacer-half"></div>
            <div class="notice notice-success hide spacer-half">Your email preferences have been updated.</div>
        </div>
      <h4>Fine-tune your Mail</h4>

      <?php $tagIndex = 0 ?>
      <?php foreach ($tags as $tag => $enabled): ?>
        <?php if (!isset($tagMetadata[$tag])) {
    continue;
} ?>
        <?php $tagId = 'tag_' . (++$tagIndex) ?>
        <div>
          <checkbox-element>
              <input id="<?php echo $tagId ?>" name="<?php echo $tagId ?>" type="checkbox"<?php echo $enabled ? " checked" : "" ?> value="<?php echo urlencode($tag) ?>"/>
              <label for="<?php echo $tagId ?>">
                <?php echo isset($tagMetadata[$tag]['label']) ? $tagMetadata[$tag]['label'] : $tag ?>
                <?php if (isset($tagMetadata[$tag]['description'])): ?>
                  <span class="meta">&middot; <?php echo $tagMetadata[$tag]['description'] ?></span>
                <?php endif ?>
              </label>
              <checkbox-toggle/>
          </checkbox-element>
        </div>
      <?php endforeach ?>
      <?php if ($tagIndex === 0): ?>
          <div class="notice notice-error"><?php echo __('Something went wrong. Please email help@lbry.com') ?></div>
      <?php endif ?>
    </section>
  </form>
<?php endif ?>
