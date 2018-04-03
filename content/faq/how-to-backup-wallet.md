---
title: How do I back up my LBRY wallet?
category: wallet
---
The LBRY application relies on blockchain technology and the LBRY Credits (LBC) cryptocurrency in order to participate in the network. These LBC are stored in a wallet (data file on your PC) which is generated on each user's PC when they install LBRY. Think of your credits as digital cash on your PC. It is important to understand that the wallet is not stored on any LBRY servers and as such, users are responsible for its safeguarding and making sure a backup (copy of the wallet file) is available in the event that it is lost. Wallets should be backed up periodically to ensure the most up to date information is available.     

## How do I find my wallet?

The easiest way to find the location of your LBRY wallet is via the [LBRY app](https://lbry.io/get).  Open LBRY and then go to your wallet (bank icon in the top right of the screen). In the Balance section, you will see a link for `Backup`, click this. If this link is grayed out, it usually means you don't have any credits (see section below on how to manually find the wallet). 

When you click `Backup`, you will be shown the location of your `lbryum` directory that contains the wallet file.  Navigate to this directory via your file explorer to locate your wallet. You can either choose to backup this whole directory, the wallets directory inside it or the `default_wallet` file itself inside the wallets directory. 

## How do I backup my wallet?

Wallets should be copied securely to one or more locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits. Backing up is the process by which you copy the wallet files from your PC to another secure location. We recommend using Flash Drives or other external media which is kept in your possession.  It is recommended to copy the wallet to more than one backup location for redundancy, especially if you are storing larger amounts of credits.

We will continue to make this process easier for users in the future through the LBRY application. 

## How do I find my wallet if I don't have LBRY open? 

The LBRY wallet can be found manually by navigating to the [lbryum directory](https://lbry.io/faq/lbry-directories). The `default_wallet` file is inside the wallets folder. 

## How do I restore my wallet?

The process of restoring a previously backed up wallet is fairly simple. After installing LBRY, you would find the location of your wallet (see section above on finding the wallet) and replace the newly generated wallet with your backup copy (LBRY needs to be completely shut down when you do so). Before replacing the existing `default_wallet`, please ensure there are no credits inside of it by opening the LBRY app and checking the balance in the top right next to the bank icon - this should read 0 if the wallet is empty. Once the backed up `default_wallet` file is in place, start LBRY, and your balance should now be updated. 

## I need help with backup or recovery, who can I reach out to?

We are always here to help - check out our [help page](https://lbry.io/faq/support) on how to reach us. 
