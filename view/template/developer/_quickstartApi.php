<h3 id="api">The API</h3>
<p>
  When running, the LBRY daemon provides a JSON-RPC server running at <code class="code-inline">http://localhost:5279/lbryapi</code>.
</p>
<p>
  It can be accessed by any utility capable of making HTTPS GET and POST requests, such as cURL or possibly your toaster.
</p>
<p>
  To verify the LBRY daemon is running correctly, let's try looking up a name:
</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"resolve_name","params":{"name":"what"}}'
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

<p>
  Above, we called the method
  <code class="code-inline"><a href="<?php echo DeveloperActions::API_DOC_URL ?>#resolve_name" class="link-primary">resolve_name</a></code>
  for the URL <code class="code-inline">lbry://what</code>. This returned the metadata associated with the URL.
</p>

<p>
  Now let's download it. This time we're going to call the method <code class="code-inline">get</code> with the same parameters.
</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"get","params":{"name":"what"} }'
<span class="code-bash__response">[
  {
    "claim_id": "790cd199f4177a1b2045c0f2e5ed922ee4dbce29",
    "completed": false,
    "download_directory": "/home/lbry/Downloads",
    "download_path": "/home/lbry/Downloads/LBRY100.mp4",
    "file_name": "LBRY100.mp4",
    "key": "0edc1705489d7a2b2bcad3fea7e5ce92",
    "message": "Started LBRY100.mp4, got 3/76 blobs, stream status: running",
    "metadata": {
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
    },
    "mime_type": "video/mp4",
    "name": "what",
    "outpoint": "cbfc821bf6a73f62affd69207119e0da1e438ecfcbc1c69777bf01b16f142d47:0",
    "points_paid": 0.0,
    "sd_hash": "d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b",
    "stopped": false,
    "stream_hash": "9f41e37b1ea706d1b431a65f634b89c5aadefb106280da3661e4d565d47bc938a345755cafb2af807bcfc9fbde3306e3",
    "stream_name": "LBRY100.mp4",
    "suggested_file_name": "LBRY100.mp4",
    "total_bytes": 158433904,
    "written_bytes": 0
  }
]</span>
</code>

<p>The LBRY API consists of about 50 calls, all related to discovering, distributing, and purchasing content. <a class="link-primary" href="/api">View the full API documentation</a>.</p>
<p>You can also list all of the commands available by calling the <span class="code-plan">help</span> command.</p>
<code class="code-bash"><span class="code-bash__prompt">$</span>curl 'http://localhost:5279/lbryapi' --data '{"method":"help"}'
</code>
