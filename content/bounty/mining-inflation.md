---
category: code
title: Mining Inflation Chart
award: 300
status: available
date: '2018-05-25'
---

LBRY Credits(LBC) are distributed via the blockchain mining process approximately every 150 seconds (2.5 minutes). There is a total supply of 1B credits, of which LBRY [controls 400M](https://lbry.io/faq/credit-policy) for funding, rewarding users and partnerships. The other 600M will be mined over a total of ~20 years from inception (June 2016). 

The [mining schedule](https://lbry.io/faq/block-rewards) details how these credits will be distributed. We are currently in the logarithmically decreasing phase of the mining process where, at the time of this writing (May 20, 2018), the current block reward is 359 LBC. You can find the current block reward by visiting the [explorer](https://explorer.lbry.io) page and clicking the latest block to find the first output. 

The goal of this bounty is to analyze and visualize the impact of mining inflation on coin supply. The end result would be the calculation code and web embeddable supply chart. Click [here](https://www.bitcoinmining.com/how-are-new-bitcoins-created/) to find an example. At a minimum, the x-axis should display dates and the y-axis is the cumulative LBC available.     

Hints:
- [Sample PHP Program](https://drive.google.com/open?id=19LXPIBhZnd-SEnQlrke2tb-ZwESrbK2D) to calculate estimated block reward at any given time.
- Use actual block times from https://explorer.lbry.io (or (Chainquery)[https://github.com/lbryio/chainquery) if it's avialable) for historical data

Bonus: Overlay with circulating supply information from CoinMarketCap.com 
