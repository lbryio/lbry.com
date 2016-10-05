---
category: code
title: Modified Block Explorer
award: 1500
status: complete
date: '2016-07-01'
---

LBRY currently maintains and runs a block explorer at [explorer.lbry.io/](https://explorer.lbry.io/).

This explorer is a fork of Iquidus Explorer and is [on Github](https://github.com/lbryio/lbry-explorer).

Iquidus explorer is great, but does not currently support LBRY specific operations.

The explorer should be modified to:

- Display name claims in a transaction and link to claim info provided a txid
- Display a support transaction and link to claim info provided a txid
- Display claim information (name, claim txid, value, total amount, supports, and previous updates) provided a claim id
- Display information for contesting name claims provided a lbry name

This will likely require polling for changes in the result of `lbrycrd-cli getclaimsintrie` after each block, and subsiquently populating values from `lbrycrd-cli getclaimsforname` and `lbrycrd-cli getclaimsfortx`. 
