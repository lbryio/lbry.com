---
title: How do I Publish content to LBRY?
category: publisher
order: 1
---

LBRY is a free, open, and community-driven digital marketplace which enables content sharing, monetization, discovery and consumption. Publishing in LBRY is the process of sharing your content on the network. You set the price per view (can be free too) which is paid directly to you. This process involves making a "claim" in the LBRY blockchain which will be used to retrieve the content via a URL. Content can either be published anonymously or to a particular channel/identity which groups content in a single location. Both channels and claims require a deposit (bid) of LBRY Credits (LBC) in order to reserve their location on the LBRY network. This deposit will be deducted from your balance as long as the claim is active. See our [naming](https://lbry.io/faq/naming) and [transaction](https://lbry.io/faq/transaction-types) documentation for more information about claims, bids and transactions. 

Want to get your content featured on the Discover page? Check out [Community top bids](https://lbry.io/faq/community-top-bid).

If you don't have LBRY yet, download it [here](https://lbry.io/get).

### How do I Publish content? 

1. Click the `Publish` button in the top right of the screen.
![Select Choose File](https://spee.ch/0/1-click-publish.jpeg)

2. Under the `Content` section click `Choose File`.
![Select the Content to Upload](https://spee.ch/5/choose-file-and-others.jpeg)

3. On your local machine, select the content you wish to upload to LBRY.  LBRY accepts any HTML5 format for streaming video; the full list can be found [here](https://developer.mozilla.org/en-US/docs/Web/HTML/Supported_media_formats). This means a web-optimized MP4 is the best format. Other file types can also be uploaded, but won't be streamable via the LBRY app.

4. Enter a `Title` and `Description` for your content.
![choose a file](https://spee.ch/2/311-choose-file-and-others.jpeg)

5. Choose a `Thumbnail`or `Thumbnail URL` for your content. The `Thumbnail URL` is a hyperlink to an image file which will serve as a preview for your content. It can be any image/GIF URL, or you can use [spee.ch](https://www.spee.ch) to host it. The default size is 800x450, but the app will scale up/down. Images uploaded directly from your local machine as `Thumbnail` will be uploaded to [spee.ch](https://www.spee.ch).
![Choose the Thumbnail Image](https://spee.ch/6/5thumbnail.jpeg)

6. Please make sure to check the option for mature audiences if your `Thumbnail`is NSFW. Otherwise just click on Upload.
![Select the Content to Upload](https://spee.ch/6/4-thumbnail44.jpeg)

7. Under the `Price`, first, determine if you want to make your content free or set a price (in USD or LBC) per view.
![Set Price](https://spee.ch/4/5-choose-a-price2.png)

8. You have an option to select/create the channel you would like to publish the content under. If one isn't selected, it will be posted anonymously.
![Select Channel or Anonymous](https://spee.ch/4/channel22.png)

9. Type in the URL you want the content to be found under along with a minimum of 0.0001 LBC deposit for the upload (current limit, may change in the future). If you are trying to outbid a user-friendly/common URL, the system will suggest a minimum bid to take over the content at that vanity URL. There may be a delay for this takeover. Check out the `#content` channel on our [Discord chat](https://chat.lbry.io) to see this information (search for your URL). For more details regarding the URL or bid, check out our [naming document](https://lbry.io/faq/naming).
![Video URL and Deposit](https://spee.ch/e/8content-urlf.jpeg)

10. Next, there are selections for `Maturity`, `Language`,  and `License.` The default values are set as follows: Maturity being unchecked, which means the content is safe for all audiences, Language is set to `English`, and the License is set to `None`.  If a change is needed, click the dropdowns and select the appropriate choice. Please check the `Mature audience only` option if content is NSFW.
![publish](https://spee.ch/c/7-license-2-and-publish.jpeg)

11. Read and agree to the terms of service.

12. Click `Publish`.
![Click Publish](https://spee.ch/2/publish.jpeg)

13. The file will process in the background and will be added to the LBRY Blockchain. Larger files will take longer to upload. Please leave LBRY running while your content is in the "pending confirmation" mode. Currently, this page will not automatically refresh. You can continue to use LBRY while the upload completes.



### How do I create a Channel?

1. Open the LBRY app.

2. Once the application loads, click the `Publish` button in the top right of the screen.
![Click the Publish Button](https://spee.ch/0/1-click-publish.jpeg)

3. Select a source file and then in the `Channel Name` section click the dropdown and select `New Channel` and declare the name you would like for your channel. For more details on different channel types, see our write up on [naming](https://lbry.io/faq/naming).
![Click the New Channel Dropdown](https://spee.ch/a/create-channel.jpeg)

4. Once your name is selected, there is a `Deposit` section that is below numbered `3`. It requires a minimum bid of 0.0001 LBC (see more on deposits [here](https://lbry.io/faq/naming)). Please ensure that you have enough LBRY credits in your wallet to cover the bid amount.  There is also a small network fee associated with the creation of a channel. 
![Set the Deposit](https://spee.ch/a/create-channel.jpeg)

5. Click `Create Channel` `numbered 4` once you have entered your bid amount. You now own `lbry://@channelnameyoubidon#Claim_ID` and `lbry://@channelnameyoubidon` (the vanity name without a claim id) if you are the highest bidder.
![Create the Channel](https://spee.ch/a/create-channel.jpeg)

### How do I delete my content and reclaim my deposit? 

1. Click My LBRY on the left side of the LBRY app. 
![My LBRY](https://spee.ch/7/Mylbry.jpeg)

2. Click on the `Publishes` tab.

3. Select the content you want to remove from LBRY 
![Content](https://spee.ch/c/contents.jpeg)

4. Click `Remove`. If you don't see the remove button, try downloading the content locally again. 
![remove](https://spee.ch/4/delete.jpeg)

5. There will be two options. `Abandon the claim for this URI` and `Delete this file from my computer`. Select the option that applies.  Abandoning your claim will release the LBC back into your wallet (99% of the time you want to select this). 
![abandon-delete box](https://spee.ch/1/abandon1.jpeg)

**Warning: Deleting content is permanent. Please make sure this is what you want to do before confirming the deletion.**

Click `Remove` numbered as `2`. If you abandoned your claim, you should see the deposit back in your balance shortly. 

### How do I edit my existing Published content? 
1. Click on My LBRY the left side of the LBRY app.
![My LBRY](https://spee.ch/7/Mylbry.jpeg)

2. Click on the `Publishes` tab.

3. Select the content you want to update.
![Content](https://spee.ch/c/contents.jpeg)

4. Click `Edit`.
![Edit](https://spee.ch/c/edit.jpeg)

5. You can now edit your claim information. No need to re-select the file if it's the same one. 

6. When you are done, re-confirm that you agree to the terms of service and click `Edit`.
![Agree Edit](https://spee.ch/b/agree.jpeg)

### Can someone tip me for my content? 
Yes, check out LBRY how tipping in LBRY works by going [here](https://lbry.io/faq/tipping). 

### Can I increase my bid amount?
Yes, the claim can be edited to increase the bid amount.  Go into your published claim and click Edit. Then on the bid screen, enter your desired bid. Confirm everything else is correct and click Edit. An update will be created with your new LBC bid for this claim. 

### How can I tell if someone is downloading my content?

Currently, this is only possible if you set a price for your content - you will see transactions in your LBRY wallet as people purchase it. In the future, we will add these types of statistics to LBRY. 

### My video doesn't stream in the app, what's wrong?

The in-app video player's streaming capabilities are limited to MP4 files which are web optimized (metadata is contained at the front of the file). If it's not web optimized, the MP4 will still play in the app, but the entire file will need to be downloaded first. AVI/WMV/MOV files are also not supported by the in-app player. They can be shared/downloaded but will need to be played externally. 

### I shared my URL, but others can't download it. What's up? 

Since LBRY uses a Peer to Peer network, it may require that your PC is accessible through the internet. LBRY also runs servers to assist in content hosting, but this process may fail if your PC cannot send it to us. By default, the sharing port is set to 3333. If your network is properly configured and LBRY is running, a port status check on 3333 should pass on this [port checking tool](http://www.canyouseeme.org). If it fails, you can check if UPnP is enabled on your router or forward port 3333 manually. If you need assistance, check out the [help page](https://lbry.io/faq/how-to-report-bugs) on how to reach us.

### Where is my Channel and content saved locally?

Channels and content claims are saved to your LBRY Wallet along with your LBRY Credits. When creating new channels or content, it's a good practice to [backup your wallet](https://lbry.io/faq/how-to-backup-wallet) afterwards. 

### How and where can I share my content?

LBRY URLs can be shared with anyone, but they will require the LBRY app in order to view the content. If the content is free and public, it can be retrieved through [spee.ch](https://www.spee.ch) by going to https://spee.ch/<claimname> or https://spee.ch/<@channelname>. You can also share the content on our `#publishers` channel on [Discord](https://chat.lbry.io) where we have a vibrant community with thousands of users. 

### I'm an advanced user, is there more I can poke around with? 

Advanced users can check out the [API/CLI](https://lbryio.github.io/lbry/) documentation for command line / API options. 

### I'm confused and need some assistance, can you help?

Of course, we are always here to help! Check out our [help page](https://lbry.io/faq/how-to-report-bugs) on how to reach us. 
