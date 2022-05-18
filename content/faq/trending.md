---
title: Discovery and trending on LBRY
category: getstarted
order: 2
---

## How do trending, top, and discovery work on LBRY?

LBRY apps support dynamic trending and top discovery based on your interests and the channels you follow. This article explains how these features work. 

**Please note: Content publishers are responsible for ensuring appropriate and valid tags are used. If posting content for mature audiences, the Mature tag MUST be specified. Tag abuse and failure to apply appropriate tags will not be tolerated. Your channel may be filtered and rewards revoked.**

## How do I use it?
At the *Following* tab, you can toggle between Trending, Top, and New for content from the channels you follow. On *Discovery* tab you can browse the whole LBRY network. When Top is selected, you can also choose the relevant time frame. You can also browse these same options for specific tags by clicking on the tag name anywhere in the app or by searching for one.

![pic](https://spee.ch/4/61575f258acdc408.png)

## How do these views work?

| View             |  What It Shows  |
| --- | --- |
| _Trending_ | Trending shows the content that has had the greatest increase in tips and supports over the last few hours and days, compared to its baseline performance, and that of other content. |
| _Top_ | Top shows the content published within the selected period that has received the largest total amount of tips and supports. |
| _New_ | New shows the newest content by time. |

All of these views work the same whether you are viewing tags you follow, a single tag, channels you follow, or the whole LBRY network. Each of these views respects your Mature content setting and more options will be provided in a future release to filter out certain channels and tags.

## How do I customize these views for my interests?

### Customizing tags

To customize the tags you follow, click "Your Tags" in the sidebar and click `Manage` near the top right corner. You can set tags used for showing content in *Your tags* category. You can even type in a tag that has never been used before, and follow it in case someone publishes content with that tag in the future.

![yourtags](https://spee.ch/8/73ef9c8d156db359.png)

### Customizing channels

There are two ways to find channels to follow:

1. Click the follow button for creators that you are interested in. These buttons appear on channel and content pages.

![follow](https://spee.ch/5/6b670921539c1631.png)

2. Click "Following" from your home screen to discover and find new channels to follow using the `Discover Channels` option.

![pic](https://spee.ch/2/f847156011ad616c.png)  
Scrolling down in the *Disover channels* view, will also show you the Trending, Top, and New listings for channels.  
![top-channels](https://spee.ch/6/a9e254f61d10ff25.png)  


### Exploring tags

You can also explore each tag by clicking on it from anywhere on the screen or using the search function.

![exploretags](https://spee.ch/1/aef21eec1303ca49.png)

## How does content make it into top or trending?

Top content is based on calculations around the total LBC value of content, which is accumulated through the claim bid amount plus any community [tipping and supports](https://lbry.com/faq/tipping). Trending is similar and [is based on tip/support changes over a period of time](https://raw.githubusercontent.com/lbryio/lbry-hub/master/docs/trending%20algorithm.pdf). The Top category is normally instant - the highest-ranked LBC content will appear at the top when published in the time periods specified. Trending takes some time to update and larger tips/supports may see a delay to avoid abuse.

## How is this different from YouTube?

YouTube uses obscured, secret algorithms that are designed to be biased in favor of the mainstream media and other creators they prefer, rather than being neutral to all content ([See Veritasium's take on this](https://lbry.tv/@veritasium:f/my-video-went-viral-here-s-why:e)).

LBRY creates open-source code that allows all of the world to see precisely how our features work. We can then write articles like this one that tries to spell it out in plain language. The source code for the Trending/Top/New functionality is viewable [here](https://github.com/lbryio/lbry-hub/blob/master/hub/elastic_sync/service.py#L190).
