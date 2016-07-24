<?php Response::setMetaDescription('WHAT WHAT') ?>
<?php NavActions::setNavUri('/get') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <div class='prefinery-form-embed'></div>
  </div>
</main>
<script type="text/javascript">var _pfy = _pfy || [];(function(){function pfy_load(){var pfys=document.createElement('script');pfys.type='text/javascript';pfys.async=true;pfys.src='https://lbry.prefinery.com/widget/v2/whzquod5.js';var pfy=document.getElementsByTagName('script')[0];pfy.parentNode.insertBefore(pfys,pfy);}if (window.attachEvent){window.attachEvent('onload',pfy_load);}else{window.addEventListener('load',pfy_load,false);}})();</script>
<?php echo View::render('nav/footer') ?>