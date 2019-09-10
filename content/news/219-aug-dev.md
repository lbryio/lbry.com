---
author: tom-zarebczan
title: 'Development Update for August 2019'
date: '2019-09-10 20:00:00'
cover: 'tech-cover.jpg'
category: community-update
---
Welcome to the August 2019 LBRY Development update! In this post we’ll show you what we’ve been up to since our [last update in July](https://lbry.com/news/jun-july-dev). Sit tight, there’s been lots of progress and releases, including updates from the Apps(Desktop + Mobile), SDK and blockchain teams! 

To read previous updates, please visit our [Development and Community Update archive](https://lbry.com/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what’s planned for LBRY, check out our [Roadmap](https://lbry.io/roadmap).

First off, let’s start with some GitHub stats across all our repos (some of which are internal only to LBRY) since our last update (~40 days):  
36 repos were updated. 617 issues were created, 146 were closed. 18 PRs were merged. 30 GitHub users made code contributions: AlessandroSpallina, Borewit, BrannonKing, Feanor78, NetOperatorWibby, akinwale, btzr-io, bvbfan, ceoger, dittaeva, eggplantbren, eukreign, finer9, jackrobison, jessopb, jsigwart, kauffj, lbrynaut, lyoshenka, nestordominguez, nikooo777, osilkin98, sayplastic, seanyesmunt, shyba, tiger5226, tzarebczan, vv181, ykris45, zxawry.
 
# In this report, we cover updates for {#dev-updates}
* [Desktop App](#summary-desktop) 
* [SDK](#summary-sdk) 
* [Blockchain](#blockchain)
* [LBRY.tv](#web)
* [LBRY for Android](#android)
* [Rewards](#rewards)
* [Cross Device Syncing](#cross)
* [YouTube Sync Transfers](#youtube)
* [LBRY Reflector](#reflector)
* [Community Block Explorer](#explorer)
* [2019 Roadmap Progress](#roadmap)

### Desktop App {#summary-desktop}
Since our last development update, the app team shipped our next named release, 0.35, under codename [Franklin](https://lbry.com/news/franklin-is-minted) as well as a few patches. Franklin enhances the app experience with a brand new videojs-based video player. This will allow us to customize more aspects of the player in the future. 

Other new features include the ability to continue watching videos in pop out mode while checking out other content in the app, support of range requests (allows streaming mode), and the ability to block channels app wide. 

The patch releases include three main new features: tipping on channel pages (which gets sent to the channel claim vs content claims on file pages), ability to set the time period for dark mode, and support for a new daily watch reward that will be live in mid-September (replacing the weekly LBRYCast). 

The patches also include bug fixes to bid amounts required on the publish page (did not show vanity URL values), auto downloading subscription content, and a few other smaller issues, as well as changes to the URL format (now has both channel and claim short ids), updating our digital certificate, and getting the SDK updated to the latest release ([0.40.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.40.0) for improved wallet sync behavior, download speeds, and overall connectivity. 

![franklin](https://spee.ch/9/35.gif)

#### Video Player and Download Settings

The new video player fixes multiple bugs from previous versions: most important the ability to set the volume, not being able to play back certain MP4 formats, and being able to skip anywhere in the video right away thanks to range requests (versus the previous version where you had to wait for it to download). It also allows us to add two new settings for saving hosted content and files - both of which are enabled by default. Users who wish to disable either or both are now able to, but turning off content hosting hurts the LBRY network because you no longer become a seeder. For non-streamable file types like games/documents/3d files, the files will download locally, regardless. 

![download](https://spee.ch/9/download-settings.png)

#### Desktop Next Steps
The app team also began development of our cross device sync process (wallet + app data like tags/subscriptions/blocked channels, other settings) but we’re waiting on additional support from our SDK and API teams to finish up this feature - see the [cross device update](#sync) for more information. Continuing work on the video player, we’ll be adding features to save position and volume settings throughout the app which will also eventually be synced up.

We also are working on a more streamlined [sign in/out process](#login) that will be featured in-app and on lbry.tv. This will include a 1 LBC email reward for all users, including new ones, so that they can create a channel during the signup process (some users, i.e. ones over VPN, may not qualify). Once we get wallet sync fleshed out, this new login process will also include those options and ability to restore via email/password.

Another area to continue getting additional attention is internationalization. You may have noticed we added German as an additional language, and we’re making more changes under the hood to support a streamlined effort across all our projects. Finally, we’ll also be working on an improved balance display on the wallet page that shows how much LBC you have locked in claims/channels, supports, and tips. 

### SDK {#summary-sdk}
On the SDK side of the house, we’ve shipped versions 0.39, with patches, and 0.40.0 with a recent patch. You can review all the changelogs on our [GitHub releases page](https://github.com/lbryio/lbry-sdk/releases). 

The main features include treating multiple accounts inside a wallet to effectively be treated as one (missing a few API calls, to be completed soon), ability to connect and synchronize transactions with multiple wallet servers (see screenshot below) which improves wallet sync speed and paves the way to interfacing with community wallet servers, wallet server monitoring tools to include session information / logging of troublesome claim search queries, and a key value store which will be the final location of synced LBRY data. On startup, we also ping all the wallet servers and select the best main one to connect to based on the peer’s location. We also added a new function for comments that allows channel owners to moderate comments by hiding them (to be implemented in the app in the next few months). The ability to connect/sync with multiple servers proved to be more troublesome than expected, we experienced and fixed reconnection issues which should be resolved with the [0.40.1 patch](https://github.com/lbryio/lbry-sdk/releases/tag/v0.40.1). 

![settings and wallet sync](https://spee.ch/8/sdk-settings.png)

#### SDK Next Steps
During testing of the [YouTube transfer](#youtube) process, we ran into a snag with how our channel import/export process was designed, especially when the channel itself is transferred from one wallet to another which prevented both sides (YouTube Sync and the Content Creator) from signing claims. Progress has been made to support a short term solution for both cases, and we expect a resolution soon. Besides this bug, we are also looking into any remaining wallet syncing / connectivity problems, one affecting content announcement, and another that may cause memory leaks on some machines. If you think your node has suffered from either, please give us a shout on [Discord](https://chat.lbry.com). 

Finally, we’ve also been researching and began initial implementation of a technique called holepunching, which will improve connectivity between nodes -- especially for those behind firewalls and atypical network configurations. This may alleviate the need for port forwarding, but nodes that can do port forwarding will be encouraged to leave it on. We expect this to increase our overall network availability and performance.  

### Blockchain {#blockchain}
Since our last update, the blockchain team continues their work towards enabling SegWit later this year, optimizing memory usage, revamping RPC calls to include bid (allow us to show pending effective amounts during takeovers) and sequence (which was removed in a previous update), and enabling metadata along with claims supports. Support metadata will enable us to expand the support/tipping feature of LBRY, which currently only allows simple LBC transactions to occur, to include additional metadata that can be used for signing the supports to prove channel ownership and enabling use cases like commenting, rating, and subscriptions on chain. Signing of supports will finally give us the ability to link a channel back to a tip transaction, so publishers can see and verify who sent LBC (or even a support). On chain subscriptions also help further decentralize data you can only find on our API currently, and enable a Patreon like system where creators can release content that’s accessible only by their supportors or at various support/tip levels.   

#### Forced Upgrade - Pre 0.17.2 Nodes Go Offline
On August 16, 2019, the LBRY chain experienced an unexpected fork between the current version of lbrycrd (v0.17.2) and previous versions. Block height of the fork: 617743. We might have favored the older build, but older versions of lbrycrd would crash when receiving data from the newer version after that block. v0.17.1 was able to proceed down its own chain, but there was little mining power behind this;  the main pools were already mining with majority of hash on the correct (v0.17.2) chain. Everything is back to normal currently on the latest release/chain, and we’ll continue to monitor. If you are still running a pre 0.17.2 node, please delete local 

Read [our blog post](https://lbry.com/news/lbry-blockchain-update) for the entire executive summary of the incident. 

#### How to Recover a Pre 0.17.2 Node
Please upgrade your LBRYcrd node to the latest version on our [GitHub release page](https://github.com/lbryio/lbrycrd/releases/tag/v0.17.2.1). After you’ve run it, perform the following CLI command: `lbrycrd-cli reconsiderblock b9a350fa8b4471c46cb2088927ac5e959939c815e7d98e8125f099b902e96a62` to get back up to speed. The other option would be to clear our your local data and resync from scratch.

### LBRY.tv {#web}
Over the last few months, we’ve been running a view only pilot of [beta.lbry.tv](https://beta.lbry.tv) meaning you can view free content, but many of the other features like wallets, rewards, and publishing have been disabled. We’ve also created/ran stress tests on lbry.tv to make sure the web server and underlying SDK can handle thousands of concurrent users. In order to scale to even more users in the future, we will need to run multiple web and SDK servers.

Recently we introduced application options on the Settings page, but none of these options persist between refreshes until we’re able to sync the settings to our interim API sync solution. Longer term, these will sync back to the wallet file once lbry.tv migrates from an account based model, to a wallet based one that will support cross device syncing (today, syncing only works at a wallet level). The current SDK does not support multiple wallets, which is why we went with an account based model (to at least ship a full featured web experience without wallet sync). We’ve also recently added OpenGraph metadata to channels and claim links when shared on Twitter/Facebook and other sites that support it. 

![metadata](https://spee.ch/c/tv-metadata.png)

#### Login/Logout {#login}
As mentioned in the [Desktop summary](#summary-desktop), we’re in the process of implementing a typical login/logout process that most users are accustomed. This will include a 1 LBC reward for a verified email (some VPN users may not qualify) that will allow new users to create a channel as part of the process. Once lbry.tv moves to a wallet model, it will also include wallet syncing/restore options. This change will include two top menu items instead of one: wallet and balance under your LBC total, and Overview + Publish under the Account icon. Users not logged in can still enjoy free content, but won’t see any of the right sidebar options, nor be able to customize the tag list. 

![login](https://spee.ch/1/tv-new-signin.gif)

#### Publishing on the Web

Publishing from the web is a bit trickier since the lbry.tv server will need to act as an intermediary between the user and the SDK running - so it needs to be able to handle/intercept the file transfer process. This is currently a work in progress and may not be ready for the first soft launch with wallets/rewards.

#### LBRY.tv Launch

We are preparing for soft launch of LBRY.tv support with wallets and rewards. This will also include syncing tags, subscriptions, and other app settings, with wallet syncing to come at a later date (wallet notice will be shown to users with other installations). Publishing features are not too far behind, and if all goes well, we should see a full launch by the end of the month. 

Want to be the first to know when it’s fully operational? Sign up for the mailing list at [lbry.tv](https://lbry.tv).

### LBRY for Android {#android}

Since our last update, the Android app has been playing catchup with the Desktop app’s discovery features - this includes the ability to follow tags and explore tags, create channels, and publish (and edit!) content. We’re also excited that some of the more profound performance problems with the Android app have been resolved under the hood - the latest release provides a much smoother experience navigating throughout the app. The publish process was streamlined for mobile purposes which includes automatic uploading of thumbnails. You can also tag your content, create a channel, select a URL, and adjust your default LBC bid. On another note, we have noticed some issues with syncing wallets on restore, so if you run into this, please reach out to us on [Discord](https://chat.lbry.com) - we are still investigating but this will be solved once the SDK fully supports multiple accounts.

#### Discovery
The discovery process, which resembles the Desktop application, allows you to customize your followed tags which are then shown on the `Your Tags` page - this includes a drop down to change between trending/top/new, along with a top level listing of content across all your tags, plus a break down for each tag you follow with an option to view the tag page (click the arrows, or More tile). Currently we have to limit this to 5 tags (randomized between runs) which are shown on the main page due to performance issues, but you can click on the rest of your tags at the bottom of the page to see their tag pages. The subscriptions area also received a revamp - you can now see Trending/Top/New views across all your subscriptions, or you can click on a specific creator to filter. The `All Content` page enables you to explore other LBRY content not in your tags (default setting) using the same Trending/Top/New sorting options (you can also choose to limit on tags you follow which is the view you’d get to by clicking More on the top item from the `Your Tags` homepage. 

![android](https://spee.ch/@lbry:3f/android-08-homepage.gif)

#### Android Next Steps
Next steps for Android include a richer channel process, which includes a My Channel pages and creation/editing area that will allow publishers to modify data like their title, thumbnail/cover images, bid, website, email, description, and tags. Be on the lookout for this featured in version 0.9, the next named release. After this, we’ll be enabling our interim data/settings sync feature, add the ability to block channels, allow publishing of more file types (currently limited to videos/images), and ability to save files locally. 

### Rewards {#rewards}
We’ve got some exciting rewards updates in progress and coming out very soon! First off, we’ll be enabling a 1 LBC reward for a majority of users so they can take advantage of the new sign up flow which creates a channel for them. We are also currently experimenting with auto-enabling rewards for users with clean IP scores using a third party IP ranking system. This process will be further optimized to prevent abuse and also to check other IP attributes like ISP/location to enable more with auto-approvals.

Finally, we’ve recently sent our last LBRYCast email that will be tied to a weekly featured reward - this is now moving to a daily watch reward where users will be randomly awarded between 1 and 100 LBC. We’ll send an email as soon as this is available to claim. Enjoy the LBC! 

### Cross Device Syncing {#sync}
As we’ve mentioned in other sections of this report, we ran into a snag with being able to implement wallet syncing if a user has multiple encrypted wallets (the sync tool is not aware of this yet) and being able to use this to sync settings back onto LBRY.tv (SDK syncing is implemented wallet wide). Since wallet syncing on LBRY.tv would require a move from an account to wallet based model (which is not yet supported), we decided on implementing a quicker API sync tool for settings + application data, so at least some data like tags and blocked channels can work cross device. This is currently in development along with the sign in/out feature and will also be supported on Desktop/Mobile. 

The SDK already has support for a similar key value store as seen below, so once we have fully implemented multi-account awareness and multi-wallet support for lbry.tv, we can then sync up balances between all devices/wallets. We’ll still try to enable wallet sync on Desktop before it’s fully ready for all the scenarios we want to support - but we’ll have to limit it to previously un-synced users or if your balance is zero (so that we can enable the synced account, discard the current one). So the main case we won’t be able to support right away is users who have an existing desktop wallet, and have another device that’s already synced (Desktop/Android). 

![sync](https://spee.ch/5/sync-api.png)

### YouTube Sync Transfers {#youtube}
During the last 2 months, the team has worked on bringing creators closer to their content and audience with a long awaited feature, currently in test phase: transferring ownership of synced content directly into creators’ app wallets and also allow new content publishing.

This feature is a culmination of efforts across multiple teams at LBRY:
The SDK team was responsible for exposing the necessary tools to export and update channels and streams, the Backend team was responsible for exposing the endpoints necessary to initiate and pursue the process, the App team had to interface with such endpoints and last but not least, the YouTube sync team had to ensure the integrity of each channel before transferring everything to the creator. 

The result is pretty fascinating and closes the last loop in the sync process: Youtube creators can click a single button in the app, immediately gain access to publish new content via their channel, and their wallet will soon be populated with all their content and channel claims, including all their tips being re-supported on their channel. We’re super excited for this one team wide! 

### LBRY Reflector {#reflector}
The Reflector server run by LBRY is part of our infrastructure allows the LBRY network to stay healthy in this bootstrap phase where data availability through the P2P network might not be as satisfactory as expected. The technology behind this software spans across many layers and allows virtually all the content ever published to LBRY to be available for download at high speeds. To date we host 240TB (240,000GB) of blobs making up for over a million different claims.In order to keep track of all these blobs we manage a pretty big database. 

After a recent increase in volume of published content we had to optimize such infrastructure to contain costs and improve scalability. Starting from mid August we're rocking a fresh new database that performs/scales better and uses less space than the previous one. Over the next few months, we’ll be making more improvements so that anyone can run one of these servers and become a larger host on the LBRY network. 

### Community Block Explorer {#explorer}
A community member by the name of [Allesandro Spallina](https://github.com/AlessandroSpallina) became interested in the LBRY ecosystem and wanted to implement a more modern and full featured block explorer that exposes important metrics of the LBRY blockchain. You can check out his [GitHub issue](https://github.com/lbryio/block-explorer/issues/67) outlining what he plans on developing or you can go straight to the explorer prototype at [lbryexplorer.tech](https://lbryexplorer.tech/) to give it a shot We’d appreciate any feedback on the GitHub issue and current prototype - you can leave a comment on GitHub or reach out on [Discord](https://chat.lbry.com) #dev channel by tagging @SK3LA.

### 2019 Roadmap {#roadmap}
We’ve successfully accomplished a number of roadmap items fully, while others are partially complete and ongoing efforts. See our [previous development report](https://lbry.com/news/jun-july-dev) on updates for completed ones. 

Partially completed/still in progress are:
* **Commenting** - moderation features are in progress
* **Creator Features** - granular account balances in process
* **Creator Partnerships** - no update since last month - in progress and will be announced later this year
* **LBRY on the Web** - account features which are set to go live this month.
* **Multi-Device Experience** - app settings/data syncing in progress, wallet sync to come soon after. 
* **Internationalization** - ongoing internationalization enhancements are in progress on Desktop.
* **Protocol Performance** - improved download performance in 0.39 releases. Holepunching research in progress.

# Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Make sure you have turned on the Developer option in your email preferences (see app overview page), or sign up at [lbry.tech](https://lbry.tech). We also have a [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https//t.me/lbryofficial). 

[Back to **top**](#dev-updates)

We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-update-aug-jkala`

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?

