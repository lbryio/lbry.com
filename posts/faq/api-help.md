---
title: How do I see the list of API functions I can call, and how do I call them?
date: '2015-06-21 16:00:00'
---

Here is an example script to get the documentation for the various API calls. To use any of the functions displayed, just provide any specified arguments in a dictionary.

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
