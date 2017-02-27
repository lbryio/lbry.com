<h3 id="credits">Credits</h3>
<p>So far, everything we've done with LBRY has been free. However, some actions, such as reserving a name or purchasing paid content, require credits.</p>
<p>To receive credits, first generate a wallet address:</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"wallet_new_address"}'
<span class="code-bash__response">["bbFxRyWCFRkA9YcuuZD8nE7XTLUxYnddTs"]</span></code>
<p>Enter this address in the form below and we'll send you 50 credits.</p>
<div class="quickstart__claim-form content-light content" id="new-developer">
  <?php echo View::render('developer/_formNewDeveloperReward', [
    'returnUrl' => Request::getRelativeUri() . '#new-developer'
  ]) ?>
</div>
<p>Next, confirm you've received your credits by calling <code class="code-inline">wallet_balance</code>:</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"wallet_balance"}'
<span class="code-bash__response">[50.00000000]</span></code>
<h3 id="publish">Publishing</h3>
<div class="notice notice-info spacer1">
  The credit reward for this portion of the guide does not work yet. It will be added shortly. However, you can still follow this section to learn how to publish.
</div>
<p>Publishing to LBRY is just as easy as everything else! If you publish something, we'll send you an additional 200 LBC for further use.</p>
<p>Not sure what to publish? We recommend your favorite picture or home video. Or just grab something from <a class="link-primary" href="https://archive.org/details/movies">here</a>.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"publish", "params": {
  "name": "electricsheep",
  "file_path": "\\home\kauffj\\Desktop\\electric-sheep.mp4",
  "bid": 1,
  "metadata":  { } <span class="code-bash__comment">//this should match the metadata returned by resolve_name </span>
}}'
<span class="code-bash__response">[whatever this response looks like]</span></code>
<div class="quickstart__claim-form content-light content" id="new-publish">
  <?php echo View::render('developer/_formCreditsPublish', [
    'returnUrl' => Request::getRelativeUri() . '#new-developer'
  ]) ?>
</div>
<h3>Enjoy a Hollywood Film</h3>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"get","params":{"name":"itsadisaster"} }'
<span class="code-bash__response">["d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b"]</span></code>
<h3>Try the UI</h3>
<p>LBRY comes with a UI so that normal people can use it too. You can download it <a href="https://lbry.io/get" class="link-primary">here</a>.</p>
<h3 id="community">You Did It! What's Next?</h3>
<p>
  Start building something awesome! LBRY works as a discovery and distribution backend for everything from films to CAD files.
</p>
<p>
  <a href="http://slack.lbry.io" class="link-primary">Join our Slack Channel</a> to interact with LBRY developers and other community members. Please visit the #dev room (note: this is not a default channel).
</p>
<p>
  Visit our <a href="https://github.com/lbryio" class="link-primary">GitHub page</a> to view the source code or report issues.
</p>