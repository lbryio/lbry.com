---
category: code
title: Modified Block Explorer
award: 1500
status: available
date: '2016-07-01'
---

LBRY currently maintains and runs a block explorer at [explorer.lbry.io/](https://explorer.lbry.io/).

This explorer is a fork of Iquidus Explorer and is [on Github](https://github.com/lbryio/lbry-explorer).

Iquidus explorer is great, but does not currently support LBRY specific operations.

The explorer should be modified to:

- Display LBRY name claim and support transactions
- Exploration of contesting and updated name claims in a way similar to transactions

The relevant information can be obtained from ` lbrycrd-cli getclaimsfortx ` and ` lbrycrd-cli getclaimsforname `.
