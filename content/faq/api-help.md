---
title: How do I see the list of API functions I can call, and how do I call them?
category: developer
---

## The LBRY API

The best way to learn how to use the LBRY API is to go through our [quickstart](https://lbry.io/quickstart).

A full list of API calls provided by LBRY is available in [the API documentation](https://lbry.io/api).

If you're new to LBRY, this is probably the API you want.

## The LBRY Blockchain API (lbrycrd)

Ensure that `lbrycrd` is running with the `-server` flag, which enables the JSON-RPC API. Then use one of the following methods to make API calls.

Many (though not all) of the calls are the same as those for bitcoin core, which are
documented [here](https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list). To see the full list of API calls, use the `help` API call.

### lbrycrd-cli

    lbrycrd-cli help

### curl

    curl --user USER:PASSWORD --data-binary '{"jsonrpc": "1.0", "id":"curltest", "method": "help", "params": [] }' -H 'content-type: text/plain;' http://127.0.0.1:9245/

- `USER` and `PASSWORD` can be found in your lbrycrd.conf file.
- The `method` field can be any of the supported methods like `getbalance` or `getnewaddress`.
- `9245` is the default port used, but if you chose a custom port for the server, you'd need to use that instead.
- If the command accepts parameters, they can be passed inside the `params` array.

See Also: [important directories](https://lbry.io/faq/lbry-directories).
