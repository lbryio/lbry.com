---
author: tom-zarebczan
title: 'Development and Community Update January 2018'
date: '2018-02-01 4:00:00'
cover: 'wooden-letters-banner.jpg'
category: community-update
---

In December, we published the [first ever LBRY Development and Community update](https://lbry.io/news/lbry-development-community-update-1), and we will continue this series at the end of each month to keep each and every LBRYian up to date on our quest to revolutionize content discovery, sharing and monetization! To read all of our updates, please visit [our Development and Community Update archive](https://lbry.io/news/category/community-update).

Please take a moment to read our [Looking Back and Moving Forward: LBRY in 2017/2018](https://lbry.io/news/lbry-in-2017-2018) blog post!

To skip the tech stuff and see what's happened and what's next in the LBRY community, click the link below. Otherwise, read on!

[Skip to **Community Happenings**](#com-updates)

# Development Updates {#dev-updates}
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [general contributing guide](https://lbry.io/faq/contributing) and our LBRY App specific contributing [document](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md).

### App and Protocol Quick Summary
As you may know from our previous update, the LBRY App is undergoing a redesign which is taking up a large chunk of the team's time, but we still managed to ship multiple patch releases to version 0.19 that enabled users to continue enjoying the main functions of the LBRY app. We also finished off January with [version 0.20](https://github.com/lbryio/lbry-desktop/releases/tag/v0.20.0) which enables a more streamlined LBRY app update process, phone number verification for [LBRY Rewards](https://lbry.io/faq/rewards) that makes it easier for new users to earn some LBC, added automated dark theme mode, patched a security hole introduced by [Electron](https://electronjs.org/blog/protocol-handler-fix) and a bit of code refactoring. On the protocol side, we ran into a showstopper related to how files are handled and were forced to go back to the drawing board to re-engineer a better solution. Our protocol devs also had to deal with growing pains on [spee.ch](https://spee.ch) which continues to uncover invaluable insights into scaling the LBRY as it's the biggest user of the protocol to date!

### Documentation, Organization and Development Processes
A considerable amount of effort went into documenting an app side [contributing process](https://github.com/lbryio/lbry-desktop/blob/master/CONTRIBUTING.md) along with [tagging and organization](https://github.com/lbryio/lbry/wiki/Labels) of GitHub issues which required a careful review of all outstanding issues across multiple repositories. The result was a clearer and more organized depiction of what's on the plate for our developers to work on but it also provides a more welcoming environment for contributors and potential LBRY developers to get started.

During the past month, we've also transitioned to a more agile development methodology we like to call [scrum-lite](https://github.com/lbryio/lbry/wiki/Development-Process-&-Standards) which enables the team to reassess and refocus our efforts on a bi-monthly basis. In addition to creating a more structured framework around development processes, this also forces us to break down large tasks into smaller, easier to tackle initiatives which allow for a transition from "I'm still working on it" to "completed part 1A, onto the next one!".

![Scrum overview](https://spee.ch/b/AgileProjectManagementbyPlanbox.png)

### App Redesign
The LBRY App redesign is in full swing, and a good amount of progress has been made to date - you can follow along on [GitHub](https://github.com/lbryio/lbry-desktop/issues/848) for the latest status and updates. Not only does it include a facelift, but much of the underlying framework and navigation will be revamped as well. This also includes changes to the way searching is performed and redesigns to other pages like Wallet Overview, claims and file lists.

![App redesign early preview](https://spee.ch/1/app-redesign-preview.jpeg)

### LBRY Mobile for Android
There has been a decent amount of progress on the LBRY mobile app with the daemon successfully running on Android, and a basic interface using React Native. Since the desktop app was built using React, we have been able to take some of the existing code in order to create components, including wallet and search functionality which are shared by both the desktop and mobile apps. Following the desktop app redesign, we will have some prototype UI designs to show off in the coming weeks, stay tuned!

### spee.ch Update
"Refactor, refactor, refactor" has been the name of the game for [spee.ch](https://spee.ch) as of late. After completing the beta version of the site and then moving on to a redesign, the team at LBRY -- in conjunction with a group of talented community contributors -- has been working to update the code base to utilize the latest and greatest that web apps have to offer. We've added a public facing publish API endpoint, improved the UX around retrieving content from the LBRY network and have welcomed many new content creators onto the platform. On our roadmap for the near future are additional publishing tools, improved API endpoints, and conversion of the front end code to React -- all of which are improvements we are confident will continue to make the user experience better and facilitate even more community development. Check out the latest on [GitHub](https://github.com/lbryio/spee.ch)!


### lbry.tech Initial Project Scope
Our recent [hiring efforts](https://lbry.io/join-us) exposed a weakness in LBRY's documentation which cannot be overlooked any longer if we want more contributors and other services using the LBRY protocol. lbry.tech will be created as a resource specifically for technical visitors which are either completely new users (let's catch their initial interest!) and to existing users looking for access to a technical resource. The project is currently in the planning and exploration phase, stay tuned for more updates on [GitHub](https://github.com/lbryio/lbry.tech)!

### LBRY Whitepaper
A LBRY whitepaper is in the works which will formally document the LBRY ecosystem and protocol specifications. Its creation had been put off for a while since most agree that whitepapers are marketing gimmicks for projects without a product, but as LBRY continues to get more attention, having one will allow us to link a single technical resource into how LBRY functions as opposed to directing users to FAQ posts or other articles.

### LBRY Wallet Encryption
LBRY wallet encryption has been enabled in the latest versions of the daemon (not released yet). With the help of a few community members, we ran through initial tests, and they were successful at a basic level. In order to ensure we didn't break anything, additional testing will need to be performed once an app is released that uses the new daemon. The final step would be to [integrate this feature](https://github.com/lbryio/lbry-desktop/issues/762) into the app. This would most likely happen after the app redesign and will come along with a new user walkthrough.

![Wallet Encryption command line](https://spee.ch/7/walletencryption.png)

### LBRY Rewards Abuse Defenses
Unfortunately, when you try to give away free internet currency, some people will stop at nothing to abuse the system, and as such, we will continue to evolve in order to ramp up defences. We have instituted a new policy that disallows rewards when a VPN/proxy connection is detected and also limit rewards to 1 per household now (previously 1 per person). The 1 LBC email verification reward was removed in a version 19 patch because it was easily abusable. Our wish would be to spend this valuable time on developing the app instead, but we also have to be good stewards of LBRY credits that we give out.

### New LBRY Rewards Verification Method - SMS
In order to provide a more seamless new user experience, version 0.20 of the LBRY app allows users to earn [LBRY rewards](https://lbry.io/faq/rewards) by verifying their phone number over SMS. We will monitor usage and potential abuse over the coming days in order to build a ruleset that minimizes rewards abuse. We also hope that many legitimate users will opt for this method versus our current manual verification which is time-consuming for both them and ourselves!

# Community Happenings {#com-updates}
If you aren't part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say hello! Our community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform.

### LBRY at Sundance Film Festival
LBRY's Content Creator and Director of Growth and Branding attended the Sundance film festival at the end of January - be on the lookout for a video recap of the event!

### lbry.io Website
The LBRY website was updated with the latest [team information](https://lbry.io/team) which includes updated bios, new team members and Twitter/GitHub profile links. The updated YouTube sync page is still in progress as we finalize some of the backend changes needed to support it.

### LBRY Roadmap
The LBRY business team worked alongside the tech team to provide the community with a [roadmap of enhancements, features and new undertakings for 2018](https://lbry.io/roadmap). We hope this provides project supporters a transparent insight into what LBRY plans to accomplish in the mid to long-term future. Have any feedback; we'd love to hear it in the #ideas-and-feedback channel on [Discord](https://chat.lbry.io).

### Santatoshi LBC Tipping over the Holiday Season
Our Discord server is armed with the almighty LBRY tipbot which allows us to reward our community members for their suggestions, feedback and other contributions. Over the holiday season, Santatoshi paid a visit on numerous occasions tipping LBC to innocent bystanders. To top things off on Christmas Day, Santa made it rain LBC with amounts up to 500 LBC to our most active community members. Over 12K LBC was given away!

![Tipping in Discord](https://spee.ch/3/santa-discord.png)

### Favorite Creators Contest in Discord
Head over to our #favoritecreators channel on [Discord](https://chat.lbry.io) where we ask our community to share their favorite content creators and have others upvote the entries with the goal of getting them on LBRY. We'll offer the creator 10K LBC to post (or mirror) their content. If we can't get in touch, we'll go to the next top voted one. We don't have a hard limit on subscribers/content type (I'd say at least 50K subs?), but we reserve the right to disqualify/pass if warranted. This will run until the end of February.

### Meetups and College Campus Initiatives
Although we are still finalizing our programs for both meetups and college initiatives, we'd love to hear from your if you are interested in learning more! Please join us on the respective #meetup / #campus channels in [Discord](https//chat.lbry.io). Please keep reading below for updates from several pilot programs.

Last year we had a community member named Adrian, from Poland, reach out to us in order to raise awareness to LBRY in his circles which include a [famous choir](http://en.cantoresminores.pl) and two universities - check out [this photo](https://spee.ch/d/adrian-lbry.jpeg) of him in action! He's interested in more collaboration again this year, and we are in the process of working out the details. Next, we have bounboun from Discord who gave a [presentation](https://docs.google.com/presentation/d/1CvpdVm3YON0VP4PeZESLAc3ThwaWWI7NONN3NCZeTHo/edit#slide=id.g3293f0e87a_0_81) on January 30th during a gaming conference in France, and he'll also be talking about LBRY at a [french meetup on March 14 ](https://www.meetup.com/fr-FR/Crypto-Alsace) which had over 200 guests previously!

Last but not least, we also received interest to collaborate with Avery who is part of the [Arizona State University Blockchain Innovation Society](http://asubis.weebly.com) - initial talks are underway!

### Babson College
Professor [Steven Gordon](http://www.babson.edu/Academics/faculty/profiles/Pages/gordon-steven.aspx) from Babson College, a business school in Massachusettes, found out about LBRY when researching local blockchain projects and immediately contacted us for more information. He created a new class for this semester on Blockchain technology and will feature LBRY as a case study in the curriculum, and one of our team members will be on site to assist!

### lbry.community Initiatives
[lbry.community](https://lbry.community/about) is a completely independent, community-run effort to help spread awareness to the importance of the LBRY protocol. We are thrilled at what they have been able to accomplish to date and are extremely excited that they are able to share a vision for LBRY which takes a unique, user-focused approach compared to LBRY's internal one. Recently, the community website went through a redesign which they promoted alongside various contests which included either visual and written requirements as well as simpler [reddit/Twitter initiatives (you can still enter until Feb 6!)](https://lbry.community/category/open-contests). The contest entry period ended with [19 video submissions](https://lbry.community/jan-competition-videos) and [11 written articles](https://lbry.community/contests), a truly impressive turnout! Contest voting ends on Feb 6, stay tuned for the results!

If you are interested in helping out, please reach out to @rouse on [Discord](https://chat.lbry.io).

[Back to **Development Updates**](#dev-updates)
