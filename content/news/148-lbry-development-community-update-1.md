---
author: samuel-lbryian
title: 'Development and Community Update'
date: '2017-12-12 5:00:00'
category: community-update
---

<center><img src="https://spee.ch/53640dcec6744ce9da9b326fe44f9d6e7572be83/LBRYteam.jpg"/></center>

<br/>

The LBRY community spoke, and we listened! This is the first of many posts that will keep the community up-to-date on project development and what's going on in the LBRY community. To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

To skip the tech stuff and see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates  {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [contributing guide](https://lbry.io/faq/contributing).

### Housekeeping
Anytime a software project brings on new faces, especially when the code was previously handled by very few developers, it's a good idea to step back and re-assess the current structure and state of the codebase. That's exactly where some of the initial energy from our new developers has been directed. These changes included simplifying the build and webpack processes, adding [Flow](https://hackernoon.com/type-checking-in-javascript-getting-started-with-flow-8532c11aceb3) as a type checking mechanism, improving application analytics, and implementing a few other code restructuring efforts.

### Converting Crypto to LBC via ShapeShift
With the growing popularity of Bitcoin and other cryptoassets, we wanted to make it easy for users to convert their funds into LBC in as many ways as possible - this idea turned into the [ShapeShift](https://shapeshift.io) integration project. Users used to have to register on one of the exchanges, like Poloniex or Bittrex, to acquire additional LBC - now they can get as much as they want right in the app.

The latest version of LBRY now has an area in the Get Credits tab of the Wallet which allows users to deposit their crypto and convert to LBC directly, without ever leaving the app! Users will be able to choose from depositing BTC, BCH, LTC, DASH and XMR and have ShapeShift convert it into LBC deposited directly into their LBRY app wallet.

![Convert Crypto to LBC](https://spee.ch/3/convertcrypto1.JPG)

You can view our new [ShapeShift FAQ](https://lbry.io/faq/shapeshift) for more details.

We are also exploring the possibility of adding a Coinbase buy widget which would allow you to purchase LBC through your Coinbase account and/or Credit Cards. Other next steps would be to identify the ShapeShift transactions in your wallet screen and link back to your transaction.

### Subscriptions
The newest release of the LBRY app allows users to subscribe to their favorite creators. Their subscriptions appear on a separate page in the app that allows them to see the latest from their favorite LBRY publishers. Users subscribe to a publisher by visiting any of their content pages or the creator's channel - once the subscribe button is clicked, the channel is added to the "Subscriptions" tab. Users can also unsubscribe anytime time to remove the content from their Subscriptions page. This is just a very basic rollout, and we intend to continue improving the UX and functionality.

### In-App Upgrades
We are enhancing the app upgrade process in two ways - notifying users that there's an update at a regular interval (previously this was only done on startup) and implementing a more seamless in-app upgrade process. The current version of LBRY will feature the first enhancement while we work out a few last issues with the latter.

### New User Rewards
The first run process, which new LBRY users experience on their first app run, is getting a minor makeover. We will now grant a 1 LBC reward to users who verify their email, full stop, no extra steps. To earn additional LBRY [Rewards](https://lbry.io/faq/rewards), we'll need to verify that you are a unique user by going through our humanness [verification process](https://lbry.io/faq/identity-requirements). Only one rewards account is allowed per household. The next step in the Rewards realm is to increase the referral redemption limit (currently at 1).

### LBRY Protocol Updates
Our original goal was to deliver the most recent app release with an updated LBRY protocol version, but we ran into unexpected trouble making a rather large change to the file_list function to work properly with the app. The next set of protocol updates will also include additional DHT (our P2P network) enhancements, fixes to wallet bloat, smarter use of change addresses, a lbrynet console (helps with debugging, running commands to the daemon) and claim renewal options (to be discussed down the road).

Although we still encounter intermittent problems with content availability, we have made large strides from where we were just a couple months ago. Our team continues to identify potential solutions to issues we observe on the network, and we will continue to roll them out over the next series of protocol upgrades.

Finally, we are **almost finished** with wallet encryption capabilities! The code should be merged within the next couple of days, and we'll be running through some internal testing before reaching out to the community. The next steps would be to integrate the functionality into the LBRY app and user experience.

### Wallet Transaction Enhancements
One area that's undergoing continuing improvements is the [wallet transaction list](https://lbry.io/faq/transaction-types). We recently added additional information to transactions linked to channel creation, publishing, updates, tipping and rewards. Some of these transactions also have associated actions, such as abandoning claims and redeeming tips. The next steps in this area will include correctly categorizing the abandon transactions, capturing/showing purchase and content payment transactions and ShapeShifts.


### App Redesign
Although we won't go into any specific details, there is a major app re-design on the horizon. Some of you may have seen screenshots/links on our #dev-ux channel on [Discord](https://chat.lbry.io) - one of the perks of being in our community :)

Part of the goal of the re-design is to improve the publishing workflow by separating out content and channel management. More generally, we want to make the LBRY app as intuitive and easy to use as possible, and we'll be doing everything we can to make it happen.

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform.

### lbry.io Website
A lbry.io website redesign is in the works along with an updated team page which will include all the new team members that have joined. A big part of this update will be the YouTube onboarding page which is meant to educate YouTubers about the importance of LBRY and have them claim/sync their channels.

### Tuesday Movie Night
On Tuesday, November 28th, we had our first ever live [movie night](https://lbry.io/news/howl-with-us) where our team and Discord community members pressed play together to watch Howl, starring James Franco. We had a blast interacting with everyone and plan on doing more of these live events in the future. While we won't always watch them along with you, we will be releasing new movies on the LBRY platform every Tuesday. Watch your email for those announcements.

Join us for the next [Community Movie Night](https://lbry.io/news/a-very-special-holiday-special) on December 12, 2017, at 8:00 PM EST for Rare Exports - A Christmas Tale.

### Contributions and Tipping
Our Discord server is armed with the almighty LBRY tipbot which allows us to reward our community members for their suggestions, feedback and other contributions. Come chat with us to discover the various ways you can help the project. Whether it's helping us test the software, providing a service to the community, writing a blog post or being a brand ambassador, we appreciate all contributions!

### Meetups and College Campus Initiatives
Although we are still finalizing our programs for both meetups and college initiatives, we'd love to hear from you if you are interested! Please join us on the respective #meetup / #campus channels in [Discord](https//chat.lbry.io).

### Growing our Discord Community
If you are aware of Discord communities which could benefit from what LBRY offers as a platform, drop us a line on Discord. We are at the beginning stages of an initiative to reach out to other communities whose interests or goals may align with LBRY's vision for a decentralized and creator controlled digital content marketplace.

[Back to **Development Updates**](#dev-updates)
