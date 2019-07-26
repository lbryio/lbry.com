---
title: How do tipping and supporting in LBRY work?
category: getstarted
---

LBRY allows you to tip and support your favorite creators.

Tips can also be sent via the LBRY app or via the protocol's [`support_create`](/api#support_create) command (with an associated claim id and `--tip` parameter). If sent without the `--tip` parameter, this is considered a support that can be redeemed by the person who made it at any time (think of it as a self tip, but helping someone else's content).

These credits are automatically stored as associated with the content owners' claim, which helps the claim perform better in search results, top, and [trending calculations](https://lbry.com/faq/trending). It also helps secure the winning [vanity name claims](/faq/naming).

Version 0.34 of the Desktop application also has a experimental setting for supporting claims without tipping. By default, creators will also see the Support button on their own content. When supporting other content, you help the publisher [boost their discoverability](https://lbry.com/faq/trending) and secure their [vanity claim names](/faq/naming), but you can redeem your deposit at anytime. [Learn more below](#supports)

### How do I send a tip?

Sending tips via the LBRY app is easy. Simply go to the page of the content you want to support and click "Send a tip".

Next, you'll be prompted for the tip amount in LBRY Credits (LBC). Once you enter a value, click "Send". Mahalo!
![sendtip](https://spee.ch/@clem:0/tipsend.png)

**Note: This amount will show up in your transaction list and will be deducted from your balance.**

### How do I redeem my tips?

When you receive a tip, the credits will come into your wallet, and you can see them in your Transaction History. However, since the credits come in as supporting a claim, they will not show in your available balance.

To have these credits show in your balance, they must be unlocked via the wallet Overview/History page. This is done by clicking the unlock icon next to `Tip` and then confirming your action on the following screen. Once the transaction is finalized, the icon will disappear. This also nullifies any help the support/tip was giving in terms of search results, trending, and top discovery mechanisms. 

Unlock tip: ![Unlock tip](https://spee.ch/@clem:0/tipunlock.png)

Confirmation box: ![Confirmation box](https://spee.ch/@clem:0/tipconfirmation.png)

### How do I send a support? {#supports}

Publishers will see the Support button on their own content. To support other content, enable this option on the Settings page (Experimental Options) of the LBRY Desktop app. Then navigate to a page you want to help and click the support button.

![supports](https://spee.ch/c/supports.jpeg)
