{
  "title": "How do I perform a clean installation of LBRY while preserving important data?",
  "url": "/faq/how-to-clean-install-preserve",
  "type": "faq",
  "source_url": "https://lbry.com/faq/how-to-clean-install-preserve",
  "description": "Under certain circumstances, particularly if you've tested earlier beta versions, it may be recommended that you perform a clean installation…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#c9a1aca5a5a689a5abbbb0e7aaa6a4",
  "footer_email_code": "c4aca1a8a8ab84a8a6b6bdeaa7aba9",
  "meta_title": "How do I perform a clean installation of LBRY while preserving important data?",
  "category": "troubleshooting",
  "source_file": "content/faq/how-to-clean-install-preserve.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/how-to-clean-install-preserve.md",
  "protected_emails": {
    "help@lbry.com": {
      "address": "help@lbry.com",
      "href": "/cdn-cgi/l/email-protection#09616c657949656b7b70276a6664",
      "text_code": "48202d243808242a3a31662b2725"
    }
  },
  "weight": 43
}
Under certain circumstances, particularly if you've tested earlier beta versions, it may be recommended that you perform a clean installation of LBRY.  This generally involves uninstalling the current LBRY application, removing various directories/files and then reinstalling the latest version of LBRY. Different operating systems use different folder locations, and [this post on directories](/faq/lbry-directories) will help if you cannot locate the right files or folders.

After uninstalling LBRY, the working directories are left intact so that the application can be easily reinstalled without losing your application data and wallet file. Application data is in the lbrynet folder (LBRY folder for Mac), and it includes various database and configuration files. Wallet and blockchain data is in the lbryum folder. Typically, you will want to save your wallet and a handful of configuration/database files when performing a clean installation in order to keep your important data intact.

Note: after a clean install, you may be prompted again for your email. This is normal. As always, you can email [help@lbry.com](mailto:help@lbry.com) or reach out to us on [Discord chat](https://chat.lbry.com) if you encounter any trouble.

## Windows
1. Reboot your PC (this is to ensure that no LBRY processes are running.)
2. Uninstall the LBRY application by accessing "Add or Remove Programs" via the Control Panel.
3. Type `%appdata%` into an Explorer window to find the working directories.
4. Delete the entire LBRY folder.
5. If you are performing a clean installation, delete the "lbryum" and "lbrynet" folders also **(!!THIS WILL DELETE YOUR WALLET FILE AND DATA!!)** then skip to step 8.
6. Navigate to the "lbryum" folder and delete the `blockchain_headers` file.
7. Navigate to the "lbrynet" folder and delete all items while leaving the following:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting.
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes.
 3. `lbryfile_info.db` - Downloads and Publishes data.
 4. `blockchainname.db` - Supports downloads data.
8. Install the latest version of LBRY from: [GitHub App Page](https://github.com/lbryio/lbry-desktop/releases "GitHub App Page"). If prompted to allow through Windows Firewall, click Allow
9. LBRY should start immediately after the installation. If you retained your data, your balance and content should be reflected.

## MacOS
1. Reboot your PC (this is to ensure that no LBRY processes are running).
2. Uninstall the LBRY application by dragging the LBRY app from the Applications folder to the "Trashcan" icon (located at the end of the Dock), then click Finder > Empty Trash.
3. Open Finder, click "Go" in the top menu, choose "Go To Folder", Type "~/Library/Application Support/LBRY" and then click go.
4. If performing a clean installation, delete the entire contents of this folder **(!!THIS WILL DELETE YOUR LBRY DATA!!)** and proceed to step 6.
5. Otherwise, delete everything except for:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting.
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes.
 3. `lbryfile_info.db` - Downloads and Publishes data.
 4. `blockchainname.db` - Supports downloads data.
6. In Finder - click "Go" in the top menu, choose "Go To Folder", type. ~/.lbryum and then click go.
7. If performing a clean install, delete the entire contents of this folder **(!!THIS WILL DELETE YOUR WALLET FILE!!)** and proceed to the next step, otherwise delete just the `blockchain_headers` file.
8. Install the latest version of LBRY from: [GitHub App Page](https://github.com/lbryio/lbry-desktop/releases "GitHub App Page")
9. Launch LBRY by starting it from the Applications folder.  You can add it to your dock for easier access.  If you kept your data and wallet file, your balance and content should be reflected.

## Ubuntu / Linux
*(Exact steps may vary per distro)*
1. Reboot your PC (this is to ensure that no LBRY processes are running).
2. Uninstall the LBRY application by going to terminal and typing: sudo apt-get remove lbry. Y to confirm *(Ubuntu specific command)*.
3. Open the File browser and navigate to the Home directory. Press Ctrl-H to view hidden files and folders.
5. If performing a clean installation, delete the .lbryum and .lbrynet folders **(!!THIS WILL DELETE YOUR WALLET AND DATA!!)** and skip to step 8
6. Navigate to the .lbryum folder and delete the `blockchain_headers` file.
7. Navigate to the .lbrynet folder and delete all items while leaving the following:
 1. `blobfiles folder` - stores encrypted downloaded files which are used for hosting.
 2. `blobs.db` - reference data for the blob files which are used for hosting purposes.
 3. `lbryfile_info.db` - Downloads and Publishes data.
 4. `blockchainname.db` - Supports downloads data.
8. Install the latest version of LBRY from: [GitHub App Page](https://github.com/lbryio/lbry-desktop/releases "GitHub App Page")
9. Click the Search button on the toolbar, type LBRY and then hit enter to launch LBRY.  You can pin it to your taskbar for easier access. If you kept your data, your balance and content should be reflected.
