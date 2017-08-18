---
title: How does LBRY naming work? Why don’t you just assign names the same way as internet domains?
category: LBRY 101
order: 5
---

#### The problem we're solving:

Assigning names is a difficult problem in centralized systems and it becomes nearly impossible in decentralized ones. We are taking a unique approach to a pre-existing naming system that has existed in centralized architecture in a decentralized way.

Let’s look at the internet’s standard domain name system (DNS). DNS is a centralized service run by an organization called ICANN. ICANN grants registrars the ability to lease domain names for 1-year terms. Registrars pay enormous fees to participate in this system, and individuals and companies can end up paying substantial fees to maintain a particular domain.

The end product of domain names can be very confusing. Domain names can be very awkward and are highly vulnerable to squatters. Domain name squatting has become an industry unto itself, with speculators viewing it like owning real estate.  This isn't our vision for LBRY.

#### How naming in LBRY works:

First and foremost
**it is absolutely possible to own and control a URI forever**.

Consulting with economists, we devised LBRY’s nameclaim system. LBRY URIs support four types of resolution:

| Type | Syntax | Resolution |
| --- | --- |
| **Permanent** | `lbry://<name>#<claim_id>` | A fixed id for a claim to a name, this id stays the same if the claim is updated. |
| **Vanity** | `lbry://<name>` | The claim to the name with the most credits committed towards it (like voting) - the sum of the credits committed in the claim and any claim supports. |
| **Channel** | `lbry://<@channel_name>` | A claim containing a public key, the private counterpart is used for signing other name claims. Channel claims can be specified in the uri with the `#` modifier, and the unmodified uri has vanity resolution. |
| **Signed** | `lbry://<@channel_name>/<example>` | The claim to `<example>` in the channel of (signed by) `<@channel_name>`. The channel claim defaults to the vanity resolution, but can be specified with the `#` modifier given before the `/`.

#### What is a claim?</br>

Claims are vanity names will be controlled by the people who get the most value out of them. For example, Radiohead would get a lot more value out of lbry://amoonshapedpool than a squatter, pirate, or troll.

Claims are a human readable name that contains serialized data, which allows it to store a data for a specific purpose, or to point to something else.  Currently claims contain encoded channel identities and download streams.  This format is flexible, allowing support for many use cases to be added.

Here are a few key things to takeaway:

1. **Names aren’t bought, only reserved – no credits are lost, only put on deposit.** If you win the auction for a name, your credits are held with that name until you decide to withdraw them (at any time you wish). You aren’t buying the name from anyone and no one profits off of the transfer of names. It’s just a test of who is willing to deposit the most credits toward a name. The only cost is that you can’t spend the credits on content or cash them out while they are reserving a name.

2. **The longer a claim name is held, the longer the holder has to counterbid.** You don’t just lose the name immediately if a bigger bidder comes along – especially if you’ve held it for awhile. The time to counterbid scales up to ~1 week.

3. **Other users can pledge credits to support the nameclaim of a creator they like.** If you claim lbry://bestmovieever and your film lives up to the hype, users may show their support by pledging some credits to make sure you hold onto that name.

4. **Names are not like Youtube channels; they’re more like search terms.** Publishers can use a claim to a name for much the same purpose, with a "channel" claim. The uri for these claims support allow specifying other claims made by that publisher easily, like `lbry://@UCBerkeley/ucb-P7Wjq025f-Q` or `lbry://@oscopelabs/itsadisaster-sd`. Additionally, with the `#<claim_id>` syntax publishers have uris that are permanent and embeddable, where resolution is not subject to the bidding system. The only time these claims cannot be resolved is if the publisher removes the specified claim. The bidding system is only meant to get traffic from users trying to discover your content through the naming system. Since every comedy video would want to be at `lbry://comedy` the nameclaim system allows the name to go to the creator who can make the most revenue off of it.

For more details on claims, please see https://lbry.io/faq/claimtrie-implementation

#### Experimentation:

This approach is unlike anything we've seen before. For creators, it's a tradeoff. You might lose a valuable name, but you also don't have to worry about people squatting on the best names. Squatting has plagued projects and we are hopeful that this approach provides a good solution.

Our economic advisor Alex Tabarrok notes:

>“Auctions have many great properties, but the public doesn’t like auctions very much. Although participating in an auction is fun for some; others find it annoying. It requires inputs of time and risk, and no one likes being outbid at the last minute.”

We’re aware that this is an experiment within an experiment. We’re trying to solve a very hard problem in a novel way. It’s important to note that LBRY doesn't depend on the naming system but we're committed to giving it a chance.
