---
title: How does LBRY naming work? Why don’t you just assign names the same way as internet domains?
category: LBRY 101
order: 5
---

### The Problem

Before talking about how names (URLs) in LBRY work, it's important to understand the problem. What is a naming system and why do we have one?

Names exist so that we can map a human readable and understandable word or term to a more difficult to remember number or ID. In the traditional domain system, names map to numerical IP addresses. In LBRY, names map to a unique, permanent ID representing a piece of digital content and/or a publisher identity.

Designing a naming system that works well and fairly assigns names is quite hard! Consider the domain system you are likely using to access this document. Notice that you are reading this page on lbry.io, rather than lbry.com. Is this because lbry.com is providing some productive service? No! It is because a squatter holds it, simply looking to extort money from those who would do something useful or creative.

The traditional system has several other flaws. It is centralized and a mechanism of censorship, as holders do not have true ownership of their domain, only the top-level provider. Top-level domains (like .io) are also arbitrary and largely illogical (if designing the domain system again, would we really want to add an arbitrary ".com" to the most prestigious URL for a given keyword? does LBRY have anything to do with the *I*ndian *O*cean?). Finally, in addition to incentivizing bad behavior, the flat-fee structure of domains prevents good behavior from those who are priced out.

We wanted a system that:

- Allows a single word to be mapped directly to a piece of content, with no other extension or modifier.
- Allows creators to acquire a URL and own it permanently and forever, without ongoing fees.
- Allows multiple pieces of content to be located at a single keyword, while keeping URLs as short and memorable as possible.
- Prevents squatters from extorting creators.

After significant consultation with creators, consumers, economists, computer scientists, and more, we devised LBRY’s naming system.

### How LBRY Does Naming

First and foremost **it is absolutely possible to own and control a URL forever**.

In LBRY, a URL entry is called a _claim_. For simplicity, a claim can be considered to consist of:

- The name (a string of characters chosen by the creator)
- An amount of credits
- Additional data related to the content and/or publisher identity

Claims in LBRY are non-consumptive. When you designate an amount of credits in a claim, nothing is lost or destroyed beyond the relatively minimal transaction fee. At any time, the credits allocated to a claim can be used for another purpose, recovered, or sent somewhere else. When this happens, the claim is no longer considered valid.

LBRY supports several types of URL resolution:

| Type | Syntax | Resolution |
| --- | --- |
| **Permanent** | `lbry://<name>#<claim_id>` | This URL consists of a name and randomly assigned ID. This is permanently owned and controlled by the publisher. Permanent URLs support partial, temporal-ordered ID matching, so these can be quite short (e.g. lbry://name#8 or lbry://name#ab) |
| **Community** | `lbry://<name>` | Of all of the claims named `<name>`, this returns the publish with the most credits committed towards it, not just by the publisher, but by the entire community. These URLs are not permanent or owned, but instead controlled by the community itself, allowing the resolution to settle on that which the community determines most appropriate. |
| **Channel** | `lbry://<@channel_name>` | A URL corresponding to a publisher identity. These resolve to the identity of a specific publisher and their publishes. Channel URLs can be specified with or without the `#` modifier. An unmodified URL returns the channel determined by the community.
| **Signed** | `lbry://<@channel_name>/<example>` | The piece of content published to the name `<example>` within the channel  of `<@channel_name>`.

### Takeaways

1. **Names aren’t bought, only reserved – no credits are lost, only put on deposit.** If you win the auction for a name, your credits are held with that name until you decide to withdraw them (at any time you wish). You aren’t buying the name from anyone and no one profits off of the transfer of names. It’s just a test of who is willing to deposit the most credits toward a name. The only cost is that you can’t spend the credits on content or cash them out while they are reserving a name.

2. **The longer a community name is held, the longer it sticks.** Community-controlled URLs don't change instantly if more credits are designated – especially if you’ve held it for awhile. For every month a name is controlled, 1 day is added to the waiting period, for a maximum of 7 days (after 7 months). 

3. **Everyone has a say.** If you claim lbry://bestmovieever and your film lives up to the hype, user tips and purchases are a strong force keeping your content there. If the community feels a URL resolution is incorrect, they can band together to change it any time. This is a powerful force keeping bad actors at bay that has already proved useful.

4. **Names are more like search terms.** When a user searches the LBRY network, or a recommendation engine suggests content, all valid claims are considered. Not having the community URL for your content does not mean no one will see it. Many different pieces of content under the same name can be displayed when users look for content on the network.

For more details on claims, please see https://lbry.io/faq/claimtrie-implementation

### Experimentation

Whether you're in love with this design or not, you'd likely agree it's unlike anything we've seen before. 

The bottom line is that LBRY is dedicated to providing true content freedom. We want to provide the world's best method for creators and consumers to share and monetize digital content without middlemen. We happen to think this is a superior method to the alternatives, but we're also not dogmatic about it. 

We’re trying to solve a very hard problem in a novel way and we're committed to giving this system a chance. 100,000 pieces of content in, it has worked seamlessly. But if we ever saw this system harming rather than helping, we wouldn't hesitate to change it.
