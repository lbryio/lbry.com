---
author: tom-zarebczan
title: 'Development Update for November/December 2018'
date: '2018-12-18 17:00:00'
cover: 'holiday-bc.jpg'
category: community-update
---

Welcome to the November/December 2018 LBRY Development update! In this post we'll show you what we've been up to and review our progress since our [last update in October](https://lbry.io/news/sept-dev-update) - sit tight, there's lots to talk about below including big releases from the SDK and App teams!

If you haven't heard yet, we are running a [12 Days of DevMas campaign on Twitter](https://twitter.com/LBRYio) by rewarding our app users with free LBC! Also as a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-update-nov-tzbc`

To read previous updates, please visit our [Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what's planned for LBRY, check out our [Roadmap](https://lbry.io/roadmap) ([2019 planning](#2019) is in progress!).

# In This Update {#dev-updates}
* [Desktop App and SDK Quick Summary](#summary)
* [LBRY Desktop App Next Steps and Design Preview](#app)
* [LBRY for Android Updates](#android)
* [spee.ch Updates, Memes and Multisite](#speech)
* [Subscription Email Digest](#sub)
* [Email Verification on Web](#email)
* [open.lbry.io Redesign](#open)
* [LBRY on the Web Preview](#lbry-web)
* [LBRY White Paper Update](#paper)
* [LBRY on a Hardware Wallet](#hw)
* [LBRY Streaming](#stream)
* [LBRY SDK Updates](#sdk)
* [Blockchain Team Updates](#blockchain)
* [2019 Tech Planning Preview](#2019)

### Desktop App and SDK Quick Summary {#summary}

Since our last development update, the app team has released version [0.26 - code name Clarke](https://lbry.io/news/c-is-for-clarke), which includes a huge upgrade to our LBRY SDK (previously referred to as the protocol). This brings many improvements by upgrading to Python 3 and by completely re-writing the internal wallet. The update also includes a revamped subscription area that highlights newly published content plus a latest only section, suggested subscriptions by YRBL the Gerbil, relative publish times (i.e. published 2 days ago), ability to redeem reward codes, history page, design updates, and performance improvements by way of tuning cache techniques. We believe this is by far one of our best releases thus far in terms of user experience, performance, and design. Let us know what you think!

On the SDK side of the house, we are proud to release [version 0.30.1](https://github.com/lbryio/lbry/releases/tag/v0.30.1) which shipped with our Apps. It includes a substantial refactor of the code to support Python 3 (previously Python 2.7), a wallet developed from scratch using industry best practices geared for security, speed, cross device synchronization, and support for multiple cryptocurrencies (i.e. BTC and LBC in the same wallet). This results in faster startup times, quicker wallet transactions including publishing (especially for smaller files) and tips, and download performance.

![Clarke](https://spee.ch/@lbry:3f/lbry-clarke.gif)

### LBRY Desktop App Next Steps and Design Preview {#app}

You may have noticed a facelift in the Clarke release, but another is already in progress now in our brand/styling unification phase. We are in the process of separating out colors/styling to a separate repository so they can be shared across our apps and services. Enjoy the preview below! Some things we're also focusing on include allowing [email verification](#email) to happen directly on the web (without having to click a hyperlink to verify in the app) and shipping an updated LBRY SDK. Longer term, we'll be focusing on in-app notifications, playlists/bookmarking and mini-tutorials. We've pushed off integrating the new video player until the SDK can provide better support for [streaming data directly to it](#stream).

![redesign progress](https://spee.ch/@lbry:3f/redesign-progress-2.jpg)

### LBRY for Android Updates {#android}

Along with LBRY Clarke, we released a LBRY for Android update, which is available through the [Playstore](https://play.google.com/store/apps/details?id=io.lbry.browser) or via [APK](http://build.lbry.io/android/latest.apk).

Please remember, if you previously installed the APK version, you'll need to uninstall it for the Play store version to work. Make sure to [backup your wallet](https://lbry.io/faq/how-to-backup-wallet)! This version supports the latest LBRY SDK which means faster startup, download speeds, and upgraded wallet. It also includes 2 new features: the ability to tip and redeem reward codes!

![Android](https://spee.ch/@lbry:3f/android-reward-code.jpg)

### spee.ch Updates, Memes and Multisite {#speech}

Recently, spee.ch went live with the content page facelift previewed in our last update. Additionally, we've also added the ability for users with channels to edit their uploaded content (however, only images/GIFs supported at this time, not videos) and create meme overlays using the Memeify feature (you'll see this in the top right after you drag in an image). In the background, spee.ch is now heavily integrated with [Chainquery](https://github.com/lbryio/chainquery) for claim resolution as well as URL redirection. For example, if you go to spee.ch/one, it will redirect to the permanent URL, including the shortest claim id/channel: https://spee.ch/@oakey:7/one. We now also include the open.lbry.io URL at the bottom of the page so you can easily navigate to this content in the LBRY app.

![spee.ch](https://spee.ch/@lbry:3f/speechhhhh.jpg)

Interested in running your own spee.ch server or clone? We've recently revamped this process to include Chainquery and are offering 5,000 LBC for semi technical users to run through the setup and provide feedback, [check out the details here](https://www.reddit.com/r/lbry/comments/a34io1/run_your_own_speech_site_lbry_needs_feedback_on).

### Subscription Email Digest {#sub}
A awesome new feature rolling out this week to beta users is a weekly digest email! Based on content from your subscribed channels and new items posted in the last week, we'll email you with up to 5 latest pieces of content from your channels. The 5-item parameter may be tweaked later on based on initial beta user feedback. This feature can be disabled (enabled by default) by going to your mailing preferences, accessible through the Help page of the LBRY apps or at the bottom of your latest email from LBRY. Keep an eye on your inbox if you've subscribed to content in the past week! This will be turned on for all users after a round of initial feedback.

![email](https://spee.ch/@lbry:3f/digest.jpg)

### Email Verification on Web {#email}

We're in the process of making it even easier to verify your email and LBRY app installation by allowing it to happen solely on the web, without having to input a long verification code or clicking the "Magic Link" button. This will allow you to start the verification process on your desktop, and open/confirm email on your mobile device, or vice versa. This also paves the way to be able to painlessly link your accounts from the email management page, which will help YouTube sync users who currently require manual intervention if they already signed up for LBRY. This will be rolling out with both the Android and Desktop app updates in the next couple of weeks.

### open.lbry.io Redesign {#open}
If you have visited [open.lbry.io](https://open.lbry.io) recently, you may have noticed an aesthetically pleasing redesign! Anyone can use this site to hyperlink content so that it opens in the LBRY app. We also use it on spee.ch and in the share options inside the LBRY app (or if you right click on a tile). What's great about this new site is that if you don't have LBRY installed, you'll be able to download it via the link provided - previously this would just be a blank page without any instructions for new users.

![open.lbry.io](https://spee.ch/@lbry:3f/open.jpg)

### LBRY on the Web Preview {#lbry-web}

Since our last update, we've made great progress with making the basics work for LBRY on the Web. We have an internal alpha test site which includes a functioning video player and wallet. The front end is and will look the same as the Desktop app, but the connections will take place to our central server instead of a user's PC with a local running daemon. Thanks to the recent LBRY SDK wallet enhancements, each user will be able to have their own wallet account too. Development will continue to enable publishing, rewards, caching, and enabling a new user experience without even creating an account or giving us your email.

![web](https://spee.ch/@lbry:3f/lbry-web-gif.gif)

### LBRY White Paper Update {#paper}

As you may well know, LBRY didn't release some fancy white paper and then have nothing to show for it - we did the opposite by releasing a working protocol and reference applications. Through this process, we learned a ton about how LBRY SHOULD work, which we are currently documenting in a formal white paper. The core of LBRY won't change, but this gives us an opportunity to fine tune some of the ambiguous pieces and formalize them into a protocol specification. The paper is currently in internal review and should be ready for public consumption after the New Year!

![preview](https://spee.ch/@lbry:3f/whitepaper-preview.jpg)

### LBRY on a Hardware Wallet {#hw}

If you have a Ledger hardware wallet, you can now store your LBC on it! This does require a manual install process as we are still working with the Ledger team to officially support it in their software. Head over to [our GitHub readme](https://github.com/tzarebczan/ledger-app-btc/blob/lbry-readme/README.md) for instructions on how to get started. Special thanks to community member @Madiator2011 for his assistance with getting this functioning properly. We'll keep you updated on our process on official integration, stay tuned!

![hw](https://spee.ch/@lbry:3f/ledger.jpg)

### LBRY Streaming {#stream}

One negative aspect of LBRY we hear about is the need to download content in order to view it. We're taking the initial steps to improve this experience by creating a new API that allows for streaming of blob data directly to a web server, where our apps can listen and render content from. You can check out the [initial spec on GitHub](https://github.com/lbryio/lbry/issues/1634) for details. The first iteration will still require the file to be downloaded locally, but will allow the App team to integrate a new video player that's capable of reading data at certain chunks of the file. After this is fully tested and working, we'll be moving to a streaming only solution for files types that support it (mainly video/audio and images). Other files will still need to be downloaded locally, but we'll also be including disk management settings to help users allocate how much data they want LBRY to store.

### SDK Progress {#sdk}
The SDK team is thrilled to have its months long of development and testing come into fruition with the 0.30.1 SDK release that shipped with the LBRY Desktop and Android apps! This was a complex release because it includes a brand new wallet, written from scratch in accordance with industry best practices, an upgrade to Python 3.7.1, and a custom UPNP module to replace MiniUPNP (which was a pain to build on Windows) to help users host data. The new wallet includes a migration to process existing wallets, including making a backup first! It inspects the old wallet for all receiving and change addresses, populates them in a new database/syncing transaction data, and migrates the format to a simpler file that doesn't include all transaction data that would bloat the previous wallet format.

The wallet is much smarter, more efficient, and better at reconnecting during server or internet problems. It will look ahead when new addresses are created, subscribing to those transactions, enabling cross device syncing. This is a feature we plan to roll out slowly over the next few months. If you have multiple LBRY installations today, you can try this out by copying the default_wallet file from one device to the other. As transactions occur on one device, they'll be synced automatically on the other (and vice versa). This still does not include the ability to sync channels. We're still looking for the best way to proceed with this in the future. Currently channels are created with a key outside of the seed, and thus can't be re-created automatically on the other wallet.

The next steps for the team is to refactor more of the code using asyncio, which will offer even better performance throughout various SDK functions and lessen race condition possibilities. Users will mainly see improved publishing speeds for larger files and download speeds (both when looking up peers on the DHT network and when combining blob files into their output files).

![sync](https://spee.ch/@lbry:3f/syncing.jpg)

### Blockchain Updates {#blockchain}

The blockchain team released a couple of updates to the full blockchain client, including the latest [patch version 0.12.3.1](https://github.com/lbryio/lbrycrd/releases/tag/v0.12.3.1) building on top of a previous mandatory release which mitigates a potential, but rare, hardfork condition. This has not actually occured in the wild, but we can never be too safe! We've reached out to miners and exchanges to update to this latest version to ensure maximum security of the LBRY blockchain. The majority of other work has been in finalizing and testing the [upcoming normalization hardfork](https://github.com/lbryio/lbrycrd/pull/235) and reviewing/planning for upstream changes from Bitcoin Core. We should have a testnet version of the hardfork within the next week or two. The blockchain team will coordinate with the SDK and App teams to ensure a smooth transition after claim names are normalized.

### 2019 Tech Planning Preview {#2019}
We are in the process of planning what's in store for the LBRY ecosystem for 2019, so stay tuned on our Discord/Social media pages for updates. Some areas we plan to tackle include cross device syncing (wallets, subscriptions, purchases, history), LBC<>USD on/off ramps, community metadata overlays (tags, categories, etc), comments, creator features, internationalization, and using the power of community swarms to increase LBRY adoption.

# Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? A great place to start is [lbry,tech](https://lbry.tech) to learn more about what makes LBRY work under the hood. Be sure to check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md) to find the area best suited for your skillset. We also recently launched our [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects.

If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! For a short time, Santa Yerbil will be visiting our Discord to give lots of presents!

![santa](https://spee.ch/@lbrynews:0/santa-yrbl.jpg)

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), [Reddit](https://www.reddit.com/r/lbry), [Instagram](https://www.instagram.com/lbryio), and [Telegram](https//t.me/lbryofficial).

[Back to **top**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
