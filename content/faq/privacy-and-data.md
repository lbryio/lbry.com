---
title: How does LBRY handle privacy? What data does LBRY collect?
category: LBRY 101
order: 5
---

LBRY takes privacy seriously and carefully considers the data it collects.

Our official privacy policy is viewable at https://lbry.com/privacypolicy. This FAQ article attempts to explain our policy in plain English, but should not be considered an official policy document.

LBRY collects data for a variety of reasons, including but not limited to:
- debugging and improving the protocol
- understanding how our users interact with our applications
- preventing fraud in our reward programs
- providing statistics to content creators

We promise to keep any collected data safe and to never share personal, private information with anyone outside of LBRY Inc. You must be over 13 years of age to sign into the Desktop app or create a lbry.tv account.

Users can also [choose to use LBRY anonymously](#anonymous) however some features, like [LBRY Rewards](https://lbry.com/faq/rewards), will not be available.

Additionally, even when not sending data to us, using LBRY (outside of lbry.tv) typically involves participation in the peer-to-peer LBRY network and certain information like your IP address is likely to be exposed regardless. See [below](#p2p) for more information.

## What type of data is collected and where?
As a first time user of LBRY applications and [lbry.tv](https://lbry.tv), you have the option of providing an email address to create an LBRY account. This allows for a richer user experience by enabling services such as [LBRY Rewards](https://lbry.com/faq/rewards), email notifications, and account synchronization (i.e. subscriptions and user preferences) across multiple devices/platforms. If you do not provide an email, any data collected cannot be associated with your identity, but may still be tied back to other system information like IP addresses.

See below tables for a break-down of the types of data collected and associated applications.

Scope of Data | Depends on   | Optional     | Visibility       | Details
:------------ |:------------ |:------------ |:---------------- |:------------ |
Email addresses | | Yes, if email provided | LBRY | Used to create and authenticate a LBRY account
User preferences | Email | Yes, if email provided | LBRY | Subscriptions, tags, blocked channels, and application settings
System information | | Yes, if Share Diagnostic Data enabled | LBRY | Operating system, application/SDK versions, and unique install identifier
Identity verification | Email | Yes, if going through manual approval | LBRY | Phone number, credit card fingerprint (Stripe), and 3rd party services identifiers (i.e. YouTube, GitHub)
Google Analytics | | Android only |  LBRY | User behavior and interactions within the applications are tracked anonymously. This is not linked to a LBRY account.
Content access analytics | Email | Yes, if email provided | LBRY | Content views used for Rewards and internal analytics
IP addresses | | No, use VPN to protect | Everyone | Any access to LBRY services are logged to prevent abuse and comply with legal requirements
Blockchain metadata | Email | Yes, if email provided | LBRY| Wallet addresses and transactions related to Rewards are logged to prevent abuse and comply with tax requirements (above $600 yearly threshold)
Blockchain transactions | | No, don’t create transactions | Everyone | Any actions taken that use LBRY credits and create a permanent transaction on the blockchain. Not linked to any Account/User data.

Scope of Data | LBRY Desktop App | lbry.tv (Web) | LBRY Android App | LBRY SDK |
:------------ |:------------ |:------------ | :-------------| :-------------|
Email addresses | yes | yes | yes | no |
User preferences | yes | yes | yes | no |
System information | yes | no | yes | yes |
Identity verification | yes | yes | yes | no |
Google Analytics | opt-in | no | yes | no |
Content access analytics | yes | yes | yes | yes |
IP addresses | yes | yes | yes | opt-out |
Blockchain metadata | yes | yes | yes | no |
Blockchain transactions | yes | yes | yes | yes |

## What’s the difference between account data and cryptocurrency wallets?
Each installable LBRY application also contains a cryptocurrency wallet that is stored locally on the respective device. The wallet allows you to store LBRY Credits and use them to [transact (spend, publish, purchase, and tip) on the network](https://lbry.com/faq/transaction-types). The private information, which is required to perform these actions, is under the sole control of the user.

LBRY does provide a wallet syncing and backup mechanism to allow seamless access across multiple devices. The backup service ensures that a wallet can be retrieved by the user through their LBRY account in case they lose access to their local copy. Any storage and exchange of wallet data has end to end encryption, and the user can also provide an additional encryption password if desired.

## How do I use LBRY anonymously? {#anonymous}
To use LBRY privately, we recommend the LBRY Desktop application. By default, the LBRY Desktop app will not share account or analytics data with LBRY, Inc. or third-parties without specifically being enabled.

For a maximally private experience, you should also use a Virtual Private Network (VPN) to protect your IP address. This will allow you to use features like retrieving content data, publishing, purchasing, tipping, and other transactions anonymously. Depending on VPN features and network configuration, hosting data currently may not be possible, but this is an area of active development.

Note that if using LBRY anonymously or privately you are not eligible for [lbry.tv rewards](https://lbry.com/faq/rewards).

## Where is the account and analytics data stored?
LBRY stores collected data on its own secured databases and ensures only authorized employees have access to this data. Google Analytics data is anonymized and protected by Google. We are soon moving away from GA completely - only the Android app has it enabled.

## What information is shared with others in the network? {#p2p}
Similarly to other peer to peer protocols like BitTorrent, users in the network share messages (i.e. announcing content availability) and create direct connections to exchange data (i.e. downloads/uploads). While LBRY does not collect this information, other participants of the network can observe and collect the information.

## Can I use a VPN to use and access LBRY?
Yes, a VPN can be used with all LBRY services. Major features will work without any problems, but VPN users may not be eligible for [LBRY Rewards](https://lbry.com/faq/rewards) to prevent abuse.

## Is any additional data collected if I participate in the YouTube Sync program?
When authenticating into the [YouTube Sync program](https://lbry.com/youtube), you provide proof of channel ownership that allows us to link your YouTube channel to an LBRY account. Information about your account is stored and kept by LBRY, Inc.
