<?php $formId = 'email_form' ?>
<?php js_start() ?>
  lbry.emailSettingsForm("#<?php echo $formId ?>", <?php echo json_encode($tags) ?>,  <?php echo json_encode($token) ?>);
<?php js_end() ?>

<noscript>
  Javascript is required to securely send your unsubscribe information. Email <a href="mailto:help@lbry.io" class="link-primary">help@lbry.io</a> for manual unsubscription.
</noscript>
<?php if ($error): ?>
  <div class="notice notice-error spacer1"><?php echo $error ?></div>
<?php else: ?>
  <form id="<?php echo $formId ?>" novalidate style="display: none">
    <section class="email-section">
      <h4><?php echo count($emails) > 1 ? 'Receiving Addresses' : 'Do You Want To Receive Mail?' ?></h4>
      <?php if (count($emails) > 1): ?>
        <div class="meta spacer-half">Uncheck all boxes if you want to receive no future messages.</div>
      <?php endif ?>
      <div class="notice notice-error hide spacer-half"></div>
      <div class="notice notice-success hide spacer-half">Your email preferences have been updated.</div>
      <?php $emailIndex = 0 ?>
      <table>
        <?php foreach ($emails as $email => $enabled): ?>
          <?php $emailId = 'email_' . (++$emailIndex) ?>
          <tr>
            <td>
              <div class="spacer-half">
                <label for="<?php echo $emailId ?>"><?php echo $email ?></label>
              </div>
            </td>
            <td>
              <div class="spacer-half" style="padding-left: 5px">
                <span class="slider-checkbox">
                  <input id="<?php echo $emailId ?>" type="checkbox" <?php echo $enabled ? 'checked' : '' ?>  value="<?php echo urlencode($email) ?>" />
                  <label class="label"></label>
                </span>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </section>

    <section class="tag-section spacer1">
      <h4>Fine-tune your Mail</h4>
      <div class="notice notice-error hide spacer-half"></div>
      <div class="notice notice-success hide spacer-half">Your email preferences have been updated.</div>

      <div class="row-fluid spacer1">
        <?php $tagIndex = 0 ?>
        <?php foreach ($tags as $tag => $enabled): ?>
          <?php if (!isset($tagMetadata[$tag])) { continue; }  //fix/kill this ?>
        <?php $tagId = 'tag_' . (++$tagIndex) ?>
        <div class="span6">
          <div class="row-fluid">
            <div class="span10">
              <label for="<?php echo $tagId ?>"><?php echo isset($tagMetadata[$tag]['label']) ? $tagMetadata[$tag]['label'] : $tag ?></label>
            </div>

            <div class="span2">
              <span class="slider-checkbox">
                <input id="<?php echo $tagId ?>" type="checkbox" <?php echo $enabled ? 'checked' : '' ?> value="<?php echo urlencode($tag) ?>" />
                <label class="label"></label>
              </span>
            </div>
          </div>

          <?php if (isset($tagMetadata[$tag]['description'])): ?>
          <div class="meta">
            <?php echo $tagMetadata[$tag]['description'] ?>
          </div>
          <?php endif ?>
        </div>
        <?php if ($tagIndex % 2 == 0): ?>
        </div><div class="row-fluid spacer1">
        <?php endif ?>
        <?php endforeach ?>
      </div>
    </section>
  </form>
<?php endif ?>
