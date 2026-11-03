{
  "title": "What are the recommended dimensions for thumbnails and covers?",
  "url": "/faq/thumbnails-and-covers",
  "type": "faq",
  "source_url": "https://lbry.com/faq/thumbnails-and-covers",
  "description": "Even though LBRY does not enforce any file size, dimension, or aspect ratio properties, our applications are optimized to provide…",
  "images": [
    "https://img.lbry.to/files/jefbxe.png",
    "https://img.lbry.to/files/ugyrcm.png"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#4c24292020230c202e3e35622f2321",
  "footer_email_code": "fc9499909093bc909e8e85d29f9391",
  "meta_title": "What are the recommended dimensions for thumbnails and covers? - LBRY",
  "category": "publisher",
  "source_file": "content/faq/thumbnails-and-covers.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/thumbnails-and-covers.md",
  "source_order": 2,
  "weight": 26
}
Even though LBRY does not enforce any file size, dimension, or aspect ratio properties, our applications are optimized to provide the best experience for viewing content thumbnails, channel covers, and channel profile thumbnails.

## Supported file types
Standard and common image types like jpg, png, and gif are all supported and recommended. Additional image types that render in most modern web-browsers can be used, but are less common and tested.

## Content thumbnails
When publishing content thumbnails, we recommend a minimum size of 800x450 and an aspect ratio of 16:9.

Applications can make their own choices on how to render thumbnails. Most applications choose to crop to the center when an image does not fit their desired ratios.

![content](https://img.lbry.to/files/jefbxe.png)

## Channel covers and profile thumbnails
When creating or editing your channel, we recommend the following:
- **cover photo**: minimum size of 1000x160 and an aspect ratio of 6.25:1
- **profile thumbnail**: minimum size of 300x300 and an aspect ratio of 1:1 (square). 

Applications can make their own choices on how to render these images. Most applications choose to crop to the center when an image does not fit their desired ratios.

![channel](https://img.lbry.to/files/ugyrcm.png)

## How are uploads stored?

If you are using LBRY to upload the images, they will go through [spee.ch](https://spee.ch) which is limited to 2MB per file. We are working on implementing a new thumbnail upload process directly on the LBRY protocol.
