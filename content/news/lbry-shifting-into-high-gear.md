{
  "title": "LBRY v0.19 Is Shifting Into High Gear",
  "url": "/news/lbry-shifting-into-high-gear",
  "type": "news",
  "source_url": "https://lbry.com/news/lbry-shifting-into-high-gear",
  "description": "We've heard two requests from our community over and over again: make it easier to get LBC, and let users…",
  "images": [
    "https://spee.ch/e/subscriptions.gif"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": true,
  "footer_email_href": "/cdn-cgi/l/email-protection#92faf7fefefdd2fef0e0ebbcf1fdff",
  "footer_email_code": "68000d04040728040a1a11460b0705",
  "meta_title": "LBRY v0.19 Is Shifting Into High Gear",
  "source_file": "content/news/147-lbry-shifting-into-high-gear.md",
  "weight": -141,
  "has_date": true,
  "author": "samuel-lbryian",
  "date": "2017-12-11T12:45:00+00:00",
  "author_email_href": "/cdn-cgi/l/email-protection#91f9f4fdfdfed1fdf3e3e8bff2fefc",
  "source_date": "2017-12-11 12:45:00",
  "index_order": 115
}
We've heard two requests from our community over and over again: make it easier to get LBC, and let users subscribe to their favorite creators.

With that in mind, the newest LBRY update should be a crowd-pleaser! Channel subscriptions are live, and we've integrated [ShapeShift](https://shapeshift.io) to allow users to easily convert popular cryptos into LBC without leaving the app.

You'll find all this (and a lot more) in LBRY v0.19 - [**get it here**](/get) and check out the full release notes below.

![LBRY Search Tool In Action](https://spee.ch/e/subscriptions.gif)

## Release Notes

### Added
  * [Subscriptions](https://github.com/lbryio/lbry-desktop/issues/715). File and channel pages now show a subscribe button. A new "Subscriptions" tab appears on the homepage shows the most recent content from subscribed channels.
  * [LBC acquisition widget](https://github.com/lbryio/lbry-desktop/issues/609). Convert other popular cryptos into LBC via a ShapeShift integration.
  * [Flow](https://flow.org) static type checking. This is a dev-only feature but will make development faster, less error-prone, and better for newcomers.

### Changed
  * The first run process for new users has changed substantially. New users can now easily receive one credit.
  * The wallet area has been re-organized. Send and Receive are now on the same page. A new page, "Get Credits", explains how users can add LBRY Credits to the app.
  * Significant structural changes to code organization, packaging, and building. The app now follows a typical electron folder structure. All 3 package.json files have been reduced to a single file. Redux related code was moved into its own subfolder.
  * The macOS docking icon has been improved.
  * The prompt for an insufficient balance is much more user-friendly.
  * The credit balance displayed in the main app navigation displays two decimal places instead of one.
  * Video download error messages are now more understandable.
  * Windows path to the daemon/CLI executables changed to: C:\Program Files (x86)\LBRY\resources\static\daemon

### Deprecated
  * We previously had two separate models for insufficient Credits. These have been combined.

### Fixed
  * Long channel names causing inconsistent thumbnail sizes.
  * Channel names in pages are highlighted to indicate them being clickable.
  * Fixed the transaction screen not loading for brand new users.
  * Fixed issues with scrolling and back and forward navigation.
  * Fixed sorting by title for published files.
  * App now uses the new balance_delta field provided by the LBRY API.
  * Abandoning from the claim page now works.
