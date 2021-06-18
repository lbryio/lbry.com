---
title: How does content hosting work?
category: getstarted
---

Right now, it's simple: you host what you download and publish on the LBRY Desktop app (hosting not available on lbry.tv, odysee.com or Android). The hosted data is stored in the [lbrynet/blob files folder](https://lbry.com/faq/lbry-directories). On publish, the content is also sent to LBRY in order to help re-host content so your PC does not need to remain available.

While LBRY Desktop is running, it communicates to the network whatever content you're making available. For proper communication to occur, your router must have UPNP enabled or you have to manually port forward 3333 TCP / 4444 UDP (see router on how to do so, each one is different).

Think of it like how torrents or any other peer-to-peer (P2P) service works. First, you download a file from the host(s) that have made it available via seeding. When the download has finished, you become a host in the network (seeder) that other people can download from.

## Controlling these settings
On the LBRY Desktop application, you can configure the download options on the Settings page. You have the option to enable/disable to files and hosted data from being saved.

On Android, only published data is saved in the blobs folder.

To set ports manually, set values for following options in [lbrynet/daemon_settings.yml file](https://lbry.com/faq/lbry-directories).<br>
```
udp_port: <udp_port>
tcp_port: <tcp_port>
```
_Note:_ If the tcp port falls between port numbers 3333 and 3399 (inclusive), the UDP port should be set to 1111 higher than the TCP port. Otherwise, the UDP port should be set to the same port number as the TCP port.

## Moving hosted content
Currently, this process is manual and you can see our [FAQ on how to move the hosted content](/faq/how-to-change-lbry-blob-files) to another drive.

## Deleting hosted content
You can delete files from the blob folder directly, or you can also delete them from the My LBRY section of the App - both will get rid of the hosted content and you'll lose the ability to seed it anymore.

## Web apps (lbry.tv / odysee.com)
Currently, the web applications take advtange of LBRY Inc hosted reflector servers to provide a high bandwidth and availablity solution to casual web users. All content is still available on the P2P network via the Desktop application regardless of where it's uploaded. In the future, we'll be looking into ways of providing the power of P2P over the web. 

**Please note: Hosting fees are currently disabled on the network as we're currently working on a better way to implement the fee structure.**
