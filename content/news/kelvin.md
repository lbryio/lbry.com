{
  "title": "Shining warm (and cool) lights on LBRY Kelvin",
  "url": "/news/kelvin",
  "type": "news",
  "source_url": "https://lbry.com/news/kelvin",
  "description": "Reposts, content type icons, comment editing and more are here in the coolest LBRY Desktop release ever. Look, we get…",
  "images": [
    "https://lbry.com/img/blog-covers/kelvin.jpg",
    "https://spee.ch/5/lbry-kelvin.gif",
    "https://spee.ch/@lbry:3f/mediatypeicons.png]"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": true,
  "footer_email_href": "/cdn-cgi/l/email-protection#99f1fcf5f5f6d9f5fbebe0b7faf6f4",
  "footer_email_code": "9cf4f9f0f0f3dcf0feeee5b2fff3f1",
  "meta_title": "Shining warm (and cool) lights on LBRY Kelvin",
  "source_file": "content/news/256-kelvin.md",
  "weight": -253,
  "has_date": true,
  "author": "samuel-lbryian",
  "date": "2020-02-05T10:00:00+00:00",
  "cover": "kelvin.jpg",
  "category": "update",
  "cover_url": "/img/blog-covers/kelvin.jpg",
  "author_email_href": "/cdn-cgi/l/email-protection#48202d24242708242a3a31662b2725",
  "source_date": "2020-02-05 10:00:00",
  "index_order": 3
}
## Reposts, content type icons, comment editing and more are here in the coolest LBRY Desktop release ever.

Look, we get paid by how ridiculous our titles are, okay? You’ll probably live. But, *caveat emptor* and all.

Let’s look at what’s in LBRY Kelvin.

[Download Kelvin for desktop](https://lbry.com/get)

![Kelvin](https://spee.ch/5/lbry-kelvin.gif)

### Reposts

Reposts are inspired by retweets on Twitter, sharing on Facebook, or reposts on Tumblr, but designed for LBRY.

This update allows reposts to display in your browser, but does not allow your browser to issue them (command line junkies, [go here](https://lbry.tech/api/sdk#stream_repost)).

You can see an example repost in the [official @lbry channel](https://open.lbry.com/@lbry:3f).

Reposts will be a big part of our quest to have [500,000 new followers](https://open.lbry.com/@lbry:3f/downtofollowfebruary:b) on the LBRY network this month, as we enable creators to recommend other creators and improve content discovery in general.

### Content Type Icons and Download Buttons

You will now see feedback on tiles regarding content types, as well as download buttons. Sweet!

<p><img src="https://spee.ch/@lbry:3f/mediatypeicons.png]" alt="Content type icons"></p>

### Comment Editing and Deleting

The title says it. Now you can fat finger comments with reckless abandon. Click the menu in the top right of your comment to access these features.

## Full Release Notes

### Added

- Basic display of reposts ([#3593](https://github.com/lbryio/lbry-desktop/pull/3593))
- File type and content length icons ([#3572](https://github.com/lbryio/lbry-desktop/pull/3572))
- Download buttons on file previews ([#3546](https://github.com/lbryio/lbry-desktop/pull/3546))
- Comment edit and delete ([#3453](https://github.com/lbryio/lbry-desktop/pull/3453))
- Autoplay countdown timer ([#3556](https://github.com/lbryio/lbry-desktop/pull/3556))

### **Changed**

- Improved embed links on share page ([#3565](https://github.com/lbryio/lbry-desktop/pull/3565))
- Improved search and related content if mature setting enabled ([#3586](https://github.com/lbryio/lbry-desktop/pull/3586) / [#3577](https://github.com/lbryio/lbry-desktop/pull/3577))
- Library moved to sidebar ([#3562](https://github.com/lbryio/lbry-desktop/pull/3562))
- Better aria-labels for use with voiceover apps ([#3588](https://github.com/lbryio/lbry-desktop/pull/3588))

### **Fixed**

- Channels failing to update between synced devices ([#3619](https://github.com/lbryio/lbry-desktop/pull/3619))
- Channels that have been abandoned can now be unfollowed ([#3636](https://github.com/lbryio/lbry-desktop/pull/3636))
- Context menu not working properly in some cases ([#3604](https://github.com/lbryio/lbry-desktop/pull/3604))
- Don't autoplay paid content or content from blocked channels ([#3570](https://github.com/lbryio/lbry-desktop/pull/3570))
