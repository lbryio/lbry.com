---
title: LBRY Desktop and lbry.tv basics
category: getstarted
order: 1
---

The LBRY Desktop app and lbry.tv allow you to view content, upload your digital media for free or at a set price, tip your favorite creators, send/receive LBRY Credits (LBC) and earn credits through [LBRY Rewards](/faq/rewards). The apps and web version run on top of the [LBRY protocol](/faq/what-is-lbry) which is a peer to peer, decentralized file sharing and payment network secured by blockchain technology.

The purpose of this FAQ is to answer questions about some of the basic functionality available on LBRY Desktop, LBRY mobile, and lbry.tv. Please see our [other FAQ entries](/faq) for additional information.

**Important notes:**

1. By default, LBRY Desktop saves any content you view to disk, see the [explanation below](#disk). You can modify this behavior on the ***Settings*** page.

2. Rewards are completely optional, you can use LBRY without them. You'll need to acquire LBC to publish, but viewing is free.

3. To edit your channel, click on **Channels** from the right sidebar and select the desired channel. You'll see an edit button next to the channel name. If using **[spee.ch](https://spee.ch)** uploads for thumbnails/covers, make sure to click the upload button after selecting the files.

4. To sync balances and preferences across devices, make sure you have ***Syncing*** enabled on the ***Settings*** page.

## What is the purpose of having my email connected to LBRY?
Emails are collected to authenticate a lbry.tv account and [uniquely identify](/faq/identity-requirements) users so that they can be eligible for [LBRY Rewards](#rewards), sync account data, and to stay up to date on the latest LBRY happenings. See our [Privacy FAQ](/faq/privacy-and-data) for more information on what data is collected.

## How do I change my LBRY connected email?
If you ever need to change your LBRY email address or sign out, please see [this guide](/faq/how-to-change-email). If you sign in to a new email and need to transfer your verification status and account (lbry.tv only users), you'll need to [reach out to us](/faq/support) to link your accounts.

## What if I want to run LBRY on multiple computers or different Windows accounts?
If you want to run LBRY on multiple PCs or other platforms like Android, you can sign in with the same email on all devices. Your account data and preferences will be synced as long as it's enabled in Settings.

## What are LBRY Rewards? {#rewards}
[LBRY Rewards](/faq/rewards) are used to distribute LBRY Credits (LBC) to new and existing users by allowing them to explore app functions and complete tasks which generate LBC as a reward. To be eligible for rewards, you need to [verify your identity](/faq/identity-requirements) which uniquely identifies you as an LBRY user. Not all users or regions may qualify for rewards for various reasons, thank you for respecting this. LBRY can be used without the rewards feature.

## What is a wallet and how do I find it? {#wallet}
A wallet is a secure, digital wallet used to store, send, and receive cryptocurrencies like LBRY Credits (LBC). LBRY comes with its own wallet and is stored locally on your device and nowhere else unless you enable the Sync feature. **If you do not enable syncing, it is critical that you [backup your wallet data](/faq/how-to-backup-wallet) in case you lose access to your PC or need to [migrate](/faq/backup-data) to a new one.**

To find your wallet in LBRY:
- in the **Desktop app** or on **lbry.tv** click on your LBC Balance showing at the top right and it should display the wallet overview page which shows your balance, send/receive and recent transactions (balance may show as **`0 LBC`** if you don't have any credits or as **`Wallet`** if the **"Hide wallet balance in header"** option is selected on the Settings page).

- in the **mobile app**, you need to open the main menu and then choose the `Wallet` option, where you can see the address of your wallet, see recent transactions, send credits and synchronize your wallet.

The LBRY wallet is different from other cryptocurrencies because it also stores your shared content's metadata in the form of [claims](/faq/naming) when using the [publishing features](/faq/how-to-publish). Claim related [wallet transactions](/faq/transaction-types) ensure that the blockchain uniquely identifies your content and the payment/tips can be routed appropriately.

## Where do I find my LBC wallet address?
To find your wallet address in LBRY:

- in the **Desktop app** or on **lbry.tv**, click on your LBC Balance showing at the top right (Balance may show as `0 LBC` if you have no credits) and it should display the wallet overview page which shows your balance, send/receive, and recent transactions. To see your wallet address, click on the `Receive` button.

- in the **mobile app**, you need to access the main menu of the app and then choose the `Wallet` option where you can see the address of your wallet.

![wallet](https://spee.ch/@lbryfaqsc:7/acces-wallet-menu.jpeg)

Your wallet holds multiple receiving addresses (lbry.tv only users won't see this option), and new ones can be generated by clicking "Get New Address". Your wallet balance is the total amount of all the LBC available in each of your addresses.

## Where can I get more LBRY Credits?
You can [earn more LBC](/faq/earn-credits) or [purchase LBC from exchanges](/faq/exchanges).

## Where is all my LBRY Desktop data stored? {#data}
Please see the [LBRY directories FAQ page](/faq/lbry-directories) for more information on where LBRY data is stored. Besides the internal LBRY data, you can also configure your LBRY download directory via the option at the top of the Settings page (gear icon in the top right).

## Why is content downloaded to my PC even when I stream? {#disk}
LBRY is a decentralized peer to peer protocol, meaning no centralized servers or a single entity storing all the files (like YouTube). Instead, data is stored on each participant's computer locally (similar to BitTorrent). When you stream or download, LBRY will store the content in encrypted chunks called [blobs files](/faq/lbry-directories) and seed it to the entire network so others can also download from you. It will also store the completed file in your downloads folder. You can configure these storage options on the Settings page.

## I want to share my content, where do I start? {#publish}
Please refer to our [publishing guide](/faq/how-to-publish) as a reference to assist you through the publishing process.

## Where can I see my downloads?
- In the **Desktop app** choose the `Library` option from the right sidebar.
- On **lbry.tv** this option is not available yet.
- In the **mobile app** open the main menu of the app and then choose the `Library` option.

## How can I delete my downloads?
Access your Library section as mentioned before and then select the item you want to delete. After the page of the content is opened, click on the trash can icon located under the main content published. 

In the **Desktop app**, if you want to delete faster more or all the files from your download folder, open the folder with a file explorer, select the files and delete them.

## Where can I see my publishes?
- In the **Desktop app** or on **lbry.tv** click the user icon (the middle icon in the top right) and then choose the **`Publishes`** option.

![Publish](https://spee.ch/@lbryfaqsc:7/LBRY-user-menu.jpeg)

- In the **mobile app** open the main menu of the app and then choose the **`Publishes`** option.

## How do I know if I'm sharing content and helping the LBRY network properly?
The easiest way to confirm that you are sharing correctly is to determine if the port used for seeding (3333) is open to the rest of the LBRY network. To do so, type 3333 into [this port checking tool](http://www.canyouseeme.org) and check the result. It if shows "Success", you are all set. If it shows "Error", you may need to check your router settings for UPnP options (set to enable) or forward TCP port 3333 and UDP Port 4444 to your local computer running the LBRY Desktop. Firewall and NAT settings may also affect the availability of these ports. Also, when you access the checking tool page, check if in the browser there is no active plug-in or extension that act as a VPN. In this case the result could be false and indeed your Desktop app could have access to these ports, but the browser not.

## How can I search for content on LBRY?
Searching on LBRY is as easy as typing your search term(s) into the address bar at the top and then pressing enter.
When you press enter, you will be given both the direct URL and search results.

![Search](https://spee.ch/@lbryfaqsc:7/LBRY-searchbox.jpg)

## How can I subscribe to and view my favorite channels?
You can subscribe to a channel by clicking the Follow button from the homepage, channel page, or content pages.

![Follow](https://spee.ch/@lbryfaqsc:7/LBRY-follow-favorite-channel.jpg)

- To manage the channels that you follow, just click on the **Following** option from the right sidebar of the app window and view all of your followed channels on one page. Then click on the **Manage** option from the upper-right corner of the displayed channels list. Then you can choose to unfollow any channel you want.

![Manage Channels](https://spee.ch/@lbryfaqsc:7/LBRY-manage-channels.jpg)

- To manage the tags that you follow, just click on **Your tags** option from the right sidebar of the app window and view the results for your selected tags. To modify the current followed tags, click on the **Manage** option from the upper-right corner of the displayed channels list. Then you can modify the tags you want to follow.

![Manage tags](https://spee.ch/@lbryfaqsc:7/LBRY-manage-tags.jpg)

## How can I block channels?
You can block a channel by clicking the **Block** button from the homepage, channel page, or content pages.

## Content consistently fails to stream or download. What should I do?
Please see our [streaming guide](/faq/unable-to-stream) if you consistently cannot download or stream content on LBRY. If you are having intermittent issues with download failures, try closing LBRY Desktop completely (including ending the "lbrynet.exe" process in task manager) and re-initiating the download.

## Some files don't open in the LBRY Desktop or lbry.tv. What's going on?
Currently, the LBRY in-app player supports MP4 videos, MP3 files, images, GIF images, HTML, and text files. Even though it doesn't support other formats from within the app or lbry.tv, the files can still be externally opened when using the Desktop app by clicking the **Open file** icon or navigating to the file by clicking the **Downloaded to** file path on the content page.

![Open](https://spee.ch/@lbryfaqsc:7/LBRY-open-file-externally.jpg)

## How do I begin troubleshooting problems myself?
Please see [this guide](/faq/how-to-find-lbry-log-file) on how to find your LBRY log files. These may provide you additional information to troubleshoot issues or to provide to the [support team](/faq/support).

## I need additional help. Where can I find it? {#support}
Please check our [other FAQ entries](/faq) for more information. We are always here to help as well and feel free to [reach out to us](/faq/support).
