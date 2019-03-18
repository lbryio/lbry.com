---
author: samuel-lbryian
title: 'LBRY v0.19 Is Shifting Into High Gear'
date: '2017-12-11 12:45:00'
---

We've heard two requests from our community over and over again: make it easier to get LBC, and let users subscribe to their favorite creators.

With that in mind, the newest LBRY update should be a crowd-pleaser! Channel subscriptions are live, and we've integrated [ShapeShift](https://shapeshift.io) to allow users to easily convert popular cryptos into LBC without leaving the app.

You'll find all this (and a lot more) in LBRY v0.19 - [**get it here**](https://lbry.io/get) and check out the full release notes below.

![LBRY Search Tool In Action](https://spee.ch/e/subscriptions.gif)

## Release Notes

### Added
  * [Subscriptions](https://github.com/lbryio/lbry-desktop/issues/715). File and channel pages now show a subscribe button. A new "Subscriptions" tab appears on the homepage shows the most recent content from subscribed channels.
  * [LBC acquisition widget](https://github.com/lbryio/lbry-desktop/issues/609). Convert other popular cryptos into LBC via a ShapeShift integration.
  * [Flow](https://flow.org) static type checking. This is a dev-only feature but will make development faster, less error-prone, and better for newcomers.

### Changed
  * The first run process for new users has changed substantially. New users can now easily receive one credit.
  * The wallet area has been re-organized. Send and Receive are now on the same page. A new page, "Get Credits", explains how users can add LBRY credits to the app.
  * Significant structural changes to code organization, packaging, and building. The app now follows a typical electron folder structure. All 3 package.json files have been reduced to a single file. Redux related code was moved into its own subfolder.
  * The macOS docking icon has been improved.
  * The prompt for an insufficient balance is much more user-friendly.
  * The credit balance displayed in the main app navigation displays two decimal places instead of one.
  * Video download error messages are now more understandable.
  * Windows path to the daemon/CLI executables changed to: C:\Program Files (x86)\LBRY\resources\static\daemon

### Deprecated
  * We previously had two separate models for insufficient credits. These have been combined.

### Fixed
  * Long channel names causing inconsistent thumbnail sizes.
  * Channel names in pages are highlighted to indicate them being clickable.
  * Fixed the transaction screen not loading for brand new users.
  * Fixed issues with scrolling and back and forward navigation.
  * Fixed sorting by title for published files.
  * App now uses the new balance_delta field provided by the LBRY API.
  * Abandoning from the claim page now works.
