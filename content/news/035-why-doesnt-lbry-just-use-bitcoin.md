---
author: samuel-lbryian
title: Why Doesn't LBRY Just Use Bitcoin?
date: '2016-03-17 13:31:10'
cover: 'why-not-bitcoin2.jpg'
cover-light: true
---

LBRY employs blockchain technology but doesn't use Bitcoin itself. Instead, we use our own cryptocurrency, LBRY Credits (LBC).

Perhaps the most-asked question we receive is: Why have you created LBC, rather than using Bitcoin? Wouldn't it be simpler to employ an existing cryptocurrency already in wide use around the world, rather than make a whole new one? Aren't there already way too many cheap Bitcoin knockoffs floating around?

There are three important reasons why we must use LBC instead of Bitcoin. Some of it is highly technical, so please bear with us as we attempt to translate into plain English.

### Reason #1 – Using LBC instead of Bitcoin makes verifying content ownership possible for lightweight clients.

In blockchain-based systems, data (in the case of Bitcoin, transactions) are grouped into multiple packages called blocks. These blocks are "chained" one after another to form the public ledger known as the blockchain. Each block starts with a block header, a comparatively tiny piece of data, which has some metadata about the block such as the time it was mined and a reference to the block that came before it. That metadata also includes a cryptographic value which can be used to prove to someone who doesn't have (or want) the whole block, but has all of the block headers, that a given transaction was included in that block and therefore into the blockchain. This is used by so-called *lightweight clients*, which make it possible for people to use bitcoin on devices that wouldn't be able to handle the full blockchain, like web browsers and smartphones.

LBC block headers contain an additional piece of information: a value which can be used to cryptographically prove to lightweight clients that a particular name maps to a particular value, according to LBRY's unique naming system. For example, when a lightweight client asks, "What content does the name 'wonderfullife' refer to?", a client with a full copy of the LBC blockchain can send back the answer and prove using cryptography that it has given the correct answer. Without that additional piece of information in the block header, lightweight clients (web browsers and smartphones) would not be able to securely use LBRY.

This is necessary for LBRY because unlike systems built on Bitcoin or other existing altcoins, LBRY's naming system assigns ownership over content through an ongoing auction. Whoever pledges the most credits against a name holds it, subject to a defined window for a counter-bid. These bids are stored in a special tree-shaped data structure on the hard drives of all miners. Whenever the winning bid for a name changes, that change has an effect which spreads all the way up the tree and into the special piece of information stored in LBC block headers.

### Reason #2 – LBRY could easily overwhelm the maximum transaction volume allowed by Bitcoin.

LBRY intends to thrive on microtransactions that are looking increasingly implausible with Bitcoin. By now, everyone interested in cryptocurrency is all-too-intimately familiar with the limitations of Bitcoin's current block size. Currently, Bitcoin has a limit of one megabyte of data per block. If enough transactions happen over the network that the one-megabyte limit is reached, all additional transactions are considerably delayed. That's why we're currently seeing reports of transaction times in the high double-digits.

The problem is a double bind. If the block size stays low, then transactions grind to a halt as volume goes up. But if the block size grows to accommodate greater volume, then the blockchain gets too big for most miners to validate it, which pushes towards centralization. A different approach altogether is needed, one that allows the platform to scale while not taking away from its distributed nature. We think a [lightning micropayment network](https://lightning.network) is the answer, but it requires some changes to Bitcoin that might not happen in a timely fashion, as they have to be approved by a supermajority of miners. Because LBC is new, our smaller mining pool could more readily incorporate lightning networks when they're ready for primetime.

If LBRY starts growing exponentially, we don't want to worry about contributing to the delinquency of the Bitcoin blockchain by overwhelming it with microtransactions. And in the immediate future, we don't want to see payments to artists eaten up by Bitcoin's rising fees.

### Reason #3 - Decentralization and independence are good for progress.

One of the main draws of Bitcoin has always been its relative decentralization of control and independence from existing legal and financial systems. Similarly, using LBC as an "appcoin" gives LBRY some healthy autonomy from Bitcoin while allowing for the technical innovations explained above.

An appcoin, as described by LBRY's Mike Vine on [Decentral Vancouver's "#Blocktalk"](http://blog.lbry.io/lbry-desktop-sneak-peak-big-questions-answered-lbry-on-blocktalk-last-night) and in [CoinTelegraph](http://cointelegraph.com/news/the-appcoin-revolution-interview-with-mike-vine-of-lbry), is a cryptocurrency that is designed specifically to power an application, with only that application's precise functions in mind. The purpose of this appcoin is not to compete for a better form of money than Bitcoin, but to function as a special purpose tool in ways Bitcoin cannot. Creating a special tool in the form of a new coin allows us to start fresh, customizing features like the initial allocation and blockchain rules.

In the early days of our protocol, LBRY Inc. will be making a concerted effort to deploy LBC in a non-neutral way. We will be incentivizing early adopters, amazing content publishers, and even nonprofits which share our vision of a free and open internet. We will be retaining a portion to finance the continued development of the ecosystem. LBRY Credits will work on behalf of development of the LBRY content distribution network, not the other way around.

Bitcoin was created as a grand experiment to demonstrate blockchain technology and liberate the world from legacy banking, but it couldn't possibly have been designed to be all things to all applications. We believe our appcoin is the best tool to succeed at our mission of putting every film, song, book, and game ever made onto a blockchain – without trying to displace Bitcoin as a global currency.

### Wait! This is also relevant to your interests.

Converting from fiat money to cryptocash is hard. But converting between cryptos is super-easy, especially since the launch of [ShapeShift.io](http://www.shapeshift.io). So LBRYians can earn LBC and quickly convert it to BTC to save or spend. And Bitcoiners can easily convert a bit of their holdings to LBC to get great content on the LBRY network.

One of our key goals is for LBRY/LBC to be easy to access for everyday people. Initially, users will get some just for downloading the app. And anyone will always be able to earn LBC by offering some of their disk space to store encrypted file slices for the LBRY network. Because it won't involve linking bank accounts to exchanges or even converting any of their precious fiat, we hope LBC will serve as an easy entry point for John Q. Public into the world of cryptocurrency. They might not even realize at first that's what they're using!
