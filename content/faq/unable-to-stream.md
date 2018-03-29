---
title: Unable to stream any LBRY content?
category: troubleshooting
order: 2
---

If you are having trouble streaming all LBRY content, there may be an issue with your connectivity to the LBRY network. Sometimes simply restarting LBRY completely could fix the problem - this is usually what you want to try first. Both PC and router firewall settings, as well as other applications which limit internet connectivity (i.e. Internet security applications), may prevent your app from successfully connecting to the LBRY network - you can try disabling these or allowing LBRY to bypass them. Other times, it may be a hosting issue with the particular piece of content you are trying to download - please report in #help on [Discord](https://chat.lbry.io).  

Another common cause of this issue is the lack of access to port 4444 (UDP).  LBRY employs UPnP (if enabled) in order to forward this port on your router automatically. If UPnP is disabled, it must either be enabled, or the port must be forwarded in your router configuration.  We have also seen instances where some ISPs may block port 4444, and for LBRY to download properly, this port must be manually configured - see steps below.  

### How to manually set the DHT (Content Network) port

1. Shutdown LBRY and lbrynet-daemon (check running processes)
2. Go to your [lbrynet folder](https://lbry.io/faq/lbry-directories)
3. If you have a `daemon_settings.yml` file, add this line to it at the end(44444 is an example, can be changed): `dht_node_port: 44444`.
4. If you don't have the `daemon_settings.yml` file, you can create one or download/copy [this sample](https://goo.gl/a5uJq5) into the `lbrynet` folder.
5. Start LBRY and try to download a couple of items from the homepage. Be patient, if it doesn't work, leave the page and try again or a different video.
6. Depending on your network, you may need port 44444 UDP (the new port you just setup) forwarded. Also, for file sharing to work properly, you may need port 3333 (TCP) open/forwarded. This can be verified by using a [port checker](https://www.canyouseeme.org) on port 3333. 44444 will fail since it's UDP

If you continue to have issues streaming/downloading after completing the above steps, please [reach out to us](https://lbry.io/faq/how-to-report-bugs) for additional support.
