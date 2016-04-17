---
author: jeremy, zargham, jack
title: Art in the Internet Age
date: '2016-03-21 20:06:18'
cover: /img/altamira-bison.jpg
---

## Introduction

In 34,000 B.C., there were cave paintings. And that’s it. When you came home from a sweltering August day of foraging along the Vézère river, the only form of non-live art or entertainment available was something like the above buffalo.

Today, we live in a world of near infinite choices. This is true not just for art but for all kinds of things (like potato chips). Since the era of cave art, humanity has incessantly and progressively trended towards interconnected, more efficient, and increasingly transparent markets. This undercurrent of connectedness and openness has affected everything human beings produce.

Nerds like us like to speculate about the end-game of this trend with others on the internet. What will society be like when we have a "Star Trek"-like capacity to instantly and freely replicate anything that exists? The term for this society is _post-scarcity_<sup>[1](#note-post-scarcity)</sup>.

Generally, post-scarcity is regarded as fantastical; something that will never happen in our lifetimes. Except for one area: digital goods.

Art in the internet age is infinitely reproducible and easily shared. This is a sea change from any prior time in history. Previously, vinyl records captured audio in physical grooves; tapes captured data on magnetic strips; compact disks held digital files read by lasers—in each of these cases physical, medium-specific hardware is required to both produce and recover the bits of data that made up the digital content.

Today art is just data, a string of 1s and 0s, a _number_, and we no longer need any specialized hardware to decode and enjoy digital content. We use the same technological methods to access a personal photograph a single time as we do to watch a blockbuster on Netflix.

This is a big step forward from the past. As production costs fall to zero, choices go up. Digital distributors provide virtually every song, film, photo or book for purchase and download to any internet enabled device. Technology has decreased the cost of production, too -- it has never been easier for aspirant artists to achieve a following through self-publishing.

The digitization of art has added a lot of value to both content creators and consumers, reducing costs and increasing choice. This transition is still in its infancy. With LBRY, we’re going to make it a little more mature.

<footer id="note-post-scarcity"><sup>1</sup> Note that post-scarcity does not eliminate the need to create _new_ goods, it just eliminates or reduces the costs of _duplicating_ goods to nothing. As long as people desire goods that did not previously exist, there will always be a market demand for creation, even in a post-scarcity world.</footer>

## A People’s Marketplace

LBRY is the first digital marketplace to be controlled by the market’s participants rather than a corporation or other 3rd-party. It is the most open, fair, and efficient marketplace for digital goods ever created, with an incentive design encouraging it to become the most complete.

At the highest level, LBRY does something extraordinarily simple. LBRY creates an association between a unique name and a piece of digital content, such as a movie, book, or game. This is similar to the domain name system that you are most likely using to access this very post.

<div class="text-center meta spacer1">![](/img/lbry-ui.png)

<div class="content-inset">A user searches and prepares to stream and the film _It’s a Wonderful Life_, located at [lbry://wonderfullife](lbry://wonderfullife), via a completely decentralized network. Try it out for yourself at [lbry.io/get](http://lbry.io/get).</div>

</div>

However, LBRY does this not through a proprietary service or network, but as a _protocol_, or a method of doing things, much like HTTP, DNS and other specifications that make up the internet itself. Just as many different domains owned by many different companies all speak a shared language, so too can any person or company speak LBRY. No special access or permission is needed.

LBRY differs from the status quo in three big ways:

1.  **Coupled payment and access**. If desired, the person who publishes to [lbry://wonderfullife](lbry://wonderfullife) can charge a fee to users that view the content.
2.  **Decentralized and distributed**. Content published to LBRY is not specific to one computer or network. No one party, including us, can unilaterally remove or block content on the LBRY network. (If it worries you that LBRY could facilitate unsavory content, this is discussed in its own section.)
3.  **Domain names are controlled via ongoing auction**. This facilitates names being controlled by the publishers that value them most. These transactions take place via an electronic currency called LBRY credits, or _LBC_. This is covered in more detail, below.

While creating a protocol that we ourselves cannot control sounds chaotic, it is actually about establishing trust. Every other publishing system requires trusting an intermediary that can unilaterally change the rules on you. What happens when you build your business on YouTube or Amazon and they change fees? Or Apple drops your content because the Premier of China thought your comedy went to far?

Only LBRY consists of a known, promised set of rules that no one can unilaterally change. LBRY provides this by doing something unique: leaving the _users_ in control rather than demanding that control for itself.

## A Sample Use

Let’s look at a sample use of LBRY, Ernest releasing a film on LBRY that is later purchased and viewed by Hilary.

1.  Ernest wants to release his comedy-horror film, _Ernie Goes To Guantanamo Bay_.
2.  The content is encrypted and sliced into many pieces. These pieces are stored by hosts.
3.  Ernest reserves [lbry://erniebythebay](lbry://erniebythebay), a name pointing to his content.
4.  When Ernest reserves the location, he also submits metadata, such as a description and thumbnail.
5.  Hillary, a user, browses the LBRY network and decides she wants to watch the film.
6.  Hillary issues a payment to Ernest for the decryption key, allowing her to watch the film.
7.  Hillary’s LBRY client collects the pieces from the hosts and reassembles them, using the key to decrypt the pieces (if necessary). This is transparent to Hillary, the film streams within a few seconds after purchase.

This is a lot like an interaction that can happen on many different sites on the web, except that this one happens via a network that is completely decentralized. The data and technology that makes the entire interaction possible is not reliant on nor controlled by any single entity (as it would be via YouTube, Amazon, etc.).

## The LBRY Network

To understand precisely what LBRY is and why it matters, one must understand both LBRY as a protocol and the services the protocol enables. HTTP is the protocol that makes web browsing possible, but it would be of little interest without the service of a web browser!

To understand LBRY, think of LBRY in terms of two layers: _protocol_ and _service._ The protocol provides a fundamental, underlying technological capability. The service layer utilizes the protocol to do something that a human being would actually find useful.

For a user using LBRY at the service level, the magic of what the LBRY protocol does will be largely transparent, much as a typical internet user sees nothing of how HTTP works. Via a LBRY application, a user will be able to open a familiar interface to quickly and easily discover and purchase a piece of digital content published by anyone in the world.

However, such an application would not be possible without the LBRY the underlying layer, the LBRY protocol.

### Layer 1: Protocol

While the protocol is one comprehensive set of rules, it is easier to understand as two parts.

#### Part A: The LBRY Blockchain

A _blockchain_, or _distributed ledger_ is the key innovation behind the Bitcoin network. Blockchains solved the very complicated technological problem of having a bunch of distributed, disparate entities all agree on a rivalrous state of affairs (like how much money they owe each other).

Like Bitcoin, the LBRY blockchain maintain balances -- in this case, balances of _LBC_, LBRY’s unit of credit. More importantly, the LBRY blockchain also provides a decentralized lookup and metadata storage system. The LBRY blockchain supports a specific set of commands that allows anyone to bid (in LBC) to control a LBRY _name_, which is a lot like a domain name. Whoever controls a name gets to describe what it contains, what it costs to access, who to pay, and where to find it. These names are sold in a continuous running auction. We will talk more about this system a little later on.

If you’re a programmer, you might recognize the LBRY blockchain as a _key-value store_. Each key, or name, corresponds to a value, or a metadata entry. Whichever party or parties bid the most LBC gets to control the metadata returned by a key lookup.

Here is a sample key-value entry in the LBRY blockchain. Here, wonderfullife is the key, and the rest of the description is the value.

<div class="code-bash">`

<pre style="white-space: pre-wrap;">    <span class="code-bash-kw1">wonderfullife</span> : {
      <span class="code-bash-kw2">title</span>: "It’s a Wonderful Life",
      <span class="code-bash-kw2">description</span>: "An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.",
      <span class="code-bash-kw2">thumbnail</span>: "http://i.imgur.com/MW45x88.jpg",
      <span class="code-bash-kw2">license</span>: "public domain",
      <span class="code-bash-kw2">price</span>: 0, <span class="code-bash-comment">//free!</span>
      <span class="code-bash-kw2">publisher</span>: "A Fan Of George Bailey", <span class="code-bash-comment">//simplification</span>
      <span class="code-bash-kw2">sources</span>: { <span class="code-bash-comment">//extensible, variable list</span>
        <span class="code-bash-kw2">lbry_hash</span> : <unique id>,
        <span class="code-bash-kw2">url</span> : <url>
      }
    }</pre>

`</div>

<div class="meta text-center content-inset">

A slightly simplified sample entry of metadata in the LBRY blockchain. Whichever party or parties bid the most in an ongoing auction control what a name returns.

</div>

Other than the usage of the LBRY blockchain to store names and metadata, there are only minor differences between the blockchains of LBRY and Bitcoin, and the changes are generally consensus improvements. We’ve buffed the hashing algorithm, smoothed the block reward function, increased the block size, increased the total number of credits, and prepared for offchain settlement.

The LBRY blockchain simply maintains LBC balances and a content namespace/catalogue. The next part, LBRYnet, specifies what to do with this data. To compare to the existing web, the blockchain is like the domain system (it maintains a listing of what is available), while the next piece makes it possible to actually fetch and pay for content.

<footer>If you’re a Bitcoiner wondering why we don’t use the Bitcoin blockchain, you can read a detailed answer to that question [here](https://blog.lbry.io/why-doesnt-lbry-just-use-bitcoin/).</footer>

#### Part B: The Data Network (LBRYNet)

LBRYNet is the layer that makes the LBRY blockchain useful beyond a simple payment system. It says what to do with the information available in the LBRY blockchain, how to issue payments, how to look up a content identifier, and so on.

To use the LBRY network, a user’s computer needs the capacity to speak LBRY. That layer is LBRYNet. Just as your computer has a library that enables it to understand HTTP, DNS, and other languages and protocols, LBRYNet is the piece of software that allows your computer to understand how to interact with the LBRY network.

To understand what role LBRYNet plays, let’s drill a little more into a sample user interaction. Once a user has affirmed access and purchase, such as in step 5 of our Sample Use above, the following happens:

1.  LBRYNet issues a lookup for the name associated with the content. If the client does not have a local copy of the blockchain, this lookup is broadcast to miners or to a service provider. This lookup acquires the metadata associated with the name.
2.  LBRYNet issues any required payments, as instructed by metadata entries.
    1.  If the content is set to free, nothing happens here.
    2.  If the content is set to have a price in LBC, the client must issue a payment in LBC to the specified address. If the content is published encrypted, LBRYNet will not allow access until this payment has been issued.
    3.  If the content is set to have another payment method, the seller must run or use a service that provides a private server enforcing payment and provisioning accessing keys.
3.  Simultaneous to #2, LBRYNet uses the metadata to download the content itself.
    1.  The metadata allows chunks to be discovered and assembled in a BitTorrent-like fashion. However, unlike BitTorrent, chunks do not individually identify themselves as part of a greater whole. Chunks are just arbitrary pieces of data.
    2.  If LBRYNet cannot find nodes offering chunks for free, it will offer payments for chunks to other hosts with those chunks.
    3.  This payment is not done via proof-of-bandwidth, or third-party escrow. Instead, LBRYNet uses reputation, trust, and small initial payments to ensure reliable hosts.
    4.  If content is not published directly to LBRY, the metadata can instruct other access methods, such as a Netflix URL. This allows us to catalogue content not yet available on LBRY as well as offer legacy and extensibility purposes.

### Layer 2: Services

Services are what actually make the LBRY protocol _useful._ While the LBRY protocol determines what is possible, it is the services that actually do things.

While the protocol is determined, open, and fixed, the service layer is much more flexible. It is far easier to redesign a website than it is to revise the HTTP protocol itself. The same is true here.

Additionally, just as in the early days of the internet the later direction of web would have been unfathomable, so too may the best uses of LBRY’s namespace or technology be undiscovered. However, here are some clear uses.

#### Applications and Devices

A LBRY application is how a user would actually have meaningful interactions with the LBRY network. A LBRY client packages the power of the LBRY protocol into a simple application that allows the user to simply search for content, pay for it when necessary, download and enjoy.

Additionally, a LBRY client can allow users to passively participate in the network, allowing them to automatically earn rewards in exchange for contributing bandwidth, disk space, or processing power to the overall network.

Applications beyond a traditional computer based browser are possible as well. A LBRY television dongle, a LBRY radio, and any number of existing content access mechanisms can be implemented via an analogous LBRY device.

#### Content Discovery

Although the namespace provided by the LBRY protocol is helpful towards discovery, much as the web would be much less useful without search engines or aggregators, LBRY needs it’s own discovery mechanisms.

Search features can be constructed from the catalogue of metadata provided in the blockchain as well as the content transaction history available in the blockchain or observed on the network. All of this data, along with user history, allows for the creation of content recommendation engines and advanced search features.

Discovery on LBRY can also take the form of featured content. Clients can utilize featured content to provide additional visibility for new content that consumers might not otherwise be looking for.

#### Content Distribution

Digital content distributors with server-client models are subject to the whims of internet service providers and hostile foreign governments. Traffic from the host servers can be throttled or halted altogether if the owners of cables and routers so choose. However, in case of the LBRY protocol content comes from anywhere and everywhere, and is therefore not so easily stifled.

Additionally, the market mechanisms of LBRY create a strong incentive for efficient distribution, which will save the costs of producers and ISPs alike. These properties, along with LBRY’s infringement disincentivizing properties, make LBRY an appealing technology for large existing data or content distributors.

#### Transaction Settlement

While payments can be issued directly on the LBRY blockchain, the LBRY protocol encourages a volume of transactions that will not scale without usage of offchain settlement.

Essentially, rather than issue a transaction to the core blockchain, transactions are issued to a 3rd-party provider. These providers have a substantial number of coins which are used to maintain balances internally and settle a smaller number of transactions to the core chain. In exchange, these providers earn a small fee, less than the fee required to issue the transaction directly to the blockchain.

## LBRY Credits

LBRY Credits, or _LBC_, are the unit of account for LBRY. Eventually 1,000,000,000 LBC will exist, according to a defined schedule over 20 years. The schedule decays exponentially, with around 100,000,000 in the first year.

Additionally, some credits are awarded on a fixed basis. The total break down looks like this:

*   10% are used to peg LBC to Bitcoin, likely via a sidechain. This will allow LBRY to leverage the security of the Bitcoin blockchain, and incentive adoption from Bitcoin users.
*   10% for organizations, charities, and other strategic partners. Organizations the EFF, ACLU, and others that have fought for digital rights and the security and freedom of the internet.
*   10% for adoption programs. We’ll be giving out lots of bonus credits, especially in the early days of LBRY, in order to encourage participation. We will also look to award credits broadly, ensuring the marketplace is egalitarian.
*   10% for us. For operational costs as well as profit.
*   60% earned by LBRY users, via mining the LBRY cryptocurrency.

## More on Naming

LBRY names are one of the most unique aspects of LBRY and one that we believe will play a big role in helping it succeed.

Control of a LBRY name is awarded via a _continuous running auction_ in LBC. Bids are entered into a _trustless escrow_, marking the credits as unspendable, but leaving them intact. When a user looks up a name, the name resolves to the largest bid made by a party or parties. The ability for any number of people to have a say in where a name resolves is part of what makes LBRY a system controlled by its users. As the credits are distributed primarily among users and producers, it is community itself that has ultimate controls over the catalogue of what is available.

Additionally, bids can also be retracted at any time, even if you’re the current winning bidder. To prevent a name from rapidly switching between multiple resolutions, the parties that have existing control of a name have a reasonable period of time to respond to counter bids before a name’s resolution switches.

It’s possible this system sounds like chaos to you, but we’re betting on a Nobel-prize winning result that predicts the opposite. Economist Ronald Coase theorized that in a system with low transaction cost and clear rules, property will be held by those who value it the most. Since LBRY names are the equivalent to content storefronts, we believe that LBRY names will hold the most value to rightsholders who produce content associated with a given name.

As names in demand on LBRY will be more expensive, the names themselves will also serve as a signal of reputation, legitimacy, and quality. If a user searches LBRY for _Spider Man_ and sees one at lbry://spiderman and one at lbry://spiderman_russhaxor, there will be little doubt that the latter is less legitimate.

<footer>

It is also worth noting that in the event that LBRY received notice that either name contained an illegitimate copy of _Spider Man_, LBRY would dutifully and quickly put that content id on a blacklist, blocking discovery or purchase via any legal services. LBRY and users of LBRY are still subject to the DMCA and other relevant laws of their respective countries.

</footer>

## Combatting The Ugly

As neither naïfs nor knaves, we acknowledge that LBRY can be used for bad ends. Technology is frequently this way. Encryption protects our privacy -- as well as that of terrorists. Cars allow us to travel marvelous distances -- and kill millions per year.

The downside to LBRY is that it can be used to exchange illegal content. However, several factors of LBRY make illicit usage less likely than it may seem at first consideration. On the whole, as with the car and encryption, the benefits of LBRY clearly outway nefarious uses.

To evaluate a technology’s effect, we must consider where it moves us from the current state of affairs, not judge against a Platonic ideal or past eta. In assessing LBRY, we must compare it to a world in which BitTorrent already exists and is quite popular, not the 1950s. LBRY is an improvement over BitTorrent in combatting unsavory content in at least five ways:

1.  **More records.** LBRY contains a public ledger of transactions recording name purchases and content publishings. As many purchases make it onto the ledger as well, this means infringing actions are frequently recorded _forever,_ or are at a minimum widely observable.
2.  **Unilateral removal.** The LBRY naming system allows for quick, unilateral acquisition of infringing URIs. Once a BitTorrent magnet hash is in the wild, there is no mechanism to update or alter its resolution whatsoever. If a LBRY name is pointing to infringing content, it can be seized according to clear rules.
3.  **Blacklists**. LBRY will publish and maintain a blacklist of infringing names. All clients we release and all legal clients will have to follow our blacklist, or one like it, or face substantial penalties. Especially because…
4.  **Stiffer penalties.** Penalties for profiting off of infringement are far stronger and involve can involve jail time, while infringement without profit only results in statutory damages. This serves as a far stronger deterrent for all infringing uses than BitTorrent provides.
5.  **Expensive or impossible.** Offchain settlement will be a requirement for efficient purchases at any significant network size. Settlement providers, ourselves included, will be able to block purchases for infringing content. At significant traffic volume, if infringing content can’t be outright removed or blocked, transaction fees will make it prohibitively expensive.

And of course, let’s not forget that LBRY users are still subject to the DMCA and other laws governing intellectual property. Users who publishing infringing content are still subject to penalties for doing so in exactly the same way they would be via BitTorrent. LBRY only adds to the suite of options available. This makes LBRY a strict improvement over BitTorrent with regards to illegal usages, which provides none of the mechanisms listed.

## Our Values

We want to be the first digital content marketplace to:

1.  **Treat users like adults** LBRY doesn’t play nanny. It encourages individual people to express their own preferences, rather than force our own onto them. We enable consumers to make their own choices about where and who they want to purchase digital content from.
2.  **Operate openly, inclusively, and transparently** Anyone can publish or interact with the LBRY network. No one needs permission from us or anyone else. LBRY encourages all parties to participate in the network, rather than the creation of walled gardens. LBRY is a completely open specification and all code is open source.
3.  **Prove decentralization doesn’t mean infringement** Existing decentralized publishing protocols offer no way for rightsholders to combat or capture profits from illegally shared content. LBRY’s service layer, blacklisting mechanisms, and naming system all improve the status quo.
4.  **Acknowledge modern digital realities and ethical norms** Prohibition has failed at every turn and in every iteration. Regulating human behavior only works when it aligns with moral norms that are shared by the majority of the population. If it is impossible to keep drugs out of prisons, it will never be possible to enforce copyright via analogous tactics on the infinitely less-controlled internet. Instead, focus on enticement. While legal compliance is paramount, concentrate as much as possible on making a system that relies more on giving people no excuse to do the wrong thing.
5.  **Collect no rent**. Whatever an artist or creator charges for their work should go to them. Distributing bits is exceedingly simple. There’s no need to give 45% to YouTube or 30% to Apple. Collecting no rent isn’t just a promise, it’s hard coded. The nature of LBRY means this could never be done -- by us or anyone else.

## TL;DR

Digital art is one of the first goods to evolve beyond scarcity. This evolution is changing the way content is discovered, publicized, paid for and delivered. Heretofore, the lack of transparency and monetization mechanisms in peer-to-peer sharing networks has largely enabled piracy. By equipping a peer-to-peer protocol with a digital currency and transparent decentralized ledger, the LBRY protocol opens the door to a new era of digital content distribution making peer-to-peer content distribution suitable for major publishing housing, self-publishers and everyone in between.

If LBRY succeeds, we will enter a world that is even more creative, connected, and conservatory. We will waste less and we make more. We will create a world where a teenager in Kenya and a reality star in Los Angeles use the same tool to search the same network and have access to the same results -- a world where information, knowledge, and imagination know no borders.

Build our dream with us. Download LBRY at [lbry.io/get](https://lbry.io/get).