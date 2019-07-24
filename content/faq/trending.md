---
title: Discovery and Trending on LBRY
category: getstarted
order: 2
---

# How Do Trending, Top, and Discovery Work on LBRY?

As of the [LBRY Erikson Release](https://github.com/lbryio/lbry-desktop/releases/tag/v0.34.0), the LBRY desktop app and web app support dynamic trending and top views based on your interests and the channels you follow. This article explains how these features work. **Please note: Your list of followed tags does not currently sync between devices and may be lost if cache/data is cleared.**

### How Do I Use It?

At the top of your Home area, you can toggle between Trending, Top, and New for either your interests (tags you follow), your channels, or the whole LBRY network. When Top is selected, you can also choose the relevant time frame. You can also browse these same options for specific tags by clicking on the tag name anywhere on the screen or by searching for one. 

![pic](https://spee.ch/1/options-1.jpeg)

### How Do These Views Work?

| View   |  What It Shows  |
| --- | --- |
| _Trending_ | Trending shows the content that has had the greatest increase in tips and supports over the last 24 hours, compared to its baseline performance, and that of other content, over the last 7 days. |
| _Top_ | Top shows the content published within the selected period that has received the largest total amount of tips and supports. |
| _New_ | New shows the newest content by time. |

All of these views work the same whether you are viewing tags you follow, a single tag, channels you follow, or the whole LBRY network. Each of these views respects your Mature content setting and more options will be provided in a future release to filter out certain channels and tags.

### How Do I Customize These Views For My Interests?

#### Customizing Tags

To customize the tags you follow, click "Customize" from your home screen and select content areas that interest you. You can search for tags that have been used and follow those that interest you. You can even type in a tag that has never been used before, and follow it in case someone publishes content with that tag in the future.

![pic](https://spee.ch/7/customize-2.jpeg)
![pic](https://spee.ch/4/customize-white.jpg)

#### Customizing Channels

There are two ways to follow channels:

1. Click the follow button for creators that you are interested in. These buttons appear on channel and content pages.

![pic](https://spee.ch/6/follow-white.jpg)

2. Click "Customize" from your home screen to discover and follow new channels using the `Find New Channels` option. Suggested channels include those most subscribed on LBRY and those who have been featured creators. More suggested channel options will be added in a future release.

![pic](https://spee.ch/9/channel-2.jpeg)

#### Exploring Tags

You can also explore each individual tag by clicking on it from anywhere on the screen or using the search function. Once you are on a tag page, you can click the follow button to add it to your customized list of tags. 

![explore](https://spee.ch/c/view-tags.jpeg)

### How Is This Different From YouTube?

YouTube uses obscured, secret algorithms that are designed to be biased in favor of the mainstream media and other creators they prefer, rather than being neutral to all content ([See Veritasium's take on this](https://beta.lbry.tv/my-video-went-viral-here-s-why/)).

LBRY creates open-source code that allows all of the world to see precisely how our features work. We can then write write articles like this one that try to spell it out in plain language. The source code for the Trending/Top/New functionality is viewable [here](https://github.com/lbryio/lbry-sdk/blob/master/lbry/lbry/wallet/server/db/trending.py). 
