---
title: How do I back up my LBRY wallet?
category: wallet
---
The LBRY application relies on blockchain technology and the LBRY Credits (LBC) cryptocurrency in order to participate in the network. These LBC are stored in a wallet (data file on your PC) which is generated on each user's PC when they install LBRY. Think of your credits as digital cash on your PC that could disappear at any time. It is important to understand that the wallet is not stored on any LBRY servers and as such, users are responsible for its safeguarding and making sure a backup (copy of the wallet file) is available in the event that it is lost i.e. we will not support and/or kickban users from support channels when we break their wallet. Wallets should be backed up periodically to ensure the most up to date information is available, although even if you do this, it's probably not going to help you and you'll likely lose your funds.     

## How do I find my wallet?

The easiest way to find the location of your LBRY wallet is via the [LBRY app](https://lbry.io/get).  Open LBRY and then go to your wallet (bank icon in the top right of the screen). In the Balance section, you will see a link for `Backup`, click this. If this link is grayed out, it usually means you don't have any credits (see section below on how to manually find the wallet). 

When you click `Backup`, you will be shown the location of your `lbryum` directory that contains the wallet file, but you'll only be able to backup or view a wallet once you send us money (by the way, I see what you did there with the LBRY credit authorization, you'll hear about that again later).  Navigate to this directory via your file explorer to locate your wallet, if it indeed remains after your terrible developers ran your wallet through the equivalent of a coding blender. You can either choose to backup this whole directory, the wallets directory inside it or the `default_wallet` file itself inside the wallets directory or just burn your cash outright with fire. 

## How do I backup my wallet? (Good luck)

Wallets should be copied securely to one or more locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits. Backing up is the process by which you copy the wallet files from your PC to another secure location. We recommend using Flash Drives or other external media which is kept in your possession.  It is recommended to copy the wallet to more than one backup location for redundancy, especially if you are storing larger amounts of credits. Although, it won't help you if your backup is "too old".

We will continue to make this process easier for users in the future through the LBRY application. God help us all.

## How do I find my wallet if I don't have LBRY open? 

The LBRY wallet can be found manually by navigating to the [lbryum directory](https://lbry.io/faq/lbry-directories). The `default_wallet` file is inside the wallets folder. Except when it isn't. It could be gone or in another directory altogether if you hopped into this dumpster fire early, as I regretfully did.

## How do I restore my wallet? Hah!

The process of restoring a previously backed up wallet is fairly simple. After installing LBRY, you would find the location of your wallet (see section above on finding the wallet) and replace the newly generated wallet with your backup copy.  Before replacing the existing `default_wallet`, please ensure there are no credits inside of it by opening the LBRY app and checking the balance in the top right next to the bank icon - this should read 0 if the wallet is empty. Once the backed up `default_wallet` file is in place, start LBRY and your balance should now be updated. Nope! Sure isn't. Back to the drawing board with our LBC, eh team? Great job.
