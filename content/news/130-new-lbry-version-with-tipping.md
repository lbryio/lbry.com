---
author: samuel-lbryian
title: 'Latest LBRY App Adds Tipping, Themes, and More'
date: '2017-09-21 10:30:00'
---

The latest LBRY app, v0.16, is now available. [**Get it here**](https://lbry.io/get).

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
