---
title: How does LBRY handle privacy? What data does LBRY collect?
category: LBRY 101
order: 5
---

First and foremost, LBRY carefully considers privacy and data collection throughout its ecosystem. In order to better understand how the LBRY infrastructure functions and how users interact with our applications, LBRY collects analytics and diagnostic information. We promise to keep any collected data safe and never share it with anyone outside of LBRY Inc. Users can also [choose to use LBRY anonymously](#anonymous) however some features, like [LBRY Rewards](https://lbry.com/faq/rewards), will not be available.

Additionally, a user’s participation in the peer to peer LBRY network may expose certain information like IP addresses associated with direct data exchanges. See [below](#p2p) for more information. 

Please see our [official Privacy Policy](https://lbry.com/privacypolicy) detailed information.

### What’s the difference between account data and cryptocurrency wallets? 
Each installable LBRY application also contains a cryptocurrency wallet which is stored locally on the respective device. The wallet allows you to store LBRY Credits and use them to [transact (spend, publish, purchase, and tip) on the network](https://lbry.com/faq/transaction-types). The private information, which is required to perform these actions, is under the sole control of the user. 

LBRY does provide a wallet syncing and backup mechanism to allow seamless access across multiple devices. The backup service ensures that a wallet can be retrieved by the user through their LBRY account in case they lose access to their local copy. Any storage and exchange of wallet data has end to end encryption, and the user can also provide an additional encryption password if desired. 

### What type of data is collected and where?
As a first time user of LBRY applications, you have the option of providing an email address to create a LBRY account. This allows for a richer user experience by enabling services such as [LBRY Rewards](https://lbry.com/faq/rewards), email notifications, and account synchronization (i.e. subscriptions and user preferences) across multiple devices/platforms. If you do not provide an email, any data collected cannot be associated with your identity, but may still be tied back to other system information like IP addresses. 

See below tables for a break-down of the types of data collected and associated applications. 

Scope of Data | Depends on| Optional | Details
:------------ |:------------ |:------------ |:------------ |
Email addresses | | Yes | Used to create and authenticate a LBRY account
Account preferences | Email | Yes | Subscriptions, tags, blocked channels, and application settings
System information | | No | Operating system, application/SDK versions, and unique install identifier 
Identity verification | Email | Yes |  Phone number, credit card fingerprint (Stripe), and 3rd party services identifiers (i.e. YouTube, GitHub)
Google Analytics | | Yes |  User behavior and interactions within the applications are tracked anonymously. This is not linked to a LBRY account. 
Content access analytics | Email | Yes | Content views used for Rewards and internal analytics
IP addresses | | No | Any access to LBRY services are logged to prevent abuse and comply with legal requirements
Blockchain metadata | Email | Yes | Wallet addresses and transactions related to Rewards are logged to prevent abuse and comply with tax requirements (above $600 yearly threshold)


Scope of Data | LBRY Desktop App | LBRY.tv (Web) | LBRY Android App | LBRY SDK |
:------------ |:------------ |:------------ | :-------------| :-------------|
Email addresses | yes | yes | yes | no |
Account preferences | yes | yes | yes | no |
System information | yes | no | yes | yes |
Identity verification | yes | yes | yes | no |
Google Analytics | opt-out | yes | yes | no |
Content access analytics | yes | yes | yes | yes |
IP addresses | yes | yes | yes | opt-out |
Blockchain metadata | yes | yes | yes | no |

### How do I use LBRY anonymously? {#anonymous}
To use LBRY in a fully anonymous way, we recommend the LBRY Desktop application (turn off diagnostic data in Settings), not providing an email, and using a Virtual Private Network (VPN). This will still allow you use blockchain related features like retrieving content data, publishing, purchasing, tipping, and other transactions. Depending on VPN features and network configuration, hosting data currently may not be possible but we are looking into techniques to allow this in the future. 

### Where is the account and analytics data stored? 
LBRY stores collected data on its own secured databases and ensures only authorized employees have access to this data. Google Analytics data is stored and protected by Google, please see their [terms of service](https://marketingplatform.google.com/about/analytics/terms/us/) for more information. 

### What information is shared with others in the network? {#p2p}
Similarly to other peer to peer protocols like BitTorrent, users in the network share messages (i.e. announcing content availability) and create direct connections to exchange data (i.e. downloads / uploads). While LBRY does not collect this information, other participants of the network can observe and collect the information. 

### Can I use a VPN to use and access LBRY?
Yes, a VPN can be used with all LBRY services. Major features will work without any problems, but VPN users may not be eligible for [LBRY Rewards](https://lbry.com/faq/rewards) in order to prevent abuse.

### What data is collected with the YouTube Sync program? 
When authenticating into the [YouTube Sync program](https://lbry.com/youtube), you provide proof of channel ownership that allows us to link your YouTube channel to a LBRY account. This allows us to sync content and Reward YouTubers where applicable. 
