---
author: jeremy-kauffman
title: 'Latest LBRY App Adds New First Run, Wallet, Invites, Rewards and More'
date: '2017-08-31 15:19:00'
---

The latest LBRY app, v0.15 and the first update since open beta, is now available. [**Get it here**](https://lbry.io/get).

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
  * Significant refinements to the first-run process, the process for new users, and introducing people to LBRY and LBRY credits.
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
