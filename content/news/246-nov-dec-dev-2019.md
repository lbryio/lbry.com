---
author: tom-zarebczan
title: 'Development Update for November-December 2019'
date: '2020-01-03 18:00:00'
cover: 'winter.jpg'
category: community-update
---

Welcome to the November-December 2019 LBRY Development update! In this post we’ll show you what we’ve been up to since our [last update in October](https://lbry.com/news/dev-oct19). Sit tight, there’s been lots of progress and releases, including updates from the Apps (Desktop, lbry.tv, and Mobile), SDK, and blockchain teams! 

To read previous updates, please visit our [Development and Community Update archive](https://lbry.com/news/category/community-update).

If you want to see a condensed view of what we've completed recently and what’s planned for LBRY, check out our [Roadmap](https://lbry.com/roadmap). We’re currently getting our priorities together to provide a look back at 2019 and provide an updated roadmap for 2020, stay tuned! 

Let’s start with some GitHub stats across all our repos since our last update about 53 days ago. 34 repos were updated. 668 issues/PRs were created, 193 were closed. 34 PRs were merged. 13 GitHub users outside of LBRY, made code contributions: [Coolguy3289](https://github.com/Coolguy3289), [Invariant-Change](https://github.com/Invariant-Change), [dniwelive](https://github.com/dniwelive), [btzr-io](https://github.com/btzr-io), [eggplantbren](https://github.com/eggplantbren), [g1tman](https://github.com/g1tman), [gpjacobs](https://github.com/gpjacobs), [kodxana](https://github.com/kodxana), [mirgee](https://github.com/mirgee), [peterjgrainger](https://github.com/peterjgrainger), [osilkin98](https://github.com/osilkin98), [ykris45](https://github.com/ykris45), [Yamboy1](https://github.com/Yamboy1), and [zxawry](https://github.com/zxawry).

Thanks to everyone who took time from their busy days to help LBRY out!
 
## In this report
* [Desktop app](#summary-desktop) 
* [SDK](#summary-sdk) 
* [Blockchain](#blockchain)
* [lbry.tv](#web)
* [LBRY for Android](#android)
* [YouTube Sync](#youtube)
* [More content creator rewards and reward levels](#rewards)
* [2019 roadmap progress](#roadmap)

## Desktop app {#summary-desktop}
Since our last development update, the app team shipped our next named release, [0.38.0](https://github.com/lbryio/lbry-desktop/releases/tag/v0.38.0), under codename [Isaac](https://lbry.com/news/isaac), as well as a patch fix with [0.38.2](https://github.com/lbryio/lbry-desktop/releases/tag/v0.38.2). 

Isaac brings a myriad of new features, changes, and bug fixes to the LBRY user experience. On the surface, you’ll notice a revamp of the UI which includes both dark and light modes for better color contrast, consistency, and navigation. With our updated SDK, we added a new feature that allows users to customize the [wallet server](https://lbry.com/faq/wallet-servers) they are connecting to. [Read more below](#wallet-servers). 

Other new features and changes in Isaac and since our last update include:
- More languages: Dutch, Portuguese, Italian, Russian, Spanish, Gujarati, Hindi, Malay, Marathi, Panjabi, French, Turkish, Slovak, Chinese, and Swedish.
- Searching on Library (downloads) page. 
- Improved search results.
- Auto-run on startup for Windows/Linux. Can be disabled in Settings.
- Dedicated Channel Creation page, along with a New Channel button (no longer have to do this from the Publish page!).
- Autoplay free text files.
- Show thumbnail while playing audio files (this was just a black screen before).
- Channel thumbnails next to comments.
- Always show pause button when video is paused (helps with autoplay on some browsers).
- Optimized calls to the SDK for better overall performance.

Bug fixes:
- Making sure the claim name doesn’t change when reselecting a file on edit.
- Don’t filter out blocked/filtered content if you own it.
- Syncing of preferences from wallet when not logged in.
- Crashing on certain localization settings.
- Balance checking while editing claims.
- Corrected message when no tags are followed.

![Isaac](https://s3.amazonaws.com/files.lbry.io/lbry-isaac.gif)

### Searching on LBRY
If you’ve used LBRY recently, you may have noticed improved search results - that’s because we’ve made large strides with our search algorithm to better process and spit out more relevant and timely results. This includes putting some weight on newer content and taking into account better multi-word scenarios. You can now also put quotes around entire phrases for exact search matches. We will continue to improve this area of the LBRY experience by adding additional filters and sorting criteria in the coming months.  

### Wallet servers {#wallet-servers}
Adding an option to select [wallet servers](https://lbry.com/faq/wallet-servers) is a large step towards our goal to further decentralize the LBRY apps and allows different communities to customize their view of the LBRY network, including search results, trending, and block lists. One such example is a community member (@EF on Discord) who is running an alternative trending algorithm on his server, connect to it to check it out: 199.192.31.122:50001. If a server is unavailable on startup, it will default back to the known lbry.tv wallet servers. We’ve also dockerized the process to make it super simple to run, check out our [guide on lbry.tech](https://lbry.tech/resources/wallet-server).

Currently the app is still responsible for applying our blocked and filtered lists, but we’ll be moving away from this and allowing the wallet server operators to determine what metadata is shown or not. This will be done through a process of designating a channel and re-signing claims with appropriate tags. 
![servers](https://spee.ch/5/wallet-servers-dev.png)

### Automated startup
In an effort to allow users quicker access to the LBRY Desktop app (i.e. if they open a URL) and to allow users to start contributing to the network immediately, we’ve introduced an auto start setting which is enabled by default. This will launch LBRY in a minimized state and it’s ready to go as soon as you need to use it. 

![startup](https://spee.ch/3/minimized.png)

And next a preview of what’s coming up in the pipeline…

### Navigation updates
We’ve heard and listened to our community's feedback about improving the navigation around Trending/Top/New and following of tags vs channels. We’re first rolling out the below changes which will default to the following + new setting which will allow you to always see the latest content from your favorite creators. And instead of having to select between multiple drop downs, these are now clickable buttons and the view changes depending on what you have selected in the side-bar. On the top left, you’ll have a visual indication of what view you are currently in. There’s also new icons and an additional button in the top right menu (publish/channel create is separated out). Next, we’ll be building towards a more customizable homepage that will allow users to configure what they want to see and where. 

![nav](https://spee.ch/3/navigation.png)

### Referral changes
We’re also in the middle of revamping our referral program to make it easier for users to share referrals and claim referrers. Today, this is accomplished via a long and ugly URL that takes users to lbry.com and we need to do some magic in the background to link up the referral and the invited user via IPs. Instead, we’ll be making the referral link point to a lbry.tv URL (e.g. https://lbry.tv/@MyChannel?referral) and the referrer will get set via our APIs directly. It will be possible for existing users to also claim a referrer if they haven’t done so already, and credit that channel with a reward. Both the referrer and referred will be eligible for an additional reward. We will also have a way for larger and verified channels to bypass the 10 max referral reward limit. Stay tuned in the next few weeks for these changes to go live! 

![referral](https://spee.ch/5/referee.png)

## SDK {#summary-sdk}
On the SDK side of the house, we’ve shipped versions [0.46.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.46.0), [0.47.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.47.0),
[0.48.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.48.0),
[0.49.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.49.0),
[0.50.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.50.0), and [0.51.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.51.0) (including 2 small patches) which have enabled a new features, performance enhancements, and bug fixes to support SegWit transactions, collections (playlists), reposting of claims, better error codes, and more decentralized downloading of blockchain headers. We did experience some downtime on our wallet servers due to the SegWit upgrade and we apologize for that. The team was able to quickly hotfix the issues and the servers are now stable. 

The main features and bug fixes include:
- Wallet balance caching to support faster responses for the lbry.tv use case.
- Support for Segwith transactions either leaving or coming into the wallet. Not supported for claims or as default for the wallet yet. 
- Downloading of headers directly from wallet servers instead of data hosted by LBRY. Further supports decentralization use case. 
- Collections support - ability to group claims together in playlists. 
- Stream reporting feature that allows any existing claim to be reposted under another channel (with a new URL that references the original). 
- Reset wallet server connection - this helps support the wallet server configuration setting in the Desktop app. 
- Clear and defined error codes. This allows the applications to more easily take action after certain errors returned by the SDK. 
- Blocklist feature for claim search. Allows configuration of channels to specific reposted claims as a blacklist. See [current epic here](https://github.com/lbryio/lbry-sdk/issues/2692).
- Fix data inconsistencies for claims updated/supported/abandoned in same block. 
- Faster response from wallet server when using --blocking. You’ll notice tipping and supports should respond quicker in the app/lbry.tv. 

![sync](https://spee.ch/b/headers-sync.png)

### Transcoding of content on upload
We are exploring an optional feature that will allow publishers to automatically transcode their video uploads so that they are widely supported across our various apps and lbry.tv. This will require packaging ffmpeg along with the SDK and processing the file locally during the upload process. It will also ensure that the videos are web optimized for fast streaming. 

### Performance improvements for claim search and other APIs
The team is aware of issues relating to claim searches that time out when a user’s followed list has many channels in it. This will be improved by optimizing the SQL calls that happen against the wallet server for larger lists of followed channel ids. In the meantime, we’ve increased the timeout to 1 second (previously 500ms) so that users have a better experience. We’re also noticing slower than expected performance of transaction related wallet calls which tend to lock up resources during heavier usage on lbry.tv - we’ll also be improving the performance and adding caching to support this use case. We’re continuing to monitor performance and response times across our servers to better understand current and future load requirements. 

![load](https://spee.ch/9/wallet-server-load.png)

## Blockchain {#blockchain}
The blockchain team successfully carried the final step of the blockchain upgrade on December 11th, 2019 which enabled SegWit support. With good coordination, the team was able to communicate with mining pools, exchanges and node operators to get everyone on the latest release and processing SegWit blocks and transactions. You can check out our [blog post for detailed information about this release](https://lbry.com/news/hf1910). 

We are continuing to explore applications of support metadata to include things like signed supports (i.e. you can tell which channel a tip came from), premium subscriptions, and community metadata. The team is also currently implementing a new datastore which will be re-used by wallet servers to provide claim and other metadata. Currently this is done by reading blocks into the SDK and applying logic there, which is a slow and tedious process. This will allow us to sync up our wallet servers even faster and be less prone to data errors. 

## lbry.tv {#web}

Since our silent launch of lbry.tv, we’re continuing to see increased amounts of traffic and user sign-ups for our LRBY app experience on the web. We’ve continued to optimize both our backend and front end in order to support more users and so that each one has a smooth experience both with video streaming and interacting with the SDK. For streaming, we’ve added caching mechanisms to reduce load on the server and be able to provide the same video stream to multiple users without having to reprocess them each time. We are still currently serving video content from servers in the US, but we plan to distribute this around the world to better serve international users. 

In order to scale the SDK side, we’ve created a process where we round robin users across multiple SDK instances which are responsible for handling wallet related commands and discovery. We can continue to scale and load balance as more users come online by adding additional SDK instances and shifting users around. We also want to improve our handling of non-signed in users, which currently all go to our primary instance, by having them utilize other SDKs also (mainly for claim search / resolving). 

### Support for more file types
We now support additional file types for viewing in the web experience - this includes markdown, text, HTML, and PDF. 

![md](https://spee.ch/c/file-types-1.png)

### Download support
We’ve recently configured the streaming service to also allow for downloads, so we’ll be adding this option to lbry.tv soon (same button you see today on the Desktop app). For external apps that support in-line video and downloads, you can see this already available when sharing lbry.tv URLs as seen below (may vary on video length/size). 

![video](https://spee.ch/9/play-and-download.png)

### Open in LBRY app support from open.lbry.com URLs
If you click on an open.lbry.com URL, you’ll be prompted with an option at the bottom to open it with the LBRY apps instead of the web version. This will launch the Desktop / Android app with that content. If this is dismissed, there’s no way to get it back currently. We’ll be working on improving this experience even more in the future.

![open](https://spee.ch/e/open-in-app.jpg)

### Official lbry.tv launch
It’s kind of weird because it’s been very popular, but lbry.tv has never officially launched. We will be officially announcing its release and letting the whole world know users can now enjoy their favorite LBRY content - all within their existing browser experience. We’re waiting on a few last tweaks to our infrastructure to support the additional load and for the new referral mechanism to be up and running so that creators and user can share with their friends and family.  

## LBRY for Android {#android}

Since our last update, our team has released [0.12.0 - Eclipse](https://lbry.com/news/eclipse) which is our first version to support internationalization and selection for 9 languages, including Spanish, Polish, Portuguese, Turkish, Italian, Gujarati, Hindi, Indonesian, and Malay, with more coming soon. This version should also make the first run process faster because we now include the headers file with the APK itself. We’ve also removed the prompt for passwords for new users until we work out our password change procedures across various apps. Existing users who have passwords will still be prompted on login.

Main features in Eclipse and since our last update include:
- Language selection including automated selection based on device language. 
- Auto-rendering and improved display of images and text.
- Better handling and communication around unsupported content.
- Sorting on channel pages changed to be newest content first.

The latest patch, [0.12.1](https://github.com/lbryio/lbry-android/releases/tag/0.12.1) includes view counts for content and followers, tipping on channels, and improved tip dialog. 

![eclipse](https://spee.ch/@lbrynews:0/android-eclipse.png)

Next steps for Android include continuing to investigate performance issues with the app, adding a purchase confirmation dialog, and continuing to improve the first run process by speeding up startup times and introducing channel creation / tag customization.  

## YouTube Sync {#youtube}
Our YouTube Sync program has been chugging along for new channels, updates, and content transfers. We continue to fix various kinks on our process and explore ways to keep popular channels synced faster so that user can enjoy the content on LBRY around the same time it’s posted to YouTube. Content creators who wish to publish themselves can also opt into doing so by letting us know to turn off the sync process. 

Until recently, YouTube Sync rewards (for active channels with over 1K subs) were paid out Yearly, but now we’ve made the switch to have them go out on a monthly basis. Any users that previously claimed a Sync reward more than a year ago was eligible for a prorated amount based on the time that has passed since their first reward. Users who claimed the yearly reward this year are still eligible for the monthly rewards as long as 1 month has gone by. This will be a recurring reward that’s shown on the rewards page. 

![reward](https://spee.ch/c/rewards-monthly.jpeg)

## More content creator rewards and reward levels

Recently we rolled out new rewards for content creators (for views and followers) and added additional levels to the following and many views rewards. This gives creators another reason to share LBRY with their audience, which is a win-win situation. Email and notifications on Android will be sent when you’ve reached the next threshold for the followers reward. You can read all about these changes in [our blog post](https://lbry.com/news/creator-rewards) or check out our [Rewards FAQ](/faq/rewards).

![followers](https://spee.ch/@lbrynews:0/followers-lbry.png)

## 2019 roadmap {#roadmap}
We’ve successfully accomplished a number of roadmap items fully, while others are partially complete and ongoing efforts. We will be revamping our roadmap for 2020 before the end of January, so stay tuned! 

Partially completed/still in progress are:
* **Commenting** - Tipping with comments in the works, as well as deleting/editing, and hiding. 
* **Creator Features** -  New content view rewards and monthly sync rewards are now live.
* **Creator Partnerships** - No update since last month - in progress and will be announced next year
* **LBRY on the Web** - lbry.tv keeps growing and handling more users.
* **Multi-Device Experience** - Encryption/password change features in progress.
* **Internationalization** - Many new languages on lbry.tv / Desktop, and first version out for mobile.
* **Protocol Performance** - Speed improvements in progress. 

## Limited Reward Code!
We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-dec-yahsd`

## Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Make sure you have turned on the Developer option in your email preferences (see app overview page), or sign up at [lbry.tech](https://lbry.tech). We also have a [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbrycom), [Facebook](https://facebook.com/lbrycom), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https://t.me/lbryofficial). 

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](https://lbry.com/get?auto=1) yet, what are you waiting for?
