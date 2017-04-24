<?php NavActions::setNavUri('/learn') ?>
<?php Response::addMetaImage(Request::getHostAndProto() . '/img/cover-team.jpg') ?>
<?php Response::setMetaDescription('description.team') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>Terms of Service</h1>
    <p><strong>This page is a stub. A full acknowledgement is coming before public launch.</strong></p>
    <p>In the interim, by publishing to LBRY, you affirm and acknowledge that:</p>
    <ul>
      <li>You have the right to publish what you are publishing.</li>
      <li>You are publishing to a decentralized, distributed network that is not controlled by LBRY, Inc.</li>
      <li>LBRY, Inc. offers no guarantees of any kind with regards to its protocol, applications, or services, including with regard to the security or availability of your content.</li>
      <li>You absolve LBRY, Inc. of any and all obligations it is legal for you to surrender.</li>
    </ul>
    </div>
</main>
<?php echo View::render('nav/_footer') ?>
