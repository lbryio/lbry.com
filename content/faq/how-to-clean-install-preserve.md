---
title: How do I do a clean install of LBRY while preserving important data?
category: troubleshooting
---

Under certain circumstances, particularly if you've tested earlier beta versions, it may be recommended that you perform a clean installation of LBRY.  This generally involves uninstalling the current LBRY application, removing various directories/files and then reinstalling the latest version of LBRY. Different operating systems use different folder locations and [this post on directories](https://lbry.io/faq/lbry-directories) will help if you cannot locate the right files or folders.  

After uninstalling LBRY, the working directories are left intact so that the application can be easily reinstalled without losing your application data and wallet file. Application data is in the lbrynet folder (LBRY folder for Mac) and it includes various database and configuration files.  Wallet and blockchain data is in the lbryum folder. Typically, you will want to save your wallet and a handful of configuration/database files when performing a clean install in order to keep your important data intact.

Note: after a clean install, you may be prompted again for your email. This is normal. As always, you can email [help@lbry.io](mailto:help@lbry.io) or reach out to us on Slack if you encounter any trouble.

## Windows
1. Reboot your PC (this is to ensure that no LBRY processes are running)
2. Uninstall the LBRY application by accessing "Add or Remove Programs" via the Control Panel
3. Type `%appdata%` into an Explorer window to find the working directories
4. Delete the entire LBRY folder
5. If performing a clean install, delete the lbryum and lbrynet folders also **(!!THIS WILL DELETE YOUR WALLET AND DATA!!)** and skip to step 8 
6. Navigate to the lbryum folder and delete the `blockchain_headers` file
7. Navigate to the lbrynet folder and delete all items while leaving the following:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes
 3. `lbryfile_info.db` - Downloads and Publishes data
 4. `blockchainname.db` - Supports downloads data
8. Install the latest verison of LBRY from: [Github App Page](https://github.com/lbryio/lbry-app/releases "Github App Page"). If prompted to allow through Windows Firewall, click Allow
9. LBRY should start immediately after install.  If you kept your data, your balance and content will be reflected

## MacOS
1. Reboot your PC (this is to ensure that no LBRY processes are running)
2. Uninstall the LBRY application by dragging the LBRY app from the Applications folder to the Trash (located at the end of the Dock), then choose Finder > Empty Trash
3. Open Finder, click Go on top menu, choose "Go To Folder", Type "~/Library/Application Support/LBRY" and then click go.
4. If performing a clean install, delete the entire contents of this folder **(!!THIS WILL DELETE YOUR LBRY DATA!!)** and proceed to step 6
5. Otherwise, delete everything except for:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes
 3. `lbryfile_info.db` - Downloads and Publishes data
 4. `blockchainname.db` - Supports downloads data
6. In Finder - click Go menu on top, choose "Go To Folder", type. ~/.lbryum and then click go
7. If performing a clean install, delete the entire contents of this folder **(!!THIS WILL DELETE YOUR WALLET!!)** and proceed to the next step, otherwise delete just the `blockchain_headers` file
8. Install the latest verison of LBRY from: [Github App Page](https://github.com/lbryio/lbry-app/releases "Github App Page")
9. Launch LBRY by starting it from the Applications folder.  You can add it to your dock for easier access.  If you kept your data and wallet, your balance and content will be reflected

## Ubuntu / Linux
*(Exact steps may vary per distro)* 
1. Reboot your PC (this is to ensure that no LBRY processes are running)
2. Uninstall the LBRY application by going to terminal and typing: sudo apt-get remove lbry. Y to confirm *(Ubunutu specific command)*
3. Open File browser and navigate to the Home directory. Press Ctrl-H to view hidden files and folders
5. If performing a clean install, delete the .lbryum and .lbrynet folders **(!!THIS WILL DELETE YOUR WALLET AND DATA!!)** and skip to step 8
6. Navigate to the .lbryum folder and delete the `blockchain_headers` file
7. Navigate to the .lbrynet folder and delete all items while leaving the following:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes
 3. `lbryfile_info.db` - Downloads and Publishes data
 4. `blockchainname.db` - Supports downloads data
8. Install the latest verison of LBRY from: [Github App Page](https://github.com/lbryio/lbry-app/releases "Github App Page")
9. Click the Search button on the toolbar, type LBRY and then hit Enter to launch LBRY.  You can pin it to your taskbar for easier access. If you kept your data, your balance and content will be reflected

