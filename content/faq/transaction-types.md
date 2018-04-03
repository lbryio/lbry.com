---
title: What types of LBRY transactions are there?
category: wallet
---

There are a number of transaction types which take place on the LBRY blockchain. The LBRY app displays these transactions in the **Overview** and **History** tabs on the Wallet page.

Many transaction types also have details associated with them such as the claim/channel name or if they came from an LBRY Reward. You can also see additional details by clicking the transaction ID and accessing them in the [LBRY block explorer](https://explorer.lbry.io).

| Type | Details |
--- | --- 
| **Spends** | LBC is sent to another address or used to purchase content.<br/>Also, revoked content/claimed tips show as Spends<sup>1</sup>
| **Receives** | LBC received at wallet address, an incoming content payment or LBRY Reward
| **Publishes** | LBC claim associated with content publication.<br/>Claims can be revoked via trash button<sup>2</sup>
| **Channels** | LBC claim associated with Channel creation.<br/>Channels can be revoked via trash button
| **Tips** | Tips sent or received. Received tips can be claimed via unlock button
| **Supports** | Claim support sent or received. Supports can be revoked via trash button
| **Updates** | Update to previously published content<sup>3</sup>. Updated claims can be revoked via trash button

<sup>1</sup> The amount shown in the transaction list only reflects the revoke/claim fee paid. See transaction details for the amount that is returned to your wallet. 

<sup>2</sup> If revoke icon is not available, the claim may have already been revoked, or there may be an update to the claim (which can be revoked).

<sup>3</sup> Amount shown does not reflect balance taken out of wallet - the update process uses the original bid amount, and the resulting transaction may result in a positive or negative balance to your wallet based on the updated bid amount. This will be fixed in a future release.

### Additional Actions

Certain transactions allow you to take additional actions directly from the transaction screen, such as claiming an incoming tip via the unlock button and revoking a claim via the trash button. Once the action is taken, the action icon will disappear, and the resulting transaction will appear in your history. 

### What About Purchases?

Content purchases and incoming content payments are not currently available but are planned for a future release. Currently these show as spends.
