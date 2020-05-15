---
title: How to change default daemon peer port?
category: powerusers
---

If you see the error message `couldn't bind to port 3333`, it is likely that another process is already bound to that port. You will need to change the port before starting the daemon. The port number should not matter as long as it is available and not blocked by your ISP.

The most user friendly way to change the port permanently is to append the below line to the `daemon_settings.yml` in the `lbrynet` [directory](/faq/lbry-directories). If it doesn't exist, create a new file named `daemon_settings.yml` and append:

    tcp_port: 3334

Sample daemon_settings.yml (may vary by OS):

    download_directory: c:\users\lbry
    tcp_port: 3334

## Other methods
To change the port once during runtime, set the LBRY_PEER_PORT env variable. Here's one way to do this:

    LBRY_TCP_PORT=3334 ./lbrynet-daemon

Once the daemon is running, you can change the port permanently by using the following [api](/api) call

    curl -d'{"method": "settings_set", "params": {"key": "tcp_port", "value": <port-num>}}' http://localhost:5279/


or via cli command

    lbrynet settings set tcp_port 3334
