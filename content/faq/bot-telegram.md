---
title: How do I use the Telegram bot?
category: bots
order: 1
---

The LBRY Telegram bot is a member of the [official LBRY Telegram group](https://t.me/lbryofficial). And running 24/7 on [lbry.melroy.org](https://lbry.melroy.org).

The bot is able to support you with all your basic questions regarding LBRY, including but not limited to listing the top channels, the LBRY Credit (LBC) price, mining data, address/transaction(s)/tip information and so much more.

**Hint:** Since the bot is part of the channel group, you can directly start typing the command starting with `/`; Telegram can support you by auto-completing the commands. Starting the commands with `!`-sign is also supported.

**Good to know:** LBRY Telegram bot is currently hosted on [gitlab.melroy.org](https://gitlab.melroy.org/melroy/lbry-bot) with a mirror on [Github.com](https://github.com/danger89/LBRY-Bot). You are free to create pull-requests with bug fixes or new features.

## Basic commands

### Help

The only command you really need to remember is `/help`, which should point you in the right direction.

- `/help@LBRY_telegram_bot`

![](https://spee.ch/@Melroy:3/help.png)

### Status

Retrieve Lbrynet, Lbrycrd, Chainquery status. Including current versions of the services used by the bot.

- `/status`

![](https://spee.ch/@Melroy:3/status.png)

### Network info

Get some general LBRY Networking info.

- `/networkinfo`

![](https://spee.ch/@Melroy:3/networkinfo.png)

### Stats

Get blockchain, mining information (hashrate, difficulty and reward) and exchange statistics.

- `/stats`

![](https://spee.ch/@Melroy:3/stats.png)

### Price

Get the latest market price, percentage of change and more.

- `/price`

![](https://spee.ch/@Melroy:3/price2.png)

### Latest content

Get the latest uploaded content, with links to the content.

- `/lastcontent`

![](https://spee.ch/@Melroy:3/lastcontent.png)

### Latest channels

Get the last created channels, with links to the channels.

- `/lastchannels`

![](https://spee.ch/@Melroy:3/lastchannels.png)

### Latest blocks

Get the last 10 mined blocks.

- `/lastblocks`

![](https://spee.ch/@Melroy:3/lastblocks.png)

### Top 10

Top 10 biggest transactions & top 10 most subscribed (popular) channels.

- `/top10`

![](https://spee.ch/@Melroy:3/top10.png)

## Advance commands

There are advanced bot commands that require additional user input.

### File

Retrieve content by URL, with thumbnail and link to the content as well.

- `/file <URL>`

![](https://spee.ch/@Melroy:3/file2.png)

### Tips

Get the top 10 highest tips of the given name (channel or content).

- `/tips <name>`

![](https://spee.ch/@Melroy:3/tips.png)

### Content Tips

Get the top 10 highest tips of given content URI.

- `/contenttips <content URI>`

![](https://spee.ch/@Melroy:3/contenttips.png)

### Transaction

Get transaction information, like amount, block-height, in/out.

- `/transaction <hash>`

![](https://spee.ch/@Melroy:3/transaction.png)

### Address

Get address information, like 'balance'.

- `/address <address>`

![](https://spee.ch/@Melroy:3/address.png)

### Transactions

Get the transaction list of a given address.

- `/transactions <address>`

![](https://spee.ch/@Melroy:3/transactions.png)

### Block

Get block information, like block size, difficulty, confirmations and more.

- `/block <hash or block height>`

![](https://spee.ch/@Melroy:3/block.png)

## Do you have questions?

The bot helps you to answer some basics FAQs as well:

### Why LBRY?

- `/why`

![](https://spee.ch/@Melroy:3/why.png)

### What is LBRY?

- `/what`

### How does LBRY work?

- `/how`

### How long has LBRY existed?

- `/age`

![](https://spee.ch/@Melroy:3/age.png)
