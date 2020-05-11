---
title: lbry.tv accounts and wallet syncing
category: getstarted
order: 3
---

Users expect consistent experiences across devices and sessions. This includes everything from account preferences to subscriptions to account balances. In the land of central servers, this is straightforward, but in blockchain land, it is tricky. This article explains how we provide this functionality, various options in using it, and it's limitations.

Users can establish accounts with lbry.tv on all of our applications. You'll be required to create a password when signing up through lbry.tv and confirm the email address. You can sign into existing accounts via the password or via email confirmation. 

## Account passwords and logging in

lbry.tv users will be prompted to set a password when signing up for a new account and also confirm that the email belongs to them. **It is important to set a strong password to ensure no one else can access your account, LBRY credits, and published content.**. These passwords can be reset via email or changed on the Settings page.

![](https://spee.ch/9/passwords-join.png)

If you are logging back in or from another device, you can do so with your account password or via an email confirmation (magic link option). 

![](https://spee.ch/4/passwords-signin-password.png)

### Existing lbry.tv users without a password
Existing lbry.tv users can set a password via the Settings page if password log in is preferred over email confirmation. 

![](https://spee.ch/6/passwords-add.png)

### Resetting account password

On the login screen, you'll have the option to reset an account password via email. Once you get the email, click the confirmation link and setup a new password.

![](https://spee.ch/9/passwords-reset.png)

### Changing account password

You can update your account password on the Settings page. You'll be prompted for your old password, and the new one. Existing sessions will be kept active. If you need them signed out for security reasons, please [contact us](/faq/support).

![](https://spee.ch/9/update-password.jpg)

### Account vs encrypted wallet passwords
Account passwords are separate from wallet passwords. Users with encrypted wallets will still be required to enter their wallet password when logging into lbry.tv and about every 2 weeks when the passwords expire. Setting wallet passwords is a [current limitation](#limitations) of our sync process. 

## How syncing of account data works

1. Every user, whether on LBRY Desktop, Android, or [lbry.tv](https://lbry.tv), has a single wallet file. This file stores your private keys (like a password) that controls your channels and account balances. The keys in this file are the only way to move or spend LBC or publish to your channel.
1. On an ongoing basis, your account preferences and other settings are written to your wallet file.
1. If you create a lbry.tv login and turn on account sync (backup), your wallet file will be backed up to and from a LBRY, Inc. server each time you log in and at regular intervals.
1. Each time this happens, your preferences, channels, subscriptions, and other data will be updated on the new device.
1. If your wallet file has a password on it, LBRY, Inc. cannot see into your wallet or do anything with it, including reset your password.

## Using wallet sync

### I want to remove my wallet and synced data from lbry.tv

This process is currently manual, please [contact us](/faq/support).

### Sync limitations {#limitations}

As of writing, current limitations are:

- Can't set or change wallet passwords (coming in mid 2020) if you previously did not have one. If you'd like to do this manually, please [contact us](/faq/support). Wallet passwords are separate from account passwords, and they cannot be reset or changed if lost/forgotten.
- On Desktop, if you sign out and back in with a different email, these wallets and accounts will be merged. Do not do this unless it's intentional and you expect the new email to be used by the same person. To prevent this, rename/remove the [default_wallet file in the lbryum/wallets folder](/faq/lbry-directories) and quit the app with Ctrl-Q after signing out.

### Desktop

1. If running the desktop app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click the Settings button in the top right and enable Sync.
1. If you previously had sync configured with a password (i.e on Android), you'll be prompted for this. If you do not remember, please [reach out to us](mailto:hello@lbry.com) so we can remove the existing synced account.

### Android

1. If running the Android app for the first time, you will be prompted during the first-run process to opt-in.
1. If you want to opt-in later, click your balance or navigate to the Wallet area and you will see the option to turn this on.

### lbry.tv

Syncing is automatically on for lbry.tv users and cannot be disabled. After all, what good would lbry.tv be if you could no longer use it once you signed out! If you have a wallet on other devices with sync turned on, it will be reflected here as well.

## I'm having trouble

If you're having any trouble using or enrolling in account sync, check out this [FAQ article](/faq/how-to-report-bugs) on how to report this to us.
