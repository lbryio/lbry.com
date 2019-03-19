---
category: code
title: Hardware Wallet Integration
award: 750
status: available
date: '2018-05-25'
---

Since LBRY is a fork of Bitcoin Core, integrating into existing hardware wallet platforms should be fairly straightforward. Two of the most popular hardware wallet platforms are Ledger and Trezor. You can find all the LBRY specific blockchain modifications on our [LBRYcrd GitHub repo](https://github.com/lbryio/lbrycrd) and more specifically in the [chain params code](https://github.com/lbryio/lbrycrd/blob/master/src/chainparams.cpp).

The Trezor integration is a bit more involved and thus includes a 30% bonus on top of the stated bounty amount.
- [Ledger GitHub](https://github.com/LedgerHQ/ledger-nano-s) - Ledger Nano GitHub respository with guidelines on how to develop. This will involve setting up their SDK and creating a Chrome app.
- [Trezor GitHub](https://github.com/trezor) - Please see Trezor's [developer guide](https://doc.satoshilabs.com/trezor-tech) for more information on integrations.

Status:
Ledger - In Progress:
https://github.com/LedgerHQ/ledger-live-common/pull/49
https://github.com/LedgerHQ/blue-app-btc/pull/47
https://github.com/LedgerHQ/lib-ledger-core/pull/24
