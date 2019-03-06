---
author: samuel-lbryian
title: 'Development and Community Update May 2018'
date: '2018-06-07 12:00:00'
cover: 'lbryopoly-min.jpg'
category: community-update
---

Welcome to our LBRY Development and Community update! In this post we'll show you what we've been up to and review our progress for the month of May. This month we made progress on our desktop app redesign and Android app alpha, LBRY Protocol improvements (work in progress), LBRY tech resource website, and several community initiatives. Scroll down to learn about new rewards coming to the app as well as a couple contests for you to earn up to $300 USD in LBRY credits. To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see what we have planned for LBRY, check out our [roadmap](https://lbry.io/roadmap).

To skip the tech stuff, see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. In June, we'll be releasing [LBRY.tech](#lbry-tech), a technical reference / guide website which will be developer and contributor focused to drive more apps and services on top of LBRY.

### App and Protocol Summary
The app team released a few patches on the pre-redesign version of the desktop app, you can find all the release notes on our [GitHub release page](https://github.com/lbryio/lbry-desktop/releases). The fixes/features in these patches allow us to rename the lbry-desktop repo to lbry-desktop, send emails with a link to open LBRY to various pages like the Rewards section of the app, prevent errors when opening invalid URLs, give us the ability to roll out new rewards like [Welcome Back to LBRY](#wb-reward), and provide a long-awaited daemon upgrade to [0.19.3](https://github.com/lbryio/lbry/releases/tag/v0.19.3) which enables faster blockchain sync. On the app redesign side of the fence, we've progressed to a 2nd round of community testing and are close to a final release, [read more below](#redesign-updates).

On the protocol side of the house, our engineers have been deep in the weeds with [version 0.20](https://github.com/lbryio/lbry/releases/tag/v0.20.0rc9) tuning our DHT implementation in order to increase consistency and availability of P2P data. We've discovered and fixed a number of issues which should make the overall network run smoother. Peers now know when other peers are offline and drop them from their routing tables - something that was not being done previously. We've also improved the process to allow peers to connect to multiple hosts when searching for data. We are also making sure that these changes are backwards compatible with nodes on older versions, and expect to put out a release in the next week or two. For wallet server and client updates, see [below](#wallet).

### App Redesign {#redesign-updates}
The LBRY desktop app redesign is in its second round of community testing after numerous bugs were fixed and a few new features like improved [markdown support](#md), [autoplay](#autoplay) and a  [view on web](#view-web) button. The left hand menu was also reorganized so that "My LBRY" only contains Downloads and Publishes, and the Settings option was moved up to first class to join Explore/Subscriptions/My LBRY/Publish/Help.

Our goal is to release the app redesign by the end of June, barring the discovery of any other critical bugs. The main bugs left to be worked out include issues with getting the subscriptions page to load in some cases and editing of claims (properly putting them into pending status and checking for confirmation).

![redesign](https://spee.ch/7/redesign-update-May-2018.jpeg)

### Welcome Back Reward {#wb-reward}
If you are eligible for [LBRY Rewards](https://lbry.io/faq/rewards), you may have noticed a new reward pop up, as well as an email notification! We've deployed a new, time sensitive reward that must be claimed within 48 hours for existing LBRY app users. New users who sign up for LBRY will also be eligible for this reward automatically (to be turned on ASAP!) if they revisit the LBRY app a day after claiming their first reward.

![welcome back](https://spee.ch/7/welcome-back2.jpeg)

### Pop-out Player
A new community contributor, dan1d on Discord, has resurrected our efforts to bring a pop-out player to the LBRY app. Based on initial testing, he's getting quite close to a finished 1.0 version of this and you can follow along with his [PR on GitHub](https://github.com/lbryio/lbry-desktop/pull/1523) to learn more. The last known bug that exists is a hiccup where the player goes back to a "waiting for metadata" state when switching from the claim page to pop out mode. If this can be fixed, we hope to include it with the app redesign release. The next steps in v2.0 would be to make it draggable to other parts of the screen.

![popout](https://spee.ch/b/pop-out.png)

### Improved Markdown Support {#md}
Long time community developer, btzr on Discord, has made yet another great addition to the LBRY app - enhanced markdown support along with confirmation prompts when clicking URLs. This will enable creators to spice up the descriptions of their content, see below for a great example from community creator Mibo! This will be available in the LBRY app redesign.

![markdown](https://spee.ch/0/markdown-preview.jpeg)

### Autoplay Free and Downloaded media  {#autoplay}
A local Manchester, NH contributor, Travis, added the ability to autoplay free and downloaded media files to the LBRY app. This means that videos will start automatically and photos/other media will open when entering the claim page. By default, this setting will be shipped in an off state and users will be able to enable it on content pages or in the settings area. Looking to contribute? We want to make the styling fancier, and it's a great place for a new developer to start - see this [GitHub issue](https://github.com/lbryio/lbry-desktop/issues/1539).

![autoplay](https://spee.ch/0/lbry-autoplay-redesign.jpeg)

### View on Web Button {#view-web}
Travis has also added a View on Web button which is shown on channel pages as well as content pages for certain media types (videos/images/gifs). This button will open up the content on [spee.ch](https://spee.ch) so it can be easily shared via the web. The button on the channel pages will lead to the channel page on speech, such as [@TheRubinReport](https://spee.ch/@TheRubinReport).

![view on web](https://spee.ch/0/view-on-web.jpeg)

### LBRY for Android Update
LBRY for Android underwent a product review with management recently and a number of [issues were identified](https://github.com/lbryio/lbry-android/issues?q=is%3Aissue+label%3A"product+review"). The latest updates to the alpha include a search function, ability to open other file types like images, html and text and, opening of lbry:// URLS via hyperlinks. Want to give alpha testing a shot? [Sign up here](https://lbry.io/android-alpha)!
![Android Search](https://spee.ch/0/Lbry-android-search.jpeg)

### spee.ch Update
We can't believe another month has passed! Since the last update, we've been working to streamline the spee.ch code base and creating tools so that anyone who wants to run their own version of spee.ch can do so with a few easy configurations. If you are interested in running your own version of spee.ch, visit the #speech discord channel or try the [quick start guide](https://github.com/lbryio/www.spee.ch/blob/master/quickstart.md) at [lbryio/www.spee.ch](https://github.com/lbryio/www.spee.ch)

### Protocol - Wallet Server and Client Development Updates {#wallet}
On the server side, we've released [version 1.1.0](https://github.com/lbryio/lbryumx/releases/tag/v1.1.0) of lbryumx, which is an electrumx clone with improvements for the LBRY blockchain. We have been testing this internally on the LBRY desktop app as well as on our spee.ch and YouTube sync servers. So far the results have been promising and we hope to include this with the next release of the LBRY protocol to replace our two (lbryum8/9 which the app uses) SPV wallet servers.

On the client side, a good amount of progress has been made and integration testing was setup to test various scenarios when connecting to lbryumx. The next step is to internally test the client side wallet with the LBRY app, which should begin in the 2nd week of June. If all goes well, a release will be right around the corner! Together with lbryumx, we expect a large performance increase when resolving claims and publishing - two of the main features used in the LBRY protocol.

### Protocol - Componentizing the Daemon
LBRY's Daemon is our silent, unsung hero - and we're taking big steps in refactoring the way it works to improve performance in its startup code. The components that are currently initialized in the Daemon.py file will be separated and put in a different modules in order to make the code more organized and flexible.

Down the road, this will offer many benefits such as running only the components which services require and not others. One example would be an implementation that needs to only act as a seed server - you can just run the lbrynet-daemon with the DHT component and turn off others. By employing this technique, you could run multiple instances by using less system resources overall. Another example might be a service that only needs the wallet to run - one would enable that functionality and turn off data sharing features.

### Chainquery SQL Databasing on the Blockchain
Chainquery is here! The need for Chainquery originally came along when we noticed we relied on the same type of blockchain data across many projects/services at LBRY and thus the project was born! While this new feature will be invisible to most users, it gives people developing apps on the LBRY protocol a powerful new set of tools to work with our blockchain.  If you want to dive into the details, take a look at [our blog post](https://lbry.io/news/what-is-chainquery).

At LBRY, we are in the process of integrating Chainquery into our internal services. The first service to integrate with Chainquery was our [Lighthouse search](https://github.com/lbryio/lighthouse) which occurred a few weeks ago. Previous to this,  Lighthouse relied on its own database, which had some flaws when keeping up with claim updates. By relying on Chainquery for current blockchain data, Lighthouse now has the most up to date claim and channel information when presenting search results. The next couple projects to integrate Chainquery will most likely be spee.ch and our internal API service which provides authentication, analytics and rewards.

![chainquery](https://spee.ch/@lbry/topchannels.png)

### Blockchain - Hard fork Update
LBRY will undergo a hard fork on 7/9/18. There won't be any noticeable changes for most users, but miners and exchanges will need to make sure they are running [version 0.12.2.0 of the LBRYcrd full blockchain wallet ](https://github.com/lbryio/lbrycrd/releases/tag/v0.12.2.0) to ensure they are on the most up to date chain. Read [this blog post](https://lbry.io/news/hf1807) for the whole story.

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), and also on [Reddit.](https://www.reddit.com/r/lbry)

### Help Create the Stack Exchange Community for LBRY
Please check out the newly proposed LBRY Protocol site on Stack Exchange, and help get it to the next step. Example questions and up votes are needed!
[View the LBRY Stack Exchange site here](https://area51.stackexchange.com/proposals/118455/lbry-protocol)

<a href="https://area51.stackexchange.com/proposals/118455/lbry-protocol-digital-content-distribution">
  <img src="https://area51.stackexchange.com/ads/proposal/118455.png" width="300" height="250" alt="Stack Exchange Q&A site proposal: LBRY Protocol - Digital Content Distribution"/>
</a>

### Education Donations
At LBRY, we believe in the importance of quality education, and think that every child should have the opportunity to pursue the type of education that fits them best and allows them to succeed. We're proud to announce that we've donated $2,500 in funding to the [Children's Scholarship Fund of New Hampshire](https://nh.scholarshipfund.org), a non-profit organization that provides scholarships to empower low-income New Hampshire families to choose the schools that best fit their children's needs, regardless of their income or zip code.

If you're inspired to help a child get the education they need, you can [donate to the CSFNH here](https://nh.scholarshipfund.org/support/individual-donor).

### LBRY-C Collaboration
We're excited to announce our first grant from The LBRY Fund is going to the LBRY-C group, who are working on creating some amazing new community resources and applications for use on the LBRY protocol. They are receiving 100,000 LBC to fund their projects. You can learn more about them and participate in their projects by [visiting their website](https://lbry.community).

Going through the process with LBRY-C has made us realize the need for a structured method for other individuals and organizations to request community and institutional funds. We are creating a program to provide a streamlined process in the near future.

### LBRY is hiring! New Jobs Posted
[Come join team Content Freedom!](https://lbry.io/join-us) We have the following positions open: Blockchain Engineer, Lead Application Engineer, Project Manager, Protocol Engineer, and API Engineer. We'd love for you to join us, or if you have a friend you think would be interested, we pay a $5,000 bounty if we hire them.

### Roadmap Check-in
Since our last update, we've completed the spee.ch Multisite roadmap task and the others have not changed at the moment. By next month's update, we hope to complete the UI Redesign, sharing of free content on the web (via the [View on Web button](#view-web), the LBRY tech resource website, and the release of the white paper. A good amount of progress has been made on YouTube Sync automation but we will keep this pending until we can close the entire feedback loop of the process.

### Spee.ch Multisite Launched
The spee.ch codebase has been released so you can create your own fully customized web-based applications using the LBRY Protocol. Spee.ch is an image and video sharing application that publishes and displays content using the LBRY blockchain. You can download Spee.ch Multisite from our [GitHub repo here](https://github.com/lbryio/www.spee.ch) and follow along with the [quickstart guide](https://github.com/lbryio/www.spee.ch/blob/master/quickstart.md) for best results.

LBRY provided a live streamed technical event to work with people interested in installing Spee.ch multisite, and even provided testing servers! The event was well attended, and by the end of the session, participants had launched their own spee.ch server and learned to customize the interface.

### LBRY Merchandise Shop
New patriotic and free speech inspired designs have been added to [our shop](https://shop.lbry.io), in time for Independence day.

![Satoshi Jefferson t-shirt](https://spee.ch/c/jefferson.png)

**LBRY T-shirt design contest**
Calling graphic designers! We are hosting a t-shirt design contest for the LBRY Merchandise Shop. Use your imagination to design LBRY logowear or another creative concept illustrating your vision of LBRY. First and second place winners will respectively get $100 and $50 in LBC plus $25 in credit to use in the LBRY Shop! [You can find the details here.](https://lbry.io/shirt-contest)

### YouTube Sync Updates {#youtube-updates}
Since we initiated our new YouTube Sync program, we've mirrored more than 500,000 videos to LBRY's decentralized content network! If your favorite creator hasn't joined the party yet, send them [this link](https://lbry.io/youtube) and tell them to get on it!

Our developers are hard at work fully automating this process. We are able to sync new channels as they come in and provide updates to YouTubers via email when their videos are queued and finally synced. Although we still run through the occasional hiccup, the process is almost flawless!

We do still have a backlog to sync through, so those YouTubers will be getting their completion emails as soon as we are caught up. The final step of this process will be handing over control of the channel and claims to the YouTubers. We are still working out the details on how to complete this as there are two distinct options - handing over control of the wallet or sending the claims/channels to their wallet.

### 3D Printing Community on LBRY
We are now accepting design submissions for our [Chess Set Design contest](https://lbry.io/3d-contest)! Winners will receive $150 in LBC; $100 for Grand Prize, $50 Runner-up.

Earn $5 in LBC just for uploading your chess set to the LBRY network. Email the lbry:// address to [james@lbry.io](mailto:james@lbry.io) to enter and claim your reward! Winners will be decided by Tom, Julie, and James. We're looking for a set designed with originality and/or craftsmanship!

You can also get paid to print out our featured Cryptocurrency Chess Set and/or Genius Chess Set by simply posting a picture of it to social media and tagging LBRY! Details at the bottom of the contest page.

Want to keep in touch regarding future 3D printing updates, [subscribe here](https://lbry.io/3d-printing)!

### LBRY.tech Update {#lbry-tech}
The LBRY tech resource website underwent a huge facelift in terms of design as well as content. You can follow along with progress on our [GitHub repository](https://github.com/lbryio/lbry.tech). Next steps before launch include finishing up the Build section, determining a single API documentation resource across our projects and moving technical documentation from lbry.io and other GitHub locations.

![lbrytech preview1](https://spee.ch/5/lbrytech-preview1.jpeg)
![lbrytech preview2](https://spee.ch/7/lbrytech-preview2.jpeg)

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
