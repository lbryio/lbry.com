---
title: Odysee.com and LBRY accounts and wallet syncing
category: getstarted
order: 3
---

Users expect consistent experiences across devices and sessions. This includes everything from account preferences to subscriptions to account balances. In the land of central servers, this is straightforward, but in blockchain land, it is tricky. This article explains how we provide this functionality, various options in using it, and it's limitations.

Users can establish accounts on all of our applications, but for some apps, like LBRY android and LBRY desktop, creating an account isn't mandatory. You'll be required to create and account signing up through Odysee.com and confirm the email address. You can sign into existing accounts via the password or via email confirmation. 

## Account passwords and logging in

When signing up for a new account, user will be prompted to set a password and also confirm that the email belongs to them. **It is important to set a strong password to ensure no one else can access your account, LBRY Credits, and published content.**. This password can be reset via email, using the "Forgot Password?" option while logging in, or changed on the Settings page in the app.
Users creating account on Odysee.com will be offered option to [sync](/faq/youtube) their YouTube channel to Odysee. It's also possible to apply to the sync after creating the account. 

![](https://spee.ch/2/b23ed850c8de1a54.png)

If you are logging back in or from another device, you can do so with your account password or via an email confirmation (magic link option). 

![](https://spee.ch/9/944f70da8357d672.png)

### Existing accounts without a password
Users can set a password for existing accounts via the Settings page if password log in is preferred over email confirmation. 

![](https://spee.ch/6/passwords-add.png)

### Resetting account password

On the login screen, you'll have the option to reset an account password via email. Once you get the email, click the confirmation link and setup a new password.

![](https://spee.ch/1/ac248a1824fbe30b.png)

### Changing account password

You can update your account password on the Settings page. You'll be prompted for your old password, and the new one. Existing sessions will be kept active. If you need them signed out for security reasons, please [contact us](/faq/support).

![](https://spee.ch/7/3378478fa7bb3b36.png)

### Account vs encrypted wallet passwords
Account passwords are separate from wallet passwords. Users with encrypted wallets will still be required to enter their wallet password when logging in to Odysee.com and about every 2 weeks when the passwords expire. Setting wallet passwords is a [current limitation](#limitations) of our wallet sync process. 

## How syncing of wallet and account data works

1. Every user, whether on LBRY Desktop, mobile, or [Odysee.com](https://odysee.com), has a single wallet file. This file stores your private keys (like a password) that controls your channels and account balances. The keys in this file are the only way to move or spend LBC or publish to your channel.
1. On an ongoing basis, your account preferences and other settings are written to your wallet file.
1. If you create an email login on LBRY desktop app and turn on account sync (backup), your wallet file will be backed up to and from a LBRY, Inc. server each time you log in and at regular intervals.
1. Each time this happens, your preferences, channels, subscriptions, and other data will be updated on the new device.
1. If your wallet file has a password on it, LBRY, Inc. cannot see into your wallet or do anything with it, including reset your password.

## Using wallet sync

### I want to remove my wallet and synced data from Odysee.com

This process is currently manual, please [contact us](/faq/support).

### Wallet Sync limitations {#limitations}

As of writing, current limitations are:

- Can't set or change wallet passwords (coming in mid 2021) if you previously did not have one. If you'd like to do this manually, please [contact us](/faq/support). Wallet passwords are separate from account passwords, and they cannot be reset or changed if lost/forgotten. LBRY Inc ensures wallet files are secured on their servers and properly hashed in the database, with access locked down to the files. 
- On Desktop, if you sign out and back in with a different email, these wallets and accounts will be merged. Do not do this unless it's intentional and you expect the new email to be used by the same person. To prevent this, rename/remove the [default_wallet file in the lbryum/wallets folder](/faq/lbry-directories) and quit the app with Ctrl-Q after signing out.

### Desktop

1. If running the desktop app for the first time, you will be prompted during the first-run process to create an account, if you want to opt-in to the wallet sync check "Backup your account and wallet data." option.
1. If you want to opt-in later, click the Settings button in the top right and enable Sync.
1. If you previously had sync configured with a password (i.e on Android), you'll be prompted for this. If you do not remember, please [reach out to us](mailto:hello@lbry.com) so we can remove the existing synced account.

### Android

On android you can enable sync from the "Wallet" page.

### Odysee.com

Syncing is automatically on for Odysee.com users and cannot be disabled. After all, what good would Odysee.com be if you could no longer use it once you signed out! If you have a wallet on other devices with sync turned on, it will be reflected here as well.

## I'm having trouble

If you're having any trouble using or enrolling in account sync, check out this [FAQ article](/faq/how-to-report-bugs) on how to report this to us.
