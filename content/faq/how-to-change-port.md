---
title: How to change default daemon peer port?
category: setup
---

If you see the error message `couldn't bind to port 3333`, it is likely that another process is already bound to that port. You will need to change the port before starting the daemon. The port number should not matter as long as it is available and not blocked by your ISP.

To change the port once during runtime, set the LBRY_PEER_PORT env variable. Here's one way to do this:

    LBRY_PEER_PORT=3334 ./lbrynet-daemon

Once the daemon is running, you can change the port permanently by using the following [api](/api) call

    curl 'http://localhost:5279/lbryapi' --data '{"method":"settings_set", "params":{"peer_port":<port-num>}}'

or via cli command

    lbrynet-cli settings_set --peer_port 3334

Another way to change the port permanently is to append the below line to the `daemon_settings.yml` in the `lbrynet` [directory](https://lbry.io/faq/lbry-directories). If it doesn't exist, create a new file named `daemon_settings.yml` and append:

    peer_port: 3334
