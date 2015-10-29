<?php Response::setMetaDescription('Download or install the latest version of LBRY.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content spacer1">
    <h1>LBRY for CLI</h1>
    <div class="notice notice-info">
      <strong>This is a pre-release, alpha version of LBRY.</strong> It is only designed to show what LBRY makes possible.
              Expect future releases to involve a full network reboot of both credits and metadata.
    </div>
  </div>
  <div class="content">
    <h2>Install</h2>
    <div class="row-fluid">
      <div class="span6">
        <h3><span class="icon-linux"></span> Linux</h3>
        <div>
          <h4>The Brave and Lazy</h4>
          <ol>
            <li>Make a folder called <code>lbry</code> where you want everything to reside.</li>
            <li>Download and run <a href="https://raw.githubusercontent.com/lbryio/lbry-setup/master/lbry_setup.sh" class="link-primary">this shell script</a> from that folder.</li>
          </ol>
          <h4>The Shrewd and Frivolous</h4>
          <ol>
            <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbrycrd" class="link-primary">lbrycrd</a>, a miner for LBRY credits.</li>
            <li>Clone and follow the build steps for <a href="https://github.com/lbryio/lbry"  class="link-primary">lbry</a>, a console based application for using the LBRY protocol.</li>
          </ol>
        </div>
      </div>
      <div class="span6">
        <h3><span class="icon-apple"></span> OS X</h3>
        <div>
          <h4>OS X Programmers</h4>
          <p>You can attempt to follow the Linux build instructions.</p>
          <h4>Everyone Else</h4>
          <p>Sorry, we do not have an OS X version of LBRY other than source. We promise one will exist sooner rather than later.</p>
        </div>
      </div>
    </div>
    <h2>Test</h2>
    <p>To ensure LBRY is installed co:</p>
    <div class="text-center spacer1">
      <code>get wonderfullife</code>
    </div>
    <p class="meta">In the graphical version, this can accessed by typing "wonderfullife" into the address bar and pressing "Go". In the console version, select "[7] Add a stream from a short name".</p>
    <div class="spacer2">
      <h2>Feedback</h2>
      <p>We've prepared a short form for feedback regarding your LBRY experience, available below.</p>
      <p>We're providing 10,000 LBC (~$100) to the first 500 people who download LBRY and submit their feedback.</p>
      <p><a href="https://docs.google.com/forms/d/1zqa5jBYQMmrZO1utoF2Ok9ka-gXzXLDZKXNNoprufC8/viewform" class="btn-primary">Provide Your Feedback</a></p>
    </div>
  </div>
</main>

<?php echo View::render('nav/footer') ?>


<?php /*
 *
 *  <div class="span4">
        <h3><span class="icon-windows"></span> Windows</h3>
        <p class="meta">
          If you have a standard Windows install, it will insinuate several times that you are an idiot for following the steps below.
          And perhaps you are, but not because this code is dangerous or will harm your computer in any way. Future releases will involve more reputable install steps.
        </p>
        <ol>
          <li>Download <a href="https://github.com/lbryio/lbry/releases/download/alpha/lbry-windows.zip" class="link-primary">this ZIP</a> file.</li>
          <li>There is no installer. Extract the ZIP to wherever you want the program to reside, such as <code>Program Files</code>.</li>
          <li>Run lbry.exe.</li>
        </ol>
      </div>
 */