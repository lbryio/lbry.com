---
author: tom-zarebczan
title: 'Development Update for June/July 2019'
date: '2019-07-31 09:00:00'
cover: 'geometry-cover.jpg'
category: community-update
---
Welcome to the June/July 2019 LBRY Development update! In this post we’ll show you what we’ve been up to and review our progress since our [last update in March](https://lbry.com/news/feb-19-update).  We apologize for the gap in updates as the team was working extremely hard on getting our latest release out (and we’ve got an awesome app to show for it!). In the future, we’ll be providing shorter, more regular updates, regardless of our app / SDK release schedule. Sit tight, there’s lots to talk about below including updates from the Apps(Desktop + Mobile), SDK and blockchain teams! 

To read previous updates, please visit our [Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what’s planned for LBRY, check out our [Roadmap](https://lbry.io/roadmap).

# In This Update {#dev-updates}
* [Desktop App Quick Recap](#summary-desktop) 
* [SDK Quick Recap](#summary-sdk) 
* [LBRY Desktop - Deep Dives and Next Steps](#app)
* [LBRY Desktop - New Supports Feature](#supports)
* [LBRY Desktop - File Download Options Coming Soon](#streaming)
* [LBRY for Android Updates](#android)
* [LBRY.tv Updates](#web)
* [Open.LBRY.com Redesign](#open)
* [LBRY SDK Download Upgrades and Progress](#sdk)
* [YouTube Sync Transfers](#youtube)
* [Blockchain Upstream Updates and Progress](#blockchain)
* [2019 Roadmap Update](#2019)

### Desktop App Quick Recap {#summary-desktop}
Since our last development update, the app had a few minor updates leading up to the recent [0.34 Erikson release](https://github.com/lbryio/lbry-desktop/releases/tag/v0.34.0) which showcased a brand new layout, customizable homepage, new Account Overview section, channel editing, comments, video lengths, and much more! After Darwin, we shifted focus to consolidate the desktop and web versions of LBRY into a single codebase -- a huge effort! We’ve launched the web preview at [beta.lbry.tv](https://beta.lbry.tv) which you can explore today. The app team also made modifications to support the evolving LBRY SDK which had significant and breaking API changes. This paved the way for the current release which includes tagging and discovery changes.

Erikson is a ***huge step*** in the direction that LBRY ultimately wants to go - giving the community control to determine what content is discoverable and how to find it through our newly customizable home page and tagging system. LBRY no longer curates homepage content and instead it is user controlled based on selecting tags and channels of interest. The content is segmented into three main areas -- Trending/Top/New. You can read all about how these sections work in our new [Trending FAQ](https://lbry.com/faq/trending). Our goal is for quality content to easily discoverable, when ranked by LBC tips and supports ([new experimental setting in this release](#supports)), by anyone on the network (fans, curators, etc). 

![Erikson](https://spee.ch/8/erikson.gif)

### SDK Quick Recap {#summary-sdk}
On the SDK side of the house, the major release was [version 0.38.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.38.0) and subsequent patches up to version 0.38.5 which are in the current app release. Since our last update, four versions have passed with each iteration building additional features to enable the Desktop app’s customizable views released recently. In order to calculate trending data and do complex searches using tags ( and also "not_tags" and "not_channels" to facilitate filtering), the entire backend wallet server had to be re-written from scratch to implement how the blockchain layer works, but added to an easy to consume database, along with the logic for performing the [trending calculations](https://lbry.com/faq/trending) mentioned earlier. 

Reading and storing the data was the first large undertaking, but one that proved to be even a bigger challenge was making all the queries performant. With each click of the app, the SDK searches through over a million pieces of content, across various data points, in LIGHTNING fast times of under 100-200 milliseconds. You can read more about the challenges and details in the [SDK updates](#sdk) section below. 

### LBRY Desktop - Deep Dive and Next Steps {#app}
The release of [App E - Erikson](https://github.com/lbryio/lbry-desktop/releases/tag/v0.34.0) is one of the biggest and boldest releases of LBRY yet - it comes packed with new features including a tag-based, customizable homepage, publisher ability to tag content, channel editing (simplistic first pass), first non-English language options (special thanks to the Polish and Indonesian translators - Madiator2019 and Chris45!!), comments alpha (not decentralized -- stored on LBRY servers), option for support own/others’ content, short URLs (instead of the long string of characters/numbers after the #), a one click zipping tool for wallet backups, content sharing integration with [beta.lbry.tv](https://beta.lbry.tv), and a groovy loading animation. The release also includes a UI overhaul including a new sidebar, Overview page, Account/Settings menu, and light/dark quick switch. See, we told you the wait since the last update was worth it! Instead of content being curated by LBRY, the homepage is now driven by tags, channels followed, and the [Top/Trending ranking algorithms](https://lbry.com/faq/trending) using the LBRY protocol. This makes content discovery an even playing field for all as the rules are out in the open, as opposed to YouTube’s hidden algorithms. Having the ability to see new content published on LBRY via the “New” option on the homepage is also a huge step forward as it showcases the new content being uploaded every minute. 

![customize](https://spee.ch/9/customize-034.jpeg)

#### Publishing and URLs

Publishers who previously uploaded on LBRY will need to edit their content to take advantage of the new features including tags and video lengths (content has to be re-uploaded if it was published before ~April 2019). Both edits and new publishes can be customized with tags, metadata such as file size, content length, and dimensions will be pulled in and stored with your claim data automatically. You’ll also notice that content is now correctly sorted on channel pages in the app. This is due to the addition of a release time field in the SDK which allows us to sort the content based on when it was actually published, instead of when it was last updated on LBRY. 

You’ll also notice shorter URLs throughout the app. These replace the long URLs you’re used to and are first come first serve at [LBRY claim names](https://lbry.com/faq/naming) (i.e. if you try to publish lbry://one or other popular vanity claim names, you may be left with a URL like lbry://one#123 instead of lbry://one#1). We’ve also added the ability to use more characters in your LBRY URLs - you can pretty much use anything you want besides spaces and `=&#:$@%?;/\\"<>%{}|^~[\`. This includes emoji support! (Check out `lbry://♒`)

![publish](https://spee.ch/a/publish-034.jpeg)

#### Subscriptions, Tags and Channels

The subscriptions area is now easier to access from either the `Channels you Follow` drop down on the homepage, or by each specific channel in the right hand side bar. Each tag you follow is also listed above the channels and has their own Trending/Top/New pages as well. You can also navigate to these tags (even ones you don’t follow), by clicking them throughout the app (i.e. on the homepage next to other tags, or on a related video you are exploring). Once you access a tag you don’t have in your list, you have the option to follow it, adding it to your sidebar. 

These tags can be managed from the Customize option in the sidebar or homepage Customize button. Here, you can also search for new tags and see the list of channels you follow. 

Recommended channels are now shown by clicking the `Find New Channels` button to the right of `Channels you Follow`. You’ll also notice that content is greyed out to show it’s already been viewed. We’re hoping to bring back unread counts for Subscriptions (and maybe tags too?) in a future release. 

![subs](https://spee.ch/c/subscriptions-034.jpeg)

#### Community Voting and Channel Editing

To allow users to participate easier in the trending/ranking process, we added a new experimental setting for supports([read more below](#supports)). This allows users to help promote their favorite content by depositing LBC, which can be withdrawn at anytime.  

Understanding that creators want to manage their channel profiles, we included the first version of the channel edit page. This is accessed by clicking your channel from the Publishes page. We’ll be adding a `My Channels` section soon along with a way to create your profile when creating a channel (removing this from the Publish flow). The profiles go along nicely with the new channel hover feature that displays the thumbnail, tags, and number of publishes. 

![edit](https://spee.ch/0/edit-034.jpeg)

#### Commenting Alpha on LBRY

Rounding off the feature set, we added the first releases of Commenting and Language options -- all thanks to community contributions! The Commenting Alpha earns its name as it comes with a basic feature set -- creating anonymous/channel based comments, and viewing them. There are no delete or moderation features yet (if you have ideas, leave them [here](https://github.com/lbryio/lbry-desktop/issues/2598)). Since these comments are not decentralized but are stored on LBRY servers, please alert us to any that need attention through the report button on the claim. 

We’ll be using the alpha to work through the UI design on the app, and nail down the API required on the SDK. Our longer term goal with comments is to put them on the blockchain, but we’re still waiting for support metadata features to be enabled at that layer - this will allow things like channel signing of supports/tips, and information like which tags are accurate/not, suggested edits, building a web of trust, and more!

![comments](https://spee.ch/3/comments-034.jpeg)

#### Next Steps and Coming Soon

The next steps on the Desktop app will be to allow further customization of the homepage by enabling the blocking of channels and tags so that users can be in full control of what they don’t want to see as well. We’ll be adding a `My Channels` page so users can access their channels more readily and a way to create those channels directly from a better version of today’s edit page page (and separating this flow from the Publish page where channel creation exists today). 

We are also in the middle of upgrading the video player to support [streaming](#streaming) (not live streaming!) which will give users the ability to turn off saving files (and hosted content too, but that will make LBRY sad!). The next bigger feature on the radar is cross device syncing so that users can have the same account between their devices, including [Android](#android) which currently supports it. 


### LBRY Desktop - New Supports Feature {#supports}

A new experimental feature, which can be enabled on the Settings page of the app,
 was added to allow supporting content. Some of you may be aware of supports already because you’ve tried them via the SDK, so this will make your life easier to be able to do them in app. For those that are new - supports are very similar to [tipping](https://lbry.com/faq/tipping) on LBRY, but the LBC deposit stays in your own wallet and can be removed at any time (see the Wallet page / trash can icon to remove / add LBC back to your balance). Publishers will also see the Support option by default on their own content (previously the tip button was hidden). While the support is active, it is no longer part of your balance and instead the LBC is used to help other users discover the content you supported and/or secure its [vanity name](https://lbry.com/faq/naming). The discovery comes through the new homepage and affecting the way the claim is ranked in the Trending and Top calculations - the more LBC that’s tipped and supported, the higher the content can rank up.  

The new feature now allows anyone in the community to support their favorite content, without having to give up any LBC (as you would normally with tips). Supports do help the creators as well by possibly having more users take a peek, but please consider sending them a tip if you are really enjoying their content! Once more users become accustomed to this feature, we’ll enable it without the experimental setting.  

![supports](https://spee.ch/d/supports-034.jpeg)

### LBRY Desktop - File Download Options Coming Soon {#streaming}

A common concern we have from users is that not everyone wants to store all the content they view on their PCs and we’ve listened. The SDK now provides a way to stream content from our decentralized network without having to save any data to the user’s computer. Our [Android](#android) app is already taking advantage of this technology and was a test bed before we implemented it on the desktop app (currently a work in progress and we expect to ship within a couple weeks). This would work the typical video formats you see it the LBRY app (H264 MP4s), as well as audio files, and images. There are some plugins we’ll be experimenting with to see if we can support additional video types (download may be required). There will be two on/off settings available - Saving Files and Saving Blobs (hosted data). 

By turning off Saving Files, video/audio content will not save the output file anymore when content is watched. If you disable Saving Blobs, the hosted chunks of data (required to help the network seed content) will also not be saved. We will continue to strongly encourage the saving of Blobs (disabling it will make LBRY sad, but we understand that users should have a choice). These settings will only work going forward - so if you downloaded something and then turned it off, that will only take effect for new downloads. We’ll also give users a setting for max number of connections so that higher bandwidth users can take advantage of using more peers on the network to stream/download content faster. 

![streaming settings](https://spee.ch/a/streaming-next.jpeg)

### LBRY for Android Updates {#android}

Since our last update, the Android app has evolved from its alpha state and into a fully released Beta on the [Google Play Store](https://lbry.com/get#android)!!. The main new features include viewing content without saving files, horizontal scrolling on the homepage, channel profiles, wallet syncing/encryption, and redesigned first run experience. The first run experience revamp was also important as it introduced the cross device feature for new users, and also allow account-less access if needed (there’s an option to skip on the first screen). Being able to view content without saving it is super important, especially on mobile platforms, which is why we decided to implement our Range Request streaming solution here first (and let the Android devs work out the kinks!). 

The latest release defaults to streaming mode, and does not have options for saving content locally yet nor can content be removed from the Library section after its streamed - both features to come in a future release. We also ditched the vertical browsing on the home page as horizontal scrolling  is more intuitive and you can see more categories without having to scroll down 10 items. 

The Android beta also featured the first implementation of our Cross Device Sync which allows users to backup their encrypted wallets on LBRY’s servers. When a user goes through the setup process, they are asked for a password to secure their account . A blank password can be used and will still be encrypted locally/on our servers, but this is not recommended if storing larger amounts of LBC. Existing users can also take advantage of this feature by turning it on from the Wallet page. Currently there is no recovery method if a password is lost but we plan to support one in the future. Once this is enabled on lbry.tv and the desktop, the users’ accounts will merge and they’ll have a seamless experience between devices.

![sync](https://spee.ch/7/Wallet-sync.jpeg)

Next up for the Android app is to bring the discovery/tagging/trending tools we see in the Desktop app / lbry.tv. They will work in a very similar fashion where the Top/New/Trending options will be available, along with a customizable list of tags. The tags will be shown in a similar fashion to the horizontal scroll mechanism on the current curated homepage. After this, the goal is to profile the performance of the app since we’re fully aware of the UI lockups and other slowness while using various parts of the app. This will help smooth out the Android app experience to go along with the new lightning fast discovery solution. 

![android](https://spee.ch/f/Android-disc.jpeg) 

### LBRY.tv Updates {#web}
Over the last few months, we’ve been running a view only pilot of [beta.lbry.tv](https://beta.lbry.tv) which means you can view free content, but none of the publishing or account (LBC) related features are enabled. This allows us to test the scalability of LBRY on the Web, while working in the background to develop the rest of the feature set. Users are also able to sign up with their email to save their subscriptions and be signed up for the mailing list. 

Currently, the app is up to speed with the Desktop app which includes the customizable homepage, discovery, and tagging features. You will find links to lbry.tv from the share button in the app, or you can simply share them from your browser (such as https://beta.lbry.tv/@bitcoinandfriends/a). We are also finishing up a feature that will show thumbnail preview when links to channels/content are shared - this should be available in the next few days. 

Internally we are finishing up / testing the accounts and rewards related features, and hope to have a full release in the next couple of months. The wallet will be a custodial solution where LBRY helps users manage their keys. Initially these wallets will be separate from any local Desktop/Android app ones, but the plan is to enable a way for users to sync all their wallets across devices, including lbry.tv. 

Want to be the first to know when it’s fully operational? Sign up for the mailing list at [lbry.tv](https://lbry.tv).  

![web-screenshot](https://spee.ch/1/web-tv.jpeg)

### Open.LBRY.com Redesign {#open}

Our hyperlinking / sharing website, [open.lbry.com](https://open.lbry.com) received a design overhaul and new settings for opening in app vs on [beta.lbry.tv](https://beta.lbry.tv). There is a countdown timer, along with the two options, and a link to download the LBRY app if the user has not done so already. Users can also choose to remember their setting so it’s instantly performed the next time they use the open site. Open.lbry.com links are the best way to share LBRY URLs currently. As next steps, we are exploring adding these options directly into beta.lbry.tv and enabling thumbnails for content previews. 

![open](https://spee.ch/8/open-lbry.jpeg)

### SDK Download Upgrades and Progress {#sdk}
The main focus of SDK development over the last few months has been all the discovery features we’ve outlined so far in this update. None of this would be possible without a huge undertaking to create and improve our wallet server functionality, trending calculations, and APIs to support searching and customizing tag data. The wallet server is the main database the LBRY SDK connects to in order to resolve claims, publish, validate data, and create transactions. This large undertaking required us to basically re-write this entire component so that data from the LBRY blockchain could be saved, validated, and retrieved extremely fast. 

For the release, we deployed about 9 wallet servers around the world to provide a good quality connection and experience for app users. We’ll be making the documentation easier for anyone to run their own wallet servers so that the community can start contributing more to the decentralization of the network and potentially getting fees for relaying transactions. 

Prior to this update, every time the app would request a URL to be resolved or a channel to viewed, the wallet server would simply pass the call onto LBRYcrd (full blockchain node) for processing/retrieval. This was no longer possible if we wanted to save trending data, along with all the tag, and other metadata that could be accessed by simple SQL query. To accomplish this, the team first had to process all the blockchain data into a database, saving all new claims, updates, and channels, along with other pieces of information like how tips/supports are being added/removed over time, compared to all other claims, in order to produce Z-score trending calculations. This processing would take place from block 0 on a clean start, and then continue processing each and every block that was written to the LBRY network.  

![search](https://spee.ch/2/claim-search.jpeg)

We decided to go with a popular Z-score algorithm which calculates changes about once a day, over a 7 day period, to get a sense of how content on LBRY is performing against each other in order to paint a picture of what’s considered to be trending.  What proved to be one of the most difficult parts of this overhaul was making the queries (at least the common ones that the app would use) performant on a large and growing claim database. This involved breaking down slow queries to understand where the most time was being spent, creating special indexes to help with fast lookups, and writing the monitoring/testing tools to help the team experiment and gather feedback. 

We were able to get all of the queries, including ANY number of tags, while excluding mature tags, and sorting/filtering on various slices of data like release time, effective amount, and trending calculations, down to under 200ms, with many being under 100ms, and simple resolve calls under 30ms (all round trip on a good connection). There is still some work to be done to optimize other queries that the app and other projects may want to use, i.e. showing free content only, or certain types of content. Give the claim search a shot via the [CLI tools!](https://lbry.com/faq/how-to-cli)

![](https://spee.ch/5/graph.jpg)

Next steps for the SDK will include making the new wallet servers more robust/easy for anyone in the community to run, supporting wallet sync where multiple accounts are treated as one (i.e. mobile + desktop + lbrytv), providing additional balances for tips received/active supports/LBC in claims, and reposting of content to any channel (i.e similar to re-tweets - curated channels with other creator’s content, where the monetization goes to the original publisher).  

### YouTube Sync Transfers {#youtube}
The last gap in our YouTube sync process is the ability to send channels, claims, and certificate data to creators who are using the app with their own wallets. We know this has been confusing for many YouTubers because their content is synced but they don’t have access to it in the app. Without the solution in place, we’ve been handling this manually for creators who want to get control be sending them the synced wallet files, and we’ve setup a new request process for this [on our website](https://lbry.com/claim-wallet). 

This process is tedious for both ourselves and creators, so we’re currently developing the automated solution that will allow YouTubers to click a single button in the apps in order to import their channel (can be used to publish new content right away) and then start the updating process to move the claim and channel claim to their local wallet address. During this time, we’ll also grab their address so we know where to publish newly posted content to. This process will also support the case where a creator has multiple synced channels. Any tips accumulated will be added back as supports on the creator’s channel claim to help boost their rankings in discovery. We’ll be sending an email to all creators once this process is up and running - thank you to everyone for their patience while we worked through this last critical feature. 

### Blockchain Upstream Updates and Progress {#blockchain}
Since our last update, the LBRY blockchain went through [an upgrade](https://lbry.io/news/hf1903) on March 24 which enabled more characters to be used in claim naming, and making sure they are normalized when competing for vanity URLs. Since then, the team has been focused on bringing our code base up to speed with Bitcoin 0.17 and also including enhancements to optimize memory usage of the claimtrie. You can see the latest release notes about all the changes for [upstream merge](https://github.com/lbryio/lbrycrd/releases/tag/v0.17.1.0) and [memory improvements](https://github.com/lbryio/lbrycrd/releases/tag/v0.17.2.0) on GitHub. Typical memory usage while running LBRYcrd went from about 4.5GB to roughly 2/2.5 GB depending on API usage. 

The upstream changes also mean LBRY can enable Segregated Witness (SegWit) on the network which is part of Bitcoin Core’s vision in scaling the blockchain which we currently share. This allows running 2nd layer networks like Lightning in order to enable super fast transactions, including purchases of content and hopefully be the backbone of our vision for data markets (hosts have to be online for both data transfers and Lighting, so it seems to be a match made in heaven). We plan to enable this later this year and experiment with trustless purchasing of LBRY content / blobs. 

Another long awaited feature of the upstream merge is HD wallets, which allow you to backup a single master key to regenerate addresses from as opposed to saving the entire wallet.dat file (this is possible if you start a fresh lbrycrd or backup/remove your current wallet.dat). *Please note:* Master private keys are currently not cross compatible between the SDK and LBRYcrd wallet (this will result in 2 different sets of addresses).

The next steps in this area include the fork to upgrade with SegWit and add the ability to add metadata with support transactions (will allow signing by channels, rating, comments, edit suggestions).

### 2019 Roadmap Update {#2019}
We’ve successfully accomplished a number of roadmap items fully, while others are partially complete and ongoing efforts. Fully completed (but the improvements never really stop, right?) are: 
* **Technical Community** - completed with the launch of [lbry.tech](https://lbry.com) 
* **Android 1.0** - the [Android](#android) app made it out of the unreleased state on the app store (missing full parity with desktop app, but some features are ahead!)
* **Community Swarms** - are [fully operational around the globe](https://lbry.com/news/comm-update) 
* **Discovery** - was enabled through the latest SDK and Desktop releases, coming to Android soon

Partially completed/still in progress are:
* **Commenting** - we released a centralized alpha only,  Creator Features where we added channel metadata/edit features, but still lacking on reporting/verifying
* **Creator Partnerships** - in progress and will be announced later this year
* **LBRY on the Web** - is up at [beta.lbry.tv](https://beta.lbry.tv) but is missing account features
* **Multi-Device Experience** - the wallet syncing process was enabled on Android, but currently in progress on Desktop
* **Internationalization** - enabled in the last Desktop release but needs to be expanded to more languages/apps
* **Protocol Performance** - we’ve met some of the targets like resolution time and failure rate but still lacking on startup and downloading times

# Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Make sure you have turned on the Developer option in your email preferences (see app overview page), or sign up at [lbry.tech](https://lbry.tech). We also have a [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbrycom), [Facebook](https://facebook.com/lbrycom), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https://t.me/lbryofficial). 

[Back to **top**](#dev-updates)

We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-update-jun-ztaxc`

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
