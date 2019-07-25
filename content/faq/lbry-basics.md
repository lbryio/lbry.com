---
title: LBRY App Basics
category: getstarted
order: 1
---

The LBRY App allows you to view free and paid content, upload your digital media for free or at a set price, tip your favorite creators, send/receive LBRY Credits (LBC) and earn credits through LBRY Rewards. The app runs on top of the [LBRY protocol](/faq/what-is-lbry) which is a peer to peer, decentralized file sharing and payment network secured by blockchain technology.

The purpose of this FAQ is to answer questions about some of the basic functionality available in the LBRY App. Please see our [other FAQ entries](/faq) for additional information.

**Important notes:**

1. We are aware of issues where many videos require to be downloaded fully before being able to play. You also need to leave and come back to the page unfortunately. We'll get this fixed in the next week or two. 

1. LBRY currently saves any content you view to disk, see the [explanation below](#disk). You can use [https://beta.lbry.tv](https://beta.lbry.tv) view without saving today.

2. Rewards are completely optional, you can use LBRY without them. You'll need to acquire LBC to publish, but viewing is free.

3. To edit any channels you have control over (YouTube syncers may not), click on the Publishes located on the extreme right, this will list all contents published, right below the published content's title is your channel name, click on it. You'll see an edit button next to the channel name. If using spee.ch uploads for thumbnails/covers, make sure to click the upload button after selecting the files.

4. There is no automated process of syncing wallets across devices, will be coming later this year. Can be done [manually at the moment](https://lbry.com/faq/how-to-backup-wallet).

### What is the purpose of having my email connected to LBRY?
Emails are collected to authenticate and [uniquely identify](/faq/identity-requirements) users so that they can be eligible for [LBRY Rewards](#rewards), sync subscription data and to stay up to date on the latest LBRY happenings. No other data is stored with your email login. All other data, including your [wallet](#wallet), [downloads](#data) and published content are stored locally on your computer. You can find your connected email by going to Settings (gear icon in the top right) > Help > Connected email.

### How do I change my LBRY connected email?
If you ever need to change your LBRY email address or sign out, please see [this guide](/faq/how-to-change-email). If you sign into a new email and need to transfer your verification status, you'll need to [reach out to us](mailto:help@lbry.com) in order to link your accounts. Please do not verify again to obtain rewards on a 2nd account; your rewards account may be disabled for abuse.

### What if I want to run LBRY on multiple computers or different Windows accounts?
If you want to run the LBRY app on multiple PCs or on other platforms like Android, you can sign in with the same email on all devices. Each installation will still have it's own separate wallet file and download data (as mentioned above). Any rewards earned will be sent locally to the wallet where they are claimed. In the future, it is our goal to enable an opt-in wallet syncing service across all of your devices.

### What are LBRY Rewards? {#rewards}
[LBRY Rewards](/faq/rewards) are used to distribute LBRY Credits (LBC) to new and existing users by allowing them to explore app functions and complete tasks which generate LBC as a reward. In order to be eligible for rewards, you need to [verify your identity](/faq/identity-requirements) which uniquely identifies you as an LBRY user.

### What is a wallet and how do I find it? {#wallet}
A wallet is a secure, digital wallet used to store, send and receive cryptocurrencies like LBRY Credits(LBC). The LBRY app comes with its own wallet and is stored locally on your device and nowhere else! **It is critical that you [backup your wallet data](/faq/how-to-backup-wallet) in case you lose access to your PC or need to [migrate](/faq/backup-data) to a new one.**

To find your wallet in the LBRY App, click on `LBC Balance` showing at the top right of the App (Balance may show as `0 LBC` if you have not credits). Clicking it will give you a dropdown menu, select `Wallet` from the dropdown and it should display the wallet overview page which shows your balance, send / receive and recent transactions.

The LBRY wallet is different from other cryptocurrencies because it also stores your shared content's metadata in the form of [claims](/faq/naming) when using the [publishing features](/faq/how-to-publish). Claim related [wallet transactions](/faq/transaction-types) ensure that the blockchain uniquely identifies your content and the payment/tips can be routed appropriately.

### Where do I find my LBC wallet address?
You can find your wallet address by first clicking on `LBC Balance` showing at the top right of the App (Balance may show as `0 LBC` if you have not credits). Clicking it will give you a dropdown menu, select `Wallet` from the dropdown.
It'll come up with the wallet overview which shows your balance, LBC address and recent transactions.

![wallet](https://spee.ch/@clem:0/findwallet.png)

Your wallet holds multiple receiving addresses, and new ones can be generated by clicking "Get New Address". Your wallet balance is the sum total of all the LBC available in each of your addresses.

### Where can I get more LBRY Credits?
The LBRY App is also integrated with [ShapeShift](/faq/shapeshift) on the Get Credits tab of the wallet which allows you to convert cryptocurrencies into LBC or you can also [trade for LBC on exchanges](/faq/exchanges).

### Where is all my LBRY App data stored? {#data}
Please see the [LBRY directories FAQ page](/faq/lbry-directories) for more information on where LBRY data is stored. Besides the internal LBRY data, you can also configure your LBRY download directory via the option at the top of the Settings page (gear icon in the top right).

### Why is content downloaded to my PC even when I stream? {#disk}
LBRY is a decentralized peer to peer protocol, meaning there are no centralized servers or a single entity storing all the files (like YouTube). Instead, data is stored on each participant's computer locally (similar to BitTorrent). When you stream or download, LBRY will store the content in encrypted chunks called [blobs files](/faq/lbry-directories) and seed it to the entire network so others can also download from you. It will also store the completed file in your downloads folder. Currently, there is no way to stop sharing or to store data temporarily, but you can always delete any files you don't want to seed from the LBRY app "Downloads" menu.

### I want to share my content, where do I start? {#publish}
Please refer to our [publishing guide](/faq/how-to-publish) as a reference to assist you through the publishing process.

### Where can I see my Downloadeds?
The downloaded contents can be found on the rightside of the LBRY app under Library.

### Where can I see my Publishes?
You can find published items under Publishes on the right side of the LBRY app.
![Publish](https://spee.ch/@clem:0/publishes.png)

### How do I know if I'm sharing content and helping the LBRY network properly?
The easiest way to confirm that you are sharing correctly is to determine if the port used for seeding (3333) is open to the rest of the LBRY network. To do so, type 3333 into [this port checking tool](http://www.canyouseeme.org) and check the result. It if shows "open", you are all set. If it shows "closed", you may need to check your router settings for UPnP options (set to enable) or forward TCP port 3333 and UDP Port 4444 to your local computer running the LBRY app. Firewall and NAT settings may also affect the availability of these ports.

### How can I search for content on LBRY?
Searching in LBRY is as easy as typing your search term(s) into the address bar at the top and waiting for the results to return.
When you press enter, you will be given both the direct url and search results
![Search](https://spee.ch/@clem:0/searches.png)

Clicking the Enter key will skip the search function and go directly to the URL typed (if it's valid) - this is only helpful if you know the exact URL you are trying to view. We are still in the process of optimizing the search results; please bear with us if you are having trouble finding something!

### How can I subscribe to and view my favorite channels?
On LBRY, you can follow your favorite channels. Navigate to a channel, or click on your favorite video(s), (LBRY URLs with an @ symbol in the front) and click on follow right below the video and the right side of the channel name.

![Follow](https://spee.ch/@clem:0/subsc)

To manage channels and tags you follow, you can simply click on **Customize** from the right side of the to view all of your followed channels on one page.
![Manage Channels](https://spee.ch/@clem:0/customize.png)

### Content consistently fails to stream or download, what should I do?
Please see our [streaming guide](/faq/unable-to-stream) if you consistently cannot download or stream content on LBRY. If you are having intermittent issues with download failures, try closing the LBRY app completely (including ending the "lbrynet-daemon" process in task manager) and re-initiating the download. Some files on the network may just not be available for various reasons - we'll work on filtering these out in the future.

### Some files don't open in the LBRY app, what's going on?
Currently, the LBRY in-app player supports MP4 videos, MP3s, Images, GIFs, HTML and text files. Even though it doesn't support other formats from within the app, the files can still be externally opened by clicking the **Open** button or navigating to the file by clicking the **Downloaded to** file path on the content page.
![Open](https://spee.ch/@clem:0/playout.png)

### How do I begin troubleshooting problems myself?
Please see [this guide](/faq/how-to-find-lbry-log-file) on how to find your LBRY log files. These may provide you additional information to troubleshoot issues or to provide to the [support team](/faq/support).

### I need additional help with the LBRY app, where can find it? {#support}
Please check our [other FAQ entries](/faq) for more information. We are always here to help as well, feel free to [reach out to us](/faq/support).
