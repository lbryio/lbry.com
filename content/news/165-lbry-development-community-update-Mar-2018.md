---
author: tom-zarebczan
title: 'Development and Community Update March 2018'
date: '2018-04-03 18:00:00'
cover: 'droid1.jpg'
category: community-update
---

Back in December, we published the [first ever LBRY Development and Community update](https://lbry.io/news/lbry-development-community-update-1) and followed up with another for [January 2018](https://lbry.io/news/lbry-development-community-update-jan-2018) and [February 2018](https://lbry.io/news/lbry-development-community-update-feb-2018) - be sure to check them all out if you missed it! We will continue posting these updates at the beginning of each month to keep each and every LBRYian up to date on our quest to revolutionize content discovery, sharing and monetization! To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

If you haven't already, please take a moment to read our [Looking Back and Moving Forward: LBRY in 2017/2018](https://lbry.io/news/lbry-in-2017-2018) blog post and check out our [roadmap](https://lbry.io/roadmap).

To skip the tech stuff and see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. Our plan is to create a technical reference site which will be developer focused at https://LBRY.tech, which is not live yet, but you can check out our  progress on [GitHub](https://github.com/lbryio/lbry.tech).

### App and Protocol Summary
We know it's been a long wait, but we're very happy with our latest app release. And the wait will be worth it when you experience the improved LBRY daemon - it's the first major protocol update since last November, and it's a big step in the right direction. You can read about specific enhancements in the changelogs ([0.19.0](https://github.com/lbryio/lbry/releases/tag/v0.19.0) and [0.19.1](https://github.com/lbryio/lbry/releases/tag/v0.19.1)) but in general we've noticed improvements in network availability and streaming speed (time from when play is clicked to when the download starts).

On top of that, it brought some much needed bug fixes, wallet encryption capabilities, ability to redownload content on updated claims and updating claims with large LBC deposits (now it uses the current bid, previously you had to have the balance in your wallet to cover it). The next steps for the protocol are to significantly improve network data announcement times, speed up startup times and rewrite client/server side wallet functionality.

On the app side, the main feature was subscription enhancements which enabled in-app notifications (including alerts for new content on channels that users are subscribed to) and auto download for channels that users subscribe to. The update also improves search results (see section below for details), allows YouTubers to earn [Sync Rewards](https://lbry.io/youtube), saves the app state when closing to tray, and lets users export transactions to CSV. Bug fixes included correct sorting of published content, allowing lbry:// links to be opened when the app was closed on OSX and fixing them on Linux, fixing night mode start time and bringing Windows notifications back into a working state.

![Subscriptions](https://spee.ch/f/subs-app-drk.png)

### LBRY for Android Alpha Testing is LIVE!!!
Considerable progress has been made on the Android app with the discover page now showing the same content as the desktop app. The mobile app also supports downloading and video playback. Next on the feature list is enabling search, and improving user experience and the usability of the interface.

An alpha build was published to the Google Play Store and notifications have been sent to both our Developer mailing group and our Android waitlist. We believe in the philosophy of "release early, release often," and it's working great in this case. We've already received a lot of useful feedback, and are looking forward to much more from our passionate community members. That said, please remember that alpha testing isn't for everyone - the app is very basic and frequently unstable, has bare minimum features, and may turn your phone into a toaster.

If you're a developer, sign up on our [Android Alpha landing page](https://lbry.io/android-alpha) to be included in the next round of alpha testing invites! [Google Play Store Link](https://play.google.com/apps/testing/io.lbry.browser) - only available to approved alpha testers, see link above.

[![Playstore](https://spee.ch/d/LBRY-alpha-playstore.jpeg)](https://play.google.com/apps/testing/io.lbry.browser)

### Search Updates {#search-updates}
This month saw vast improvements to the search capabilities, including faster response, more relevant content, and channels now appearing properly in search results. Additionally, all claims for a search term appear in the results as opposed to only the winning claim.
Other enhancements include improved results with partial search terms and a better balance of channels/claims appearing in search results. We've still got a long way to go in this department, this is only the start!

If you run into search issues while testing the app or not happy with search results, give us some feedback on [GitHub](https://github.com/lbryio/lighthouse/issues)!

### App Redesign {#redesign-updates}
The LBRY app redesign has been merged into the master branch and is available to [run from source](https://github.com/lbryio/lbry-desktop) for those interested in checking out an early preview. We have identified a number of issues which block a release candidate from being built yet and they are marked with a [redesign label](https://github.com/lbryio/lbry-desktop/issues?q=is%3Aissue+is%3Aopen+label%3Aredesign) on the issues page. Before submitting any new design related issues, be sure to review those first. We are extremely excited and eager to get the redesign into the hands of community members, stay tuned!

![App-preview](https://spee.ch/c/app-preview.jpeg)

### Subscription Next Steps
Channel subscriptions give users a reason to return to the LBRY app on a daily or weekly basis, so we will continue to focus development effort in this area. The next steps include global and per subscription content auto download settings, notification badges, saving subscription data to LBRY's API server for syncing across installations/devices and providing emails when new content is available. We also plan to experiment with several different rewards structure to incentivize use of subscription features.

### Cool App Features in the Pipeline {#features-update}
Check out the below pull requests to get a sense of a few exciting features coming to the LBRY app.

[Spee.ch URL Links](https://github.com/lbryio/lbry-desktop/pull/1222) - This will allow creators and consumers to quickly share a https://spee.ch URL for content or channels they find in the LBRY app. This will be available for free content that's an image/video/GIF and for all channels.

[Ability to update thumbnail to spee.ch from Publish screen](https://github.com/lbryio/lbry-desktop/pull/1248) - A common frustration among publishers is having to upload their thumbnails on spee.ch separately or using another website to do so. With this enhancement, the LBRY app will allow direct thumbnail uploading to spee.ch which will significantly increase the publisher experience.

[Auto Updating channels on the LBRY Discover page](https://github.com/lbryio/lbry-desktop/pull/1267) - Currently the LBRY discover page is fairly static besides the trending and community sections (or when we update the page with featured content). This change will allow us to specify a channel name instead of specific claims to include on the Discover page. The main benefit is that the Discover page will dynamically update when new content is posted to those channels!

### spee.ch Update
Over the past few weeks, we've been converting the code base of spee.ch so that it can be imported and customized in a variety of applications. Keep an eye out for an announcement soon which will fully explain how you can use the spee.ch code base to implement your own content hosting web app that uses the LBRY network! Want to get a headstart? Check out the [spee.ch server section below](#speech-host) and subscribe to our [speech admin mailing list](https://lbry.io/speech-admin) to be notified when we schedule a live Google Hangouts demo which will walk through the process of setting up your own portal.

In terms of spee.ch site performance, the publishing function has been running without a hitch over the last 2 weeks after the team implemented a few patches to deal with wallet issues. Currently, publishes take about 15-20 seconds but we are hoping to get that number close to 5 seconds with additional refactoring and enhancements to the publishing process.

### Protocol - Wallet Server and Client Development Efforts
We've found that elements of the LBRY wallet (LBRYum) and LBRY wallet server (LBRYum-server) are causing bottlenecks with claim resolution and publishing - two functions that are widely used throughout the LBRY app experience. Claim resolution occurs between the client and server to make sure that claim data is read correctly from the blockchain. Publishing is the process by which a claim ID is generated and broadcast to the network - something the spee.ch server has been struggling with since there is lots of publishing activity.

In order to fix the client issue, the LBRYum framework is being re-written into the LBRY daemon with performance and stability in mind. On the server side, we are migrating away from the Electrum code base and into [ElectrumX](https://github.com/kyuupichan/electrumx) which will bring numerous performance and stability enhancements. There is significant development and testing to be done in both areas and we believe this will result in a much better App and protocol experience.

### Blockchain - Preparing for a Hardfork
There are two major changes/fixes to the LBRY blockchain in the pipeline that will require a hard fork of the network. Neither of these changes are controversial - both will improve the functionality of the blockchain. Our goal is to announce these at the end of April and allow for another month or two before the hardfork code will activate so that exchanges, miners and other services have time to update.

The first deals with how [case sensitivity is treated](https://github.com/lbryio/lbrycrd/pull/102) when calculating vanity claim/channel resolution and permanent URLs on the LBRY network. Currently, @HardFork and @hardfork are treated as two separate claim resolutions - this also means if only @HardFork exists and someone types @hardfork, they would not be able to get to the correct channel. We want the claim and channels names to work more like domain names where www.Amazon.com and www.amazon.com both end up at the same URL.

The next change deals with [claim expiration](https://github.com/lbryio/lbrycrd/pull/112). When the original LBRY blockchain was launched, we thought it was a good idea for claims to expire after some amount of time (currently at 1.5 years) but after we gave it additional thought and based on feedback we've received, we want to remove the claim expiration completely. This significantly reduces administrative overhead on the blockchain, otherwise, expired claims would need to be renewed every 1.5 years which can be troublesome in certain situations (i.e. wallet isn't always online, wallet was lost). If you have a really early LBRY claim that has expired, LBRY will renew them automatically and can send them to you upon your request - feel free to reach out to us at via [email](mailto:help@lbryio).

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform.

### Roadmap Check-in
The Q1 coming to a close, we wanted to provide an update on our [roadmap objectives](https://lbry.io/roadmap).

The [YouTube Sync partner program is live and getting feedback from testers, see additional information below](#youtube-updates).

The Meetup program has also been launched on our [Meet](https://lbry.io/meet) and [College](https://lbry.io/college) landing pages, see [below for more information](#meetup-update).

Significant progress has been made on the white paper and a first draft is very close to being shared publicly. It will be released as a navigational document, in an in-progress state, on our new LBRY.tech (not live yet) developer resource site and we'll be asking the community for their feedback.

Wallet encryption has been implemented on the daemon but is not yet available in the LBRY app. If you want to use this feature ASAP, check out the [CLI](https://lbryio.github.io/lbry/cli/#wallet_encrypt) documentation - the wallet will need to be [unlocked](https://lbryio.github.io/lbry/cli/#wallet_unlock) manually before app startup. Feel free to reach out on Discord with any questions!

The UI redesign was recently merged on our lbry-desktop repo and we should have a release candidate to share with early testers this/next week. See [App Redesign development update above](#redesign-updates).

And last but not least, the Search algorithm has undergone a number of optimizations (see [search update above](#search-updates)) which have added up to much better search results - give it a shot and let us know what you think! There's still a lot more work to do here when categories and tags come online, and we need your feedback!

A quick check-in on Q2 items shows that we are ahead of schedule with Android alpha being launched and progress being made on LBRY.tech. Also, the ability to share free content on HTML websites via the new spee.ch sharing feature is mentioned in the [features update above](#features-update).

### LBRY Merchandise Store
Come visit our newly upgraded merchandise store! Following the launch in February, we've moved our swag shop to a new, easy to remember URL: [https://shop.LBRY.io](https://shop.lbry.io). New t-shirt designs and products are frequently added, so please be sure to stop by! We're very excited to offer some fresh items designed by our new marketing intern James Biller - if you like what you see, give him a shout out on [Twitter](https://twitter.com/BillerJames)!

Help us grow our community and get the word out about LBRY: We will tip LBC if you tag us (@LBRYio) on Twitter or Facebook with a picture of you rocking LBRY swag. Please upload it to spee.ch and share the post on Discord or Reddit to claim your reward. Thanks for your support in spreading LBRY love!

### YouTube Sync Update {#youtube-updates}
We've re-launched our [Youtube Sync](https://lbry.io/youtube) campaign under a new design, process and Rewards system that allows YouTubers, who meet our subscriber requirements, to sync their content to LBRY within a few clicks. Once the creator is queued, they can claim their sync Reward in the LBRY app by signing in with the same email as their sync status page. The program launched as a pilot with our internal Discord community/targeted YouTubers and will continue expanding to a full fledged outreach on Social media and other direct targeting. The LBC rewards mentioned below are a first trial run and may increase depending on feedback.

The most common issue creators run into, especially those who have used the LBRY app prior to going through the sync process, is that their YouTube channel email is mismatched with the LBRY app email. This will require a manual fix by emailing [our Helpdesk](mailto:help@lbry.io) at the moment, but we hope to straighten this out automatically in the coming weeks. Having trouble or want to find out more? First make sure to check out our [FAQ page](https://lbry.io/faq/youtube) or you can email [Reilly](mailto:reilly@lbry.io) with any specific sync questions that aren't covered.

![YouTube Rewards](https://spee.ch/b/youtube-program.png)

### Twitter LBC Tip Bot
The Twitter TipBot bounty was solved internally by the team after open source code was discovered that provided 90% of the functionality we were looking for. With a few modifications, we set up a test server and were able to send tips! The TipBot is now being migrated to an official LBRY server which will allow it to be used all across Twitter world to tip LBC - users, creators, fans, and even projects with similar missions! Stay tuned on our Discord server and [@LBC_TipBot](https://twitter.com/@LBC_TipBot) for updates.

![TipBot](https://spee.ch/d/lbrytipbot.png)

### LBRY.tech Update
Initial legwork has begun on our developer/tech resource, LBRY.tech. We don't currently have an ETA on the launch, but it will be released as an early alpha version that includes an alpha draft of the LBRY white paper, all of which will be polished over time as we get feedback from the community. We weren't joking about "release early, release often"! You can follow our progress on the [LBRY.tech GitHub repository](https://github.com/lbryio/lbry.tech).

### Discord Role Self Assignment and New Member Flow
In order to improve the experience for new and existing members of our Discord community, we will be implementing a better system that will allow users to self assign roles based on their activity, purpose and interests. It will also allow more granular controls over which roles have access to particular channels/areas, which will also hopefully improve the overall user experience.

For example, a new user will join with access to the #general, #help and #verification channels so they have a much simpler initial experience in the chat room. They will also be welcomed with a message that describes various roles on the server and what channels they give access to. When a user is ready to venture out, they will use our Discord bot to self assign the role which will grant them channel access - i.e. a user interested in mining will ask for the miner role or one looking to discuss the LBRY price will ask for the Market-Talk role.

This will also give us the ability to better identify and communicate with groups of users on a particular topic - now we can go into the mining channel and do an @here announcement which will only be sent to users in that channel, whereas right now that includes everyone on the server!

### Want to Run a Spee.ch Clone or Web Server Hosting LBRY Content? {#speech-host}
LBRY is looking for users or communities that are interested in hosting a spee.ch like website or even a web portal into their own LBRY content (think of this as your own local YouTube page!). We would be more than happy to walk you through the process which would include customization and tweaking it to your liking! Does this sound interesting to you or maybe someone you know? Sign up on or share our [spee.ch admin mailing list](https://lbry.io/speech-admin) to be notified when LBRY will host a Google Play demo session of getting a server setup.

We are also looking for communities, subreddits and websites that could make use of spee.ch's image sharing features. This includes researching plugins to applications like Wordpress that would make such an integration easier for users. If you know any that might benefit, drop us a line on Discord.
[![speech](https://spee.ch/b/speech-fork.jpeg)](https://lbry.io/speech-admin)

### Favorite Creators Contest in Discord
We recently reached out to [Isaac Arthur](https://www.youtube.com/channel/UCZFipeZtQM5CKUjx6grh54g), with a 10K LBC bounty (plus YouTube rewards at 5K LBC), as he was the most up-voted in our Favorite Creators contest on Discord. We will give Mr. Arthur a few days to respond and then try reaching out a 2nd time and final time. If we don't hear back, we'll move onto the 2nd most voted channel which is [VetRanch](https://www.youtube.com/user/VetRanch).

### New Bounties Channel in Discord
We've created a new channel for bounty and task announcements. In addition to announcing new [bounty page listings,](https://lbry.io/bounty) we also occasionally post smaller tasks exclusively in the #bounties channel. These tasks are a great way to get involved with the LBRY project and earn a few LBC. Research, transcription, and content posting are all good examples of small tasks.

### Meetups and College Campus Initiatives - Get Involved! {#meetup-update}
Big shout out to LBRY Ambassador @bounboun on Discord for demonstrating LBRY at various meetups in France, including this one in Strasbourg to over one hundred blockchain enthusiasts. Due to positive response, we now have a French language channel ([#en-français](https://chat.lbry.io)) in our Discord. Bienvenue! Come visit and join our community!

Does free speech matter to you? Would you like to get involved with cutting edge blockchain technology and earn a few cryptocoins in the process? We are [looking for ambassadors](https://lbry.io/meet) to spread the word on college campuses and at live blockchain or video related meetups - if you'd like to bring LBRY to your group, we'll help you with resources, swag, and LBC for your members!

![Crypto Alsace Meetup in Strasbourg, France](https://spee.ch/1/MeetUpAlsaCryptoLBRY1.jpeg)

### LBRY.Community Collaboration
A short while ago, a group of LBRY enthusiasts who met each other through our Discord community came together to create https://LBRY.community, their own independent organization. Their mission is to create the ultimate resource "For Content Creators, Users and Developers - A global library of videos, images, e-books or anything digital."

LBRY Inc., is working with them to support more events and initiatives to grow community participation. Look forward to some exciting announcements from these LBRYians in the second quarter of 2018. If you missed it, LBRY Community distributed 8,000 LBC Credits through contests hosted on Discord and on the LBRY.community website - that's just a taste of what's coming.

### Developer Blogs
Some of our developers are working on blog posts based on their experiences working with LBRY. They're exploring the various problems they've encountered and how they were able to solve them. These posts will give more insight into some of the great minds on staff at LBRY and help us to reach out to more technical audiences. We've also got everything we need to turn the LBRY office into a pretty fantastic film studio, so stay tuned for video development updates!

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
