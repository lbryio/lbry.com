---
author: samuel-lbryian
title: 'Development and Community Update July 2018'
date: '2018-08-08 08:08:08'
cover: 'lex-amit.jpg'
category: community-update
---

Welcome to the July 2018 LBRY Development and Community update! In this post we'll show you what we've been up to and review our progress for the month of July. We had a very busy month - new releases on the Protocol, new features in the LBRY app, project grants via the LBRY.fund, and wallet encryption progress are among the highlights.

You asked for more ways to earn LBC credits in the app, so we've added multi-level rewards. Scroll down to learn about new [rewards updates](#reward).

To read all of our previous updates, please visit our [Development and Community Update archive](https://lbry.io/news/category/community-update).

If you want to see a condensed view of what we have completed recently and what's planned for LBRY, check out our [roadmap](https://lbry.io/roadmap).

## UPDATE - LBRY Community Contests

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">The Video Contest &amp; Networking Bounty has officially started!<br/>A total prize pool of 7000 LBC.<br/>Visit <a href="https://t.co/16RZh3L2LH">https://t.co/16RZh3L2LH</a><br/>Good luck creating videos!<a href="https://twitter.com/hashtag/LBRY?src=hash&amp;ref_src=twsrc%5Etfw">#LBRY</a> <a href="https://twitter.com/search?q=%24LBC&amp;src=ctag&amp;ref_src=twsrc%5Etfw">$LBC</a> <a href="https://twitter.com/LBRYio?ref_src=twsrc%5Etfw">@LBRYio</a></p>&mdash; LBRY Community (@LBRYCommunity) <a href="https://twitter.com/LBRYCommunity/status/1024023211778998272?ref_src=twsrc%5Etfw">July 30, 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

We have winners in our t-shirt and 3D chess set contests! We are also excited to announce new Video and Networking contests hosted by our community partners, LBRY-C!

7,000 LBC (yes, seven-thousand LBC!) will be awarded in two different contests. Please visit [LBRY.community](https://lbry.community/contest-august-2018) for full details.

### LBRY T-shirt design contest
Congratulations to the winners of our [summer t-shirt contest](https://lbry.io/shirt-contest)! First place goes to Usman Yaqub and second place is Stephen Firth. They win $100 and $50 in LBC respectively, plus $25 in credit to use in the LBRY Shop! Buy the winning design here: [Men's](https://shop.lbry.io/collections/mens-unisex/products/lbry-sublimation-t-shirt) or [Women's](https://shop.lbry.io/products/ladies-lbry-sublimation-t-shirt)!

![First place](https://spee.ch/19848de763d3f31fafa686217f84d55a34ec6c22/LBRY-SuBLiMaTioN-Model.png)

![Second place](https://spee.ch/80ce070534a3841e7bdd86e157086ab2f422632d/Dove-Side-by-Side-Final-01.png)


### 3D Printed Chess Set Contest
We were blown away by the submissions for our Chess Set Design contest! Congratulations to Greg Broas and Zeycus who take home $100 in LBC for the Grand Prize, and $50 in LBC for the Runner-up. Download the winning chess set here: [lbry://gregsintricatechessa](https://open.lbry.io/gregsintricatechessa) & here: [lbry://gregsintricatechessb](https://open.lbry.io/gregsintricatechessa)

![chess set](https://spee.ch/7c892f0dc7e34392787ac1e8061c97d4fe270cdd/Gregs-Chess-Coupled-01.png)

Even though the contests are over, you can still earn $5 in LBC just for uploading your chess set to the LBRY network. Email the lbry:// address to [james@lbry.io](mailto:james@lbry.io) to enter and claim your reward! You can also get paid to print out our featured Cryptocurrency Chess Set by simply posting a picture of it to social media and tagging LBRY! Details at the bottom of the contest page.

Want to keep in touch regarding future 3D printing updates, [subscribe here](https://lbry.io/3d-printing)!

To skip the tech stuff, see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}

### App and Protocol Summary
After releasing our redesigned LBRY Desktop app at the end of June, the app team has been hard at work adding additional features and squashing bugs. In our [June update](https://lbry.io/news/lbry-development-community-update-june-2018) we previewed 3D viewing and PDF support, both of which were implemented in version 0.23.0 along with changes to how we handle mature content on the Explore page, channel caching, and thumbnail preview - continue below to check out the changes or read the [release blog post](https://lbry.io/news/app-release-023).

[Version 0.23.1](https://github.com/lbryio/lbry-app/releases/tag/v0.23.1), a minor patch to re-enable ShapeShift integration, was released just over a week ago - after ShapeShift fixed a wallet issue on their end. Version 0.24.0 is just around the corner with features including -- at a minimum, the first version of wallet encryption in-app, recommended content on file pages, a document viewer, browsing history and improving the search experience. Keep reading below for a preview!

On the protocol side of the house, we shipped [version 0.20.4](https://github.com/lbryio/lbry/releases/tag/v0.20.4) along with the latest app release. This version brings more stability and CPU usage improvements, especially when running the daemon for extended periods of time. The protocol team has prioritized startup speed/status, blob mirroring support and other DHT performance improvements in 0.21.0. You can read the latest list of changes in the [release notes for the latest Release Candidate](https://github.com/lbryio/lbry/releases) and further down in the [Protocol update section](#protocol).

### New Multi-Level Rewards {#reward}
Since everyone loves their hard earned LBC by way of [LBRY Rewards](https://lbry.io/faq/rewards), we'll cover recent reward additions and changes! We've implemented a new multi-level reward structure in order to incentivize user engagement over time.

The "Many Views" reward was converted to use this new feature. Users who originally claimed this reward will now start at Level 2: "The Browser", with 5 being the max level. Only new views within the app will count towards your progress. A new subscription reward was also added, with 2 incentive levels. Any previous subscriptions won't count, so get out there and subscribe to your favorite creators! Next up for multi-level rewards will most likely be related to tipping, so keep an eye out in your LBRY app for new rewards.

![multilevel](https://spee.ch/34dee02a49fefd7301307f4b95948a0cd8ae7990/rewards-sub-download.jpeg)

### Channel Page Caching
Our developers have been spending a lot of time and effort on speeding up the in-app experience in 0.23. The tweaks in this update to channel caching and navigation between channels/claims will show just what a great job they've done, significantly reducing load times in-app. Previously, the channel pages would reload each time they were accessed. As a next step, we will pre-cache latter pages in a channel, so that when you go to the next page, it's already all loaded up for your viewing pleasure!

![Channel caching](https://spee.ch/bd9cae0f865a7e0f8a915397de005e0acb577890/channel-caching.gif)

### Download Error Suppression
We also improved when those annoying download failure errors are shown. If you've used LBRY before, we're sure you've run into it! If you start a stream and leave the page, we'll no longer bug you with a pop-up alert. This also previously happened if you started another video and one failed before -- yep, we'll suppress that one too. As the LBRY network grows stronger and more reliable, we'll have to worry about this less and less, but for now, we think this improves the user experience!

### Thumbnail Preview
We've included a new feature in 0.23 for publishers: you can preview what your thumbnail will look like before you publish! Using either the spee.ch thumbnail upload feature, or when entering a URL, the app now shows a thumbnail preview. With 0.24, if you enter an incorrect URL, you'll see a red alert image.

![thumb](https://spee.ch/8f9077826c54a3855cbd6dc873fb655e330fb6e4/thumb-checking.gif)

### Abandon Transactions now on Transaction Page
If you have published content on LBRY before, there may have been a time when you decided to delete the claim -- for whatever reason. After doing this, your balance would magically update to show any LBC deposit you received back from your claim. This process is now no longer a mystery -- claim abandon transactions are now shown in the LBRY app as the value (+) returned to your wallet!

![abandon transaction](https://spee.ch/8ce03eaa90e3a401727aed3db5c638bf11182ec4/abandon-tx.jpeg)

### NSFW Changes - Hide Tiles + Community Top Bids
We've also made some changes to the app to make it more family-friendly for people who choose not to enable NSFW (mature) content. This means the Community Bid section will not be shown unless you choose to view NSFW content in the app as we don't [control the content posted there](https://lbry.io/faq/community-top-bid). Also, previews of NSFW videos will not show up at all on channel pages, subscriptions or search results. If you're just here for the hentai, everything's still available - you just have to enable NSFW content in your settings.

![content settings](https://spee.ch/77e02036642ec2b2d9aebbb57b1194bbf1dac3ab/content-settings-top-bid.jpeg)

### Recommended Content on File Pages
In the next LBRY Desktop app update, we're extremely excited to introduce a new feature that recommends related content on LBRY, all based on textual search rankings. Currently, the recommended content uses the title of the current file to search and display up to 20 results on the right side of the app. In the future, we will use the description as well as tags (when the LBRY protocol implements them) to increase the accuracy of related content. We are still debating whether related videos should autoplay, especially since hard drive space management is not a strong suite of the protocol at the moment.

![Recommended Content 1.0](https://spee.ch/cab352cbdc61044687b1a6bb4b7460d5991cba11/recommended-content-1-0.jpeg)

### Wallet Encryption via the App {#encrypt}
With the next app release, users will be able to easily encrypt their wallet via a few simple steps. This feature was added a few months ago to the protocol and now it's finally exposed to users in the Settings area. If you turn this setting on, you'll be prompted with a message asking for a secure password and a written confirmation of your action. *As you know, if this password is ever lost not even LBRY will be able to get access back to your wallet.* As a first go around, the wallet will most likely need to be unlocked at startup.

![Encryption](https://spee.ch/1b5ed4120cac0ca2d36ee9a8a630dc31d1babfc5/wallet-encryption-1-0.jpeg)

### Subscription Fixes and Enhancements
We've recently identified a number of subscription-related bugs and inconsistencies which we hope to patch up before the next app release. We believe subscriptions will play a major role in engaging users within the LBRY app, so we want the experience to be as seamless as possible.

One major issue identified is the lack of a setting for auto download - the app currently tries to automatically pre-download new videos from your subscribed channels without an option to turn this off. As a first fix for this, we'll be adding a global setting and then determine if per channel settings further improve the user experience. This auto download feature only currently works if the app is open, but we also want it to function if the user had their app shutdown. The goal would still be to download the 1 latest piece of content posted, similar to other streaming platforms. Finally, we'll be adding auto claiming of the subscription reward after subscribing to enough channels.

### Document Viewer
Community member [btzr](https://github.com/btzr-io) comes through again with another awesome addition to the LBRY app - a document viewer for files like docx, markdown, HTML, txt, csv, json and formatting for over 100 coding languages like javascript, xml and python. These file types will also automatically open the document viewer if you have them downloaded. This also means there's less and less of a reliance on the most prominent file viewer, render-media, in the LBRY app so we can slowly focus on replacing it with a more versatile video player.

![document viewer](https://spee.ch/31248a3319f26e4a1a2844f6048b05c390255152/colors.png)

### Browsing History
Wouldn't it be nice to know which content you've visited while exploring the LBRY app? Good news! A browsing history feature is currently a [work in progress](https://github.com/lbryio/lbry-desktop/pull/1846) by community member [Travis,](https://github.com/daovist) which will store each file you've visited, and whether it was actually played/opened. We'll be changing the tile view to a more detailed list view in order to improve the display of this type of information. You'll have the ability to clear items one by one and also with a clear all button. Check out an early preview below!

![file history](https://spee.ch/b7ddafc76342c79c250853da32625d0b2f71afe0/view-history-1-0.jpeg)

### Behind the scenes - Electron Builder / Electron Upgrade / Daemon Download / Watch Script
There's a few awesome behind the scenes developments we also wanted to mention. We've recently upgraded Electron-Builder which creates our executables and enables autoupdate. This fixed a few bugs we were seeing, especially one where old auto update downloads would not get cleaned up automatically.

The latest version also enabled digital signing of any files included with our setup, which now means that the LBRY Daemon is finally signed on Windows! This should lead to fewer complaints by AntiVirus software which normally flags files like this as potentially dangerous. In the next app version, we are also upgrading the Electron version to 2.0.6 (jumping from 1.8.7) - this is pretty much the chrome subsystem that runs our app.

We've also implemented a new watch script to make it easier for developers to automatically view code changes as they are working in the lbry-redux repository with the LBRY app open in development mode. Previously, it was a constant struggle to make changes appear on the desktop app after they were made in lbry-redux locally. Now a script will take care of all that for you!

### Protocol - 0.21 Features and Progress {#protocol}
Protocol version 0.21 is undergoing final testing internally and almost ready to be shipped! Much of the work done includes the initialization, handling and status of the various components making up the LBRY protocol. These enhancements ensure that component dependencies are decoupled and started as soon as possible, thus speeding up the overall daemon startup process and giving application developers better control over component. This also includes a new UPnP component that the team coded from scratch to replace the poorly supported miniupnpc plugin which helps automate port forwarding on many home routers automatically. We'll be logging information for this new addition but failing back to miniupnpc until we are comfortable that it will work on many different networks/routers.

Two enhancements related to file availability and performance are also included in 0.21 - "greedy" search and blob mirrors. Greedy search is an improvement on the original implementation of how nodes find each other on the network when looking for data. This implementation is more aggressive and should be able to traverse more peers if it can't find the content immediately, thus improving the chances of a successful download. Blob mirroring is a new feature that will accompany the P2P layer by simultaneously trying to download blobs directly from our reflector infrastructure (see more on this below). Both blob mirroring and the P2P layer will attempt to download blob files, and whichever is able to respond the quickest will complete that portion of the download. In initial tests, the P2P layer still wins out, but that will vary per user and what their connectivity to the network.

### Protocol - LBRY Reflector Hosting {#reflector}
In our [previous update](https://lbry.io/news/lbry-development-community-update-june-2018#reflector), we mentioned that LBRY's hosting infrastructure was getting a major overhaul and we've made progress towards this goal. The server which holds the blobs has been configured and the reflector service, which communicates with the LBRY protocol, is accepting blobs from our YouTube sync process. These blobs will be immediately available for protocol versions that use blob mirroring (0.21+) and the next step is to finish configuring the P2P layer which will make them available via the DHT. The final step will be to point the daemon at this new reflector so that any uploads from users will also go here - then we can slowly sunset the old one.

### Protocol - Wallet Client Development Updates {#wallet}
We can see the light at the end of the tunnel for the launch of the new LBRY wallet! Final integration into the LBRY protocol is being completed and is being extensively tested on our staging spee.ch server to ensure that all required API calls are implemented correctly. The wallet also successfully migrates existing LBRY wallets to a new format, including any channels that users may have. The new format is much smaller and cleaner than the previous wallet that used to store transaction information (now in a rebuildable database). This wallet will be launched along with version 0.30, see the next section for more details.

![wallet format](https://spee.ch/0aca7b923f92a5c1d1513ac172ab25c95083ba69/wallet-sample.jpeg)

### Protocol - Version 0.30 - Python 3.x Upgrade and Wallet Implementation
In order to more effectively integrate new wallet functionality into the rest of the LBRY protocol, we decided it was finally time to migrate away from Python 2.7 and into Python 3, which is a major version bump that requires lots of rewrites and changes to application logic. Portions of our code were already compatible with both versions, except for the largest and arguably the most important component - the peer to peer layer. After version 0.21 is released, the plan is to migrate all the current changes from our [lbryum-refactor branch](https://github.com/lbryio/lbry/commits/lbryum-refactor) (which already has lots of progress on the python 3 port), into the Master branch and continue the development there. That will force the team to use the latest code and to work out all the kinks!

### LBRY for Android Update
We are still continuing a lot of the behind the scenes work to integrate our mobile platform with our user authentication and rewards services. The Android team also has been working closely with the Protocol team to ensure that the next release supports overall performance improvements on a cell phone device - this includes the faster resolve changes implemented last month, blockchain sync status and ability to download content through a mirroring solution rather than P2P. Other app improvements include improving hyperlink display/behavior, video player enhancements, keeping the device awake when playing videos, and support for Android 8.0 (Oreo).

We should have a much smoother version ready for testing with the 0.21 Protocol in a couple weeks so stay tuned and [sign up](https://lbry.io/android-alpha) to become an alpha tester if you haven't already!

![welcome screen](https://spee.ch/6fb914c11530370bb2ee671e8c9792c7dbd8d854/lbry-android-welcome.png)

### spee.ch Update
We've been testing the new wallet integration on our staging spee.ch server and it's almost ready for prime time. With this update, we expect spee.ch publishing times to go down considerably - hopefully down to just a few seconds from 30s+. In other news, thumbnail publishing from the LBRY app revealed some issues with different URL types and their previews which were addressed recently. If you are sharing a spee.ch link on social media, you should use the first URL provided (without an extension) but if you are embedding it in a post, you'll want the full path with the file extension. We've also improved the way certain content displays on the spee.ch page, especially around images/scaling.

Interested in running your own spee.ch server or clone? Check out the [quick start guide](https://github.com/lbryio/www.spee.ch/blob/master/quickstart.md) and GitHub repository at [lbryio/www.spee.ch](https://github.com/lbryio/www.spee.ch).

### Blockchain - Hard Fork Success!
LBRY went through a successful [hard fork on 7/9/18](https://lbry.io/news/hf1807). It was not until a few days after that we were able to confirm that consensus was maintained by miners after the upgrade. Exchanges and other services handled the update fairly well also, but we did run into a hiccup or two with some nodes needing to be re-indexed (which we provided instructions for in the blog post). There already is another [hard fork upgrade](https://github.com/lbryio/lbrycrd/pull/159) related to case sensitivity on claims/channels in the queue and we are determining the best timing to execute it.

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Our hard fork is complete! Claims now last 10 years instead of 1.5, meaning that you can count on finding the content you uploaded to LBRY now and years from now. Check the link for more details. <a href="https://t.co/RDJsOxfL0S">https://t.co/RDJsOxfL0S</a> <a href="https://twitter.com/hashtag/hardfork?src=hash&amp;ref_src=twsrc%5Etfw">#hardfork</a> <a href="https://twitter.com/hashtag/blockchain?src=hash&amp;ref_src=twsrc%5Etfw">#blockchain</a></p>&mdash; LBRY (we never give away ETH) (@LBRYio) <a href="https://twitter.com/LBRYio/status/1017063979364048897?ref_src=twsrc%5Etfw">July 11, 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

The next priorities for the Blockchain team include cleaning up the claimtrie code base in order to increase maintainability and to provide a smoother transition to upstream changes from Bitcoin. These changes include features like SegWit and HD Addresses which were enabled on later versions of Bitcoin. Segwit is especially important since it would allow us to run Lighting Network, which is a 2nd layer scaling solution for microtransactions and a perfect use case for data payments on the P2P network.

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. Also follow us on [Twitter](https://twitter.com/lbryio), [Facebook](https://facebook.com/lbryio), [Reddit](https://www.reddit.com/r/lbry), [Instagram](https://www.instagram.com/lbryio), and [Telegram](https://www.instagram.com/lbryio).

### Q2 2018 Credit Report
This quarter we moved no credits from cold storage. We spent 738,027 total community credits on line items detailed in the Q2 report. No operational credits were moved to markets. No institutional credits were moved or spent. We anticipate comparable or larger total outlays in Q3 2018. Operational spending may increase, but not significantly, and community spending is likely to be higher. We will continue to incentivize new users and other beneficial behavior, which is likely to involve 300,000 to 1,500,000+ LBC. LBRY is also likely to form it's first institutional partnership, with spending anticipated to be around 500,000 LBC. [Read the details here.](https://lbry.io/credit-reports/2018-q2)

### Roadmap Check-in
Things are fairly quiet on the [roadmap](https://lbry.io/roadmap) front. We've moved the `Wallet Encryption in the LBRY App` goal to `In Progress` as it's almost ready to be released, see [above](#encrypt) for the update. Large amounts of progress have been made on [YouTube Sync automation](#youtube-updates) as well as [Wallet improvements](#wallet) - both of which we hope to check off as complete by the end of this month.

### LBRY.fund Awards New Community Grants {#lbry-fund}
The LBRY.fund had an amazing month in July, and we're proud to fund some familiar and some new faces in the LBRY community.
*Approved/Funded projects include:*

#### CryptoCandor LBRY Review:
CryptoCandor, one of LBRY's featured content creators, brings us a full review about the LBRY protocol and project. View her review on [spee.ch](https://spee.ch/3d/LBRY).

![CryptoCandor](https://spee.ch/ef8cb7be92327f2af7b16917847fdcbfedf0692f/cryptocandor-lbry.jpg)

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">We&#39;re excited to announce that <a href="https://twitter.com/CryptoCandor?ref_src=twsrc%5Etfw">@CryptoCandor</a>&#39;s <a href="https://t.co/6hefigVmB3">https://t.co/6hefigVmB3</a> project has been approved! Do you have an idea for a new way to use or promote LBRY? Make it reality with our grant program at <a href="https://t.co/6hefigVmB3">https://t.co/6hefigVmB3</a> - head over and apply today! <a href="https://t.co/97csq98oGI">pic.twitter.com/97csq98oGI</a></p>&mdash; LBRY (we never give away ETH) (@LBRYio) <a href="https://twitter.com/LBRYio/status/1016779857647239169?ref_src=twsrc%5Etfw">July 10, 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


#### FONK World:
David Heath and Mike Little are teaming up to create an animated humorous video guide to LBRY called "FONKn' LBRY." The animation is intended to appeal to a larger audience and explain the workings of the LBRY protocol in a whimsical way.

![FONK World](https://spee.ch/36c08e0463b8247c8a53990f9634c4ad473cc9d1/fonk-lbry-sm.jpg)

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">FONK is funded! If you have an idea to improve LBRY, build something new on LBRY, or tell the world about our <a href="https://twitter.com/hashtag/decentralized?src=hash&amp;ref_src=twsrc%5Etfw">#decentralized</a>, peer to peer network, apply for a grant today at <a href="https://t.co/6hefigVmB3">https://t.co/6hefigVmB3</a>! <a href="https://t.co/wqfF0eHCmE">pic.twitter.com/wqfF0eHCmE</a></p>&mdash; LBRY (we never give away ETH) (@LBRYio) <a href="https://twitter.com/LBRYio/status/1022945228137881606?ref_src=twsrc%5Etfw">July 27, 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

#### LBRY Pi TV:
[Discord](https://chat.lbry.io) user Madiator2011 is creating a plug and play device to view LBRY video content on television. At its core, the device uses a Raspberry Pi computer to stream LBRY videos. You can watch the progress and follow along by visiting [the LBRY Pi Website](https://lbrypi.com).

#### UNH Hackathon:
LBRY is partnering with the University of New Hampshire to present a hackathon for UNH students this fall! Prizes range up to $1000 worth of LBC. Date and additional details to be announced soon.

#### Matt Sokol Development Grant:
Musician and LBRY contributor Matt Sokol approached us with a unique LBRY.fund request: he asked us to fund him to work on a special project using a custom [Spee.ch Multisite](https://github.com/lbryio/spee.ch) installation to host beautifully typeset classical books. We said yes! If you'd like to hear some of Matt's music, you can find it on the LBRY app: [lbry://@heymattsokol.](https://open.lbry.io/@heymattsokol)

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/hashtag/Mathrock?src=hash&amp;ref_src=twsrc%5Etfw">#Mathrock</a>, <a href="https://twitter.com/hashtag/chiptune?src=hash&amp;ref_src=twsrc%5Etfw">#chiptune</a>, and <a href="https://twitter.com/hashtag/blockchain?src=hash&amp;ref_src=twsrc%5Etfw">#blockchain</a> are three great tastes that taste great together - we can&#39;t wait to see what <a href="https://twitter.com/heymattsokol?ref_src=twsrc%5Etfw">@heymattsokol</a> comes up with now that his project is funded! <a href="https://t.co/ySjeWEnXd6">pic.twitter.com/ySjeWEnXd6</a></p>&mdash; LBRY (we never give away ETH) (@LBRYio) <a href="https://twitter.com/LBRYio/status/1019596298658426885?ref_src=twsrc%5Etfw">July 18, 2018</a></blockquote>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

Do you have an idea for a project using or promoting the LBRY Protocol? We may pay you to create your vision. [Visit the LBRY.fund for details](https://lbry.fund).

![LBRY.fund](https://spee.ch/2/lbry-fund.png)

### LBRY Stack Exchange Community Enters Commitment Phase!
The Stack Exchange LBRY Protocol site grew last month, and has now entered the Commitment phase! The real work begins now: we need 200 people to commit to use our Stack Exchange site, and 100 of them must be active participants on other Stack Exchange forums (have 200+ reputation). Please give us a hand:
[View the LBRY Stack Exchange site here](https://area51.stackexchange.com/proposals/118455/lbry-protocol)
<a href="https://area51.stackexchange.com/proposals/118455/lbry?"><img src="https://area51.stackexchange.com/ads/proposal/118455.png" width="300" height="250" alt="Stack Exchange Q&A site proposal: LBRY" /></a>

### LBRY is hiring!
[Come join team Content Freedom!](https://lbry.io/join-us) We have the following positions open: Blockchain Engineer, Protocol Engineer, and API Engineer. We'd love for you to join us, or if you have a friend you think would be interested, we pay a $5,000 bounty if we hire them.

### Youtube Sync Updates {#youtube-updates}
After being put on a forced hold due to a much needed work on our infrastructure, we were able to restart syncing several channels in the queue - both for existing and new YouTubers.
Enhancements to the code made it possible to publish several videos concurrently, rather than 1 at a time, which allows us to process large channels in a matter of minutes. Thanks to the continuous effort from the Protocol team, publishing has gotten much smoother and the whole process requires less and less manual intervention.

We also expanded our fleet of workers to 8 servers making it possible to keep up with the incoming queue of new channels, In order to support this more distributed effort, we implemented a solution that allows us to track every single video published to LBRY, thus allowing greater oversight into the overall sync process.

Just a few days ago we crossed one big milestone: 100,000 videos were successfully published to LBRY through the YT sync program and more than 1,000 channels are now streaming on our network. Big numbers come with great responsibilities - our current focus is on making the process even faster and more distributed in order to clear out the current queue and then keep every single channel up to date with the very latest videos published on YouTube.

### LBRY.tech Update {#lbry-tech}
Underneath the hood, lbry.tech received a major overhaul in the past month which should allow for a smoother development process going forward - you can track all the progress on our [GitHub repository](https://github.com/lbryio/lbry.tech). Along with the Protocol and Blockchain teams, we've finalized on an API format for both projects and implemented it on lbry.tech, check out the [preview here](https://lbry.tech/api). The next steps are to overhaul the Tour portion which walks a user through a few different interactions with the LBRY protocol and finish filling in the Build/Contribute areas.

![lbrytech publish](https://spee.ch/b19b42a753612cef1079c6083686df7ca2550e66/lbry-tech-ecosystem-early-preview.jpeg)

# Want to develop on the LBRY protocol?
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a developer and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-app/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. In the next few weeks we'll be releasing [lbry.tech](#lbry-tech), a technical reference / guide website which will be developer and contributor focused to drive more apps and services on top of LBRY.

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
