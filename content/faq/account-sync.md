---
title: lbry.tv account and wallet syncing
category: getstarted
order: 3
---

Users expect consistent experiences across devices and sessions. This includes everything from account preferences to subscriptions to account balances. In the land of central servers, this is straightforward, but in blockchain land, it is tricky. This article explains how we provide this functionality, various options in using it, and it's limitations.

## How it works

1. Every user, whether on LBRY Desktop, Android, or [lbry.tv](https://lbry.tv), has a single wallet file. This file stores your private keys (like a password) that controls your channels and account balances. The keys in this file are the only way to move or spend LBC or publish to your channel.
1. On an ongoing basis, your account preferences and other settings are written to your wallet file.
1. If you create a lbry.tv login and turn on account sync (backup), your wallet file will be backed up to and from a LBRY, Inc. server each time you login and at regular intervals.
1. Each time this happens, your preferences, channels, subscriptions, and other data will be updated on the new device.
1. If your wallet file has a password on it, LBRY, Inc. cannot see into your wallet or do anything with it, including reset your password.

## Using wallet sync

### I want to remove my synced data from lbry.tv

This process is currently manual, please [contact us](/faq/support).

### Sync limitations

As of writing, current limitations are:

- Can't set or change passwords (coming in mid 2020) if you previously did not have one. If you'd like to do this manually, please [contact us](/faq/support).
- On Desktop, if you sign out and back in with a different email, these wallets and accounts will be merged. Do not do this unless it's intentional and you expect the new email to be used by the same person. To prevent this, rename/remove the [default_wallet file in the lbryum/wallets folder](/faq/lbry-directories) and quit the app with Ctrl-Q after signing out.

### Desktop

1. If running the desktop app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click the Settings button in the top right and enable Sync.
1. If you previously had sync configured with a password (i.e on Android), you'll be prompted for this. If you do not remember, please [reach out to us](mailto:hello@lbry.com) so we can remove the existing synced account.

### Android

1. If running the Android app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click your balance or navigate to the Wallet area and you will see the option to turn this on.

### lbry.tv

Syncing is automatically on for lbry.tv users and cannot be disabled. After all, what good would lbry.tv be if you could no longer use it once you signed out! If you have balances on other devices, these will not be reflected at this time.

## I'm having trouble

If you have any trouble using or enrolling in account sync, check out this [FAQ article](/faq/how-to-report-bugs) on how to report this to us.
