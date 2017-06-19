<h3 id="credits">Credits</h3>

<p>So far, everything we've done with LBRY has been free. However, some actions, such as reserving a name or purchasing paid content, require credits.</p>
<p>
  There are several ways to obtain credits. See <a href="/faq/earn-credits" class="link-primary">this page</a> for options. We also reward
  testers and contributors, so <a href="http://slack.lbry.io" class="link-primary">join our Slack</a> if you'd like to help.
</p>

<p>To receive credits, you will need to generate a wallet address:</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"wallet_new_address"}'
<span class="code-bash__response">["bbFxRyWCFRkA9YcuuZD8nE7XTLUxYnddTs"]</span></code>

<p>Once you have received or purchased some credits, confirm your balance by calling <code class="code-inline">wallet_balance</code>:</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"wallet_balance"}'
<span class="code-bash__response">[50.00000000]</span></code>


<h3 id="publish">Publishing</h3>
<p>Publishing to LBRY is just as easy as everything else!</p>
<p>Not sure what to publish? We recommend your favorite picture or home video. Or just grab something from <a class="link-primary" href="https://archive.org/details/movies">here</a>.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"publish", "params": {
  "name": "electricsheep",
  "file_path": "/home/kauffj/Desktop/electric-sheep.mp4",
  "bid": 1,
  "metadata":  {
    "description": "Some interesting content",
    "title": "My interesting content",
    "author": "Video shot by me@example.com",
    "language": "en",
    "license": "LBRY Inc",
    "nsfw": false
  } <span class="code-bash__comment">//this should match the metadata returned by resolve_name </span>
}}'
<span class="code-bash__response">[
  {
    "claim_id": "2081486f32dc493980c77bdaa0502950b532af13",
    "fee": 0.000329,
    "nout": 0,
    "tx": "0100000001a2dcee285b3f552fb8b3eef416c9f17...",
    "txid": "d71d63ebb3e10067bfd0b302433bc1ab09fbdd5dc9bc687f50aeb6809d1770fe" <span class="code-bash__comment">//this is the value you need to copy</span>
  }
]</span></code>


<h3>Enjoy a Hollywood Film</h3>
<p><a href="http://www.imdb.com/title/tt1995341/" class="link-primary">It's a Disaster</a> starring David Cross is just one of tens of thousands of great pieces of content available. Check it out!</p>
<p><strong>Note! This will cost you LBC. Run the resolve command to see the cost.</strong></p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"get","params":{"uri":"itsadisaster"} }'
<span class="code-bash__response">[
  {
    <span class="code-bash__comment">//some response fields omitted for brevity</span>
    "claim_id": "bd970a51249cba542a9acfb130147294a6326ee2",
    "download_directory": "/home/kauffj/Downloads",
    "download_path": "/home/kauffj/Downloads/It's A Disaster_Feature.mp4",
    "metadata": {
      "author": "Written and directed by Todd Berger",
      "content_type": "video/mp4",
      "description": "Four couples meet for Sunday brunch only to discover they are stuck in a house together as the world may be about to end."
    }
  }
]</span></code>


<h3>Try the UI</h3>
<p>LBRY comes with a fully-featured UI so that normal people can use it too. You can download it <a href="https://github.com/lbryio/lbry-app/releases" class="link-primary">here</a>.</p>
<h3 id="community">You Did It! What's Next?</h3>
<p>
  Start building something awesome! LBRY works as a discovery and distribution backend for everything from films to CAD files.
  <a class="link-primary" href="/api">View the full API documentation</a>.
</p>
<p>
  <a href="http://slack.lbry.io" class="link-primary">Join our Slack Channel</a> to interact with LBRY developers and other community members. Please visit the #dev room (note: this is not a default channel).
</p>
<p>
  Visit our <a href="https://github.com/lbryio" class="link-primary">GitHub page</a> to view the source code or report issues.
</p>
