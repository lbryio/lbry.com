---
author: samuel-lbryian
title: 'LBRY v0.18 is Trending Towards Greatness'
date: '2017-11-13 14:25:00'
---

The latest LBRY app, v0.18, is now available! [**Get it here**](https://lbry.io/get).

### Release Notes

![Check out what's trending on LBRY!](https://spee.ch/2/Version18.gif)

### Added
* Trending! The landing page of the app now features content that is surging in popularity relative to past interest.
* The app now closes to the system tray. This will help to improve publish seeding and network performance. Directing the app to quit or exit will close it entirely. (#374)
* You can now revoke past publishes to receive your credits. (#581)
* You can now unlock tips sent to you so you can send them elsewhere or spend them. (#581)
* Added new window menu options for reloading and help.
* Rewards are now marked in transaction history (#660)

### Changed
* Daemon updated to v0.18.0. The largest changes here are several more network improvements and fixes as well as functionality and improvements related to concurrent heavier usage (bugs and issues largely discovered by spee.ch).
* Improved build and first-run process for new developers.
* Replaced all instances of XMLHttpRequest with native Fetch API (#676).

### Fixed
* Fixed console errors on settings page related to improper React input properties.
* Fixed modals being too narrow after font change (#709)
* Fixed bug that prevented new channel and first publish rewards from being claimed (#290)
