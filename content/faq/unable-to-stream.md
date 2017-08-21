---
title: Unable to stream any LBRY content?
category: troubleshooting
---

If you are having trouble streaming all LBRY content, including those on the Home Page, there may be an issue with your connectivity to the LBRY content network which operates on Port 4444 (UDP).  LBRY employs UPnP (if enabled) in order to automatically forward this port on your router. If UPnP is disabled, it must either be enabled or the port must be forwarded in your router configuration.  We have also seen instances where some ISPs may block port 4444 and for LBRY to download properly, this port must be manually configured - see steps below.  

### How to manually set the DHT (Content Network) port

1. Shutdown LBRY and lbrynet-daemon (check running processes)
2. Go to your [lbrynet folder](https://lbry.io/faq/lbry-directories)
3. If you have a `daemon_settings.yml` file, add this line to it at the end(44444 is an example, can be changed): `dht_node_port: 44444`
4. If you don't have the `daemon_settings.yml` file, you can create one or download/copy [this sample](https://goo.gl/a5uJq5) into the `lbrynet` folder.
5. Start LBRY and try to download a couple items from the homepage. Be patient, if it doesn't work, leave the page and try again or a different video.
6. Depending on your network, you may need port 44444 UDP (the new port you just setup) forwarded. Also, for file sharing to work properly, you may need port 3333 (TCP) open/forwarded. This can be verified by using a [port checker](https://www.canyouseeme.org) on port 3333. 44444 will fail since it's UDP

If you still receive this warning after completing the above steps, please [reach out to us](https://lbry.io/faq/how-to-report-bugs) for additional support.
