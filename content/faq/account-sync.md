---
title: LBRY Account and Wallet Syncing
category: getstarted
order: 3
---
Users expect consistent experiences across devices and sessions. This includes everything from account preferences to subscriptions to account balances. In the land of central servers, this is straightforward, but in blockchain land, it is tricky. This article explains how we provide this functionality, various options in using it, and it's limitations.

### How It Works
1. Every user, whether on desktop, android, or lbry.tv, has a single wallet file. This file stores your private keys (like a password) that controls your channels and account balances. The keys in this file are the only way to move or spend LBC or publish to your channel.
1. On an ongoing basis, your account preferences and other settings are written to your wallet file.
1. If you create an account with LBRY Inc and turn on account sync, your wallet file will be copied to and from a LBRY, Inc. server each time you login and at regular intervals.
1. Each time this happens, your preferences, channels, subscriptions, and other data will be updated on the new device.
1. If your wallet file has a password on it, LBRY, Inc. cannot see into your wallet or do anything with it, including reset your password.

### Using Wallet Sync
#### Sync Limitations
As of writing, enrolling in wallet sync is not possible if:
- You had a balance prior to October 2019
- You have a balance on multiple separate devices or installs
Additionally, if you sign out of your account and accrue a balance, but then want to enable sync again, this will not work.
We expect these limitations to be removed in subsequent releases. If the above applies to you and you really want to use it immediately, you can follow [these steps](#bypass).

#### Desktop
1. If running the desktop app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click your balance and you will see the option on your wallet page.

#### Android
1. If running the Android app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click your balance or navigate to the Wallet area and you will see the option to turn this on.

#### LBRY.tv
Syncing is automatically on for lbry.tv users and cannot be disabled. After all, what good would lbry.tv be if you could no longer use it once you signed out! If you have balances on other devices, these will not be reflected at this time.  

### Bypassing Limitations {#bypass}
If the above limitations apply to you, you are technically competent, and you do not want to wait, you can use sync today by taking the following steps:
1. Shut down any running LBRY apps or wallet clients.
1. Rename your [current default_wallet file](/faq/lbry-directories) to anything other than default_wallet.
1. Launch LBRY again and sign out. Then sign back in. 
Note that this will leave you with an extra wallet file containing your channels and balance, which you will have to unify.

### I'm Having Trouble
If you have any trouble using or enrolling in account sync, check out this [FAQ article](/faq/how-to-report-bugs) on how to report this to us.
