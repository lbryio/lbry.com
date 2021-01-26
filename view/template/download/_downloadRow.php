<div style=" display: flex; margin-top: 2rem;">
  <div style="flex: 1; text-align: center;">
    <div style="line-height: 32px;">
        <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
    </div>
    <small style="margin-top: 2px; display: inline-block"><a href="/get?showall=1" class="button--link hide--mobile">other platforms</a></small>
  </div>

          <div class="odysee" style="flex: 1; text-align: center">
              <a href="https://odysee.com">
                  <img src="https://odysee.com/public/img/odysee.png" />
              </a>
              <br/>
              <small class="meta" style=" display: inline-block; max-width: 160px">use LBRY in your browser, with <a class="button button--link" href="https://odysee.com">odysee.com</a></small>

          </div>
</div>