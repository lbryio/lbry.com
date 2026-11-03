{
  "title": "Latest LBRY App Adds Tipping, Themes, and More",
  "url": "/news/new-lbry-version-with-tipping",
  "type": "news",
  "source_url": "https://lbry.com/news/new-lbry-version-with-tipping",
  "description": "The latest LBRY app, v0.16, is now available. Get it here. Release Notes Added Added a tipping button to send…",
  "images": [
    "https://spee.ch/0/lbrytipping.gif"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": true,
  "footer_email_href": "/cdn-cgi/l/email-protection#1a727f7676755a7678686334797577",
  "footer_email_code": "fd9598919192bd919f8f84d39e9290",
  "meta_title": "Latest LBRY App Adds Tipping, Themes, and More",
  "source_file": "content/news/130-new-lbry-version-with-tipping.md",
  "weight": -124,
  "has_date": true,
  "author": "samuel-lbryian",
  "date": "2017-09-21T10:30:00+00:00",
  "author_email_href": "/cdn-cgi/l/email-protection#bed6dbd2d2d1fed2dcccc790ddd1d3",
  "source_date": "2017-09-21 10:30:00",
  "index_order": 131
}
The latest LBRY app, v0.16, is now available. [**Get it here**](/get).

### Release Notes

![LBRY Tipping in Action](https://spee.ch/0/lbrytipping.gif)

### Added
  * Added a tipping button to send LBRY Credits to a creator. Credits sent in this way come into the wallets of creators as supporting claims for the content that was tipped.
  * Added an edit button on published content. Significantly improved UX for editing claims (but more to do).
  * Added theme settings option and new Dark theme.
  * Added a new component for rendering dates and times. This component can render the date and time of a block height, as well.

### Changed
  * Significantly more detail is shown about past transactions and new filtering options for transactions.
  * File pages now show the time of a publish.
  * The "auth token" displayable on Help offers security warning
  * More form refactoring, including the addition of a barebones `Form` component (further progress towards form sanity).
  * CSS significantly refactored to support CSS vars (and consequently easy theming).

### Fixed
  * URLs on cards will now show an ellipsis if longer than one line
  * Added `gnome-keyring` dependency to .deb (#386)
  * Fixed some issues with invites (#552)
  * Pressing enter on forms will no longer cause weird app behavior (#542)
