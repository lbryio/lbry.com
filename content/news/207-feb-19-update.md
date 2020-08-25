---
author: tom-zarebczan
title: 'Development Update for February 2019'
date: '2019-03-14 15:00:00'
cover: 'mountains.jpg'
category: community-update
---
Welcome to the February 2019 LBRY Development update! In this post we’ll show you what we’ve been up to and review our progress since our [last update in December](/news/nov-dec-update) - sit tight, there’s lots to talk about below including updates from the Apps(Desktop+Mobile), SDK and blockchain teams! 

We also hit a huge milestone with the official launch of [lbry.tech](https://lbry.tech) and our [spec](https://spec.lbry.com) (some of you may know this as a Whitepaper). If you haven’t signed up for our developer list, there’s an option at the bottom of lbry.tech. Also, if you have an active GitHub profile, you can claim an additional 100 LBC with our [Developer Program](https://lbry.tech/developer-program)! *p.s. If you see an error about it not being available, it’s most likely because you don’t qualify (we’ll get a better error message here soon!).*

We're also happy to announce that we've launched an official [BitcoinTalk forum post](https://bitcointalk.org/index.php?topic=5116826.new#new) to support our crypto enthusiast users. If you are a member, show us some love by leaving a comment!

We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-update-feb-ztaxc`

To read previous updates, please visit our [Development and Community Update archive](/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what’s planned for LBRY, check out our [Roadmap](/roadmap) 

# In This Update {#dev-updates}
* [Desktop App and SDK Quick Recap](#summary) 
* [LBRY Desktop - Discovery and Next Steps ](#app)
* [LBRY for Android Updates](#android)
* [spee.ch Updates](#speech)
* [LBRY Web Updates](#web)
* [lbry.tech Updates](#tech)
* [LBRY Explorer Updated with Chainquery](#explorer)
* [lbry.com (.com!!) Redesign](#io)
* [LBRY SDK Download Upgrades and Progress](#sdk)
* [New Metadata Coming to LBRY](#meta)
* [Cross Device Sync Coming Soon](#sync)
* [Commenting on LBRY Updates](#comments)
* [Blockchain Upcoming Upgrade (Hardfork) and Progress](#blockchain)
* [2019 Roadmap Update](#2019)

### Desktop App and SDK Quick Recap{#summary}
Since our last development update, the app team has released version [0.29 - code name Darwin,](/news/lbry-evolves) which includes a number of awesome features like faster download speeds from an SDK update ([0.32.4](https://github.com/lbryio/lbry/releases/tag/v0.32.4)), email verification outside of the app (i.e using Desktop, but verifying email on phone), 3D games support (check out [lbry://@OpenSourceGames](https://open.lbry.com/@OpenSourceGames)), dark mode by default, invite/referrals URLS + rewards increase to 20LBC (10 max), autoplay with recommended videos, better first run experience (less intrusive email collection, YRBL!), first version of search options, and mouse back/forward button support for Windows!  We’ve also finalized our recent redesign - this brings even a more modern look throughout the app and the ability to share/customize styles easily. We believe this is by far one of our best releases thus far in terms of overall user experience, performance, and design (thanks to all the great community feedback!!). Let us know what you think if you haven’t already! 

On the SDK side of the house, we shipped [version 0.32.4](https://github.com/lbryio/lbry/releases/tag/v0.32.4) with the app which was an extensive under the hood overall, especially related to the downloader which enables super fast lookups and download speeds via DHT peers (I went from 6 second average to about 1.5). This will be super important for streaming only mode so that content (especially specific blobs) can be quickly found/downloaded and sent to the apps. It also includes a substantial refactor of the code to support asyncio (as opposed to twisted), a complete rewrite of the stream/blob downloader functionality including a change to blob mirroring (will now work similar to DHT peers), and a types/metadata upgrade that allows easier iteration on claim/channel metadata in the future. We’ve also overhaul the command line interface which now offers a clearer view of available commands/help options, startup options, and the ability to pass parameters via environmental variables or predefined config file (see --conf option).

![Darwin](https://spee.ch/@lbry:3f/darwin-029.gif)

### LBRY Desktop - Discovery and Next Steps {#app}
The release of App D - Darwin (D for Discovery too!) brought our first big upgrade to search which should improve content discovery. You can now filter between searching for files and channels, choose from certain file types (video, audio, images, text and other), and easily change search limits (before this was manually entered and would not refresh the page). We know this is just scratching the surface of what we’re capable of and as soon as more metadata (especially tags!!) is made available by the SDK, we’ll continue to revamp and add more options. Another area we’ll be making improvements in is centered around pagination and more performant SDK queries to support most active wallets, downloaders and publishers. 

With the advent of metadata tags, we’ve also been thinking about how to properly prioritize content within them and started initial work on a community metadata system (at first centralized) which will allow users to correct/append tags to others creators content (this may seem controversial at first, but we feel it’s a game changer!). These features combined will position the app to move from a LBRY curated home page to a data/analytics and tag based one. We’re doing our due diligence on designing a system that will be decentralized, community driven, and user controlled (our motto pretty much!). We’ve excited for what’s to come here, stay tuned! 

![search](https://spee.ch/@lbry:3f/search-desktop.png)

### LBRY for Android Updates {#android}
The Android has shipped a few updates in it’s alpha state with the goal of becoming a beta which would result in a full Google Playstore release (currently in unreleased mode). For this to occur, the experience needs to match most of what the Desktop app has at least from the perspective of the viewer (we’re holding off on publishing/creator features for now). In January we released [version 0.4.0](/news/our-android-is-getting-smarter) which included channel subscription notifications (only when app is started currently), show related content, and relative dates (i.e. 3 days ago). Version [0.5.0](https://github.com/lbryio/lbry-android/releases/tag/0.5.0) and [0.6.0](https://github.com/lbryio/lbry-android/releases/tag/0.6.0) enabled more subscription view options including suggested subscriptions, email verification on a separate device, app rating reminder, back button fixes, moving the address/search bar to the top, and the latest LBRY SDK upgrade. We’ve heard reports of and have been able to reproduce responsiveness issues that occur after extended usage. The best bet right now is to clear data on the app (make sure to [backup/restore your wallet when doing so](/faq/how-to-backup-wallet#android)). We’re hoping to find the root cause and solution with the next update. 

![android](https://spee.ch/95ccabb4e73552fada5ef517fc8366e265980cd1/lbry-android-beta.gif)

### spee.ch Updates {#speech}
Spee.ch has been undergoing both upgrades on the front end and under the hood. The channel page has been revamped with a much cleaner look and more information like file type up front. We’ve also added the ability to upload any file types (up to 50MB) and the ability to load their claim pages (but not actually allow playback of all yet!). The content page also now supports mark down in both files (i.e. [AntiMedia’s Markdown posts](https://spee.ch/@antimedia:e/white-house-war-funding)) and in the content description (i.e. [NorVegan’s content](https://spee.ch/@Norvegan:5/theunmasking-part2-thescamartist)). We’ve also fixed up the NSFW and License type not being populated, improved loading of fresh content, and upgraded to the latest LBRY SDK. We’re also actively looking for candidates to host their own spee.ch sites -  one recent community driven one, located at https://soundbytez.io, is centered around audio and we’re exploring setting one up for Lunduke. 

![spee.ch](https://spee.ch/@lbrycom:2/channel-page.jpeg)

Interested in running your own spee.ch server or clone? We’ve recently revamped this process to include Chainquery and are offering 5,000 LBC for semi technical users to run through this process and provide feedback, [check out the details here](https://www.reddit.com/r/lbry/comments/a34io1/run_your_own_speech_site_lbry_needs_feedback_on/).

### LBRY Web Updates {#web}
After the initial LBRY web prototype was completed, we went back to the drawing board to determine the best path forward on how to leverage/optimized Desktop app code to work on the web, and what features we want to launch for the first public version. The unification into the Desktop app code is currently in progress and this also includes the client side optimizations needed for a better user experience (users had to download 60 MB of code before!), the ability to turn on/off features/components between the two versions, and other refactoring. We’ve also implemented a way for the web version to stream directly from our content hosts, with instant scrubbing ability. The goal for the first public version is a view only mode without a wallet that allows free content (all file types) to be consumed. Then we’ll slowly start to add wallet and publishing features, but we’re still in the process of working out the details on how to store wallet data and what this experience looks like for a web + desktop/mobile user.

Want to be the first to know when it’s ready to check out? Sign up for the mailing list at [lbry.tv](https://lbry.tv).  

![web-screenshot](https://spee.ch/@lbry:3f/lbry-web.jpeg)

### lbry.tech Updates {#tech}
WOOHOO, WE FINALLY DID IT! We were super excited to launch [lbry.tech](https://lbry.tech) and our official protocol specification (whitepaper) in mid February! Along with the completed spec, other lbry.tech features included a new [Developer Program](https://lbry.tech/developer-program) where active GitHub devs can authenticate and earn some LBC, revamped [glossary](https://lbry.tech/glossary), [updated SDK settings](https://lbry.tech/resources/daemon-settings), and the completion of the [Builder’s Guide](https://lbry.tech/build) which includes an electron starter app and other tips for building on top of the LBRY ecosystem. I think we can now safely say we have one of the best documented blockchain projects in the space and we have a single place where we can send more technical users to learn about what makes LBRY tick.

![tech-gif](https://spee.ch/@lbry:3f/lbrytechgif.gif)

### LBRY Explorer Updated with Chainquery {#explorer}
In mid February, we upgraded our [Block Explorer](https://explorer.lbry.com) to use [Chainquery](https://github.com/lbryio/chainquery) as its main datasource as opposed to running a full LBRY blockchain node thanks to the help of a community member. This results in less maintenance on the backend and improves the overall speed and experience when using the explorer. We even have mempool support through chainquery, so as soon as a tx or claim is created, you can view the details on Explorer. This also resulted in fixing various balance issues as well as the total Circulating Supply (since some balances were incorrect previously). There are still a few known kinks to work out, but we’re really happy with the result! Looking forward to getting more claim related statistics added now that chainquery can provide them easily. 

![explorer](https://spee.ch/f/explorer-chainquery.jpg)

### lbry.com (.com!!) Redesign {#io}
We’re excited to announce that we’re at the final stages of launching our redesigned, consumer facing portal which is now located at [lbry.com](https://lbry.com). As an extra bonus, it will be getting launched on [lbry.com](https://lbry.com) which we’ve recently acquired. The goal was to keep most of the same pages as the current lbry.com, but give it a more modern look and feel as well as providing easier navigating to our lbry.tech, lbry.org and other key pages like [YouTube Sync](https://lbry.com/youtube). Keep an eye out for our launch announcement!

![redesign](https://spee.ch/@lbry:3f/ioredesign.gif) 

### SDK Download Upgrades and Progress {#sdk}
The main focus of SDK development over the last couple months has been to improve download speeds over the P2P network, a large refactor from twisted to asyncio, creating a mechanism for future [metadata](#meta) changes, and APIs for [wallet syncing](#sync).  The refactor and new download mechanics also required us to reimplement analytics around download statistics so we have visibility into performance metrics as we continue to improve on our “time to first byte” initiative. In order to have a performant streaming mechanism (where files don’t have to be stored in their entirety and you can skip around a video), the ability to request and quickly retrieve any part of a file on the network is critical. Personally on my connection in the US, download times (from clicking download to when 2 MB are written on disk) went from about 6 seconds down to 0.4 in some cases and about 1 second on average. This is a substantial improvement and we think there’s still more room to make it even faster through the implementation of a connection manager that better handles peer discovery and management of multiple streams. The manager would also be responsible for things like resuming failed downloads, bandwidth limits, and reconnecting after internet failure or network changes. We’ve also been busy setting the groundwork for secure and private wallet sync features that apps can take advantage of as well as making the necessary API changes to support newly available metadata. 

### New Metadata Coming to LBRY {#meta}
We are currently in the process of a large metadata upgrade to both claims and channels which will give users even more insight into content posted on the blockchain. For channels, it includes the ability to store metadata like description, cover photo, tags, language, and featured video ([see entire list](https://github.com/lbryio/types/blob/a6f2fd6d5f382f0012383b9076d650c1f6791ada/v2/proto/claim.proto#L16)) which make up a channel profile. On the content/files side, we’re adding tags, release timestamp (i.e. when the video was posted/released), content duration/dimensions, and the file size/name/hash ([see details here](https://github.com/lbryio/types/blob/a6f2fd6d5f382f0012383b9076d650c1f6791ada/v2/proto/claim.proto#L29). We’ve grouped all the cross repo issues related to these changes in an [Epic (requires ZenHub)](https://github.com/lbryio/lbry/issues/1982) to coordinate the integration across teams. As soon as it’s possible to set these in the SDK, we’ll be updating our apps to take advantage of the new fields. Also, we’ll be updating all of our YouTube synced content with as many of the fields as possible (we’ll probably let creators set up their own profiles). This is the last blocking step to be able to allow the transfer of this content to YouTubers’ wallets. 

![meta](https://spee.ch/@lbry:3f/new-metadata.jpeg)

### Cross Device Sync Coming Soon {#sync}
Cross device syncing, especially related to wallets, has been a hot topic around LBRY for the past few months. It’s definitely a much needed feature to enable users easy access on multiple devices, and also one that must be carefully designed, especially when it comes to security and privacy. In order to sync wallets, we need to be able to store wallet data for users in an encrypted fashion. Even so, it’s still a fairly large risk to store multiple wallets in a single place without the right security measures and design in place. After collaboration on requirements and implementation details between our engineers, we feel we’ve come up with an approach that’s both secure and will offer a great experience to our users. The LBRY SDK will be responsible for providing new API calls that will allow getting and setting of synced data to include wallets and channels (will require a user password and enforce hashing of all data), which will then be securely transmitted to our API server, and tied to the user’s email/account (and once again encrypted/salted locally). Initially we will not be allowing password recovery options (i.e. through a 3rd party / 2FA Key), but our design will allow for it in the future. We’ve completed the initial legwork on both the SDK and API side. Our goal is to first roll this out on Mobile (since backup procedures are not user friendly), then expand to the Desktop app and later on to LBRY Web. 

![wallet structure](https://spee.ch/5/wallet-db.jpeg)

### Commenting on LBRY Update {#comments}
With the help of two community members, we’ve been progressing on an API design to support commenting on LBRY. The original goal was to provide a centralized service to store comments while we iterated on the user experience and researched longer term on blockchain solutions. We’ve made some progress on this solution but it still lacks the ability to sign comments with an identity and verify them on the server side. The problem with a centralized service that provides free commenting is that it’s susceptible to spam and sybil attacks. Putting comments on the blockchain is a natural deterrent to this since it requires transaction fees to be paid. But a blockchain solution also comes with it’s own pitfalls such as requiring LBC to comment, possibly waiting for block confirmations, increased transaction activity on the network, and not having the ability to fully delete a comment once it has been made. After some back and forth between these two solutions, we’ll be regrouping to see if it makes sense to proceed with the interim solution or go full blockchain! 

### Blockchain Upcoming Upgrade (Hardfork) and Progress {#blockchain}
We’re excited to announce that the next LBRY Blockchain upgrade will be occurring on March 21, 2019 - you can find all the details in our [blog post](/news/hf1903). This update includes a large consensus change to how LBRY claim names are stored when it relates to characters and case sensitivity. Case will not be taken into account when competing for vanity URLs and we’ll be allow more characters in the URLs (these changes will come later to the SDK/Apps). We’ve been actively reaching out the miners and exchanges to ensure they update in order for a smooth hard fork to occur. We’ve also been actively working on bringing in upstream Bitcoin changes which offer many bug fixes, performance and stability improvements. There is also research being done on how to more efficiently store claim data in the blockchain and what aspects should be processed in memory vs on disk. 

### 2019 Roadmap Update {#2019}
At the end of January, we released our [roadmap for 2019](/roadmap) with what we consider our are top priorities across the LBRY ecosystem. Highlights include building creator relationships, community swarms, launching Android 1.0 Beta, commenting, Discovery, LBRY on the Web and cross device syncing. A bunch are these initiatives are already in progress and will span multiple months, whereas others are slated to start later this year. Were you hoping we’d work on something and don’t see it on the list or find something interesting you want to help with? Feel free to reach out to us on [chat](https://chat.lbry.com) - we’re always looking for feedback and help!. 

![roadmap](https://spee.ch/6/roadmap-new.jpg)

# Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [ contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). We also recently launched our [LBRY Discourse Forum](https://discourse.lbry.com) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbrycom), [Facebook](https://facebook.com/lbrycom), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https://t.me/lbryofficial). 


[Back to **top**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](/get?auto=1) yet, what are you waiting for?



