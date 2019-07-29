---
title: How does content hosting work?
category: getstarted
---

Right now, it's simple: you host what you download. The hosted data is stored in the [lbrynet/blob files folder](https://lbry.com/faq/lbry-directories)

While the LBRY app is running, it communicates to the network whatever content you're making available. For proper communication to occur, your router must have UPNP enabled or you have to manually port forward 3333 TCP / 4444 UDP (see router on how to do so, each one is different). 

Think of it like how torrents or any other peer-to-peer (P2P) service works. First, you download a file from the host(s) that have made it available via seeding.

When the download has finished, you become a host in the network (seeder) that other people can download from.

**Please note: Hosting fees are currently disabled on the network as we're currently working on a better way to implement the fee structure.**
