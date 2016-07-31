<div class="cover cover-light-alt cover-light-alt-grad content content-light">
  <h3>{{social.header}}</h3>
  <div class="row-fluid">
    <div class="span6">
      <h4>{{social.humansheader}}</h4>
      <p>{{social.humanstext}}</p>
      <?php echo View::render('social/_list') ?>
    </div>
    <div class="span6">
      <h4>{{social.robotsheader}}</h4>
      <p>{{social.robotstext}}</p>
      <?php echo View::render('social/_listDev') ?>
    </div>
  </div>
</div>