<?php Response::setMetaDescription('LBRY\'s warrant canary page') ?>
<?php echo View::render('nav/_header', ['isDark' => false ]) ?>
  <main>
    <div class="content">
      <h1>LBRY Warrant Canary</h1>
      <p>
        Through April 1st, 2018, LBRY has received:
      </p>
      <ul>
        <li>Zero National Security Letters</li>
        <li>Zero Foreign Intelligence Surveillance Court orders</li>
        <li>Zero gag orders that prevent us from stating we have received legal process seeking user or visitor information.</li>
      </ul>
      <p>
        The date on this page will be updated every 3 months.
      </p>
      <p>
        You can view the source code and revision history of this page
        <a href="https://github.com/lbryio/lbry.io/commits/master/view/template/page/canary.php" class="link-primary">here</a>.
      </p>
      <p>
        To receive an automated update when this file changes, try
        <a href="http://www.changedetection.com/" class="link-primary">changedetection.com</a>.
      </p>
    </div>
  </main>
<?php echo View::render('nav/_footer') ?>
