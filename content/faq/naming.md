---
title: LBRY’s naming system seems kinda crazy. Why don’t you just assign names the same way as internet domains?
category: LBRY 101
---
First, it’s important to know that assigning names well is a difficult problem in centralized systems. It becomes nearly impossible in decentralized ones. Just because we’re all accustomed to certain solutions doesn’t mean they aren’t seriously flawed.

Let’s look at the internet’s standard domain name system (DNS). DNS is a centralized service run by an organization called ICANN. ICANN grants registrars the ability to lease domain names for 1-year terms. Registrars pay enormous fees to participate in this system, and individuals/companies can end up paying substantial fees to maintain a particular domain. That is to say, ICANN is a pretty lucrative racket for those involved.

And the results aren’t even that good! Not only are domain names still very awkward (http://www.THENAMEIWANT.somethingelse), but they are highly vulnerable to squatters. Domain name squatting has become an industry unto itself, with speculators viewing it like owning real estate. Unfortunately, as with real estate, the market is opaque and transaction costs are high. Unlike real estate, the scarcity of ICANN domains is basically artificial, depending on a committee to approve new top-level domains (TLDs) at their whim.

So we thought, “what if there were a better way?” Consulting with economists, we devised LBRY’s nameclaim system. LBRY supports two claim types:

| Type | Syntax | Resolution |
| --- | --- |
| **Permanent** | `lbry://nameiwant#uniqueRandomID` | Owned forever by the first claimant. |
| **Vanity** | `lbry://nameiwant` | Controlled by the party committing (like voting) with the most credits. |

Our bet is that vanity names will be controlled by the people who get the most value out of them – which is almost always the creator of the content. Radiohead would get a lot more value out of lbry://amoonshapedpool than a squatter, pirate, or troll.

Before jumping to conclusions about the system for vanity URLs, here are a few key details:

1. **Names aren’t bought, only reserved – no credits are lost, only put on deposit.** If you win the auction for a name, your credits are held with that name until you decide to withdraw them (at any time you wish). You aren’t buying the name from anyone and no one profits off of the transfer of names. It’s just a test of who is willing to deposit the most credits toward a name. The only cost is that you can’t spend the credits on content or cash them out while they are reserving a name.

2. **The longer a name is held, the longer the holder has to counterbid.** You don’t just lose the name immediately if a bigger bidder comes along – especially if you’ve held it for awhile. The time to counterbid scales up to ~1 week.

3. **Other users can pledge credits to support the nameclaim of a creator they like.** If you claim lbry://bestmovieever and your film lives up to the hype, users may show their support by pledging some credits to make sure you hold onto that name.

4. **Names are not like Youtube channels; they’re more like search terms.** Publishers will each get a unique ID that serves as their “channel” and shows all the content they upload. This ID will form permanent links so you can embed your videos on websites and include the link in promotional materials. The bidding system is only meant to get traffic from users trying to “discover” your content through the naming system. Since every comedy video would want to be at lbry://comedy, the nameclaim system allows the name to go to the creator who can make the most revenue off of it.

No doubt it is unlike anything we've seen before on the net. For creators, it's a tradeoff. You might lose a valuable name, but you also don't have to worry about people squatting on the best names. Squatting has plagued projects like Namecoin and is only (poorly) resolved by ICANN at the cost of much expense and centralization.

Our economic advisor Alex Tabarrok notes:

>“Auctions have many great properties, but the public doesn’t like auctions very much. Although participating in an auction is fun for some; others find it annoying. It requires inputs of time and risk, and no one likes being outbid at the last minute.”

So, the short answer is that we’re aware that this an experiment within an experiment. We’re trying to solve a very hard problem in a novel way. It’s important to note that LBRY doesn't depend on the naming system, but we're committed to giving it a chance.
