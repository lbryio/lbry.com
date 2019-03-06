---
author: tom-zarebczan
title: 'Development and Community Update February 2018'
date: '2018-03-01 18:00:00'
cover: 'wooden-letters-banner.jpg'
category: community-update
---

In December, we published the [first ever LBRY Development and Community update](https://lbry.io/news/lbry-development-community-update-1) and followed up with another for [January 2018](https://lbry.io/news/lbry-development-community-update-jan-2018) - be sure to check both out if you missed them! We will continue these updates at the beginning of each month to keep each and every LBRYian up to date on our quest to revolutionize content discovery, sharing and monetization! To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

Please take a moment to read our [Looking Back and Moving Forward: LBRY in 2017/2018](https://lbry.io/news/lbry-in-2017-2018) blog post and check out our [roadmap](https://lbry.io/roadmap).

Before diving in, we want to let everyone know that we'll be hosting a **live Ask me Anything event** with our CEO Jeremy Kauffman next **Friday (3/9) at 5:30 PM ET** on Twitter and Reddit. This will be the first live stream from our office, so please bear with us through any technical difficulties. Join us on the [LBRY subreddit](https://www.reddit.com/r/lbry) and use #lbryAMA on [Twitter](https://twitter.com/LBRYio), and bring some friends who have burning questions about LBRY!

To skip the tech stuff and see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. Our plan is to create a technical reference site which will be developer focused at https://lbry.tech which will also include a StackExchange like a forum for Q&A/troubleshooting.

### App and Protocol Summary
As you may know from our previous updates, the LBRY app is undergoing a redesign which is taking up a large chunk of the team's time but the app team is aiming to release a patch to version 0.20 which brings a few bug fixes, an updated LBRY protocol version and possibly a new feature or two (spee.ch thumbnail uploads from within the app, automated subscription downloads).

On the app side, bug fixes will include: 1) the sorting of published claims, 2) video player issues where content does not play on the first attempt, 3) app state will be saved when closing LBRY to tray, 4) disabling of drag and drop of files into the app, 5) poor error messages when publishing and 6) start time of night mode.

The 0.19 LBRY protocol update is in the final stages of testing and will also include many bug fixes and enhancements. See a full changelog of the [current release candidate](https://github.com/lbryio/lbry/releases/tag/v0.19.0rc37) for details. Some of the highlights are: 1) better tracking of edited claims for both publishers and downloaders, 2)  ability to automatically renew expiring claims, 3) ability to update claims if your current LBC balance doesn't cover the claim amount (it will use the claim amount in the calculation), 4) ability to re-download content at updated claims, 5) improved startup performance, 6) a single database for claim and file information, 7) transaction list to include abandon claim information and 8) smarter wallet address reuse and fixing bugs where addresses were created incorrectly.

After this round of protocol enhancements, the team will be focusing on improving resolve(a process by which claims are looked upon the blockchain) and download performance, availability in the LBRY Peer to Peer layer and blockchain sync optimizations.

Stay tuned for an updated version of the LBRY app next week! In the meantime, you can download the current version [here](https://lbry.io/get?auto=1) if you don't have it installed already!

### App Redesign
The LBRY App redesign continues to make great progress you can follow along on [GitHub](https://github.com/lbryio/lbry-desktop/issues/848) for the latest status and updates. The latest focus has been on refactoring the inner workings of the Publish page into a more optimized version using the React framework. We also have a community member, @btzr, who is helping out in migrating the dark theme into the new design.

Want to explore a web-based prototype of the new LBRY app design? Head over to [https://design.lbry.io](https://design.lbry.io) to get a preview of what's to come. This page works best on a Desktop but may display correctly in landscape mode on mobile. *Please note: some of the design features like notifications and commenting are still experimental and most likely will not roll out with the first iteration of the re-design as they require additional support from the protocol to work properly.*

![App redesign early preview](https://spee.ch/1/app-redesign-preview.jpeg)

### Subscription Enhancements in Progress
A new round of enhancements to the Subscription feature is being developed. The goal is to increase interactivity, engagement and notification for users who subscribe to channels on LBRY. This will include an option to automatically download new content as it is added to a channel as well as notification features within the app and email. Have questions or comments, drop us a line on the [GitHub issue](https://github.com/lbryio/lbry-desktop/issues/994).

### LBRY Mobile for Android
LBRY recently worked with a user interface designer who came up with a very nice and simple design prototype, check out the video below for a preview. The process of incorporating this prototype into React Native code is underway. To solve delays deploying the app changes, we had to come up with a way to build the UI and daemon separately, such that the React Native app can be reloaded without having to rebuild the daemon each time (slow!). This enables testing the UI changes relatively quickly against any stable or development build of the daemon. There is a good chance that we will have a basic working mobile Android app in a few weeks!

<video width="100%" controls src="https://spee.ch/b/android-prototype.mp4"/></video>

### spee.ch Update
Spee.ch is now using React! As spee.ch began to grow, we soon realized that in order to provide a robust front-end experience we would need more flexibility in the way we build that experience. With that goal in mind, we spent the past few weeks converting the front end code from static handlebars templates to a full-fledged React app. This will allow us to do a lot more with efficiently reusing components, building more robust tools for users, and hopefully makes the code base more accessible to community developers who are already using the popular React framework. As part of this transition, we also converted some of the back end code to perform server-side rendering and updated the API endpoints.

### Automated Testing and Coding Tests
As part of our push for improving scaling and overall performance, reliability and availability of the LBRY protocol we've been putting a lot of effort into increasing code coverage (lines of code covered by automated tests) and the sophistication of our integration testing. For example, improve the distributed file sharing protocol we created network models with simulated adverse conditions and then analyzed how LBRY DHT responds to these conditions. Many bugs have been fixed, and improvements developed as a result of this work; the best part is that we're doing this in an automated fashion, so we'll know instantly when any regressions happen and fix them before deploying new code. Unit testing for blockchain, wallet and other common use cases has also been expanding.

![Code coverage sample](https://spee.ch/2/code-cov.png)

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform.

### LBRY Team Expands - Protocol Developer!
Great news, our [team](https://lbry.io/team) is expanding! We've recently hired an additional LBRY protocol developer who will be helping Jack and Kay on improving functionality and performance in LBRY's core component. We are excited to have Lex on board! Welcome him to the team by saying hello to @eukreign on [Discord](https://chat.lbry.io).

![Lex profile page](https://spee.ch/a/lex-profile.png)

### LBRY Merchandise Store
On Valentine's day, LBRY officially launched its at-cost merchandise store through [Apex Apparel](https://apexapparel.shop/collections/lbry) on Discord chat where five lucky community members were sent free merch during an initial giveaway contest. The link was later shared on Reddit and Social media where a few fans have already shared their swag photos. Special thanks to community member @TheSethser for helping us get this project off the ground and for the awesome design work!

We will tip LBC if you tag us on Twitter or Facebook with a picture of you rocking LBRY swag. Please upload to [spee.ch](https://spee.ch) and share the post on [Discord](https://chat.lbry.io) or [Reddit](http://reddit.com/r/lbry) to claim your reward. Thanks for your support in spreading LBRY love!

![swag preview](https://spee.ch/3/LBRY-swag.png)

### Blockchain Security and Economics
Over the last few months, we've noticed that the LBRY mining hash rate has gone up significantly due to the manufacturing of FPGA (specialized mining hardware) and we've noticed our [community](https://github.com/lbryio/lbrycrd/issues/85) has their concerns about centralization as well. We will be addressing the general blockchain security and economics discussion with a blog post that explains our take and potential solutions.

### Youtube Sync Site Almost Ready!
Our revamped YouTube sync page (replacing [this one](https://lbry.io/youtube)) is almost ready to go live! This program will begin to target YouTubers more aggressively with the goal of having them sync their content to the LBRY network. The new process will allow them to claim their channel directly on the LBRY network during signup, detail the monthly LBC incentive based on subscriber counts and provide a sync status view, so they monitor the sync progress. Stay tuned for updates!

![YouTube Sync preview](https://spee.ch/3/sync.png)

### LBRY Social Media Updates
We've surpassed 15k followers on [Facebook](https://www.facebook.com/lbryio) and 30k followers on [Twitter](https://twitter.com/lbryio) - as our audience keeps growing, there will be more opportunities than ever for new users to discover LBRY. We also want our community to be an integral part of our social presence - if you haven't yet, join our [Discord](https://chat.lbry.io), and feel free to throw out any suggestions for posts, articles, or individuals you think we should reach out to!

### Twitter LBC Tip Bot
We have opened up a bounty for a [Twitter Tip Bot](https://lbry.io/bounty/twitter-tipbot) to expand our ability to distribute LBC to our Twitter followers. This will accompany our Discord and Reddit tip bots which are powerful tools used by ourselves and our community to reward LBRYians for their contributions, testing and feedback. It will work by tagging the tipbot user in Twitter replies/messages with keywords such as "tip", "balance", "withdraw", "deposit" - very similar to our other tip bots. A community member is very close to getting a tipbot working, and you can follow [@LBC_TipBot](https://twitter.com/@LBC_TipBot) for updates.

### BitcoinTalk Official and Moderated Thread
We are in the beginning stages of gathering information to create a new and official LBRY Bitcointalk thread. There is an [unofficial one](https://bitcointalk.org/index.php?topic=1541268.new#new) out in the wild currently, but it was not started by LBRY Inc, nor is it moderated. The goal is to serve the Crypto community with another medium of discussion and collaboration. It will be a moderated thread which will have specific rules against the typical hyping / pump market talk as this type of banter is not something LBRY participates in, nor does it help the project mature.

### Favorite Creators Contest in Discord
Head over to our #favoritecreators channel on [Discord](https://chat.lbry.io) to vote on the submitted entries. The winning creator will be offered 10K LBC to sync their content to LBRY! It's not too late to enter a suggestion either. This experimental contest will run until 3/9/2018.

![Favorite Creators Entries](https://spee.ch/3/favcreators.png)

### New Bounties Channel on Discord
Check out our new #bounties channel on [Discord](https://chat.lbry.io). This is the place to go to find occasional mini-tasks to earn LBC as well as any questions you may have about LBRY bounties. Types of mini-tasks may include research, marketing tasks, and testing.

### Meetups and College Campus Initiatives
LBRY has officially launched their Meetups and College programs! We are [looking for ambassadors](https://lbry.io/meet) to spread the word on college campuses and at live meetups! If you'd like to bring LBRY to your group, we'll help you with resources, swag, and LBC for your members!

![Meetup and College initiative](https://spee.ch/7/meet-LBRY.png)

### LBRY.Community Contest Winners
The [LBRY.Community contest](https://lbry.community/category/votable-contest-entries) from January wrapped up, and the [winners](https://lbry.community/contest-winners-january-2018) were first announced and tipped on our Discord channel, congrats to all the winners! All entrants were given LBC Credits as a participation bonus and LBRY.Community is also giving out stickers and handbags to all participants and judges. Thanks again to @rouse and @coolguy3289 for coordinating! The next phase of LBRY.Community's plans are being discussed with our team.

### New and updated LBRY FAQ Articles
We recently revamped and simplified our ["What is LBRY?"](https://lbry.io/faq/what-is-lbry) FAQ, so it's a tad easier to digest for first time LBRY users.

The new [LBRY Basics](https://lbry.io/faq/lbry-basics) FAQ entry which will provide first-time (and existing) LBRY app users a better understanding of the various components of the app. It also explains what LBRY accounts are used for and stresses that all LBRY data, including your wallet where credits are stored, is only available on your computer and should be [backed up](https://lbry.io/faq/how-to-backup-wallet) accordingly.

We've also added FAQs which detail LBRY's [content policy](https://lbry.io/faq/content) and [acceptable use policy](https://lbry.io/faq/acceptable-use-policy). Thanks to @julie for her hard work on these!

Have an idea for a FAQ or want to help us improve the current ones, check out the code on our [GitHub page](https://github.com/lbryio/lbry.io/tree/master/content/faq) for the lbry.io website.

### Spee.ch Biz Dev
LBRY is actively looking for file sharing websites which could potentially build upon spee.ch's codebase or be developed alongside it. We have reached out to numerous candidates, held introductory meetings and will continue to research additional potential partnerships. We are looking for developers who share a vision that is culturally aligned with ours: supporting free speech and decentralized technology. Are you interested or know anyone that is? Feel free to reach out to Bill (@billbit on Discord) or via [email](mailto:bill@lbry.io).

We are also actively looking for communities or websites that could make use of spee.ch's image sharing features. This includes researching plugins for applications like Wordpress that would make such an integration easier for users.

### Babson College Update
On February 22, LBRY CEO Jeremy Kauffman and Growth Director Natalie Mitchell gave a business focused presentation on LBRY and blockchain technology to a group of college students in Professor [Steven Gordon](http://www.babson.edu/Academics/faculty/profiles/Pages/gordon-steven.aspx)'s class at Babson College, a business school in Massachusetts. Natalie shared this feedback with the team:

"The presentation was really fantastic - which is to say, it turned into a conversation with the students, as well as some Babson faculty who were in attendance. All in attendance kept the very thoughtful questions flowing, which always makes for a fun time if you're the presenters! I'm happy to say that our time there sparked conversations with a few very bright minds who are interested in participating in our fledgling internship program, so that felt like a definite win.

The takeaway, for me, was clear: Students of business/economics are taking note of what is happening in the blockchain space, and they want to be a part of it. Higher education is following suit, moving quickly to offer coursework to prepare future business leaders for the work of further progressing the decentralized business model. It is an understatement to say that this is an exciting time to be working in tech. I can't wait to see what these students, and others, will end up contributing to the space."

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?

