---
author: tom-zarebczan
title: 'Development Update for February 2020'
date: '2020-02-24 16:00:00'
cover: 'wooden-letters-banner.jpg'
category: community-update
---

Welcome to the January-February 2020 LBRY Development update, the first of the new decade! In this post we’ll show you what we’ve been up to since our [last update in December](https://lbry.com/news/nov-dec-dev-2019). Sit tight, there’s been lots of progress and releases, including updates from the Apps (Desktop, lbry.tv, and Mobile), SDK, and blockchain teams! 

To read previous updates, please visit our [Development and Community Update archive](https://lbry.com/news/category/community-update).

If you want to see a condensed view of what we've completed recently and what’s planned for LBRY, check out our [Roadmap](https://lbry.com/roadmap). We’ve recently updated it with our 2020 priorities, and you can watch our [video overview on lbry.tv](https://lbry.tv/@lbry:3f/LBRY-2020-Roadmap-Release:6).

Let’s start with some GitHub stats across all our repos since our last update about 51 days ago. 45 repos were updated. 770 issues were created and 100 were closed. 21 pull requests were merged. 13 GitHub users outside of LBRY made code contributions: [kodxana](https://github.com/kodxana), [andbeletsky](https://github.com/andbeletsky), [Meantub](https://github.com/Meantub), [TigerxWood](https://github.com/TigerxWood), [Yamboy1](https://github.com/Yamboy1), [dalhill](https://github.com/dalhill), [eggplantbren](https://github.com/eggplantbren), [er013](https://github.com/er013), [joebass85](https://github.com/joebass85), [michaeltintiuc](https://github.com/michaeltintiuc), [mkroman](https://github.com/mkroman), [nestordominguez](https://github.com/nestordominguez), [osilkin98](https://github.com/osilkin98), [tuxfoo](https://github.com/tuxfoo), and [ykris45](https://github.com/ykris45).

Thanks to everyone who took time from their busy days to help LBRY out!
 
## In this report
* [Desktop app](#summary-desktop) 
* [SDK](#summary-sdk) 
* [lbry.tv](#web)
* [Thumbnails on LBRY](#thumbs)
* [LBRY for Android](#android)
* [Blockchain](#blockchain)
* [YouTube Sync](#youtube)
* [New creator repost reward is live, analytics via email, and a special surprise](#rewards)
* [2019 review and new 2020 roadmap](#roadmap)

## Desktop app {#summary-desktop}
Since our last development update, the app team shipped two named releases: [0.39.0](https://github.com/lbryio/lbry-desktop/releases/tag/v0.39.0), under codename [Joule](https://lbry.com/news/joule), and [0.41.0](https://github.com/lbryio/lbry-desktop/releases/tag/v0.41.0), under codename [Kelvin](https://lbry.com/news/kelvin). Both continue to improve user experience through homepage improvements and a new repost feature. Version number 0.40 was skipped due to a bad build, and [0.42.0](https://github.com/lbryio/lbry-desktop/releases/tag/v0.42.0) finished up the repost work started in Kelvin by allowing them to be created in the directly in the app. 

### Joule improvements - homepage, invites, and more
Joule brought a huge revamp to the homepage experience by moving away from the default trending + tags view, to a more dynamic and larger tile listing of your preferred content. 

We want to make the experience more about the content you’re already interested in, as opposed to trying to force you into trending-first discovery as in previous versions. The other main feature in this release was invites. We re-worked this area allowing users to share special invite URLs featuring their channels instead of a random invite code. Inviting friends and fans of your channel has never been easier! 

A bit more on the UI changes: front and center is your Following feed, which includes two rows of the latest content from your subscriptions. Below this you are presented with trending content for some of your tags, then trending across LBRY, and finally content from the @lbry channel to help you stay up to date with the latest news and happens on our platform. Each of these sections can be clicked into via the hyperlink to a more detailed listing. We moved from dropdowns to more user-friendly buttons to sort by top/trending/new. The sidebar is also a bit more dynamic and shows your followed tags or channels, depending on your choice of view. 
 
![Joule](https://spee.ch/@lbrynews:0/lbry-joule.gif)

### Kelvin features - reposts, top claims, autoplay, and more
In Kelvin, we added the ability to display reposts. This is a new feature created for LBRY and is similar to what you’ve seen on platforms like Twitter where you can repost someone else’s content to your own feed. 

We are hoping it will help in the discovery process as it allows creators to share content from other creators. It also enables a cool new type of channel, dedicated to curating content. We call these repost only-channels (check out [lbry://@Top-LBRY-YouTubers](https://lbry.tv/@Top-LBRY-YouTubers:d) for an example). Another cool use case is the ability to repost your own or others’ content under a different URL (i.e. when you go to lbry://lbryrocks it redirects to lbry://jiggytom). 

On LBRY, reposts work by creating a new claim, which references the content you are reposting, and signs it with your channel. Attribution still goes to the original claim holder, i.e. tips go to them, but your channel can still get tipped for having a well curated feed or helping share content from other creators you enjoy. Version 0.42 introduced the ability to make reposts directly from file pages. By default, it keeps the same claim name as the original post, and specifies a low bid. However, you can also change the claim name and bid to anything you want (e.g., with the jiggytom example above, the claim name was changed, and you might want the bid to be high enough to obtain the vanity name). Sometimes it requires you to do so as the app currently doesn't allow a wallet to have two claims with the same name at present.

We also added a top claims page when typing any URL in the search bar, see [lbry://elon-musk](https://lbry.tv/$/top?name=elon-musk). This page also allows you to directly support this content to help it appear higher in the search and trending. Finally, other new features include a download button on claim hover, new icons that show the file type, and the ability to edit and delete your own comments. 

![Kelvin](https://spee.ch/5/lbry-kelvin.gif)

### Other features, tweaks, and bug fixes
Other new features and changes in Joule/Kelvin, and since our last update include:
- Autoplay next improvements: a countdown/cancel button, prevent playing channels/blocked content, remove mature recommendations on non-mature content 
- More languages: Danish, Romanian, and Urdu.
- Improved display and handling of text content including markdown.
- AppImage support on Linux, including seamless auto upgrades!
- Authentication data now stored in a cookie rather than keyring (including a migration).
- Ability to unfollow deleted channels.
- Fix followed-channel syncing between devices.
- Thumbnail of content auto-generated on lbry.tv when no thumbnail is present.
- Improved embed links - with support Twitter video, thumbnails, and better autoplay support (off by default).

### Privacy at LBRY
If you’ve checked out the @lbry channel recently, you may have seen our [latest video explaining privacy changes coming to LBRY](https://lbry.tv/@lbry:3f/privacy-update:f). On the desktop side, it will now be clearer which types of data is tracked and by whom, and users will have control over their settings. Both new and existing users will be prompted with the above welcome screen on startup. Users who choose to sign into lbry.tv on desktop will have to at least share data with LBRY to be eligible to earn rewards. Telemetry and other analytics data through Google Analytics will be opt-in. 

![privacy](https://spee.ch/4/privacy-lbry.jpeg)

### Channel discovery on first run
In order to help users better curate their homepage and follow channels they will enjoy, we’ll be encouraging following of top channels during the first run process on sign in. We’ve also revamped the [Discover New Channels page](https://lbry.tv/$/following/channels/discover) to show top, trending, and channels from @lbrycast to aid in content discovery. 

![findchanels](https://spee.ch/2/find-new-2.jpg)

### Additional discovery filters

We want to give users more control over discovery, so we’ll be adding additional options to filter by similar to those you’ve seen on the search page. At first, these will include: claim type (reposts, channels, streams), file type (video/audio/document), and duration. We’ll be adding more like free/paid, language, and release time. 

![filters](https://spee.ch/a/filters-1.jpg)

## SDK {#summary-sdk}
On the SDK side of the house, we’ve shipped versions every weeks since our last update: [0.52.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.52.0), [0.53.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.53.0),
[0.54.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.53.0),
[0.55.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.55.0),
[0.56.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.56.0), 
[0.57.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.57.0), 
[0.58.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.58.0), 
[0.59.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.59.0), 
[0.60.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.60.0), and the latest patch at [0.60.1](https://github.com/lbryio/lbry-sdk/releases/tag/v0.60.1). 

The main features and bug fixes include:
- Add file transcoding options (see below).
- New [wallet server indexes](https://github.com/lbryio/lbry-sdk/pull/2811) and ability to filter by duration (coming to an app soon!).
- Reflected status on file list.
- Ability to pay wallet servers (not enabled by default).
- Torba, the wallet, is now part of the main lbry-sdk codebase.
- Ability to update comments (editing).
- Wallet sync speed improvements through batching.
- UPnP improvements to support more routers.
- Add ability to pass blocking and filtering channels to wallet server configurations.
- Add Prometheus metrics for better monitoring.
- Add additional trending algorithm called AR which is more responsive by recalculating every 10 blocks (Thanks @EF).
- Resolve flag to claim/stream/channel list (to get canonical urls and other trending metadata).

![sync](https://spee.ch/b/headers-sync.png)

### Transcoding of content on upload
The latest SDK includes the ability to transcode content during the publish process if FFMPEG is installed on the system. It must be present in the path, or specified via the ffpmeg_folder configuration item in daemon_settings. There are two flags available: 
**--validate_file** -  validate that the video container and encodings match common web browser support or that optimization succeeds if specified.
**--optimize_file** -  transcode the video & audio if necessary to ensure common web browser support. 

The first will simply tell you whether or not the file is within spec for typical streaming scenarios at LBRY (i.e. it will check the bitrate, that it’s web optimized - faststart, and has the correct encoding) and won’t actually transcode. The 2nd flag is the one that does the transcoding to the most compatible spec (h264/AAC, faststart, streamable bitrate). A new file is created along side the original in the same folder, which is then used to upload to LBRY. Currently this file must be manually deleted. 

![validate](https://spee.ch/0/sdk-validate.png)

### Claim search indexes added

We recently revamped our [wallet server indexes](https://github.com/lbryio/lbry-sdk/pull/2811) to include additional sorting and filtering options so that the Desktop app can give users advanced discovery options. This includes duration, claim type, stream type, fee amount, and channels. We also cleaned up some old indexes for trending global that were not being used. Currently there is a limitation with SQLite where only one index can be used at a time and we hope we can take more advantage of multiple indexes when we move to a POSTGRES database. 

### Faster sync and performance improvements
The SDK team has also been working closely with the blockchain team on sharing/consuming data directly without having to sync. Part of this work will also allow us to make the client/server work directly together without having to make additional calls to sync address data, transaction history, and to make claim search/resolve calls. This is going to speed things up considerably for the lbry.tv use case.

### BitTorrent progress
We’ve made additional progress on our ability to download Torrent files directly into the LBRY app as if they were regular LBRY files. These will show up in file list alongside LBRY files and will give app users more decentralized content options by allowing Torrent downloads.

## lbry.tv {#web}

After the silent lbry.tv launch, we officially launched lbry.tv at the end of January, and have been heavily promoting it throughout February. We’ve had tons of new users sign up for the LBRY app experience on the web and we are thrilled with the growth and attention we are seeing! 

With this large and quick growth, we’ve also experienced technical and resource growing pains. Although we’ve added additional streaming servers in the US, they are sometimes still overloaded, causing buffering issues. Our plan to to add additional servers here and around the world in the next couple of weeks - lbry.tv will be able to figure out which server is the best for a particular user. 

On the SDK side, we’ve also seen large loads due to many wallets being loaded and tons of wallet related activity. Some of the calls are not optimized yet, which may bog down the experience for some users. This led us to scale up with additional SDK servers, and we are currently moving to a cluster solution to support more traffic across multiple server instances. We are also re-working some of the inner designs of how the SDKs interact with wallet servers to provide the most optimized environment for users (there’s really no need to have these databases on separate servers like the typical LBRY app > wallet server connection we have today). 

We are excited to see how performance improves once we get the larger server and SDK improvements in place. Thank you for bearing with us during some of the downtimes and slowness during this large growth period. We promise a much smoother experience is on the horizon. 

### Monitoring data and metrics
During the last couple of months, we’ve beefed up our system monitoring and metrics tools to get a better understanding of the lbry.tv environment and the pieces that come into play. We’re integrating Prometheus into more of the various layers, and using a tool called Grafana to put together some fantastic metrics and monitoring tools so we can understand what’s happening at a glance. 

![metrics](https://spee.ch/9/metrics-lbry.jpeg)

### Dedicated streaming servers

As LBRY becomes increasingly more popular, we have to ensure the network remains stable and fast when it comes to content delivery. For this reason, we provisioned multiple servers with absurdly high capacity (almost 50TB of space) to better cache and quickly deliver content straight to our users. If you're interested in running your own content storage you should stay tuned as we will likely release instructions on how to better help the network en masse.

One key component that we detached and deployed as a standalone service is the streaming server itself, which used to be part of lbry.tv. It now has its [own repository](https://github.com/lbryio/lbrytv-player) and runs on several dedicated servers. The improvement was very noticeable: the website became snappier, loaded faster and most importantly, videos played more reliably!

We intend to continue working on scaling lbry.tv better and reaching regions all around the world providing an experience at least comparable to the one North Americans are having now.

### Invite page
With our invites improvements, there is now a dedicated landing page for content creator’s channels when they share their invite links. Once a user hits an invite URL, they are automatically subscribed to the channel, the invite is credited, and new users can proceed to create a lbry.tv account. 

![invite](https://spee.ch/6/invite-page.jpg)

### Privacy on lbry.tv
As part of our privacy improvements for DTF February week 3, we’ve made it clearer that lbry.tv collects usage information, even with third parties like Google Analytics. Users who wish to opt out can run the Desktop app, or run an ad blocker that disables typical GA products. 

![privacy-lbrytv](https://spee.ch/0/privacy---lbrytv.jpg)

## Thumbnails on LBRY {#thumbs}
You may have noticed a few instances where the Thumbnail upload service was down due to spee.ch having issues. The spee.ch wallet and server have grown very large over the years due to tens of thousands of thumbnail uploads. We are exploring solutions to replace this, one of which is adding a special 2MB blob directly to the file itself which will store the thumbnail. Thank you for your patience while we work out a better solution.

## LBRY for Android {#android}

Since our last update, our team has released [0.12.2](https://github.com/lbryio/lbry-android/releases/tag/0.12.2) codename [Fireworks] (https://lbry.com/news/fireworks) and [0.13.0](https://github.com/lbryio/lbry-android/releases/tag/0.13.0) codename [Galaxy](https://lbry.com/news/android-galaxy) which continue to polish up the Android app experience, and bring it closer to feature parity with Desktop/lbry.tv. 

### Fireworks
Fireworks greatly improved the search experience by preloading content from the lighthouse search service so it didn’t need to be resolved, basic text rendering (including markdown), added view and follower counts, ability to download videos/content, and removed sign in on first run. You’ll see the content download progress in the notification bar, file page, and in the Library area - you can stop downloads from any of the areas too. 

![fireworks](https://spee.ch/@lbrynews:0/fireworks-android.jpeg)

### Galaxy

The Galaxy release enabled a long awaited feature on Android - Invites! This area works similar to the one on Desktop/lbry.tv where you can select (or create) a channel to customize you invite URL. You can also invite via email, and see your invite list. The invite reward must be claimed from the rewards page which now has a filter for claimed/unclaimed invites. 

![Galaxy](https://spee.ch/3/galaxy-lbry-android.jpg)

### Other improvements and bug fixes 

Other new features and changes in Fireworks/Galaxy, and since our last update include:
- More responsive content pages (related content delayed load).
- Quick skip in videos (10 seconds at a time).
- Improved search results when dealing with non-mature content (no mature content suggested even with setting enabled).
- Fixed background playback bugs (still happens rarely).
- Purchase confirmations for paid content.
- Tipping of channels directly from channel pages.
- Improved notifications at bottom of the screen.

### First run improvements around following and reposts

Next steps for Android include the similar first run changes as Desktop where we want to encourage users to follow creators for a better overall experience. Currently reposted claims do not display correctly on Android and thus are not accessible, so we will also be adding basic repost display and repost capabilities to match lbry.tv/Desktop. 

![follow](https://spee.ch/d/Follow-android.jpg)

### F-Droid
As part of our privacy initiative for DTF February, we’ve begun making the necessary changes to our build process and removing analytics/Firebase so that we can be officially part of the F-Droid repository. Both of these were requirements in order to be considered and require a standalone SDK build without buildozer and a refactor of our code to easily remove GA. Since Firebase will also be removed, these versions will not have notification capabilities until we can replace it with a non-Google alternative. 

## Blockchain {#blockchain}
In the last couple of months, the blockchain team has been working on two main tasks - assisting the SDK team with a single claim database mechanism and bringing in Bitcoin version 19 upstream changes. The claim database redesign will allow the LBRY SDK to directly access claim data without having the wallet servers needing to sync from LBRYcrd, which is currently a slow and tedious process. 

The Bitcoin version 19 changes will bring additional stability improvements to our codebase, but will force us to revamp how our tipbots work since the accounts mechanism is removed in this version. The team has also been assisting with providing the video transcoding capabilities in the SDK and debugging slowness of wallet related calls. 

## YouTube Sync {#youtube}
YouTube Sync has played a fundamental role in the previous months. YouTube has become more aggressive in censoring topics and channels on their platform and with their recent ban on crypto related videos we've observed a huge influx of new creators wanting to transfer to LBRY. During the first month and a half of the year we published more than 200,000 new videos with an average of 4500 videos every day!

With so many new users and creators flooding into LBRY we had to better optimize the process of syncing new channels and keeping previous ones up to date. We have been very successful at that as we not only managed to keep up with the great demand, we also reduced the time it takes for popular channels to be updated: while in the past it would take up to 24 hours for a new video to appear on LBRY, we've reduced this latency to up to 3 hours maximum.
We're currently researching ways to further speed this process up as we'd like to see new videos come in as soon as they're released on YouTube.

![channels](https://spee.ch/8/sync-channels.jpeg)

(source: https://lbry.social/lbrynomics/live-graphs/)

## New creator repost reward is live, analytics via email, and a special surprise

Recently we rolled out a new reward around the repost feature and our DTF February campaign which allows creators with at least 50 validated followers to re-share content from five different creators to earn 105 LBC. We think this will help users discover new channels from the creators they already follow, and helps creators co-promote their content between channels. 

We’ve been working on a new email that will go out weekly to creators to share some of their analytics for the last week. This will also eventually feed data into the LBRY apps to show similar information. 

Finally, we’ve got [a big surprise scheduled for the final week of February](https://lbry.tv/@lbry:3f/hmmm:4) to our largest and most loyal content creators. If you are one of them, you should have received an email asking for some information from you, and we’ll publically share what the special gift is later this week! 

![creatorstats](https://spee.ch/2/stats-creators.jpg)

## 2019 review and new 2020 roadmap {#roadmap}
We’re excited to announce our [2019 review by Jeremy](https://lbry.tv/@lbry:3f/LBRY-2019-Review:0) and the [roadmap for 2020](https://lbry.com/roadmap)! Jeremy covers the roadmap in details on our lbry.tv channel in both [video](https://lbry.tv/@lbry:3f/LBRY-2020-Roadmap-Release:6) and [text formats](https://lbry.tv/@lbry:3f/lbry-in-2019-2020:5). 

Everyone at LBRY is excited about what’s in store for this year, especially with the interest we’ve seen in lbry.tv and more awesome creators coming on board. We hope to continue improving the creator experience through analytics and LBRY first publishing, which we think will change the game considerably (once content is exclusive on LBRY for the first X hours).

## Limited Reward Code!
We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `feb-dev-yuosd`

## Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Make sure you have turned on the Developer option in your email preferences (see app overview page), or sign up at [lbry.tech](https://lbry.tech). We also have a [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbrycom), [Facebook](https://facebook.com/lbrycom), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https://t.me/lbryofficial). 

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](https://lbry.com/get?auto=1) yet, what are you waiting for?
