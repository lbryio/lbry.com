---
title: How to use the Telegram Bot?
category: bots
order: 3
---

# LBRY Telegram bot

LBRY Telegram bot is currently hosted on [gitlab.melroy.org](https://gitlab.melroy.org/melroy/lbry-bot) with a mirror on [Github.com](https://github.com/danger89/LBRY-Bot).

LBRY Telegram bot is member of the [LBRY official Telegram group](https://t.me/lbryofficial). And running 24/7 on [lbry.melroy.org](https://lbry.melroy.org).

The bot is able to support you with all your basic questions regarding LBRY, including but not limited to listing the top channels, the latest LBRY token (LBC) price, mining data, address/transaction(s)/tip information and so much more.

**Hint:** Since the bot is part of the channel group, you can directly start typing the command starting with `/`; Telegram could support you by autocompleting the commands. Starting the commands with `!`-sign is also supported.

## Basic commands

### Help

The only command you really need to remember is `/help`, would should point you into into the right direction.

- `/help@LBRY_telegram_bot`

![photo](help..)

### Status

Retrieve Lbrynet, Lbrycrd, Chainquery status. Including current versions of the services used by the bot.

- `/status`

### Network info

Get some general LBRY Networking info.

- `/networkinfo`

### Stats

Get blockchain, mining and exchange statistics.

- `/stats`

### Price

Get the latest market price, percentage of change and more.

- `/price`

### Last content

Get the last uploaded content, with links to the content.

- `/lastcontent`

### Last channels

Get the last created channels, with links to the channels.

- `/lastchannels`

### Last blocks

Get the last 10 mined blocks.

- `/lastblocks`

### Top 10

Top 10 biggest transactions & top 10 most subscribed (popular) channels.

- `/top10`

## Advance commands

Some more advance bot commands that require additional user-input.

### File

Retrieve meta file content, with thumbnail and link to the content as well.

- `/file <uri>`

### Tips

Get the top 10 highest tips of given name (channel or content).

- `/tips <name>`

### Content Tips

Get the top 10 highest tips of given content URI.

- `/contenttips <content URI>`

### Transaction

Get transaction information, like amount, block-height, in/out.

- `/transaction <hash>`

### Address

Get address information, like 'balance'. 

- `/address <address>`

### Transactions

Get the transaction list of a given address.

- `/transactions <address>`

### Block

Get block infomation, like block size, difficulty, confirmations and more.

- `/block <hash or block height>`

## Do you have questions?

The bot helps you to answer some basics FAQs as well:

### Why LBRY?

- `/why`

### What is LBRY?

- `/what`

### How does LBRY work?

- `/hpw`

### How long does LBRY exists?

- `/age`

### FAQ

Other frequently asked questions can be found [here](https://lbry.com/faq).

- `/faq`
