---
title: What types of LBRY transactions are there?
category: getstarted
---

There are a number of transaction types which take place while using the LBRY application. You can see these transactions in the **Overview** and **History** tabs of the Wallet screen. Certain transaction allow you to take additional actions directly from the transaction screen, such as claiming an incoming tip via the unlock button and revoking a claim via the trash button. Once the action is taken, the action icon will disappear and the resulting transaction will appear in history. See below for details of each transaction type.

| Type | Meaning / Additional Information | Details <br/>Available? | 
--- | --- | ---
| **Spends** | LBC is sent to another address or used to purchase content.<br/>Also, revoked content/claimed tips show as Spends<sup>1</sup> | Planned for<br/>purchases |
| **Receives** | LBC received at wallet address, an incoming content payment or LBRY Reward | Planned for<br/>content payments |
| **Publishes** | LBC bid associated with content publication.<br/>Claims can be revoked<sup>2</sup> | Yes, link to<br/>claim |
| **Channels** | LBC bid associated with Channel creation.<br/>Channels can be revoked | Yes, link to channel |
| **Tips** | Tips sent or received. Received tips can be claimed. | Yes, link to<br/>claim |
| **Supports** | Claim support sent or received. Supports can be revoked | Yes, link to<br/>claim |
| **Updates** | Update to previously published content<sup>3</sup>. Updated claims can be revoked | Yes, link to<br/>claim |

<sup>1</sup> The amount shown in the transaction list only reflects the revoke/claim fee paid. See transaction details for the amount that is returned to your wallet. 

<sup>2</sup> If revoke icon is not available, the claim may have already been revoked or there may be an update to the claim (which can be revoked).

<sup>3</sup> Amount shown does not reflect balance taken out of wallet - the update process uses the original bid amount and the resulting transaction may result in a positive or negative balance to your wallet based on the updated bid amount. This will be fixed in a future release.
