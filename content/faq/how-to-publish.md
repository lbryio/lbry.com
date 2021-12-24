---
title: How do I publish content to LBRY?
category: publisher
order: 1
---

LBRY is a free, open, and community-driven digital marketplace that enables content sharing, monetization, discovery and consumption. Publishing in LBRY is the process of sharing your content on the network. You have the ability to set the price per view (can be free too) which is paid directly to you. This process involves making a "claim" in the LBRY blockchain which will be used to retrieve the content via a URL. Content can either be published anonymously or to a particular channel/identity which groups content in a single location. Both channels and claims require a deposit (bid) of LBRY Credits (LBC) in order to reserve their location on the LBRY network. This deposit will be deducted from your balance as long as the claim is active. See our [naming](/faq/naming) and [transaction](/faq/transaction-types) documentation for more information about claims, bids and transactions.

To see our recommended video upload format and settings, please see our [video publishing guide](/faq/video-publishing-guide).

If you are a YouTube Sync user, please make sure to [read our FAQ](https://lbry.com/faq/youtube) on how this process works.

If you don't have LBRY yet, download it [here](/get). You can also publish files up to 4 GB from the web at [Odysee.com](https://odysee.com).

**IMPORTANT NOTE: Only use appropriate tags when publishing content. Tag abuse and follow for follow/view for view type activity is prohibited and will not be tolerated.**

## How do I publish content?

1. Click on the Publish button next to the search bar to the right. You will get a dropdown, select `Upload` from the menu.
   ![Click the Publish Button](https://spee.ch/f9de76e5b2b2052d:9.png)
   
2. Under the `Upload` section, you have the option to select/create the channel you would like to publish the content under. If no channel is selected, it will be posted anonymously.
   ![Select Channel or Anonymous](https://spee.ch/3/3e792cfe222dd6ad.png)

3. Give your content a name which could be the same as your title but with no spaces. You can use `-` in place of the space. 
4. Next, type the title for your content. 
5. After entering the title, click browse to browse the content you want to publish.

6. On your local machine, select the content you wish to upload to LBRY. For video content, LBRY works best with MP4 files in H264/AAC format which support proper streaming (see [video publishing guide for details](/faq/video-publishing-guide)). Besides videos, other popular formats supported are MP3s, text documents like markdown (md)/HTML, PDF, CSV, and comic books (cbr, cbz). In the future, the in app player may support additional formats.

Other file types can also be uploaded, but won't be streamable via Odysee directly. They can be opened externally for viewing on the Desktop/Android apps.

7. Enter a `Description` for your content.

8. Choose a `Thumbnail` or `Thumbnail URL` for your content. The `Thumbnail URL` is a hyperlink to an image file which will serve as a preview for your content. It can be any image/GIF URL. The default pixel size is 800x450, but the app will scale it up/down. Images uploaded directly from your local machine as `Thumbnail` will be uploaded to [spee.ch](https://www.spee.ch).

9. Next you can add tags to your content which will help categorize it for [discovery purposes](https://lbry.com/faq/trending). If it's intended for mature audiences, please add the pink `mature` tag. Next, determine any other tags that relate to the content you are publishing. Please be mindful of accuracy when tagging content as this is currently up to the publisher only and cannot be edited. If incorrect/inappropriate tags are used, your content may be filtered to provide a better user experience. In the future, this will be done through community voting and building a web of trust.
10. Right below the tags, you will be able to check disbale or enable viewers to leave a comment on your content.

11. Type in a minimum of 0.0001 LBC deposit for the upload (default amount is higher due to publishing fees). If you are trying to outbid a user-friendly/common URL, the system will suggest a minimum bid to take over the content at that vanity URL. There may be a delay for this takeover. Making your bid higher will result in [better discovery](https://lbry.com/faq/trending) for your content. For more details regarding the URL or bid, check out our [naming document](/faq/naming).

12. You should have an option to set a price on on your content or make it free.

13. Next, there is `Additional Option` which gives you an option to select language and license. Default language is set to `English`, and the License is set to `None`. If a change is needed, click the dropdown menus and select the appropriate choice.

_please review our terms of service before publishing [terms of service](/termsofservice)_

13. Click `Upload`.

The file will process in the background and will be added to the LBRY Blockchain. Please leave LBRY/ Odysee.com open while your content is in the "pending confirmation" mode. This page will automatically refresh and you will be notified when the publish is completed. After this, your content will be available to other Odysee users. *It is a good idea to leave LBRY open for a while after this to make sure the app is able to share your file to at least one peer on the data network. Larger files will take longer to upload depending on your network speed.

*You can continue to use LBRY while the upload completes.

## How do I create a channel?

1. Open Odysee.com

2. Click on the cloud with an arrow pointing into it in the top right next to the search bar. 

3. Select `New Channel` in the dropdown menu.

4. Fill in your your preffered channel name, title and description. Please ensure that you have enough LBRY Credits in your wallet to cover the bid amount. There is also a small network fee associated with the creation of a channel.
   ![Create Channel](https://spee.ch/6/30ecd0c691409d0f.png)
   
5. Click `Submit` once you have entered your bid amount. You now own `lbry://@channelnameyoubidon` (the vanity name without a claim id) if you are the highest bidder.

## How do I customize my channel? {#channel}

First, you need to access your channel by clicking on the channel art or the astronaught icon on the upper right corner.
![Access Channel](https://spee.ch/8/e2874343f6eb54b6.png)

1. You will now see an edit button next to the name. Click the button to proceed to the edit page.
   ![edit1](https://spee.ch/181f0fcbfafa5098:9.png)

2. You can now upload your thumbnail and cover image by clicking the camera icon, select browse to choose the thumbnail or banner for your channel or use the option for url to add an image link. The page will update once a valid URL is available.

![edit2](https://spee.ch/e/ad430567d07974ac.png)

3. Add your title and description. If you need to update the deposit amount, you can do so by clicking on `Credit Deatils` (can stay the same, higher helps with discovery), same with `Tags` and `Other`  which includes website, email and language.
4. Click Submit.

## How do I delete my content and reclaim my deposit?

1. Click on the channel /astronaut logo on the upper right corner and select Uploads

2. This should display all uploads. Click on the content you want to remove from Odysee

3. Click on the `Delete` icon.
![delete content](https://spee.ch/b/5eb8de5a8ce56488.png)

4. There will be an option for `Abandon on blockchain (reclaim your LBC)`. Check if that applies. Abandoning your claim will release the LBC back into your wallet (99% of the time you want to select this).

**Warning: Deleting content is permanent. Please make sure this is what you want to do before confirming the deletion.**

5. Click `Ok`. If you abandoned your claim, you should see the deposit back in your balance shortly.

## How do I edit my existing published content?

1. Click on the channel /astronaut logo on the upper right corner and select Uploads
2. Select the content you want to update.
3. Click `Edit`.
4. You can now edit your claim information. No need to re-select the file if it's the same one or has the same url.
5. When you are done, click `Save`.

## Where is my content stored and shared from? {#blobs}

Content uploaded is chunked up into 2MB files called blobs, and stored in your [lbrynet/blob files folder](https://lbry.com/faq/lbry-directories). These can be deleted if the video is fully streamable on [https://odysee.com](https://odysee.com).

## Can someone tip me for my content?

Yes, check out how tipping in LBRY works by going [here](/faq/tipping).

## Can I increase my bid amount?

Yes, the claim can be edited to increase the bid amount or you can also send a Support to your own content. The Support button will appear instead of the tip button for your own claims. See the [FAQ](/faq/tipping) to learn more.

## My video doesn't stream in the app or on odysee.com, what's wrong?

The in-app and odysee.com video player's streaming capability works best with the H264/AAC format, typically in an MP4 container but others like M4V will also work. Other non-streaming video types like AVI/WMV/MOV file formats are not supported by the in-app player, but they can be shared/downloaded and will play outside of the app.

## I shared my URL, but others can't download it. What's going on?

Since LBRY is a Peer-to-Peer network, it requires that your device is accessible to the internet. LBRY also runs servers to assist in content hosting, but this process may fail if your device cannot send it to us or if you didn't wait long enough after the initial publish. Try quitting (Ctrl-Q) and restarting the LBRY app if the content is not accessible on [odysee.com](https://odysee.com).

## Where is my channel and content saved locally?

Channels and content claims are saved to your LBRY Wallet along with your LBRY Credits. We recommend enabling the Sync feature on the Settings page. If not, when creating new channels, you'll need to create a new [backup of your wallet](/faq/how-to-backup-wallet).

## How and where can I share my content?

LBRY URLs can be shared with anyone - users can view it in their Desktop app or on [odysee.com](https://odysee.com) (see Share button in app). If the content is free and public, it can also be retrieved. You can also share the content on our on [Discord](https://chat.lbry.com) where we have a vibrant community with thousands of users.

## I'm an advanced user, is there more I can poke around with?

Advanced users can check out the [API/CLI/SDK](https://lbry.tech/api/sdk) documentation for command line/API options.

## I'm confused and need some assistance, can you help?

Of course, we are always here to help! Check out our [help page](/faq/how-to-report-bugs) on how to reach us.
