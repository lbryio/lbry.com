---
author: samuel-lbryian
title: 'Development and Community Update April 2018'
date: '2018-05-04 13:45:00'
cover: 'coder-tank.jpg'
category: community-update
---

Welcome to our LBRY Development and Community update! In this post we'll show you what we've been up to and review our progress for the month of April. It was a busy month, starting off with the company All-Hands summit, and progress was made on our desktop and Android apps, LBRY Protocol improvements, several community updates, and team growth. To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

If you haven't already, please take a moment to read our [Looking Back and Moving Forward: LBRY in 2017/2018](https://lbry.io/news/lbry-in-2017-2018) blog post and check out our [roadmap](https://lbry.io/roadmap).

To skip the tech stuff, see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md). Please be patient with us while we improve our technical documentation. In the next month, we'll be releasing a technical reference site which will be developer focused at [https://LBRY.tech](#lbry-tech).

### App and Protocol Summary
Due to travel time for and participation at [LBRY's All Hands](#all-hands) gathering, development activities were on the lighter side this past month. The app team released version [0.21.3](https://github.com/lbryio/lbry-desktop/releases/tag/v0.21.3) which included a small patch to block content deemed infringing according to DMCA laws (see next section for more information). Otherwise, the main focus on the app side has been on testing and bug squashing on the [redesign](#redesign-updates). Part of this effort was spent on separating out the [lbry-redux](https://github.com/lbryio/lbry-redux) code into its own repository so that the mobile and desktop apps can re-use redux states and functionality. We ran into a few quirks during this process but we were able to get things running smoothly!

On the Protocol side of the house, [version 0.20](https://github.com/lbryio/lbry/releases/tag/v0.20.0rc9) is undergoing refactoring and improvements to the way blob announcement is handled and other DHT enhancements around peer availability. We were able to bring the blob announce times from 1 or 2 per second, to 25 per second (our target is 100 per second!). With these changes, our team hopes to improve the consistency of content availability on the network. A fair amount of time was also spent identifying and fixing our reflector servers to ensure that content uploaded by users is passed correctly to our content nodes. Before these changes, certain content would not be reflected properly which resulted in unavailable content if the original uploader was not online. Finally, development efforts on both the client and server side of our [wallet functionality](#wallet) have been progressing nicely.

### Content Blocking and DMCA
In early April, LBRY Inc. received its first set of legitimate DMCA take down requests for a fair amount of infringing content LBRY URLs. This can be seen as a positive development because it means LBRY is on the map as a legitimate content sharing platform! Due to the decentralized nature of LBRY, we cannot remove content metadata from the blockchain, but as a company creating services which use the data, we must follow local laws. This means we have to block access to infringing URLs and make sure the content itself is deleted from our hosts (even though it could still be hosted by the original uploader and by others who have downloaded it). The latest version of the app provided the ability to block infringing content.

Our [Content](https://lbry.io/faq/content) and [DMCA](https://lbry.io/faq/dmca) FAQ pages cover what content is allowed to be uploaded to LBRY, how we handle this content and reporting/DMCA procedures.

![DMCA](https://spee.ch/3/dmca-censored.jpeg)

### LBRY for Android Update
We're getting closer to a feature-complete mobile app with search functionality recently added to the current alpha and wallet features in the pipeline. Once full wallet functionality is released with the next alpha, we will be transitioning to the Open Beta phase via Google Play Store. Open beta will allow us to release the Android app to a wider audience and get better feedback from testers. Rewards will be added in open beta and we may actually add some mobile-only rewards!

Want to participate in LBRY for Android alpha testing? [Sign up here](https://lbry.io/android-alpha) and you'll be added to the waitlist! Not interested in alpha yet but want to know when we are ready for the next phase, join our regular [Android mailing list](https://lbry.io/android) instead. You can see the current status of testing and issues on our [Android GitHub repository](https://github.com/lbryio/lbry-android/issues).

![wallet-preview](https://spee.ch/9/wallet-android-preview.jpeg)

 ### spee.ch Update
The majority of our effort on the spee.ch codebase has been to convert the [spee.ch repository](https://github.com/lbryio/spee.ch) to hold the main server code, and create the [www.spee.ch repository](https://github.com/lbryio/www.spee.ch) which will be the main entry point for spee.ch implementations that can be cloned to [create your own version of spee.ch](https://lbry.io/speech-admin). We are planning to hold a kick off event which will explain and walk through how you can setup and build your own clone. Are you interested in this feature? Learn more by checking out the [spee.ch community section](#speech-host).

### App Redesign {#redesign-updates}
Since our last update, we've squashed a number of critical bugs and the LBRY app redesign has moved into a release candidate phase where we've invited testers from our Discord community to perform more rigorous testing and gather additional feedback. Want to help out? Join us on [Discord](https://chat.lbry.io) and ask about becoming an early tester. In addition to previewing the redesign before its officially released, you can earn LBRY Credits by finding bugs or providing suggestions.

We've identified a number of issues which are marked with the [redesign label](https://github.com/lbryio/lbry-desktop/issues?q=is%3Aissue+is%3Aopen+label%3Aredesign) on GitHub. Before submitting any new design related issues, be sure to review those first. We've also identified show stoppers, which prevent a public release, with the [release-blocker tag](https://github.com/lbryio/lbry-desktop/issues?q=is%3Aissue+is%3Aopen+label%3Arelease-blocker) so you can have a better idea when it's ready for primetime! We believe that a full release is near once these bugs are squashed, but you never know what new issues could creep up.

![App-preview](https://spee.ch/8/redesign-dark.jpeg)

### Subscription Page Improvements
Currently, the subscriptions page is organized similar to the explore page where each channel has its own single row of 10 latest items. It becomes difficult to monitor your subscriptions for updated content in this fashion, so we will be changing the page to look and behave similar to the Downloads/Published pages where channels are no longer grouped together, but instead, the latest content updates will be displayed at the top of the page. We will still show the 10 latest items per subscribed channel but they will be sorted by publish date across all subscriptions.

We're also working on syncing subscription data to the LBRY API server so that subscriptions are no longer lost if the LBRY cache is cleared or if you move to a new device (and we can sync to mobile too!). This will also allow us to recommend similar content / channels in the future.

![new sub page](https://spee.ch/7/subs-new.png)

### Upcoming Feature: Hyperlinks to LBRY In-App Areas
One of our new team members had a fantastic suggestion that would re-engage our users by providing hyperlinks to various areas in the LBRY app. Currently, we use the hyperlink functionality to provide users direct links to LBRY content and channel URLs (they open the app if you have it installed too!) via https://open.lbry.io but this new feature will allow us to hyperlink to areas such as Rewards, Publish, Wallet and Settings. One use case would be to send out an email encouraging publishing and provide the users a clickable URL that opens the app and brings them to the Publish feature.

### Protocol - Wallet Server and Client Development Updates {#wallet}
Large chunks of progress have been made on both the [wallet server](https://github.com/lbryio/lbryum-server/issues/54) and [client](https://github.com/lbryio/lbry/issues/1155) redesign/reimplementation. Once the server side is implemented, we should see significant performance gains that will translate directly to an improved app experience as claim information will load much faster, especially for new users on a first run.

During the process of developing the ElectrumX server to support LBRY claims, we were able to identify several improvements required on the full blockchain or LBRYcrd codebase. Initial testing is underway as we currently have a test server running these changes along with the enhanced ElectrumX code that accepts wallet connections from the current LBRY wallet (and it will also support the new client when it's ready).

The client side, which is a Twisted based implementation of the wallet, is still in development but is able to create and receive basic transactions. The next phase is to support claim related transactions. The wallet was architected in such a way (see below) that it will be able to support multiple LBC wallets and even Bitcoin wallets if and when we'd decide to support bitcoin payments in the app.

![wallet diagram](https://spee.ch/8/wallet-diagram.jpeg)

### Chainquery SQL Databasing on the Blockchain
This is the first time we are mentioning the [Chainquery project for LBRY](https://github.com/lbryio/chainquery) in our communications as it's mostly flown under the radar because of its early development status. Chainquery will provide a SQLized view of the LBRY blockchain which can be used across many projects where we currently need such data such as Lighthouse (search server), API server, LBRY app and spee.ch. Currently, these projects either run their own implementation of blockchain views or don't take advantage of having the information readily available through a simple query, but rather have to rely on direct communication with the blockchain. Chainquery will slowly be integrated into these services to provide quick and easy access to claim/channel  information, payment data and transactions.

### Blockchain - Hardfork Update
In our previous [hardfork update](https://lbry.io/news/lbry-development-community-update-mar-2018), we mentioned two upgrades to the blockchain - removing claim expiration and removing case sensitivity. After further discussion with the team, we have decided to perform these upgrades one by one in order to simplify the number of code changes which should result in a smoother transition. Since claim expiration is the more critical of the two, it will go first. We will be activating these changes and simulating the hard fork on our testnet in the coming days, and if all goes to plan, we will announce the date of the main net hardfork.

Based on feedback received when we first mentioned a hard fork, we want to stress that forks are standard means of upgrading blockchain functionality and should not be compared to other contentious hard forks like Bitcoin or Ethereum. Other blockchain projects go through this same process and LBRY will continue to evolve the blockchain code base through such upgrades.

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform.

### Upcoming Events
If you're in the DC area, make sure to get registered for the [Startup Society Summit](https://www.startupsocieties.com/startup-societies-summit-gmu-2018) at George Mason University next week (May 9th and 10th). Natalie Mitchell, LBRY's Director of Talent and Branding, will be speaking on how free market startup cities and blockchain technology can help rebuild Puerto Rico in the aftermath of Hurricane Maria. Stop by and say hello!

### LBRY is hiring! New Jobs Posted
The team saw amazing growth in March as 21 team members came together for our second All Hands meetup at LBRY's home base in Manchester, NH. We're delighted to announce we're seeking [even more members to join our crew,](https://lbry.io/join-us) so if you've dreamed of working at the front of bleeding edge technology, we have these opportunities available:

Blockchain Engineer
Lead Application Engineer
Project Manager
Protocol Engineer
API Engineer
Lead Designer (UI/UX, Graphics)

And if you don't see an opportunity that's an exact fit, there are many other ways to get involved in the project and earn LBC or cash. We're also offering a $5k finder's fee for successful hires for our job listings. [Click for more info](https://lbry.io/join-us).

### LBRY All-Hands Recap {#all-hands}
The LBRY Spring 2018 All-Hands Summit was a great success. Our team of 21 came from around the world to Manchester, NH, for a week of food, bonding, break-out sessions, and jumping competitions. [Our CTO won.](https://spee.ch/4/natalie-grin-jumping.jpeg)

A great deal of the time we spent together was focused on cross-team operations and communications strategies. We're growing fast, and our processes and systems need to grow at pace. We have already begun to implement a number of the takeaways from these meetings and believe we will gain a lot from more efficient and clear communication across teams.

This year's all-hands schedule was full, and we accomplished just about everything we'd hoped to while together --but the most important achievement was getting to know our newer team members and connecting in-person with people we work with daily, but mostly see on screens.

![LBRY Team Growth](https://spee.ch/c/LBRYteam.jpeg)

### Roadmap Check-in
We've recently made a few updates to our [Roadmap](https://lbry.io/roadmap) which include a status indicator (Complete/In Progress/Planned), new items and updated timelines to reflect current priorities and goals. New items include `YouTube Sync Automation`, `Speech Multisite` and `Wallet Server/Client Improvements` - all of which are mentioned in this update. We've had to re-assess our priorities and updated future events on the roadmap respectively. This is and will continue to be an evolving roadmap so schedule/goal adjustments are to be expected.

![roadmap](https://spee.ch/f/roadmap-update.jpeg)

### Q1 Credit Report
Due to funding needs being met, no credits were moved from cold storage during the first quarter. The majority of credit outlays were for technical contributions and community - both things we love to reward! As usual, you can see both the [summary report](https://lbry.io/credit-reports/2018-q1) and [detailed spreadsheet](https://docs.google.com/spreadsheets/d/17GIrc-cmoXEY9x3NYhtxd45g2mHnuJ7cjUy_TfmhLMA/edit?usp=sharing) on our website.

### LBRY Merchandise Store
We've added some brand new designs to our [swag store!](https://shop.lbry.io). New t-shirt designs and products are frequently added, so please be sure to stop by! We're very excited to offer some fresh items designed by our new marketing intern James Biller - if you like what you see, give him a shout out on [Twitter](https://twitter.com/BillerJames)!

Earn LBC! Help us grow our community and get the word out about LBRY: We will tip LBC if you tag us (@LBRYio) on Twitter or Facebook with a picture of you rocking LBRY swag. Please upload it to spee.ch and share the post on Discord or Reddit to claim your reward. Thanks for your support in spreading LBRY love!

![Give me LBRY](https://spee.ch/0/givemeliberty.png)

### YouTube Sync Updates {#youtube-updates}
Since the launch of our revamped YouTube Sync program in March, we are coming close to 10,000 total syncs and YouTubers have claimed a total of 40,000 LBRY Credits.

We are also refining our YouTube Sync process so that we can automate the syncing of new channels as well as updates to existing channels. This will allow for much more content to be uploaded to LBRY by running our sync process continuously and shorten the time between agreement to sync and having YouTubers' content available on LBRY.

![YouTube Rewards](https://spee.ch/0/youtube-update.jpeg)

### Twitter LBC Tip Bot
The [LBRY Tipbot for Twitter](https://twitter.com/@LBC_TipBot) was tested internally by the team along with the help of community members, and is now ready for mainstream action! You can read our [Tipbot FAQ](https://lbry.io/faq/tipbot-twitter) for more information on how to use the tipbot. Hint: use the `lbryian` keyword and make sure to keep your entire command on a single line.

![Tipbot](https://spee.ch/b/tipbot-gerbil.jpeg)

### LBRY.tech Update {#lbry-tech}
We've recently hired additional help to shape our LBRY.tech technical resource and its design and development is progressing quickly. Developers will be able to interact with a live LBRY daemon directly from the website and access various technical content like documentation on how to contribute, how to develop and other technical resources. Follow along the development on our GitHub repository and check out an early preview below (disregard the poor design, it's getting a facelift!). Our goal is to launch an early version of this site by the end of May, which will include the long awaited LBRY whitepaper in draft form.

![lbry.tech preview](https://spee.ch/d/lbrytech-early-design.jpeg)

### Discord Role Self Assignment and New Member Flow
With our Discord community growing and in order to improve the experience for new members, we have implemented a system allowing users to self-assign roles based on their activity, purpose, and interests. It also allows more granular controls over which roles have access to particular channels/areas.

When you join our Discord, you will first see the #welcome-to-lbry channel and have access to the #general, #help, and #verification areas. If you wish to join other channels that relate to international channels, mining, or trading channels, you will need to use the #role-assign channel to give yourself access to the roles you're interested in. A full description of the roles along with general info about the LBRY Discord server may be found in channel #welcome-to-lbry.

![discord](https://spee.ch/9/welcome-to-lbry.jpeg)

### Meetups and College Campus Initiatives - Get Involved! {#meetup-update}
![Hack the Heights](https://spee.ch/6/hackheights.png)

Natalie Mitchell was delighted to attend Boston College's second *Hack the Heights* hackathon event on behalf of LBRY. Students from all Boston area Colleges came together to rapidly "hack" together creative projects and compete for prizes.

LBRY is proud to be working with local colleges to encourage students to become involved in blockchain projects: through computer programming, business of blockchain, and creative design. Babson College is using LBRY as a case study in their Blockchain and Cryptocurrency class, and LBRY actively provides internships for local college students.

On the Meetup side of things, we've been hard at work creating a community hub for meetup resources, to be rolled out in May. The new hub will include slideshows and other resources to present to your group, a forum to talk to other Ambassadors and ask questions, and interact with LBRY staff.

Does free speech matter to you? Would you like to get involved with cutting edge blockchain technology and earn a few cryptocoins in the process? We're [looking for ambassadors](https://lbry.io/meet) to spread the word on college campuses and at live blockchain or video related meetups - if you'd like to bring LBRY to your group, we'll help you with resources, swag, and LBC for your members!

### LBRY-C Collaboration
The independent LBRY-C community group has begun work on a website to use the LBRY protocol called *Liberum.*

*Liberum* is a message board that prides itself on anonymity, privacy and free speech, built on top of the LBRY protocol. It is created for those users wanting to engage in and discuss their passions in an open space without fear of unjust censorship.

It's here for those that want civil discourse as well as to discuss interests amongst their fellows. The project has just begun but for those who are interested in helping grow the project, you are welcome to join the team on their [Discord Server](https://discord.gg/ytY4NeJ).

### Want to Run a Spee.ch Clone or Web Server Hosting LBRY content? {#speech-host}
LBRY is looking for users or communities that are interested in hosting a spee.ch like website or even a web portal into their own LBRY content (think of this as your own local YouTube page!). We would be more than happy to walk you through the process which would include customization and tweaking it to your liking! Does this sound interesting to you or maybe someone you know? Sign up on or share our [speech admin mailing list](https://lbry.io/speech-admin) to be notified when LBRY will host a live session. The purpose of this will be to learn how to run your own spee.ch install, how spee.ch works, and have live help and discussion.

We are also looking for communities, subreddits and websites that could make use of spee.ch's image sharing features. This includes researching plugins to applications like Wordpress that would make such an integration easier for users. If you know any that might benefit, drop us a line on Discord or have them reach out to our speech developer, [Bill](mailto:bill@lbry.io).

![speech](https://spee.ch/0/spech-adminnew.jpeg)

### 3D Printing Community on LBRY
We are in the process of creating a landing page on LBRY.io specifically to attract users and creators of 3D printing models. We believe that LBRY is a perfect fit for creators as our platform will allow them to charge for their models or receive micropayments in terms of tips (Thingiverse allows payments, but there are large minimums).

[Back to **Development Updates**](#dev-updates)

Thanks for supporting LBRY - stay tuned for more news and updates! And if you haven't downloaded the [LBRY app](https://lbry.io/get?auto=1) yet, what are you waiting for?
