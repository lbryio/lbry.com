---
author: samuel-lbryian
title: 'Development and Community Update June 2018'
date: '2018-07-06 16:00:00'
cover: 'fireworks.jpg'
category: community-update
---

Welcome to the June 2018 LBRY Development and Community update! In this post we'll show you what we've been up to and review our progress for the month of June. This month we launched the [LBRY app redesign](#summary), made enhancements to the LBRY protocol, continued to move forward with our Android app alpha testing, and began several new community initiatives, including the [debut of the lbry.fund, created to fund projects promoting or using the LBRY protocol](#lbry-fund).

Scroll down to learn about new [rewards updates](#reward) as well as a couple contests where you can earn up to $300 USD in LBRY credits. To read all of our previous updates, please visit our [Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see what we have completed recently and what's planned for LBRY, check out our [roadmap](https://lbry.io/roadmap).

## UPDATE - LBRY Community Contests
If you're a designer or 3D printing expert, we have two contests that might be right up your alley - read on for details!

### LBRY T-shirt design contest
Calling graphic designers! We are hosting a t-shirt design contest for the LBRY Merchandise Shop. Use your imagination to design LBRY logowear or another creative concept illustrating your vision of LBRY. First and second place winners will respectively get $100 and $50 in LBC plus $25 in credit to use in the LBRY Shop! [You can find the details here.](https://lbry.io/shirt-contest)

### 3D Printed Chess Set Contest
We are now accepting design submissions for our [Chess Set Design contest](https://lbry.io/3d-contest)! Winners will receive $150 in LBC; $100 for Grand Prize, $50 Runner-up.

Earn $5 in LBC just for uploading your chess set to the LBRY network. Email the lbry:// address to [james@lbry.io](mailto:james@lbry.io) to enter and claim your reward! Winners will be decided by Tom, Julie, and James. We're looking for a set designed with originality and/or craftsmanship!

You can also get paid to print out our featured Cryptocurrency Chess Set and/or Genius Chess Set by simply posting a picture of it to social media and tagging LBRY! Details at the bottom of the contest page.

Want to keep in touch regarding future 3D printing updates, [subscribe here](https://lbry.io/3d-printing)!

To skip the tech stuff, see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}

### App and Protocol Summary {#summary}
We are extremely excited to announce that the LBRY app redesign, codename Austen, was launched on June 26th! You can read [our blog post](https://lbry.io/news/austen) which details the most important updates in the new app and introduces the LBRY app naming system. Full release notes can be found on our [GitHub page](https://github.com/lbryio/lbry-desktop/releases/tag/v0.22.0)

For a deeper perspective of this process from the eyes of our lead developer Sean, check our his [blog post here](https://lbry.io/news/lbry-desktop-redesign).

On the protocol side of the house, we released [version 0.20](https://github.com/lbryio/lbry/releases/tag/v0.20.2) along with the redesign launch that included a tuned DHT implementation in order to increase consistency and availability of P2P data. Once more peers came online, we discovered and fixed a number of issues which should make the overall network run smoother - these are included with the latest app patch and [daemon version 0.20.3](https://github.com/lbryio/lbry/releases/tag/v0.20.3). In our benchmarks, we are at or just above 95% availability when downloading well seeded content from the homepage. We've identified a few more issues when multiple downloads are performed simultaneously and are currently looking for a solution.

![redesign](https://spee.ch/7/lbry-redesign-full.jpg)

### New Rewards {#reward}
To celebrate LBRY's second birthday and the redesign launch, we're DOUBLING all in-app rewards for new users as well as existing ones that haven't claimed rewards (this included the weekly LBRYCast also too)! Returning users (those we have earned LBRY rewards prior to the redesign launch) will also receive a 50 LBC reward when they upgrade to LBRY Austen. New app users can now claim over 40 LBC in rewards by completing tasks in the app, check out our [rewards page](https://lbry.io/faq/rewards) for the latest details and amounts. In the coming weeks, we will introducing tiered rewards, stay tuned!

![redesign](https://spee.ch/0/redesign-reward.jpg)

### File Renderer enhancements and 3D/PDF Support!
Community member [btzr](https://github.com/btzr-io) has been working on two PRs that greatly improve the LBRY app's ability to support additional file types. First, the [File Renderer PR](https://github.com/lbryio/lbry-desktop/pull/1576) refactors the current code which will allow passing certain file types to different viewer types (i.e. if it's a PDF, use a PDF viewer). To showcase this feature, he's also added a [3D file viewer](https://github.com/lbryio/lbry-desktop/pull/1558) which currently supports previewing of STL files in-app! This will also be expanded to OBJ files in the future.

![3D](https://spee.ch/b/3d-support.jpg)

![PDF](https://spee.ch/3/pdf-support.gif)

### Search Result Setting
A big limitation in previous LBRY versions was related to search results - it would only return 10. With the recent improvements in protocol speed, we've added a configurable setting on the search page. Users can now control how many results are returned from their searches. Next up in terms of search improvements will be additional filters like searching inside channels and narrowing down file types.

![search](https://spee.ch/d/search-results.jpg)

### Channels on Homepage, with CryptoCandor!
We are currently experimenting with a more dynamic LBRY Explore page with [@CryptoCandor's](https://open.lbry.io/@CryptoCandor) channel which is updated as soon as she uploads new content. This is different from our previous approach where the rest of the homepage is static LBRY URLs as opposed to a specific channel. Once we improve [the UX around this experience](https://github.com/lbryio/lbry-desktop/issues/1717), we will be adding more channels to use this scheme.

![Candor](https://spee.ch/2/cryptocandor-channel.jpg)

### Easier way to find your wallet, Open Directory Button!
We currently have a [GitHub PR](https://github.com/lbryio/lbry-desktop/pull/1638) in progress by a community member which will add a Open Wallet Directory button to the wallet backup page. This will make it easier for users to locate their wallet file. The change also includes an easy copy button to copy/paste the wallet directory.

![Button](https://spee.ch/e/wallet-backup-button.jpg)

### LBRY for Android Update
The recent updates to LBRY for Android Alpha include the addition of a welcome page on startup, ability to view channels, a separate trending page, and blockchain sync status on startup. Behind the scenes, ongoing work includes the derivation of a unique device ID for authentication to our API server in order to support things like rewards and wallet syncing. Initial work as also begin on moving rewards logic to a common area so it can be shared with the desktop app.  Want to give alpha testing a shot? [Sign up here](https://lbry.io/android-alpha)!

![Android Sync](https://spee.ch/8/android-lbry-sync.jpg)

### spee.ch Update
We've gone back to the basics with spee.ch and began re-focusing on core components such as social sharing and knocking out existing bugs. A recent change to channel pages fixes the sorting order to match what's in the LBRY app. We've also spent some time debugging why publishing on the spee.ch server is taking longer than expected (average of 20-30 seconds). Our findings show that the new LBRY wallet will help speed this up so we are looking forward to that being released! Finally, we had to impose some API limits and other spam preventative measures... thank you, spammers, for keeping us on our toes!

Interested in running your own spee.ch server or clone? Check out the [quick start guide](https://github.com/lbryio/www.spee.ch/blob/master/quickstart.md) and GitHub repository at [lbryio/www.spee.ch](https://github.com/lbryio/www.spee.ch).

![speech publish time](https://spee.ch/4/speech-timing.jpg)

### Protocol - Improved Speed {#speed}
[Version 0.20.2](https://github.com/lbryio/lbry-desktop/releases/tag/v0.22.0) of the protocol greatly improved the LBRY app experience by speeding up resolve calls throughout the app. Resolve calls are used anytime the app needs information about a channel or claim, such as when the homepage is loaded or when you go into a channel. These changes brought the initial homepage load from about a minute down to 4 seconds!! This significantly improves the first run experience for new users as well as the channel browsing speeds. The fix was a combination of optimizing SQL queries along with adapting a faster cryptographic library which sped up verification of data. We hope this is one of many places that can still be further optimized in the LBRY ecosystem.

![speed](https://spee.ch/a/protocol-timing.jpg)

### Protocol - LBRY Reflector Hosting {#reflector}
As some of you may be aware, LBRY Inc helps with the hosting of content that's published to LBRY. Currently we employ a single server which accepts the data and forwards it to multiple content hosts. Over time, and especially with larger volumes of uploads coming from the YouTube Sync program, we've realized this solution won't cut it anymore. Our engineers are working on a new process which would host all the blob files on a single Amazon S3 data storage server and multiple satellite nodes that would be responsible for announcing the content via the LBRY P2P protocol. This should allow for a larger throughput and less maintenance since all the data will be in a single place.

### Protocol - Wallet Server and Client Development Updates {#wallet}
On the server side, our 2 ElectrumX servers (lbryumx1.lbry.io and lbryumx2.lbry.io) are getting their first extended action with the launch of the redesigned app (which included the protocol update for the wallet servers). We've been monitoring performance and so far so good! If you experience any wallet issues, please [let us know](https://lbry.io/faq/support).

On the client side, we've begun testing the wallet migration process from the old style wallet to the new one. The old wallet included all transaction data in the default_wallet data file which was inefficient. The new wallet will store only seed and channel information in the default_wallet file, which a SQL database will store all transaction and claim information. Left on the todo list is signing claims with channel certificates and double checking that all the current API commands are implemented. In the next couple of weeks we should have a test version for the community to try out. We are excited to see improvement in publishing times, especially on larger wallets, like spee.ch's, with this update!

![SQL Wallet](https://spee.ch/1/wallet-sql.jpg)

### Blockchain - Hard fork Update - ALL SYSTEMS GO!
LBRY will undergo a [hard fork on 7/9/18](https://lbry.io/news/hf1807), which is just a few days from the time of this blog post. There won't be any noticeable changes for most users, but miners and exchanges will need to make sure they are running [version 0.12.2.0 of the LBRYcrd full blockchain wallet ](https://github.com/lbryio/lbrycrd/releases/tag/v0.12.2.0) to ensure they are on the most up to date chain. We've done our due diligence to reach out to known exchanges, miners and other service providers (i.e. Coinomi/Changelly/ShapeShift) informing them of the update.

The LBRY blockchain team is already preparing for the next set of upgrades for a 2nd hardfork - this time it revolves around case sensitivity of claim and channel names. See the current [GitHub PR](https://github.com/lbryio/lbrycrd/pull/159) for details. We may include another blockchain upgrade to go along with this, stay tuned!

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), and also on [Reddit.](https://www.reddit.com/r/lbry)

### LBRY.fund Launches {#lbry-fund}
June was an exciting month as we released our LBRY.fund program to fund projects from you -- our community! So far, we've received great proposals from users around the globe telling us how they would like to promote or build applications using the LBRY protocol. We're hearing pitches from film studios, YouTubers, media organizations, Meetup groups, animators, hackathon organizers, software companies, and a wide variety of other creative people with unique ideas! It is awe-inspiring for us to hear ideas to use the LBRY protocol in ways we would never imagined, and we thank you as you inspire us. Keep the ideas coming, and we'll be announcing first grant recipients soon! [Visit the LBRY.fund.](https://lbry.fund)

![LBRY.fund](https://spee.ch/2/lbry-fund.png)

### Help Create the Stack Exchange Community for LBRY
We've had great response and progress on the LBRY Protocol site on Stack Exchange, but in order for the community to move onto the Commitment phase, we need more folks to help vote for example questions and then commit to use the site. Please give us a hand:
[View the LBRY Stack Exchange site here](https://area51.stackexchange.com/proposals/118455/lbry-protocol)

<a href="https://area51.stackexchange.com/proposals/118455/lbry-protocol-digital-content-distribution"><img src="https://area51.stackexchange.com/ads/proposal/118455.png" width="300" height="250" alt="Stack Exchange Q&A site proposal: LBRY Protocol - Digital Content Distribution" /></a>

### LBRY is hiring! New Jobs Posted
[Come join team Content Freedom!](https://lbry.io/join-us) We have the following positions open: Blockchain Engineer, Protocol Engineer, and API Engineer. We'd love for you to join us, or if you have a friend you think would be interested, we pay a $5,000 bounty if we hire them.

### Roadmap Check-in
We are happy to mark UI Redesign, URL embedding of free content, and LBRY.fund marked as completed on the [roadmap](https://lbry.io/roadmap). We've recently added *LBRY Content Mirroring 2.0* to the Q3 roadmap, check the latest update [here](#reflector).

### Youtube Sync Updates {#youtube-updates}
Since we initiated our new YouTube Sync program, we've mirrored more than 500,000 videos to LBRY's decentralized content network! If your favorite creator hasn't joined the party yet, send them [this link](https://lbry.io/youtube) and tell them to get on it!

We've had to scale back on YouTube sync publishing so that our [content hosting infrastructure](#reflector) can be upgraded to support the large amounts of data being uploaded. Pardon us for the delay if you are waiting for your content to be synced or updated, we hope to be back up and running in full steam within a couple weeks!

### Twitter TipBot Update
Our [Twitter Tipbot](https://twitter.com/@LBC_Tipbot) received a small revamp which fixes a number of bugs we were running into. It can now be called without having to use the `lbryian` keyword. See the latest commands on [our FAQ page](https://lbry.io/faq/tipbot-twitter)!

<blockquote class="twitter-tweet"><p lang="en" dir="ltr">Call commands with: <a href="https://twitter.com/LBC_TipBot?ref_src=twsrc%5Etfw">@LBC_TipBot</a> + <br/>help - Shows this command.<br/>balance - Get your balance.<br/>deposit - Get address for your deposits.<br/>withdraw ADDRESS AMOUNT - Withdraw AMOUNT credits to ADDRESS.<br/>tip USER AMOUNT - Tip USER AMOUNT.<br/>terms - Sends the TOS.</p>&mdash; LBC_TipBot (@LBC_TipBot) <a href="https://twitter.com/LBC_TipBot/status/1015264401836765184?ref_src=twsrc%5Etfw">July 6, 2018</a></blockquote> 
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

### LBRY Merchandise Shop
New patriotic and free speech inspired designs have been added to our shop as well as [tank tops for the summer](https://shop.lbry.io/collections/mens-unisex/products/lbry-logo-tank-top) - check out the entire offering at our [merchandise shop](https://shop.lbry.io)!

![Satoshi Jefferson t-shirt](https://spee.ch/c/jefferson.png)

### LBRY.tech Update {#lbry-tech}
LBRY.tech is in the middle of a major overhaul - when we're done, it will be easier to use and more accessible to developers who want to learn about LBRY. You can follow along with progress on our [GitHub repository](https://github.com/lbryio/lbry.tech). Next steps before launch include determining a single API documentation resource across our projects.  We've recently added a [glossary with LBRY/Blockchain related terms](https://lbry.tech/glossary.html) and moved [several technical documents](https://github.com/lbryio/lbry.tech/tree/master/content/resources) over to the lbry.tech repository. The 2nd step of the tour, which allows for developers to publish a meme on the blockchain, has been completed.

![lbrytech publish](https://spee.ch/9/lbry-tech-publish.jpg)

# Want to develop on the LBRY protocol?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. In the next few weeks we'll be releasing [lbry.tech](#lbry-tech), a technical reference / guide website which will be developer and contributor focused to drive more apps and services on top of LBRY.

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
