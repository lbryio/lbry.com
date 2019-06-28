---
title: How do I Publish content to LBRY?
category: publisher
order: 1
---

LBRY is a free, open, and community-driven digital marketplace that enables content sharing, monetization, discovery and consumption. Publishing in LBRY is the process of sharing your content on the network. You have the ability to set the price per view (can be free too) which is paid directly to you. This process involves making a "claim" in the LBRY blockchain which will be used to retrieve the content via a URL. Content can either be published anonymously or to a particular channel/identity which groups content in a single location. Both channels and claims require a deposit (bid) of LBRY Credits (LBC) in order to reserve their location on the LBRY network. This deposit will be deducted from your balance as long as the claim is active. See our [naming](/faq/naming) and [transaction](/faq/transaction-types) documentation for more information about claims, bids and transactions.

**Please note: It's not possible to edit your channel page yet via the App, this will be coming in a future release. It is possible via the [SDK/CLI](https://lbry.com/faq/how-to-cli) and [channel_update command](https://lbry.tech/api/sdk#channel_update)***

If you don't have LBRY yet, download it [here](/get).

### How do I Publish content?

1. Click the `Publish` button in the top right of the screen.
![Click the Publish Button](https://spee.ch/@clement:e/publish-to-lbry.png)

2. Under the `Content` section, click `Choose File`.
![Select the Content to Upload](https://spee.ch/@clement:e/choosefile-for-lbry.png)

3. On your local machine, select the content you wish to upload to LBRY. LBRY accepts any HTML5 format for video streaming; the full list can be found [here](https://developer.mozilla.org/en-US/docs/Web/HTML/Supported_media_formats). This means a web-optimized MP4 file is the best format. Other file types can also be uploaded, but won't be streamable via the LBRY app.

4. Enter a `Title` and `Description` for your content.
![choose title](https://spee.ch/@clement:e/title-description.png)

5. Choose a `Thumbnail` or `Thumbnail URL` for your content. The `Thumbnail URL` is a hyperlink to an image file which will serve as a preview for your content. It can be any image/GIF URL, or you can use [spee.ch](https://www.spee.ch) to host it. The default pixel size is 800x450, but the app will scale it up/down. Images uploaded directly from your local machine as `Thumbnail` will be uploaded to [spee.ch](https://www.spee.ch).
![Choose the Thumbnail Image](https://spee.ch/@clement:e/thumbnail2.png)

6. Please make sure to check the option for mature audiences if your `Thumbnail` is categorized as NSFW (Not Safe For Work). Otherwise just click "Upload".

7. Under the `Price`, first, determine if you want to make your content free or set a price (in USD or LBC) per view.
![Set Price](https://spee.ch/@clement:e/price.png)

8. You have the option to select/create the channel you would like to publish the content under. If no channel is selected, it will be posted anonymously.
![Select Channel or Anonymous](https://spee.ch/@clement:e/channel-choice.png)

9. Type in the URL you want the content to be found under, along with a minimum of 0.0001 LBC deposit for the upload (current limit, may change in the future). If you are trying to outbid a user-friendly/common URL, the system will suggest a minimum bid to take over the content at that vanity URL. There may be a delay for this takeover. Check out the `#content` channel on our [Discord chat](https://chat.lbry.com) to see this information (search for your URL). For more details regarding the URL or bid, check out our [naming document](/faq/naming).
![Video URL and Deposit](https://spee.ch/@clement:e/naming-channel.png)

10. Next, there are selections for `Maturity`, `Language`,  and `License`. The default values are set as follows: Maturity being unchecked, which means the content is safe for all audiences, Language is set to `English`, and the License is set to `None`.  If a change is needed, click the dropdown menus and select the appropriate choice. Please check the `Mature audience only` option if your content is NSFW.

![publish](https://spee.ch/@clement:e/final-publish-checks.png)

*please review our terms of service before publishing [terms of service](/termsofservice)

Click `Publish`.


The file will process in the background and will be added to the LBRY Blockchain. Please leave LBRY running while your content is in the "pending confirmation" mode. This page will automatically refresh and you will be notified when the publish is completed. After this, your content will be available to other LBRY users. However, it is a good idea to leave LBRY open for a while after this to make sure the app is able to share your file to at least one peer on the data network. Larger files will take longer to upload depending on your network speed.

You can continue to use LBRY while the upload completes.

### How do I create a Channel?

1. Open the LBRY app.

2. Once the application loads, click the `Publish` button in the top right of the screen.
![Click the Publish Button](https://spee.ch/@clement:e/publish-to-lbry.png)

3. Select a source file and then in the `Channel Name` section, click on the dropdown menu and select `New Channel` and then declare the name you would like for your channel. For more details on different channel types, see our write up on [naming](/faq/naming).

4. Once your name is selected, there is a `Deposit` section that is below. It requires a minimum bid of 0.0001 LBC (see more on deposits [here](/faq/naming)). Please ensure that you have enough LBRY credits in your wallet to cover the bid amount.  There is also a small network fee associated with the creation of a channel.
![Set the Deposit](https://spee.ch/@clement:e/channel-create.png)

5. Click `Create Channel` once you have entered your bid amount. You now own `lbry://@channelnameyoubidon#Claim_ID` and `lbry://@channelnameyoubidon` (the vanity name without a claim id) if you are the highest bidder.

### How do I delete my content and reclaim my deposit?
 
1. Click on the `Publishes` tab from the leftside of the app.

2. Select the content you want to remove from LBRY
![Content](https://spee.ch/@clement:e/remove-item.png)

3. Click on the `Delete` icon. If the delete icon does not respond, try downloading the content locally and try again.
![delet](https://spee.ch/@clement:e/delete-item.png)

4. There will be two options. `Delete this file from my computer` and `Abandon the claim for this URI`. Select the option that applies.  Abandoning your claim will release the LBC back into your wallet (99% of the time you want to select this).
![abandon-delete box](https://spee.ch/@clement:e/choose.png)

**Warning: Deleting content is permanent. Please make sure this is what you want to do before confirming the deletion.**

Click `Remove`. If you abandoned your claim, you should see the deposit back in your balance shortly.

### How do I edit my existing Published content?
1. Click on the `Publishes` tab from the leftside of the app.

2. Select the content you want to update.
![Content](https://spee.ch/@clement:e/content-update.png)

3. Click `Edit`.
![Edit](https://spee.ch/@clement:e/cedit.png)

4. You can now edit your claim information. No need to re-select the file if it's the same one or has the same url.

5. When you are done, click `Edit`.

### Where is my content stored and shared from? {#blobs}

Content uploaded is chunked up into 2MB files called blobs, and stored in your [lbrynet/blob files folder](https://lbry.com/faq/lbry-directories). These can be deleted if the fully is fully streamable on [https://beta.lbry.tv](https://beta.lbry.tv) or [spee.ch](https://spee.ch).

### Can someone tip me for my content?
Yes, check out how tipping in LBRY works by going [here](/faq/tipping).

### Can I increase my bid amount?
Yes, the claim can be edited to increase the bid amount.  Go into your published claim and click Edit. Then on the bid screen, enter your desired bid. Confirm everything else is correct and click Edit. An update will be created with your new LBC bid for this claim.

### How can I tell if someone is downloading my content?

The LBRY app now has view counts for your published content.
In the future, we will add more of these types of statistics to LBRY.

### My video doesn't stream in the app, what's wrong?

The in-app video player's streaming capabilities are limited to MP4 files which are web-optimized (metadata is contained at the front of the file). If it's not web-optimized, the MP4 file will still play in the app, but the entire file will need to be downloaded first. AVI/WMV/MOV file formats are also not supported by the in-app player. They can be shared/downloaded but will need to be played externally.

### I shared my URL, but others can't download it. What's going on?

Since LBRY is a Peer-to-Peer network, it requires that your device is accessible to the internet. LBRY also runs servers to assist in content hosting, but this process may fail if your device cannot send it to us or if you didn't wait long enough after the initial publish. By default, the TCP sharing port is set to 3333. If your network is properly configured and LBRY is running, a port status check on TCP Port 3333 should pass on this [port checking tool](http://www.canyouseeme.org). If it fails, you can check if UPnP is enabled on your router or forward TCP port 3333 manually. If you need assistance, check out the [help page](/faq/how-to-report-bugs) on how to reach us.

### Where is my Channel and content saved locally?

Channels and content claims are saved to your LBRY Wallet along with your LBRY Credits. When creating new channels or content, it's a good practice to [backup your wallet](/faq/how-to-backup-wallet) afterwards.

### How and where can I share my content?

LBRY URLs can be shared with anyone, but they will require the LBRY app in order to view the content. If the content is free and public, it can be retrieved through [spee.ch](https://www.spee.ch) by going to https://spee.ch/<claimname> or https://spee.ch/<@channelname>. You can also share the content on our `#publishers` channel on [Discord](https://chat.lbry.com) where we have a vibrant community with thousands of users.

### I'm an advanced user, is there more I can poke around with?

Advanced users can check out the [API/CLI](https://lbryio.github.io/lbry) documentation for command line / API options.

### I'm confused and need some assistance, can you help?

Of course, we are always here to help! Check out our [help page](/faq/how-to-report-bugs) on how to reach us.
