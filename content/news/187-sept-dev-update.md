---
author: tom-zarebczan
title: 'Development Update Aug/Sept 2018'
date: '2018-10-05 15:00:00'
cover: 'hacktoberfest-cover.jpg'
category: community-update
---

Welcome to the September 2018 LBRY Development update! As you may have read in our [Aug/Sept Community update](https://lbry.io/news/august-community-update), we are splitting up our monthly reports into two - one in the middle of the month for community updates and one at the beginning/end of the month for development. In this post we'll show you what we've been up to and review our progress for the months of August and September - sit tight, there's lots to talk about below!

To read all of our previous updates, please visit our [Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what's planned for LBRY, check out our [roadmap](https://lbry.io/roadmap) (update to the roadmap planned for next month!).

# In This Update {#dev-updates}
* [Hacktoberfest at LBRY!](#hacktoberfest)
* [Soft Launch of lbry.tech and Discourse Forum](#lbry-tech)
* [LBRY Browser for Android goes OPEN BETA](#lbry-android)
* [spee.ch - Faster Than Ever Publishing and Facelift Preview!](#speech)
* [New Email Management Page](#email)
* [Desktop App and Protocol Quick Summary](#summary)
* [Reward Codes](#reward)
* [Browsing History](#history)
* [New In-app Video Player in Progress](#video)
* [New Social Sharing Feature](#social)
* [Subscriptions Next Steps](#subs)
* [Search Improvements](#search)
* [LBRY Desktop App Facelift Preview](#preview-facelift)
* [0.30 Protocol Progress](#protocol)
* [LBRY on the Web Initial Planning](#lbry-web)
* [LBRY Dockerization](#docker)
* [LBRY Mining Supply Chart](#supply)
* [Blockchain Team Updates](#Blockchain)

### Hacktoberfest at LBRY! {#hacktoberfest}
If you are a developer who is interested in LBRY, there's never been a better time to start contributing! It's October, which means Digital Ocean is running their Hacktoberfest promotion of open source projects and LBRY is all in! Check out our [blog post](https://lbry.io/news/hacktoberfest) for all the details or dive right in on GitHub by checking out Hacktoberfest tagged issues on popular repositories such as [lbry-desktop](https://github.com/lbryio/lbry-desktop/issues?q=is%3Aopen+is%3Aissue+label%3Ahacktoberfest), [lbry-android](https://github.com/lbryio/lbry-android/issues?q=is%3Aopen+is%3Aissue+label%3Ahacktoberfest) and [lbry-sdk](https://github.com/lbryio/lbry/issues?q=is%3Aopen+is%3Aissue+label%3Ahacktoberfest). As with all contributions to LBRY, we offer generous [appreciation](https://lbry.io/faq/appreciation) in LBC on top of this month's special prizes. Our first developer setup guide video for the lbry-sdk is up below, stay tuned next week for the LBRY Desktop app one! 

<video width="100%" controls poster="https://spee.ch/2018-10-04-17-13-54-017046806.png" src="https://spee.ch/967f99344308f1e90f0620d91b6c93e4dfb240e0/lbrynet-dev-setup.mp4"/></video>

### LBRY.tech Update - Soft Launch and Discourse Forum {#lbry-tech}
We're extremely happy to announce the soft launch of [lbry.tech](https://lbry.tech), a technical and developer focused resource website for anyone wanting to dig into the tech behind LBRY, contribute or build on top of the protocol! The latest updates include some important terminology changes on how we refer to the various components that make up the LBRY ecosystem - namely the introduction of the term lbry-sdk, formally referred to as the protocol/daemon, to distinguish it from the blockchain protocol.

You'll also notice a revamped [Playground](https://lbry.tech/playground) section that gives you an intro to resolving, publishing and tipping on LBRY. The [Resources](https://lbry.tech/resources) page is filled with links to the API specifications, contributing guide, white paper (still in progress!) and other cool resources to dive deep inside the tech that powers LBRY. Finally, we've set up a [tech/developer forum on Discourse](https://discourse.lbry.io) so be sure to register (supports GitHub, Google and manual login) and [introduce yourself](https://discourse.lbry.io/t/intro-thread-tip-thread/54/6)!

![lbrytech publish](https://spee.ch/884fb7b2d49b01f7bc52eb94e7b0e31b822fe5a0/tech-playground-publish.jpg)

### LBRY for Android Update - LBRY Browser goes OPEN BETA! {#lbry-android}
We're super excited to announce that we [launched our LBRY Browser for Android](https://lbry.io/news/lbry-in-your-pocket) mid September as an Open Beta on the [Google Play Store](https://play.google.com/apps/testing/io.lbry.browser). This release comes with the basics - ability to login with your current email, earn rewards including a special early adopter bonus for Android users, browse the Discover and trending pages, searching, a basic standalone wallet and ability to view/download videos, images and static HTML content. It's important to note that your wallet will not be in sync with any other installs. Also, it should not be used to store larger amounts of funds because there's no way easy way to backup (see [manual method](https://lbry.io/faq/how-to-backup-wallet)) and it gets cleared on uninstall. We'll be focusing on getting features like subscriptions, wallet encryption and backup, publishing and history in future releases. Thanks for being an early tester and give us your feedback on the #lbry-android channel on [Discord](https://chat.lbry.io)

![android](https://github.com/lbryio/lbry.io/blob/master/web/img/LBRY-Android.png?raw=true)

### spee.ch - Faster Than Ever Publishing and Facelift Preview {#speech}
Publish something to [spee.ch](https://spee.ch) recently and notice it was lightning fast? In late August, we gave spee.ch a big publishing performance boost by incorporating our revamped wallet into its infrastructure and we couldn't be happier with the results. Another great feature in the pipeline is the ability to edit/delete content posted on your spee.ch channel - this should be live within the next week.

![spee.ch timing](https://spee.ch/08c544ac67a100fa0ff9d107eb23d13760f03d53/speech-publish-timing.jpg)

We are also working on facelift for content pages on spee.ch, check it out below!

![preview](https://spee.ch/75eecc4f1e8353693d3e236d326e8dcd4b1977aa/speech-preview-new.jpg)

Interested in running your own spee.ch server or clone? Check out the [quick start guide](https://github.com/lbryio/spee.ch/blob/readme-update/fullstart.md) and [GitHub repository](https://github.com/lbryio/spee.ch).

### New Email Management Page {#email}
If you've tried to unsubscribe from one of our emails recently (we hope not!), you may have noticed a new page where you can manage your email preferences. Previously, you didn't have a choice of what emails you received from LBRY and would have to unsubscribe from all if you didn't care for something, but now you can manage each type of communication separately!  Don't want to see LBRYCast emails because you use the app daily anyway? Fine, turn them off but leave on notifications about important updates and  We'll be adding this link to both the LBRY Desktop and Android apps next to your emails on the Help page. We'll also be adding the ability to add additional emails and automatically merge any LBRY accounts you may have.

![email](https://spee.ch/7d3fdd3792d5d00e7597656aa6dd635d459aaf3a/email-prefs.jpg)

### Desktop App and Protocol Quick Summary {#summary}
Since our last development update, the app team has released version [0.25 - code name Bradbury](https://lbry.io/news/something-wicked-cool-this-way-comes)! We believe this is one of our most complete and fastest app experiences yet, so make sure to check it out if you haven't already - it includes some great features like in-app wallet encryption, suggested videos when browsing content, auto download settings for subscriptions, improved search experience, an update LBRY protocol  and more! A few weeks ago we released a [small patch](https://github.com/lbryio/lbry-desktop/releases/tag/v0.25.1) to address autoplay related bugs. This month, the team has been hard at work planning the next set of features to be released with app C (any guesses as to the code name?) - keep reading below for a preview of some!

On the SDK side of the house, we released [version 0.21](https://github.com/lbryio/lbry/releases/tag/v0.21.0), with the [0.21.2 patch ](https://github.com/lbryio/lbry/releases/tag/v0.21.2) shipping along with the latest app release. This version is one of our best yet in terms of startup speeds, download performance and reliability. It includes two important download features that ensure quicker and successful connections to the LBRY network - optimizations to the peer search protocol and ability to download from our blob mirroring solution.  Since this release, the team has been focusing on the [0.30 protocol](#protocol) release which includes a brand new wallet and a Python 3 upgrade.

![failure rate](https://spee.ch/48c15fd23e413f4d967a68547c8904fc80f99483/failure-rate-oct-2018.jpg)

### Reward Codes {#reward}
We'll be launching a new way to spread LBC love by way of reward codes that are redeemable in app. This will be yet another powerful marketing tool we can use to get LBC in the hands of supporters without having their LBC addresses - we can give them out at conferences or even mail them out to YouTube creators! The next app version will include a way to redeem these codes from the Rewards screen and we'll be dropping these randomly on Discord/Twitter and Reddit - so be on the look out when it goes live!

As a bonus for early adopters (if you redeemed one on Discord recently, please leave these for others!), here's a code that allows 3 uses - gotta be quick!: `septdevreportbonus`  Hint - either run from source or [check out the API call](https://github.com/lbryio/lbry-desktop/issues/1886). *Update: codes have been redeemed, congrats to those that figured it out!*

![reward codes](https://spee.ch/ffc5952b97a27f2f1c66e84ff37cafb28b613c10/custom-reward-code.jpg)

### Browsing History {#history}
Wouldn't it be nice to know which content you've visited while exploring the LBRY app? We previewed this feature in the last update and we're announcing that it will be be available in the next app release! It will store each file you've visited so you can quickly revisit something you accessed in the past. You'll have the ability to clear items one by one and also with a Select All button. This data is currently stored locally but we plan to allow it to sync to your LBRY account for multi device support.

![file history](https://spee.ch/6f265044c4820c2bf1cc2e6f0da6fa6d06b1f87e/history-page-rev2.jpg)

### New In-app Video Player in Progress {#video}
We know how important the video playback is to the LBRY Desktop app because a majority of the content users are sharing is video, so it only makes sense that our player be much more versatile than the current one which only supports H264 MP4 playback. After some research, we determined that [video.js](https://github.com/videojs/video.js) would be a fantastic fit for the app because, first and foremost it's open source, and it's extremely customizable. Video.js offers many [plugins](https://github.com/videojs/video.js/wiki/Plugins) which would satisfy various requests we've heard from the community, like support for other file types/codecs, subtitles, chromecast support, a replay button, skinning and theatre mode. With the first release, we'll most likely just support the basics and then add-on functionality slowly. Right now we're in the process of exploring the best way to playback data seamlessly from a filesystem as it's being written, as opposed to a typical web stream like most players are used to. Want to give us a hand, check out this [StackOverflow question](https://stackoverflow.com/questions/52615536/stream-file-to-html-video-player-as-its-being-downloaded-in-electron-using-fs).

![video player](https://spee.ch/6da7d339232101b0251c91112b6c80da243c1ed3/new-video-player.jpg)

### New Social Sharing Feature {#social}
In order to expand the `View on Web` functionality we recently added to the app, the next version will include a social share button that will allow you to share/copy the spee.ch URL as well as the LBRY app link URL. The `open.lbry.io` URL, which hyperlinks to the LBRY app / specific content page (or channel!), can be used to share content with other app users who have LBRY installed on their desktop or Android. We've been using this feature in our emails as well as on our Discord channel, and now we are ready to expose it to all LBRY app users. Special thanks goes out to community contributor [@jessopb](https://github.com/jessopb) for this feature!

![share](https://spee.ch/ee42d31a678720aec0e6f1417f2c462f5060a634/new-share-screen.jpg)

### Subscriptions Next Steps {#subs}
At LBRY we believe that subscriptions will keep users coming back to the app - that's why we'll be spending more resources in this area to make the experience even better than what's currently available in the app. One of our next goals is to make [newly published content stick out more](https://github.com/lbryio/lbry-desktop/issues/1859) when you visit the subscriptions page by showing you the age in time units since it was published and making sure the count indicator reflects this. We'll also explore ways to alert you to subscribed content you haven't seen in other areas of the app, show a subscription status in file tiles and make sure you automatically download ALL content (if you so choose) posted by your favorite channels. Finally, we're working on a email digest solution to alert you when your channels have new content posted along with a way to enable/disable this feature from the subscriptions page (by way of our new email management page).

### Search Improvements {#search}
In September, we implemented two search improvements: 1) better auto-suggestions for LBRY content when typing in the search bar and 2) giving higher precedence in search results based on LBC bids. We are still experimenting with how much "weight" LBC bids should be given in order to optimize search results both relevance and importance (we feel that larger bids on URLs signifies that the content is legitimate and deserves a higher search ranking due to a larger stake in the platform). But the results aren't always perfect and still need tweaking - this is why you'll sometimes see Community Top Bid (content with high bids) at top of search results - their bids are magnitudes higher than others, which gives them precedence even though only 1 or two words are a match. Below is a better example of this in action on a LBRY related video - the LBRY Community claim is at the top since it has a a 5,000 LBC bid.

![search ranking](https://spee.ch/9fa17288406733d0610ad86dcb789be23d84f4cf/search-ranking.jpg)

### LBRY Desktop App UI Experimentation {#preview-facelift}
Our new in-house designer, who recently redesign lbry.tech, is taking a shot at other projects at LBRY. Slowly but surely he's made his way to the LBRY desktop app in order to give it a more modern facelift. These are just initial experiments at making the app even sexier than it is today, so don't feel too strongly about them one way or another - we just wanted to give you a preview of the iterative design process.

![experiments](https://spee.ch/b4f4e3cdfe973356e03f71f8c637dcf236a322f8/lbry-ui-experiments.jpg)

### Protocol - 0.30 Progress {#protocol}
We can see the light at the end of the tunnel for our 0.30 protocol release which includes a brand spanking new wallet and Python 3 upgrade. The team released a [release candidate](https://github.com/lbryio/lbry/releases/tag/v0.30.0rc2) which is being tested across the various LBRY apps to ensure compatibility and a smooth transition. The key issues we've identified so far revolve around UPnP functionality (which is being tested on various routers), wallet migration issues (recently solved), and how the new wallet handles block confirmation (in the works!). Another fairly significant change with this release is how LBC amounts are displayed and parsed - we've decided to go with [decimal strings](https://github.com/lbryio/lbry/issues/1489) such as `1.00` to remove any ambiguity. We've already identified the [LBRY desktop app changes](*https://github.com/lbryio/lbry-desktop/issues/1988) required to support this release and we will have our community begin testing once the aforementioned issues are cleaned up.

### LBRY on the Web Initial Planning {#lbry-web}
We've begun the [initial legwork in planning out](https://github.com/lbryio/lbryweb/wiki/LBRY-Web-Service-Proposal-v1) what a LBRY on the Web experience would look like in terms of infrastructure and services. The main goal will be to provide a LBRY like experience through a traditional web browser, while keeping as much of the protocol and other services in tact in the backend. This will likely require extensions to the current lbry-sdk in order to support an account based system.

![web](https://spee.ch/f5278b95e025d4d48aa10ac9c890b587da380640/lbry-web-planning.jpg)

### LBRY Dockerization {#docker}
Community member [@chamunks](https://github.com/chamunks) became interested in the LBRY project a few months ago and wanted to use his previous experience with Docker to make it easier for anyone to run the various components that make up the LBRY ecosystem. Chamunks states:

My end goal was inspired by aiming towards properly containerizing the spee.ch multisite so that it would be trivial to deploy for others and then soon realized that I would need to containerize several other appliances so I put the spee.ch container on hold and went straight back to lbrycrdd and chainquery as that will be the required in the future as well. I had also previously containerized lbrynet-daemon, making it even easier for someone to run an instance.

![docker](https://spee.ch/b7d3c2c58324f7c78c0bc1fc9ee397481fa23c7e/lbry-crd-docker.png)

### LBRY Mining Supply Chart {#supply}
A community member recently completed a bounty that called for the creation of a mining supply chart which allows us to visualize how many LBC will be released into circulation and in what year. It also provides a quick reference into to the mining reward schedule which is currently in its last phase - a logarithmically decreasing emission schedule. The leftmost axis is the block reward, then the total supply of LBC, and then the inflation rate on the right. At the time of this update, the block reward is at 344 and is projected to be at 300 by 2020 and below 200 by 2025. We'll be adding this information to the [block explorer page](https://explorer.lbry.io) in the coming weeks.

![supply](https://spee.ch/a9c91e284809def8dcad3d506f6653fbd0fa5f45/lbry-supply-chart.jpg)

### Blockchain - Maintenance Release and Proof of Purchase Exploration {#Blockchain}
The blockchain team released [patch version 0.12.2.2](https://github.com/lbryio/lbrycrd/releases/tag/v0.12.2.2) of the full blockchain client to address a few bugs found during testing. There's no immediate need to update if you are not experiencing any issues. Otherwise, the team has been deep in exploration about how content purchases have been and are presently performed on the LBRY blockchain using the traditional Pay-To-Public-Key-Hash (P2PKH) mechanism. Essentially, this means that money (and nothing else) is sent to an address -- imagine receiving a letter in the mail with nothing but cash in the envelope. The user's wallet knows what content was purchased at the time, and can request that content from the network. However, the lack of information on the seller's end is unfortunate. And should the user lose their local wallet's record, their content purchases would be lost as well. In addition, the blockchain network can handle hundreds of transactions per second but not thousands.

We are looking to address this problem and have had many discussions on the topic. Specifically, we are looking for a solution that includes these requirements:
1. Publishers have ready access to information about what content they have sold (basic accounting).
2. Purchasers have ready access to information about what content they have purchased (basic accounting).
3. There will exist a proof of purchase such that there can be no argument about what was bought/sold.
4. Rebuilding a wallet from seed should also restore any previous content purchases.
5. Purchases need to be identifiably different from claim support, advertisements, and 3rd party certification.
6. Keeps up with the payment traffic even in a (hoped-for) worst-case scenario.

To solve this problem we have been considering embedding the necessary data in the blockchain, using an off-chain P2P network like the Lightning Network, enhancing the wallet, or enabling use of a 3rd party payment processor service.

In addition, we have been exploring these other possible features in the same vein:
1. Publishers may set up rules for their pricing (discounts for time periods or to specific people, etc).
2. Per-stream payments.
3. Posting content (or purchasing it) in any currency.
4. Content cancellation (it's no longer for sale).
5. Off-network negotiations can be enforced (essentially through Pay-To-Script-Hash mechanisms).
6. Synchronization of wallet's across devices (or some blockchain mechanism for allowing purchased content to be viewed on multiple devices).

[Feel free to beg for your favorite feature](https://discourse.lbry.io).

# Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [ contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). We also recently launched our [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects.

If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), [Reddit](https://www.reddit.com/r/lbry), [Instagram](https://www.instagram.com/lbryio), and [Telegram](https//t.m/lbryofficial).

[Back to **top**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
