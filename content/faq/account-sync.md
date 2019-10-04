---
title: LBRY Account and Balance Syncing
category: getstarted
order: 3
---

LBRY's goal is to provide an experience where account preferences (subscriptions/tags/settings) and wallets (balances, channels, publishes, etc) are synchronized between multiple devices, including LBRY Desktop, Android and LBRY.tv. Subscriptions and tags should be synced for all users on the latest version of our applications. 

At this moment, LBRY has limited wallet syncing features for users who installed apps on multiple devices before 10/4/2019. Today we support the following:

+ New users on LBRY Desktop can sync a new account  
+ New users on LBRY Desktop can sync with their Android account
+ All users on LBRY Android can sync a new account or their Desktop account (if synced)

Over the next few weeks, we'll be expanding this feature to cover existing users and LBRY.tv. It is safe to continue using each device with separate wallets in the meantime. Thank you for your understanding and patience!

If you are having balance issues, please see the [troubleshooting](#troubleshooting) section below. 

*Please note: wallet passwords on Desktop will be disabled for all users until we are able to fully support all sync scenarios. Users who already enabled previously are not affected.*

### Desktop

LBRY Desktop currently supports the wallet syncing feature during the sign in process when the balance is 0 - which is mainly for new installations where users would sync a new account (or to an existing installation, i.e. Android/another device). This means existing users who have a wallet balance and/or are already signed into an account will not be able to sync. If you wish to sync today, see the [expert](#expert) section below. 

Please note: If sign out of your account and need to enable sync again, you'll have to rename your [current default_wallet file](/faq/lbry-directories) to anything other than default_wallet. Do this while shutting down the app (CTRL/CMD-Q to quit) which will ensure the balance is 0 again and you can sign in  and sync back into your account.

### Android

Android users who newly install LBRY Desktop can sync their wallets. You'll be prompted for a password if one was supplied while setting up your Android account. If you have an existing Desktop installation with a balance, we recommend waiting for full support. If you wish to sync up today, see the [expert](#expert) section below. 

LBRY Desktop users who enabled wallet syncing can sync to their Android account. You'll be prompted for a password if one was supplied while setting up your Desktop account. If no password was used, simply click `Use LBRY`. 

### LBRY.tv

Wallets are not currently synced on LBRY.tv but will be in a couple of weeks. Subscriptions have been synced and full tag support is coming soon.

### Troubleshooting

On Android, if you see transactions but not a balance, you can try disabling and re-enabling sync. This should fix the balance. 

On Desktop, if you see transactions but not a balance, you'll need to manually set the default account. This can be done via the [CLI](/faq/how-to-cli). First, run an `account list` command to view all accounts, find the account id that shows coins/certificates, and then run `account set --lbrynet account set --default --account_id=xxxx` with that id. 

### I'm an expert and want to sync up my balances today! {#expert}

The current limitation to our syncing process is that the SDK only supports 1 account (a wallet can have multiple accounts) for many API commands. This means we don't want to allow users with existing balances on multiple devices as it would result in inconsistencies throughout the app experience. Once the SDK expands this support, we'll enable syncing for all scenarios. It is highly recommended to wait for this feature, especially if you have channels and publishes, as transferring them to a new wallet requires a using the [CLI](/faq/how-to-cli) to perform updates on each manually. 

If you wish to sync now on Desktop, you'll need to sign out (see Account drop down / overview page), quit the app, and start it with a fresh wallet - you can send your existing LBC balance to the Android app or [LBRY.tv](https://beta.lbry.tv) if needed. See [our directories FAQ](/faq/lbry-directories) on where to find the default_wallet file to be renamed. On the next startup, a new wallet file will be generated. This will allow you to sync this new wallet with LBRY or sign back into a synced account (i.e. another install or Android).

### I'm having trouble with account syncing, can you help?

We are aware of a couple scenarios where only part of the wallet is synced properly. Check out our [help page](/faq/how-to-report-bugs) on how to reach us if you run into this or need any other assistance. 
