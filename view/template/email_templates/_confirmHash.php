<?php $url = Request::getHostAndProto() . '/list/confirm/' . $confirmHash ?>
<?php ob_start() ?>
<meta itemprop="name" content="Confirm Subscription"/>

<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td class="content-block">
      {{email.confirm_email_body}}
    </td>
  </tr>

  <tr>
    <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
      <a href="<?php echo $url ?>" class="btn-primary" itemprop="url">{{email.confirm_email_button}}</a>
    </td>
  </tr>
</table>

<?php echo View::render('email_templates/_base', ['body' => ob_get_clean()]);
