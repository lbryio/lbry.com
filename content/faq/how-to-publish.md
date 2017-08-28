## How to publish content on LBRY

Download the LBRY app [here](https://lbry.io/get)

Publishing content in LBRY is how your media is uploaded to our application and accessible through the LBRY protocol and allows users to see your content.

### How to create a channel
1. Open the LBRY app. If it prompts you to update, run the update to be on the most recent version.
2. Load the application and  click the `Publish` button.
3. In the `Channel Name` section click the dropdown and select `New Channel` and  declare the name you would like for your channel.  For more details on different channel types, see our write up on [naming](https://lbry.io/faq/naming).
4. Once your name is selected, there is a `Deposit` section that is below.  It requires a minimum bid of .0001 LBC (see more on deposits [here](https://lbry.io/faq/naming)).
5. Click `Create Channel` once you have selected your bid amount.  Your deposit is a bid and if this channel isn't claimed by another bid, the channel is yours to use. You now own `lbry://@channelnameyoubidon#` and `lbry://@channelnameyoubidon` if you are the highest bidder.

### Publish Content to a Channel

1. Under the `Content` section click `Choose File`.
2. On your local machine, pick what content you would like to upload to LBRY.  LBRY accepts any HTML5 format for video, the full list can be found [here](https://developer.mozilla.org/en-US/docs/Web/HTML/Supported_media_formats) .
3. Select a `Title`, `Thumbnail URL`, and `Description` for your upload.
4.  Below those there is a `Language` and `Maturity` which will default to `English` and `All Ages`.  If a change is needed to these defaults click the dropdowns and change them.
Under the `Access` section pick the appropriate type of license your uploaded content should use. </br>
5. Choose the channel name you would like to publish the channel under.
6. Type out the full url you want the content to be found under along with a minimum of .1 LBC minimum deposit for the upload.
7. Read and agree to the terms of service.
8. Click publish.

### Abandoning a claim and deleting uploaded content

1. Click on the folder icon in the top right.
2. Click on the `Published` link.
3. Click on the `...` next to the `Open` link.
4. Select `Remove...`.
5. There will be two options.  `Abandon the claim for this URI` and `Delete this file from my computer`.  Select the option that applies.  <b>Warning: Deleting content is permanent.  Please make sure this is what you want to do before confirming the deletion.
6. Click `Remove`.

### Editing your claim on a channel

1. Go to the `Publish` page.
2. In the `Content URL` section type in the route of the claim of the content you would like to edit.
3. Below the URL you will see text saying "You already have a claim with this name." and a link that says `Use data from my existing claim`.  Click the link.
4. You can now edit your uploaded claim information.

Advanced users: All of the steps above are for the LBRY app.  For additional details of how to conduct any of these actions through the cli please see the documentation on the [cli](https://lbryio.github.io/lbry/cli/).
