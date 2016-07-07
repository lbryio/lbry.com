---
title: How do I see the list of API functions I can call, and how do I call them?
---

Here is an example script to get the documentation for the various API calls. To use any of the functions displayed, just provide any specified arguments in a dictionary. Many (though not all) of the calls are the same as those for bitcoin core, which are documented [here](https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list).

If for some reason you can't get lbrycrd-cli working to make these calls, make sure you passed -server when starting lbrycrd. If it still doesn't work, you can use this command if running lbrycrd with -server:

    curl --user USER:PASSWORD --data-binary '{"jsonrpc": "1.0", "id":"curltest", "method": "COMMAND", "params": [] }' -H 'content-type: text/plain;' http://127.0.0.1:9245/

USER and PASSWORD come from the above instructions and can be found in your lbrycrd.conf file, COMMAND can be any of the supported methods like getbalance or getnewaddress. 9245 is the default port used, but if you chose a custom port for the server, you'll need to use that instead. If the command accepts parameters, they can be passed inside the params array [].

See Also: [important directories](https://lbry.io/faq/lbry-directories).

Note: the lbry api can only be used while either the app or lbrynet-daemon command line are running

    import sys
    from jsonrpc.proxy import JSONRPCProxy

    try:
      from lbrynet.conf import API_CONNECTION_STRING
    except:
      print "You don't have lbrynet installed!"
      sys.exit(0)

    api = JSONRPCProxy.from_url(API_CONNECTION_STRING)
    if not api.is_running():
      print api.daemon_status()
    else:
      for func in api.help():
        print "%s:\n%s" % (func, api.help({'function': func}))
