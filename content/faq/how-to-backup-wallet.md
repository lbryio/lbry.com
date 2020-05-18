---
title: How do I back up my LBRY wallet?
category: wallet
---

LBRY relies on blockchain technology and the LBRY Credits (LBC) cryptocurrency in order to participate in the network. These LBC are stored in a wallet (data file on your PC/device if using Desktop/Mobile) which is generated with each LBRY installation...think of your credits as digital cash on your PC. A wallet contains your funds, channel data, claims (any uploads), and preferences (subscriptions/tags/etc).

## Two ways to backup your wallet

### lbry.tv sync

An Account Sync service is provided automatically on [lbry.tv](https://lbry.tv) and can be enabled on Desktop/Mobile which allows LBRY to store a backup of the wallet for you. [Learn more](/faq/account-sync).

### User maintained backup

Otherwise, it is important to understand that the wallet is not stored on any LBRY servers (except when [sync](#sync) is enabled) and as such, users are responsible for its safeguarding and making sure [a backup](/faq/how-to-backup-wallet) (copy of the wallet file) is available in the event that it is lost. If a wallet is lost or needs to be transferred, follow the [restore procedures below](#restore).

_Note: If you are not using the sync service, wallets should be re-backed up after creating new Channels/Identities (this is stored directly in the wallet file, and not part of the seed/restore process at the moment)._

## How do I find my wallet in LBRY Desktop?

The easiest way to find the location of your LBRY wallet is via the [LBRY app](/get). Open LBRY and on the left side, you should see a sidebar menu called "Help" - the wallet location is in the **Backup Your LBRY Credits** section.

## How do I backup my LBRY Desktop wallet?

Click on "Help" and scroll down to the **Backup Your LBRY Credits** section.

When you click **Create Backup**, the app will generate a zip file of your wallet directory. You'll be directed to the folder it's saved to.

Wallet backups should be copied securely to one or more locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits. Backing up is the process by which you copy the wallet files from your PC to another secure location. We recommend using Flash Drives/USBs or other external media which is kept in your possession. It is recommended to copy the wallet to more than one backup location for redundancy, especially if you are storing larger amounts of credits.

## How do I find my wallet if I don't have LBRY open?

The LBRY wallet can be found manually by navigating to the [lbryum directory](/faq/lbry-directories). The `default_wallet` file is inside the `wallets` folder.

## How do I back up my wallet on lbry.tv?

lbry.tv user's wallets are automatically backed up by us. If you want a copy for yourself, you'll need to install the Desktop or Android applications and follow the steps in this FAQ.

## How do I find my wallet in the LBRY Android app?

The easiest way to find the location of your LBRY Android wallet is via the [Android App](https://play.google.com/store/apps/details?id=io.lbry.browser). To find your wallet in the LBRY Android app, click on the 3 horizontal bars at the upper left side of the App next to `Discovery`. Clicking on it will open a side bar and then click on wallet. This will open the wallet page.
![Find wallet](https://spee.ch/b3535b68750ad69c48566cb028c67d323d1fdeb9/walli.jpg)

## How do I backup my LBRY Android app wallet? {#android}

The Android wallet will be removed if you uninstall the app or clear data or do not participate in the [sync](#sync) program. Scroll to the top of this page to learn more about your wallet.
_Please note that this may vary with each Android device_

1. Open your favorite file manager, navigate to `Internal storage/android/data/io.lbry.browser/files/lbryum/wallets`
2. Copy the default_wallet to any other location on your device, i.e. your SD card or another directory on the Internal Storage

## How do I restore my wallet? {#restore}

The process of restoring a previously backed up wallet is fairly simple. After installing LBRY, you would find the location of your wallet (see section above on finding the wallet) and replace the newly generated wallet with your backup copy (LBRY needs to be completely shut down with Ctlr-Q). Before replacing the existing `default_wallet`, please confirm there are no credits inside of it by opening the LBRY app and checking the balance in the top right next to the bank icon - this should read 0 if the wallet is empty. Once the backed up `default_wallet` file is in place, start LBRY, and your balance should now be updated.

## Can I use the same wallet on multiple PCs / installations?

We'd recommend using the [Account Sync service](/faq/account-sync) if you plan to use LBRY on multiple devices. You can manually copy the wallet to multiple devices and transactions will stay in sync, but newly created channels and changes to subscriptions/tags will not.

## How do I backup/migrate other LBRY data?

Please refer to our [backup/migrate data FAQ](https://lbry.com/faq/backup-data).

## I need help with backup or recovery, who can I reach out to?

We are always here to help - check out our [help page](/faq/support) on how to reach us.
