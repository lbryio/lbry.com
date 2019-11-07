---
title: How do I back up my LBRY wallet?
category: wallet
---

The LBRY application relies on blockchain technology and the LBRY Credits (LBC) cryptocurrency in order to participate in the network. These LBC are stored in a wallet (data file on your PC/device) which is generated with each LBRY installation...think of your credits as digital cash on your PC. A wallet contains your funds, channel data, and claims (any uploads). An Account Sync service is provided by LBRY where an encrypted copy of your wallet is stored securely by us. Strong wallet passwords are highly recommended if this service is used. [Learn more](/faq/account-sync).

Otherwise, it is important to understand that the wallet is not stored on any LBRY servers (except when [sync](#sync) is enabled) and as such, users are responsible for its safeguarding and making sure a backup (copy of the wallet file) is available in the event that it is lost. If a wallet is lost or needs to be transferred, follow the [restore procedures below](#restore).

*Note: If you are not using the sync service, wallets should be re-backed up after creating new Channels/Identities (this is stored directly in the wallet file, and not part of the seed/restore process at the moment).*

## Wallet Account Sync {#sync}

LBRY provides a wallet backup service by securely backing up your account and preferences. [Learn more here](/faq/account-sync).

## How do I find my wallet in the LBRY Desktop App?

The easiest way to find the location of your LBRY wallet is via the [LBRY app](/get).  Open LBRY and on the left side, you should see a sidebar menu called "Help" - the wallet location is in the **Backup Your LBRY Credits** section. 

## How do I backup my LBRY Desktop App wallet?
Click on "Help" and scroll down to the **Backup Your LBRY Credits** section. Open the location of the link in your local machine and make a copy of the files stored in that location. If this link is grayed out, it usually means you don't have any credits (see section below on how to manually find the wallet).

When you click `Backup`, you will be shown the location of your `lbryum` directory that contains the wallet file.  Navigate to this directory via your file explorer to locate your wallet. You can either choose to backup this whole directory, the wallets directory inside it or the `default_wallet` file itself inside the wallets directory.

Wallets should be copied securely to one or more locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits. Backing up is the process by which you copy the wallet files from your PC to another secure location. We recommend using Flash Drives/USBs or other external media which is kept in your possession. It is recommended to copy the wallet to more than one backup location for redundancy, especially if you are storing larger amounts of credits.

We will continue to make this process easier for users in the future through the LBRY application.

## How do I find my wallet if I don't have LBRY open?

The LBRY wallet can be found manually by navigating to the [lbryum directory](/faq/lbry-directories). The `default_wallet` file is inside the wallet's folder.

## How do I find my wallet in the LBRY Android app?

The easiest way to find the location of your LBRY Android wallet is via the [Android App](https://play.google.com/store/apps/details?id=io.lbry.browser). To find your wallet in the LBRY Android app, click on the 3 horizontal bars at the upper left side of the App next to `Discovery`. Clicking on it will open a side bar and then click on wallet. This will open the wallet page.
![Find wallet](https://spee.ch/b3535b68750ad69c48566cb028c67d323d1fdeb9/walli.jpg)

## How do I backup my LBRY Android app wallet? {#android}
The Android wallet will be removed if you uninstall the app or clear data or do not participate in the [sync](#sync) program. Scroll to the top of this page to learn more about your wallet.
*Please note that this may vary with each Android device*
1. Open your favorite file manager, navigate to `Internal storage/android/data/io.lbry.browser/files/lbryum/wallets`
2. Copy the default_wallet to any other location on your device, i.e. your SD card or another directory on the Internal Storage

## Wallet migration with 0.30 SDK release {#migration}

If you have run one of the latest Desktop or Android releases, you'll notice a file named `old_lbryum_wallet_1` in your wallets folder. This is a backup prior to the migration to the new wallet that's part of the 0.30 LBRY SDK release. This can be backed up for safekeeping or discarded if your current wallet is showing the right balance, claims and channels.

## How do I restore my wallet? {#restore}

The process of restoring a previously backed up wallet is fairly simple. After installing LBRY, you would find the location of your wallet (see section above on finding the wallet) and replace the newly generated wallet with your backup copy (LBRY needs to be completely shut down when you do so). Before replacing the existing `default_wallet`, please confirm there are no credits inside of it by opening the LBRY app and checking the balance in the top right next to the bank icon - this should read 0 if the wallet is empty. Once the backed up `default_wallet` file is in place, start LBRY, and your balance should now be updated.

## Can I use the same wallet on mulitple PCs / installations?

As of LBRY SDK 0.30 (December 2018), you can copy the default_wallet file to multiple installations and have them synced. You can even do so between PC + Android, as long as the wallet is not encrypted (Android does not support encryption yet). The only thing that won't sync at the moment is channels that are created after the file is copied (the file would need to be copied again to access the channels).

## How do I backup/migrate other LBRY data?

Please refer to our [backup/migrate data FAQ](https://lbry.com/faq/backup-data).

## I need help with backup or recovery, who can I reach out to?

We are always here to help - check out our [help page](/faq/support) on how to reach us.
