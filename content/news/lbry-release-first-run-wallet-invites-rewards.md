{
  "title": "Latest LBRY App Adds New First Run, Wallet, Invites, Rewards and More",
  "url": "/news/lbry-release-first-run-wallet-invites-rewards",
  "type": "news",
  "source_url": "https://lbry.com/news/lbry-release-first-run-wallet-invites-rewards",
  "description": "The latest LBRY app, v0.15 and the first update since open beta, is now available. Get it here. Release Notes…",
  "images": [
    "https://spee.ch/5/newlbryinvitepage.png",
    "https://spee.ch/9/newlbryrewardproof.png"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": true,
  "footer_email_href": "/cdn-cgi/l/email-protection#eb838e878784ab87899992c5888486",
  "footer_email_code": "ff979a939390bf939d8d86d19c9092",
  "meta_title": "Latest LBRY App Adds New First Run, Wallet, Invites, Rewards and More",
  "source_file": "content/news/129-lbry-release-first-run-wallet-invites-rewards.md",
  "weight": -123,
  "has_date": true,
  "author": "jeremy-kauffman",
  "date": "2017-08-31T15:19:00+00:00",
  "author_email_href": "/cdn-cgi/l/email-protection#a7cdc2d5c2cadee7cbc5d5de89c4c8ca",
  "source_date": "2017-08-31 15:19:00",
  "index_order": 134
}
The latest LBRY app, v0.15 and the first update since open beta, is now available. [**Get it here**](/get).

## Release Notes

The release notes are below. These notes are copied from the [GitHub releases page](https://github.com/lbryio/lbry-desktop/releases), which is the official source of release notes.

For immediate notification of releases, you can watch the project on GitHub.

### Added
  * Added an Invites area inside of the Wallet. This allows users to invite others and shows the status of all past invites (including all invite data from the past year). Up to one referral reward can now be claimed, but only if the invitee passed the humanity test. ![New Invite Page](https://spee.ch/5/newlbryinvitepage.png)
  * Added new summary components for rewards and invites to the Wallet landing page.
  * Added a forward button and improved history behavior. Back/forward disable when unusable.
  * Added history of rewards to the rewards page.
  * Added wallet backup guide reference.
  * Added a new widget for setting prices (`FormFieldPrice`), used in Publish and Settings.

### Changed
  * Updated to daemon [0.15](https://github.com/lbryio/lbry/releases). Most relevant changes to the app are improved announcing of content, and a fix for the daemon getting stuck running.
  * Significant refinements to the first-run process, the process for new users, and introducing people to LBRY and LBRY Credits.
![New Reward Enrollment](https://spee.ch/9/newlbryrewardproof.png)
  * Changed Wallet landing page to summarize the status of other areas. Refactored wallet and transaction logic.
  * Added icons to missing page, improved icon and title logic.
  * Changed the default price settings for priced publishes.
  * When an "Open" button is clicked on a show page, if the file fails to open, the app will try to open the file's folder.
  * Updated several packages and fixed warnings in the build process (all but the [fsevents warning](https://github.com/yarnpkg/yarn/issues/3738), which is a rather dramatic debate)
  * Some form field refactoring as we take baby steps towards form sanity.
  * Replaced confusing placeholder text from email input.
  * Refactored modal and settings logic.
  * Refactored history and navigation logic.

### Fixed
  * Tiles will no longer be blurry on hover (Windows only bug)
  * Removed placeholder values from price selection form fields, which was causing confusion that these were real values (#426)
  * Fixed showing "other currency" help tip in publish form, which was caused due to not "setting" state for price
  * Publish page now properly checks for all required fields are filled
  * Fixed pagination styling for pages > 5 (#416)
  * Fixed sizing on squat videos (#419)
  * Support claims no longer show up on the Published page (#384)
  * Fixed rendering of small prices (#461)
  * Fixed incorrect URI in Downloads/Published page (#460)
  * Fixed menu bug (#503)
  * Fixed incorrect URLs on some channel content (#505)
  * Fixed video sizing for squat videos (#492)
  * Fixed issues with small prices (#461)
  * Fixed issues with negative values not being stopped by the app on entry (#441)

### Removed
  * Removed the label "Max Purchase Price" from the settings page. It was redundant.
  * Unused old files from the previous commit(9c3d633)
