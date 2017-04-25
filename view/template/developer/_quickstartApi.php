<h3 id="api">API Basics</h3>
<p>
  When running, the LBRY daemon provides a JSON-RPC server running at <code class="code-inline">http://localhost:5279/lbryapi</code>.
</p>
<p>
  It can be accessed by any utility capable of making HTTPS GET and POST requests, such as cURL or possibly your toaster.
</p>
<p>
  To verify the LBRY daemon is running correctly, let's try looking up a URI:
</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"resolve","params":{"uri":"what"}}'
<span class="code-bash__response">[
  {
    "author": "Samuel Bryan",
    "content_type": "video/mp4",
    "description": "What is LBRY? An introduction with Alex Tabarrok",
    "language": "en",
    "license": "LBRY inc",
    "nsfw": false,
    "sources": {
      "lbry_sd_hash": "d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b"
    },
    "thumbnail": "https://s3.amazonaws.com/files.lbry.io/logo.png",
    "title": "What is LBRY?",
    "ver": "0.0.3"
  }
]</span></code>
<h3>First Download</h3>
<p>
  Above, we called the method
  <code class="code-inline"><a href="<?php echo DeveloperActions::API_DOC_URL ?>#resolve" class="link-primary">resolve</a></code>
  for the URL <code class="code-inline">lbry://what</code>. This returned the metadata associated with the URL.
</p>

<p>
  Now let's download it. This time we're going to call the method <code class="code-inline">get</code> with the same parameters.
</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"get","params":{"uri":"what"} }'
<span class="code-bash__response">[
  {
    <span class="code-bash__comment">//some response fields omitted for brevity</span>
    "claim_id": "7b670f0034d0eb119c32acfe8b19ae6622dd218f", <span class="code-bash__comment">//a claim ID is persistent for a piece of content. It stays the same if the original publisher updates the entry.</span>
    "download_directory": "/home/kauffj/Downloads",
    "download_path": "/home/kauffj/Downloads/LBRY100.mp4",
    "file_name": "LBRY100.mp4",
    "metadata": { ... }, <span class="code-bash__comment">//same dictionary as above</span>
    "outpoint": "6e224057a9dfa3417bb3890da2c4b4e9d2471641185c6c8b33cb57d61365a4f0:1", <span class="code-bash__comment">//an outpoint is a frozen-in-time pointer to a specific piece of content. It changes if the content changes.</span>
    "total_bytes": 158433904,
    "written_bytes": 0 <span class="code-bash__comment">//will increase as the file downloads</span>
  }
]</span></code>
<p>This file will download in the background to the <code class="code-inline">download_directory</code> specified in the returned data. Subsequent calls to <code class="code-inline">get</code> or <code class="code-inline">file_list</code> will return the status.</p>
<p>The LBRY API consists of about 50 calls, all related to discovering, distributing, and purchasing content. <a class="link-primary" href="/api">View the full API documentation</a>.</p>
<p>You can also list all of the commands available by calling the <span class="code-plan">help</span> command.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"help"}'
</code>
