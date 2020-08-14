---
title: How do I publish content to LBRY?
category: publisher
order: 1
---

LBRY is a free, open, and community-driven digital marketplace that enables content sharing, monetization, discovery and consumption. Publishing in LBRY is the process of sharing your content on the network. You have the ability to set the price per view (can be free too) which is paid directly to you. This process involves making a "claim" in the LBRY blockchain which will be used to retrieve the content via a URL. Content can either be published anonymously or to a particular channel/identity which groups content in a single location. Both channels and claims require a deposit (bid) of LBRY Credits (LBC) in order to reserve their location on the LBRY network. This deposit will be deducted from your balance as long as the claim is active. See our [naming](/faq/naming) and [transaction](/faq/transaction-types) documentation for more information about claims, bids and transactions.

To see our recommended video upload format and settings, please see our [video publishing guide](/faq/video-publishing-guide).

If you are a YouTube Sync user, please make sure to [read our FAQ](https://lbry.com/faq/youtube) on how this process works.

If you don't have LBRY yet, download it [here](/get). You can also publish files up to 1 GB from the web at [lbry.tv](https://lbry.tv).

**IMPORTANT NOTE: Only use appropriate tags when publishing content. Tag abuse and follow for follow/view for view type activity is prohibited and will not be tolerated.**

## How do I publish content?

1. Click on the Account/LBC balance showing at the top right of the app. You will get a dropdown, select `Publish` from the menu.
   ![Click the Publish Button](https://spee.ch/@clem:0/publishclick.png)

2. Under the `Publish` section, click `Choose File`.

3. On your local machine, select the content you wish to upload to LBRY. For video content, LBRY works best with MP4 files in H264/AAC format which support proper streaming (see [video publishing guide for details](/faq/video-publishing-guide)). Besides videos, other popular formats supported are MP3s, text documents like markdown (md)/HTML, PDF, CSV, and comic books (cbr, cbz). In the future, the in app player may support additional formats.

Other file types can also be uploaded, but won't be streamable via LBRY directly. They can be opened externally for viewing on the Desktop/Android apps.

4. Enter a `Title` and `Description` for your content. Click on advanced Editor if you will like to add some markdown text otherwise leave it as default and put your title and description.

5. Choose a `Thumbnail` or `Thumbnail URL` for your content. The `Thumbnail URL` is a hyperlink to an image file which will serve as a preview for your content. It can be any image/GIF URL, or you can use [spee.ch](https://www.spee.ch) to host it. The default pixel size is 800x450, but the app will scale it up/down. Images uploaded directly from your local machine as `Thumbnail` will be uploaded to [spee.ch](https://www.spee.ch).

6. Please make sure to check the option for mature audiences if your `Thumbnail` is categorized as NSFW (Not Safe For Work). Otherwise just click "Upload".

7. Next you can add tags to your content which will help categorize it for [discovery purposes](https://lbry.com/faq/trending). If it's intended for mature audiences, please add the pink `mature` tag. Next, determine any other tags that relate to the content you are publishing. Please be mindful of accuracy when tagging content as this is currently up to the publisher only and cannot be edited. If incorrect/inappropriate tags are used, your content may be filtered to provide a better user experience. In the future, this will be done through community voting and building a web of trust.

![publish process](https://spee.ch/@clem:0/publish-process.png)

8. You have the option to select/create the channel you would like to publish the content under. If no channel is selected, it will be posted anonymously.
   ![Select Channel or Anonymous](https://spee.ch/8/channel-createp.png)

9. Type in the URL you want the content to be found under, along with a minimum of 0.00000001 LBC deposit for the upload (default amount is higher due to publishing fees). If you are trying to outbid a user-friendly/common URL, the system will suggest a minimum bid to take over the content at that vanity URL. There may be a delay for this takeover. Making your bid higher will result in [better discovery](https://lbry.com/faq/trending) for your content. For more details regarding the URL or bid, check out our [naming document](/faq/naming).
   ![Video URL and Deposit](https://spee.ch/@clem:0/contentname.png)

10. Under the `Price`, first, determine if you want to make your content free or set a price (in USD or LBC) per view.

11. Next, there is `Additional Option` which gives you an option to select language and license. Default language is set to `English`, and the License is set to `None`. If a change is needed, click the dropdown menus and select the appropriate choice.

_please review our terms of service before publishing [terms of service](/termsofservice)_

12. Click `Publish`.

The file will process in the background and will be added to the LBRY Blockchain. Please leave LBRY running while your content is in the "pending confirmation" mode. This page will automatically refresh and you will be notified when the publish is completed. After this, your content will be available to other LBRY users. However, it is a good idea to leave LBRY open for a while after this to make sure the app is able to share your file to at least one peer on the data network. Larger files will take longer to upload depending on your network speed.

You can continue to use LBRY while the upload completes.

## How do I create a channel?

1. Open LBRY

2. Click on the cloud with an arrow pointing into it in the top right corner. 

3. Select `New Channel` in the dropdown menu.

4. Once your name is selected, there is a `Deposit` section that is below. It requires a minimum bid of 0.00001 LBC (see more on deposits [here](/faq/naming)). Please ensure that you have enough LBRY Credits in your wallet to cover the bid amount. There is also a small network fee associated with the creation of a channel.
   ![Set the Deposit](https://spee.ch/@clem:0/channel-createnew.png)

5. Click `Create channel` once you have entered your bid amount. You now own `lbry://@channelnameyoubidon` (the vanity name without a claim id) if you are the highest bidder.

## How do I customize my channel? {#channel}

First, you need to access your channel from your Publishes page by clicking on it.

1. You will now see an edit button next to the name. Click the button to proceed to the edit page.
   ![edit1](https://spee.ch/0/edit-1.jpeg)

2. You can now upload your thumbnail and cover image to spee.ch using the upload option from the dropdown on the left, or you can use an existing URL. If using spee.ch select the file, then click the upload button. The page will update once a valid URL is available.

![edit2](https://spee.ch/2/edit-2.jpeg)

3. Add your title, deposit (can stay the same, higher helps with discovery), website, email, description, and tags.

4. Click Submit.

## How do I delete my content and reclaim my deposit?

1. Click on the `Publishes` tab from the rightside of the app.

2. Select the content you want to remove from LBRY
   ![Content](https://spee.ch/@clem:0/delete-con.png)

3. Click on the `Delete` icon. 

4. There will be two options. `Delete this file from my computer` and `Abandon on blockchain (reclaim your LBC)`. Select the option that applies. Abandoning your claim will release the LBC back into your wallet (99% of the time you want to select this).
   ![abandon-delete box](https://spee.ch/@clem:0/check-delet.png)

**Warning: Deleting content is permanent. Please make sure this is what you want to do before confirming the deletion.**

5. Click `Remove`. If you abandoned your claim, you should see the deposit back in your balance shortly.

## How do I edit my existing published content?

1. Click on the `Publishes` tab from the right-side of the app.
2. Select the content you want to update.
3. Click `Edit`.
4. You can now edit your claim information. No need to re-select the file if it's the same one or has the same url.
5. When you are done, click `Save`.

## Where is my content stored and shared from? {#blobs}

Content uploaded is chunked up into 2MB files called blobs, and stored in your [lbrynet/blob files folder](https://lbry.com/faq/lbry-directories). These can be deleted if the video is fully streamable on [https://lbry.tv](https://lbry.tv) or [spee.ch](https://spee.ch).

## Can someone tip me for my content?

Yes, check out how tipping in LBRY works by going [here](/faq/tipping).

## Can I increase my bid amount?

Yes, the claim can be edited to increase the bid amount or you can also send a Support to your own content. The Support button will appear instead of the tip button for your own claims. See the [FAQ](/faq/tipping) to learn more.

## My video doesn't stream in the app or on lbry.tv, what's wrong?

The in-app and lbry.tv video player's streaming capability works best with the H264/AAC format, typically in an MP4 container but others like M4V will also work. Other non-streaming video types like AVI/WMV/MOV file formats are not supported by the in-app player, but they can be shared/downloaded and will play outside of the app.

## I shared my URL, but others can't download it. What's going on?

Since LBRY is a Peer-to-Peer network, it requires that your device is accessible to the internet. LBRY also runs servers to assist in content hosting, but this process may fail if your device cannot send it to us or if you didn't wait long enough after the initial publish. Try quitting (Ctrl-Q) and restarting the LBRY app if the content is not accessible on [lbry.tv](https://lbry.tv).

## Where is my channel and content saved locally?

Channels and content claims are saved to your LBRY Wallet along with your LBRY Credits. We recommend enabling the Sync feature on the Settings page. If not, when creating new channels, you'll need to create a new [backup of your wallet](/faq/how-to-backup-wallet).

## How and where can I share my content?

LBRY URLs can be shared with anyone - users can view it in their Desktop app or on [lbry.tv](https://lbry.tv) (see Share button in app). If the content is free and public, it can also be retrieved through [spee.ch](https://www.spee.ch) by going to https://spee.ch/<claimname> or https://spee.ch/<@channelname>. You can also share the content on our on [Discord](https://chat.lbry.com) where we have a vibrant community with thousands of users.

## I'm an advanced user, is there more I can poke around with?

Advanced users can check out the [API/CLI/SDK](https://lbry.tech/api/sdk) documentation for command line/API options.

## I'm confused and need some assistance, can you help?

Of course, we are always here to help! Check out our [help page](/faq/how-to-report-bugs) on how to reach us.
