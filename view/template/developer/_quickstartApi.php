<h3 id="api">The API</h3>
<p>
  When running, the LBRY daemon provides a JSON-RPC server running at <span class="code-plain">https://localhost:5279/lbryapi</span>.
</p>
<p>
  It can be accessed by any utility capable of making HTTPS GET and POST requests, such as cURL or possibly your toaster.
</p>
<p>
  To verify the LBRY daemon is running correctly, let's try looking up a name:
</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"resolve_name","params":{"name":"what"}}'
[
  {
    "ver": "0.0.3",
    "description": "What is LBRY? An introduction with Alex Tabarrok",
    "license": "LBRY inc",
    "title": "What is LBRY?",
    "author": "Samuel Bryan",
    "language": "en",
    "sources": {
      "lbry_sd_hash": "d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b"
    },
    "content_type": "video\/mp4",
    "nsfw": false,
    "thumbnail": "https:\/\/s3.amazonaws.com\/files.lbry.io\/logo.png"
  }
]</code>
<p>Above, we called the method <span class="code-plain"><a href="<?php echo DeveloperActions::API_DOC_URL ?>#resolve_name" class="link-primary">resolve_name</a></span> for the URL <span class="code-plain">lbry://what</span>. This returned the metadata associated with the URL.</p>
<p>Now let's download it. This time we're going to call the method <span class="code-plain">get</span> with the same parameters.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"get","params":{"name":"what"} }'
["d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b"]</code>
<p>The LBRY API consists about 50 calls, all related to discovering, distributing, and purchasing content. <a class="link-primary" href="http://lbryio.github.io/lbry/api/">View the full API documentation</a>.</p>
<p>You can also list all of the commands available by calling the <span class="code-plan">help</span> command.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"help"}'
</code>