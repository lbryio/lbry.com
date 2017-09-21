---
title: How does tipping in LBRY work?
category: getstarted
---

LBRY allows you to tip and support your favorite creators.

Tips can be sent via the LBRY app or via the protocol's [`wallet_send`](https://lbry.io/api#wallet_send) command (with an associated claim id). These credits are automatically stored as associated with the content owners' claim, which helps the claim perform better in search results and be the winning [vanity name claims](https://lbry.io/faq/naming). 

### How do I send a tip?

Sending tips via the LBRY app is easy. Simply go to the page of the content you want to support and click "Support". Next, you'll be prompted for the tip amount in LBRY Credits (LBC). Once you enter a value, click "Send". Mahalo! 

*Note: This amount will show up in your transaction list and will be deducted from your balance.*

### How do I redeem my tips?

When you receive a tip, the credits will come into your wallet and you can see them in your Transaction History. However, since the credits come in as supporting a claim, they will not show in your available balance.

To have these credits show in your balance, they must be released from the claim they support. This can be done via the protocol's [`claim_abandon`](https://lbry.io/api#claim_abandon) command. Unfortunately, this is not supported in the app, but will be available in a future release.
