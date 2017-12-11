---
author: lbry
title: 'Development and Community Update #1'
date: '2017-12-11 1:00:00'
---
The LBRY community spoke and we listened! This is the first of a bi-weekly blog series whose intent is to keep the community up to date on LBRY project related developments and community efforts. 

This is an exciting time to follow along and watch LBRY evolve because we recently hired three new app developers who will be focusing on front end (LBRY app) design and features - an area which definitely could use some TLC. 

# Development Updates
All of our code is open source and available on [GitHub](https://github.com/lbryio). Are you a dev and want to find out more? Check out our [contributing guide](https://lbry.io/faq/contributing). 

### Housekeeping
Anytime a software project brings on new faces, especially when the code was handled by very few developers previously, it’s a good idea to step back and re-assess the current structure and state of the codebase. That’s exactly where some of the initial energy from our new developers went. These changes included simplifying the build and webpack processes, adding [Flow](https://hackernoon.com/type-checking-in-javascript-getting-started-with-flow-8532c11aceb3) as a type checking mechanism, improving application analytics and other code restructuring efforts. 

### Converting Crypto to LBC via ShapeShift
With the growing popularity of Bitcoin and other cryptoassets, we thought it would be a good idea for users to be able to convert their funds into LBC directly from within the LBRY app - this spawned the [ShapeShift](https://shapeshift.io) integration project. Previous to this, users would need to register on one of the exchanges, like Poloniex or Bittrex, to acquire additional LBC.

The next release of LBRY will have an area in the Wallet which will allow users to deposit their crypto and convert to LBC directly - without ever leaving the app! Users will be able to choose from depositing BTC, BCH, LTC, DASH and XMR and have ShapeShift convert it into LBC deposited directly into their LBRY app wallet. 

![Convert Crypto to LBC](https://spee.ch/3/convertcrypto1.JPG)

You can view our new [ShapeShift FAQ](https://lbry.io/faq/shapeshift) for more details.

We are exploring the possibility of adding a Coinbase buy widget which would allow you to purchase LBC through your Coinbase account and/or Credit Cards. 

### Subscriptions
An initial roll out of subscriptions is planned for the next LBRY app release. This will be a separate page in the app that will allow you to see the latest from your favorite LBRY publishers. Users can subscribe to their favorite LBRY content publishers by visiting any of their content pages or by viewing the creator’s channel. Once the subscribe button is clicked, the channel will be added to your Subscriptions tab. You can also unsubscribe any time time to remove it from your Subscriptions page. 
![Subscriptions](https://spee.ch/e/subscriptions.gif)

### App Upgrades
We are enhancing the app upgrade process in two ways - notifying users that there’s an update at a regular interval (previously this was only done on startup) and a more seamless in-app upgrade process. The next version of LBRY will feature the first enhancement while we still work out some details on how to accomplish 2nd.  

### New User Rewards
The first run process, which new LBRY users experience on their first app run, will be enhanced a slightly. We will now grant a 1 LBC reward for just verifying your email without going through any additional hoops. To earn additional LBRY [Rewards](https://lbry.io/faq/rewards), we’ll need to verify that you are a unique user by going through our humanness [verification process](https://lbry.io/faq/identity-requirements). Only 1 Rewards account is allowed per person. 

### LBRY Protocol Updates
Our original goal was to deliver the next app release with an updated LBRY protocol version, but we ran into unexpected trouble making a rather large change to the file_list function to work properly with the app. The next set of protocol updates will also include additional DHT (our P2P network) enhancements, fixes to wallet bloat, smarter use of change addresses, a lbrynet console (helps with debugging, running commands to the daemon) and claim renewal options (to be discussed down the road). 

Although we still encounter intermittent problems with content availability, we have made large strides from where we were just a couple months ago. Our team continues to identify potential solutions to issues we observe on the network and we will continue to roll them out over the next series of protocol upgrades.

Finally, we are almost finished with wallet encryption capabilities!! The code should be merged within the next couple of days and we’ll be running through some internal testing before reaching out to the community. The next steps would be to integrate the functionality into the LBRY app and user experience. 
 
### App Redesign
Although we won’t go into any specific details, there is a major app re-design on the horizon. Some of you may have seen screenshots/links on our #dev-ux channel on [Discord](https://chat.lbry.io) - one of the perks of being in our community :)

Part of the goal for the re-design is to improve the publishing workflow by separating out content and channel management.  
 
### Current Bugs and Issues
You can view all the open issues for the [LBRY app](https://github.com/lbryio/lbry-app/issues) and [protocol](https://github.com/lbryio/lbry/issues) on their respective GitHub pages. We’ll continue to review, prioritize and squash these issues during our software development cycle. If there is a particular issue you feel strongly about, feel free to reach out to us on GitHub or Discord. Found a new problem or have a good suggestion, we will [compensate you](https://lbry.io/faq/tips) for your time and contribution!  

## Development Roadmap
The current LBRY [roadmap](https://lbry.io/roadmap) is not up to date at this time because of a change in our outward cycle planning software. We will be working on fixing this and getting it back up to speed.

# Community Updates
If you aren’t part of our Discord community yet, [join us](https://chat.lbry.io) anytime and say Hello! This community allows LBRYians to interact with the team directly and for us to engage users in order to grow the LBRY platform. 

## lbry.io Website
A lbry.io website redesign is in the works along with an updated team page which will include all the the new team members that have joined. A big part of this update will also include the YouTube onboarding page which is meant to educate YouTubers about the importance of LBRY and have them claim/sync their channels. 

### Tuesday Movie Night
On Tuesday November 28th, we had their first ever live [movie night](https://lbry.io/news/howl-with-us) where our team and Discord community members pressed play together to watch Howl, starring James Franco. We had a blast interacting with everyone and plan on doing these types of live events in the future. We will however be releasing new movies available on the LBRY platform - they will be announced via email on Tuesdays.

Join us for the next [Community Movie Night](https://lbry.io/news/a-very-special-holiday-special) on December 12, 2017 at 8:00PM EST for Rare Exports - A Christmas Tale.

### Contributions and Tipping
Our Discord server is armed with the almighty LBRY tipbot which allows us to reward our community members for their suggestions, feedback and other contributions. Come chat with us to discover the various ways you can help the project. Whether it’s helping us test the software, providing a service to the community, writing a blog post or being a brand ambassador, we appreciate all contributions! 

### Meetups and College Campus Initiatives
Although we are still finalizing our programs for both meetups and college initiatives, we’d love to hear from your if you are interested! Please join us on the respective #meetup / #campus channels in [Discord](https//chat.lbry.io).

### Growing our Discord Community
If you are aware of Discord communities which could benefit from what LBRY offers as a platform, drop us a line on Discord. We are at the beginning stages of an initiative to reach out to other communities whose interests or goals may align with LBRY’s vision for a decentralized and creator controlled digital content marketplace. 

