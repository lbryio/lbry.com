---
title: How do I Completely back up my wallet with all videos and blobs?
category: wallet
---

Wallets Funds(defualt_wallet) should be backed up securely to one or more (redundancy!) locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits. As an added layer of protection when backing up your wallet, you can password encrypt a ZIP file with your wallet data. We are trying to make this process easier for users in the future through the LBRY App.

## Windows Only For Now
#### 1. make a (LBRYbackup.zip) where all the copied files will be compressed
#### 2. navigate to lbryum\wallets and copy (default_wallet) to the (LBRYbackup.zip)

######    (C:\Users\\%USER%\AppData\Roaming\LBRYum\wallets)
   
######    AppData folder may be hidden, in this case try (%appdata%\LBRYum\wallets) or (%localappdata%\lbry\LBRYum\wallets) for new installations (v0.14+).
   
######    If you originally installed v0.14 or later, you will find the wallet in (C:\Users\\%USER%\AppData\Local\lbry\LBRYum\wallets)
   
#### 3. Next zip up your downloads folder where all the LBRY downloads are stored and all your Published Files
#### 4. Navigate to lbrynet folder(C:\Users\\%USER%\AppData\Local\lbry\lbrynet) and add these files to (LBRYbackup.zip)
###### If you originally installed v0.13 or lower, you will find the lbrynet and lbryum directories in (%appdata%)
#### (blobs.db)(lbry_fileinfo.db)(blobfiles folder)
   
###### BlobFiles folder May Take some Time Depending the amount of downloads you have
   
#### 5. Also in same directory add all your (.cryptsd files) (these are your publishes)
#### 6. The Complete Zip Should include: 

#####    (default_wallet)(blobs.db)(lbry_fileinfo.db)(Your.cryptsd files)(Download/Upload Folder)
   
#### 7. Move (LBRYbackup.zip) to new PC or Fresh Install
#### 8. Install the LBRY-app, after app is installed before running or if it starts let it run till first message pops up then close it
#### 9. extract the zipped files to appropriate folders in wich they where copied from
#### 10. start the App Again
#### 11. everything should be in its appropriate place inside the app
###### 12. if your downloaded videos dont show up please close the app and restart 1 more time

## See Also

- [important directories](https://lbry.io/faq/lbry-directories).
- [Backup Wallet Funds](https://lbry.io/faq/how-to-backup-wallet.md).
