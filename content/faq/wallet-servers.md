{
  "title": "What are wallet servers and how do I configure/install them?",
  "url": "/faq/wallet-servers",
  "type": "faq",
  "source_url": "https://lbry.com/faq/wallet-servers",
  "description": "Wallet servers are used to relay data to and from the LBRY blockchain. They also determine what content shows in…",
  "images": [
    "https://spee.ch/e/wallet-servers.jpeg"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#660e030a0a09260a04141f4805090b",
  "footer_email_code": "a4ccc1c8c8cbe4c8c6d6dd8ac7cbc9",
  "meta_title": "What are wallet servers and how do I configure/install them? - LBRY",
  "category": "powerusers",
  "source_file": "content/faq/wallet-servers.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/wallet-servers.md",
  "weight": 52
}
Wallet servers are used to relay data to and from the LBRY blockchain. They also determine what content shows in trending or is blocked.

## How do I connect to a wallet server?

[LBRY Desktop](https://lbry.com/get) is required to configure and connect to a custom wallet server. Navigate to the Settings page and scroll down to experimental settings. Choose **Use custom wallet servers**. Here you can enter the server and port of the wallet server. The connection status will update after a few seconds. If an invalid server is used or it becomes unavailable, you'll lose any wallet and discovery features. If this happens on startup, it will reset to the lbry.tv servers.

![config](https://spee.ch/e/wallet-servers.jpeg)

## Why would I want to run my own wallet server?

If you want...

1.  to help decentralize LBRY's ecosystem.
1.  better performance from a local server
1.  to change trending and other discovery options.
1.  to change what content is filtered and blocked (please consult the laws in your local jurisdiction).
1.  to keep your transaction broadcasting private

## How do I run a wallet server?

This process is mainly meant for power users and will most likely require a dedicated server. Installing and running a wallet server requires two main components, the LBRY full blockchain node and LBRY SDK. We have dockerized this process so it's easy for users to configure and run. Please see our [setup and installation](https://lbry.tech/resources/wallet-server) on how to proceed.

## Manual connection via config file

This requires the creation of a daemon_settings.yml file in the [default data directory](/faq/lbry-directories). Open in a text editor and add (**make sure there's a space after the -**):
```
lbryum_servers: 
- <domain or ip of server>:50001
```

Example:
```
lbryum_servers: 
- community1.lbry.com:50001
```

## What else do I need to know?

1.  Join our [Discord chat](https://chat.lbry.com) and ask to be added to the wallet-server channel to stay up to date.
1.  The client SDK may require a certain version of the wallet server to work properly. For best compatibility, keep them on the same version.
1.  Keep your wallet server up to date with LBRY Desktop app releases. Best bet is to coordinate on Discord chat.
