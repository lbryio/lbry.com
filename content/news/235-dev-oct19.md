---
author: tom-zarebczan
title: 'Development Update for October 2019'
date: '2019-11-11 12:00:00'
cover: 'oct-blog.jpg'
category: community-update
---
Welcome to the October 2019 LBRY Development update! In this post we’ll show you what we’ve been up to since our [last update in September](https://lbry.com/news/sept-dev-2019). Sit tight, there’s been lots of progress and releases, including updates from the App (Desktop and Mobile), SDK, and blockchain teams! 

To read previous updates, please visit our [Development and Community Update archive](https://lbry.com/news/category/community-update).

If you want to see a condensed view of what we've completed recently and what’s planned for LBRY, check out our [Roadmap](https://lbry.com/roadmap).

Let’s start with some GitHub stats across all our repos (some of which are internal only to LBRY) since our last update about 31 days ago. 35 repos were updated. 581 issues were created and 167 were closed. 43 pull requests were merged. 55 GitHub users outside of LBRY Inc made code contributions, which is a big increase for the month, thanks to the [Hacktoberfest initiative](#hacktoberfest): 
[0x15F9](https://github.com/0x15F9), [Axle7XStriker](https://github.com/Axle7XStriker), [Bharat123rox](https://github.com/Bharat123rox), [Coolguy3289](https://github.com/Coolguy3289), [EricBrianAnil](https://github.com/EricBrianAnil), [Janith96](https://github.com/Janith96), [LividJava](https://github.com/LividJava), [ProfessorDey](https://github.com/ProfessorDey), [S-ayanide](https://github.com/S-ayanide), [Sesamestrong](https://github.com/Sesamestrong), [StrikerRUS](https://github.com/StrikerRUS), [Sweta271097](https://github.com/Sweta271097), [addy1510](https://github.com/addy1510), [adityakaria](https://github.com/adityakaria), [akshitsarin](https://github.com/akshitsarin), [bear454](https://github.com/bear454), [brentmclark](https://github.com/brentmclark), [btzr-io](https://github.com/btzr-io), [cbaumler](https://github.com/cbaumler), [ceoger](https://github.com/ceoger), [colinfruit](https://github.com/colinfruit), [consolelogreece](https://github.com/consolelogreece), [crweiner](https://github.com/crweiner), [dangarthwaite](https://github.com/dangarthwaite), [danger89](https://github.com/danger89), [f1x3d](https://github.com/f1x3d), [felhe](https://github.com/felhe), [gahag](https://github.com/gahag), [gy741](https://github.com/gy741), [hackily](https://github.com/hackily), [helios1101](https://github.com/helios1101), [hugovk](https://github.com/hugovk), [j-collier](https://github.com/j-collier), [jamesgeorge007](https://github.com/jamesgeorge007), [jhoho](https://github.com/jhoho), [jkonecny12](https://github.com/jkonecny12), [ju-sh](https://github.com/ju-sh), [kcseb](https://github.com/kcseb), [kodxana](https://github.com/kodxana), [kovalur](https://github.com/kovalur), [michizhou](https://github.com/michizhou), [mirgee](https://github.com/mirgee), [mohatagarvit](https://github.com/mohatagarvit), [naumanahmad9](https://github.com/naumanahmad9), [osilkin98](https://github.com/osilkin98), [prateekpardeshi](https://github.com/prateekpardeshi), [raxraj](https://github.com/raxraj), [sagarvd01](https://github.com/sagarvd01), [sakshamtaneja21](https://github.com/sakshamtaneja21), [sameshl](https://github.com/sameshl), [sidhyatikku](https://github.com/sidhyatikku), [sumitkharche](https://github.com/sumitkharche), [vulongm](https://github.com/vulongm), [ykris45](https://github.com/ykris45), [zxawry](https://github.com/zxawry)

Thanks to everyone who took time from their busy days to help LBRY out!
 
## In this report
* [Hacktoberfest wrap-up!](#hacktoberfest)
* [Desktop app](#summary-desktop) 
* [SDK](#summary-sdk) 
* [Blockchain](#blockchain)
* [LBRY.tv](#web)
* [LBRY for Android](#android)
* [open.lbry.com transition](#open)
* [YouTube Sync](#youtube)
* [Rewards](#rewards)
* [2019 roadmap progress](#roadmap)

## Hacktoberfest wrap-up! {#hacktoberfest}
October is now behind us which means Hacktoberfest at LBRY has concluded! We had a ton of activity across our repos, which of course, included a few PRs for spelling fixes and readmes too. Overall we were happy with the turnout and will continue to do more live sessions to engage the developer community. Sign up at [lbry.tech](https://lbry.tech) to be notified of the next one. Check out our [blog post](https://lbry.com/news/2019-hacktober) for all the details including a preview of the t-shirts being sent out! 

![Hacktoberfest](https://spee.ch/@lbrynews:0/hacktoberfest-lbry.png)

## Desktop app {#summary-desktop}
Since our last development update, the app team shipped our latest named release, [0.37.0](https://github.com/lbryio/lbry-desktop/releases/tag/v0.37.0), under codename [Heisenberg](https://lbry.com/news/unification). 

Heisenberg is a huge release in terms of allowing a unified app experience across multiple devices, including allowing existing users to enable wallet and preference syncing features. Before this release, subscriptions were synced using our API services, but now they are stored locally in a user’s wallet file along with tags and blocked channels. This wallet file is now what is backed up and synchronized to all your other devices - which means you get a consistent experience on desktop, Android. and lbry.tv. For now, we’ve disabled the ability to apply/change user encryption until we have the change process supported/implemented on Android/lbry.tv. Stay tuned for this feature in a future release. 

Other new features in Heisenberg and since our last update include:
- Commenting on channel pages under the Discussions section.
- Keyboard shortcuts on video pages - `→` to seek forward, `←` to seek backward, `f` go fullscreen, `m` to toggle mute.
- Add multiple tags using commas.
- Markdown support for displaying comments which includes formatting, LBRY urls and images/gifs. 
- LBRY SDK that supports cross device syncing, even for existing users with multiple devices/wallets. 

*Please note: We’ve temporarily disabled subscription auto downloads for maintenance purposes.*

We also released a patch (0.37.1) for Heisenberg which mainly fixed an issue for MacOSX users on the Catalina release that required an additional signing of the installation files. 

![heisenberg](https://spee.ch/@lbry:3f/heisenberg-037.gif)

### Searching on the My Library page
For our next release, we’ll have the ability to search downloaded items on your My Library page. Still on the todo list is to add something similar to a user’s My Publishes page to more readily find specific published content. 

![search](https://spee.ch/c/search-downloads.png)

### Supporting the latest SDK and optimizing calls
The latest SDK release had API changes to enable pagination on all APIs. So we also made those changes on the app side and simultaneously took some time to optimize the calls - especially those made on lbry.tv. One example is dealing with the transaction list. We used to call all the transactions on startup, but on Desktop we now only call page one (with the latest 20  transactions) and on lbry.tv, we’ll only do this once the user goes to their wallet.

If the Full History page is accessed, that’s when the rest of the transaction history is called. In the future, we’ll continue to optimize this so the history is called for each specific page. Taking actions such as claiming tips and abandoning supports/publishes will also be faster since we will no longer refresh the claim list or supports as that is already taken care of in redux state. 

### More languages
In the next release, we’ll also include support for Turkish, Slovenian, French and Chinese. These are already available on [lbry.tv](https://beta.lbry.tv) for signed in accounts on the Settings page. 

![lang](https://spee.ch/5/lang.png)

### Desktop next steps
Since the last release, the team has been working to polish up the sign in process, publishing, and syncing on lbry.tv. This includes the ability to sync encrypted accounts from previous Desktop installations or Android - users will be prompted for their password which may have been set either on their Android device or encrypted Desktop wallet. By default, the passwords will be cached for 2 weeks and users will be re-prompted. 

With the next SDK update, we’ll also have the ability to track content purchases at the transaction level. This means you can purchase content on one device and play it back on another. This will also give new insight into content purchasing on both the receiver and purchaser - the transaction history will now show what claim was associated with it. We also plan to create a separate section in the My Library section to filter on paid vs unpaid content. 

We are also adding an autostart option to the LBRY app so users can benefit from it launching automatically on startup. This will allow faster access of content when coming across a URL and help support the LBRY network by hosting data in the background. 

There are numerous bug fixes and other cleanups slated for the next release including:
- Preventing duplicate tags from being followed
- Fixing dark mode hour selection
- Adding close buttons to wallet send/receive page
- Fixing the clipboard function on lbry.tv
- Scrolling fixes with large sidebars
- Fix bug with channel page not showing any videos randomly

### SDK {#summary-sdk}
On the SDK side of the house, we’ve shipped versions [0.43](https://github.com/lbryio/lbry-sdk/releases/tag/v0.43.0), [0.44.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.44.0), and [0.45.0](https://github.com/lbryio/lbry-sdk/releases/tag/v0.45.0) which have brought numerous new features and bug fixes to support cross device syncing scenarios that are currently used by the apps and lbry.tv. 

The main features and bug fixes include:
- Finalized wallet ID support - allows multiple wallets to be loaded with an SDK on startup. LBRY.tv currently uses this to support multiple users on a single SDK instance. 
- UPnP will now fail faster when unavailable, which should result in a faster startup time for affected users. 
- Fixed bug affecting users who sent funds to the LBRY app from a multisig address (mainly swarm community members).
- Wallet balance caching to support faster responses for the lbry.tv use case.
- All API calls now return paginated results, including file list which previously lacked support. This will allow the apps to be more efficient when requesting data. 
- We confirmed the IPV6 download fix we shipped with the Android application now allows affected mobile providers to stream content successfully.
- The memory leak fixes we implemented have been effective so far - we have not noticed any issues in recent versions.
- Fixed issue where claims with updated channels would not be resolvable (also included a fix to a name collision scenario).


### Purchase transactions and history
Prior to version 0.45, content purchases were regular transactions that were not linked directly to a claim so there was missing information for both the seller and purchaser. The transaction in the wallet history would appear without claim information so you couldn’t tell which content the purchase was for. 

This also would prevent the purchaser from viewing the paid content on another device. We implemented a basic purchase history mechanism which links a content payment transaction to a claim ID using a special output called [OP_RETURN](https://en.bitcoin.it/wiki/OP_RETURN) that allows us to store 80 bytes of data (claim id in our case). 

A new API, purchase list, was added to return all purchased content and purchase information was also added to transaction / file list so we can properly show the history. When a paid file is requested, the purchase list is checked to see if a user can access it without paying again. There is backwards compatibility for old purchases if a user’s file data already has the content also but this will not work across other devices. 

![purchase](https://spee.ch/b/purchase-list.png)

### Wallet server installation streamlined
In an effort to further decentralize wallet servers run by LBRY and give users more choice in server selection/access in their region, we’ve been simplifying the entire wallet server setup and deployment process. Running a wallet server also requires a full node to be accessible to populate claim/trending data and provide wallet address transaction history. 

Currently the process is fully dockerized for both the LBRYcrd (full node) and wallet server, so getting one up and running has never been easier. It also uses snapshots of both databases so they don’t need to be synced from scratch which would normally take a few hours.  Give it a try today by following the [detailed setup instructions](https://gist.github.com/lyoshenka/2557c08344bfe1020f0c0a13b9c5b0ce).

### SDK next steps
The SDK team has been focusing on tasks related to supporting the lbry.tv use case which included troubleshooting wallet syncing issues and performance concerns with concurrent usage. Other items in the pipeline include:

- Improving performance of blocking wallet calls so that the SDK can effectively multi-process them which will improve performance on large wallets and heavy SDK usage on lbry.tv
- Continue implementation of error handling in the SDK through the use of error codes. 
- Adding basic BitTorrent support so that a user can download a torrent through the SDK. The next step would also include giving users the option of publishing their content simultaneously to BItTorrent along with the LBRY network. 
- Improving blockchain headers download directly from wallet servers instead of a snapshot stored by LBRY.
- Support content blocking and filtering through wallet servers and reposting of content. 
- Improving the DHT to persist peer data between restarts which will help bootstrap the network without seed nodes.

## Blockchain {#blockchain}
The blockchain team successfully carried out an upgrade to the chain.

With good coordination, the team was able to communicate with mining pools, exchanges and node operators to get everyone on the latest release. On October the 30th, at 1:22PM UTC and again at 1:53PM UTC the chain successfully underwent two upgrades, described below.

The latest release includes one last fork targeting December 11th, 2019 to support SegWit transactions.

The [blockchain software upgrade](https://github.com/lbryio/lbrycrd/releases/tag/v0.17.3.1) included the following features:
- Hashing all claims, including non-winning ones, in the block headers ✓ (Oct 30th)
- Metadata for support type transactions ✓ (Oct 30th)
- SegWit support. This will allow Lightning Network for content and data payments down the road ⌛ (Dec 11th)

We will be exploring the applications of support metadata to include things like signed supports (i.e. you can tell which channel a tip came from), premium subscriptions, and community metadata. The team is also exploring additional methods of storing claim data in a single table which can then be reused by wallet servers instead of having them process and re-index it locally. 

You can check out our [blog post for detailed information about this release](https://lbry.com/news/hf1910).

## lbry.tv {#web}

Since our last report, we’ve progressed further towards our goal of fully launching lbry.tv without the beta subdomain. We implemented the account syncing process to work with lbry.tv for both new and returning users (including the ability to sync encrypted wallets too). If a user has a password protected account from Android or Desktop, they will be prompted to input the password when logging in with the option of saving it in their browser session (limited to a 2 week period). We had a wallet syncing issue that we finally resolved with the new wallet id support when the account was loaded. 

We’ve also improved many of the touch points while not signed into an account - this means things like commenting, subscribing, and tipping will drive users to sign up for an account. Publish support is now fully implemented and available for files up to 500MB.

Other features and bug fixes include:
- Claiming YouTube channels and rewards on the web
- Clipboard support for copying URL / using copy buttons
- Fixed updating claims without file uploads
- Address signout bugs
- More efficient API calls to the SDK
- Embed videos on other websites

Eager to give lbry.tv a try now? Head over to [https://beta.lbry.tv](https://beta.lbry.tv) and sign up for an account. 

### Stress testing with real users

Over the last couple of weeks we ran two stress tests on lbry.tv by asking the community to access their accounts simultaneously which has provided critical feedback as to the bottlenecks of the current implementation. In the first test, we managed to bog down the LBRY SDK behind lbry.tv due to long running wallet balance calls (with the --reserved_subtotals parameter which is more intensive due to querying claim data). Since this API call is one of the most active ones that runs every 5 seconds to keep a user’s balance up to date, it heavily taxed the SDK and it was not able to keep up. Ultimately the solution would be web sockets that allows for a push mechanism, but in the meantime we added caching that made subsequent calls super fast. 

With the caching patch in place, we coordinated a 2nd stress test by reaching out to our Discord/Telegram/Reddit communities and emailing a list of about 4000 lbry.tv registered accounts. This round went much better in terms of SDK performance but users outside of the US ran into trouble streaming content. This is a known limitation because the server is currently based in the US. We will attempt to cache some of this data to help serve multiple users the same file, but in order to better support users around the world, LBRY will need to run multiple UI and SDK instances around the globe. Overall this test was successful and will let us move lbry.tv out of the early beta phase. We still plan to improve concurrent operations on the SDK, but it’s not prohibiting us from trying to reach a wider audience. 

### Embedding videos on other sites

We recently added an embed option in the Share prompt. This includes the iframe syntax and link to embed the video on another website. It should work for all supported formats on lbry.tv including videos, images, and GIFs. 

![embed](https://spee.ch/4/embed-lbrytv.png)

### LBRY.tv launch and next steps

Based on the stress testing results above, we are gearing up to finally remove the beta tag from lbry.tv. We will continue to monitor performance and start funneling more users into the LBRY web experience. The first phase of this occurred recently where we emailed all our YouTube sync users who haven’t yet claimed their channel by prompting them to do so on lbry.tv. 

We’re also going to experiment with support for additional file types like markdown, HTML, and PDFs. 

Want to be the first to know when it’s fully operational? Sign up for the mailing list at [lbry.tv](https://lbry.tv).

## LBRY for Android {#android}

Since our last update, our team has released [0.10.0 - Cartwheel](https://github.com/lbryio/lbry-android/releases/tag/0.10.0) and [0.11.0 - Doppler](https://lbry.com/news/doppler) which further improved the app experience between devices and increased engagement through a new push notification system.

Main features in Cartwheel and Doppler include:
- Syncing of wallets, subscriptions, and tags between devices and lbry.tv.
- Push notifications for rewards, subscriptions, and interests. Notifications can be managed in Settings.
- Share button on content and channel pages.
- Exploring tags from search and ability to follow from tag page. 
- Option for URL suggestions in Settings.
- Bug fixes related to tags not synchronizing on first run and subscription suggestions not being loaded.

![notifications](https://spee.ch/@lbry:3f/Android-0-11-Doppler.jpeg)

### Android Next Steps

With notification support, we sent out first welcome blast to all Android users to redeem the `helloandroid` reward code. We’ve also added push notifications to remind users to rewards verify their account and to remind them when their daily watch reward is available again. Once we have the ability to hyperlink directly to the subscriptions page, we’ll enable to notification to users to encourage following their first channel. Finally, we’ll also have push notifications similar to the new content emails we currently send when fresh content is published by a followed channel. 

We are also aware of performance issues affecting older devices and will continue to profile our UI to see where improvements can be made. Next steps also include adding internationalization support and the referral/invites feature available on Desktop/lbry.tv. 

## open.lbry.com transition {#open}
With the upcoming launch of lbry.tv, we’ve decided to sunset open.lbry.com and replace it with a lbry.tv URL that will go directly to the content page on the web. There will also be an option to open the content in the app, similar to what’s possible today on open.lbry.com. This also means we’ll have URL preview support directly on lbry.tv links and won’t have to reimplement the same on open.lbry.com. 	

## YouTube Sync {#youtube}
Since our last update, we added parallel processing to the transfer mechanism so that channel claiming can be finalized quicker and not lock up the servers for long periods of time. From time to time, we do have to manually intervene with a transfer in case something goes wrong with the SDK - which we’ve seen happen for larger creators/wallets while  transferring tips. At the time of writing, almost 500 YouTube channels have been claimed. We’ve also updated our [Top YouTubers](http://traction.lbry.com/question/163) list to include a transfer date if they claimed their channel.

![youtubers](https://spee.ch/7/youtube-transfers.jpg)

## Rewards for content creators {#rewards}

Recently we began linking channels and publishes on LBRY back to accounts so that we can reward content creators for gaining subscribers and publishing to LBRY. This data, combined with YouTube Sync information, will allow us to create new rewards and emails incentivizing content creators to share LBRY with their followers and get them into the ecosystem. First up will be the subscriber reward at levels of 1, 5, 20, 100, 500, 1K, 5K and 10K.  

![sub reward preview](https://spee.ch/a/creator-email.jpg)

## 2019 Roadmap {#roadmap}
We’ve successfully accomplished a number of roadmap items fully, while others are partially complete and ongoing efforts. 

Partially completed/still in progress are:
* **Commenting** - Markdown support added in Heisenberg
* **Creator Features** - Claiming YouTube channels now possible on lbry.tv. Rewards for creators in the pipeline.
* **Creator Partnerships** - No update since last month - in progress and will be announced later this year
* **LBRY on the Web** - End of beta state this month, focus on supporting larger user bases next.
* **Multi-Device Experience** - Wallet and account preferences now available for everyone with Heisenberg and supported on lbry.tv. Encryption/password change features in progress.
* **Internationalization** - Four new languages added: Chinese, Slovenian, Turkish, and French. Available on lbry.tv and next app release (mid Nov).
* **Protocol Performance** - Mobile reliability improved, multiprocessing effort in progress to support lbry.tv.

## Limited Reward Code!
We’ve got a special bonus for readers of this update, enjoy some LBC via this code (while supplies last!): `dev-oct-yahsd`

## Want to Develop on the LBRY ecosystem?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [contributing guide](https://lbry.tech/contribute) and our [LBRY App specific contributing document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Make sure you have turned on the Developer option in your email preferences (see app overview page), or sign up at [lbry.tech](https://lbry.tech). We also have a [LBRY Discourse Forum](https://discourse.lbry.io) where developers can interact with the team and ask questions across all our different projects. 

If you aren’t part of our Discord community yet, [join us](https://chat.lbry.com) anytime and say hello! 

Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbrycom), [Facebook](https://facebook.com/lbrycom), [Reddit](https://www.reddit.com/r/lbry), [BitcoinTalk](https://bitcointalk.org/index.php?topic=5116826.new#new), and [Telegram](https://t.me/lbryofficial). 

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven’t downloaded the [LBRY app](https://lbry.com/get?auto=1) yet, what are you waiting for?
