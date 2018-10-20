---
category: browser
title: Automatic App Updates
award: 1000
status: complete
date: '2017-07-22'
---

The LBRY app currently does not update itself automatically, however electron does support this feature.

To complete this bounty, [lbry-desktop](https://github.com/lbryio/lbry-desktop) must be modified as follows:

- Detect when a new latest release is available, download it and prompt the user with a "Restart LBRY" / "I'll do it later" dialog to have the update take effect.
- Parse the changelog for the latest release. If it contains `Security` items, carry out the update automatically without presenting the "I'll do it later" option.
- When an update begins store an update-history tracking file detailing what the version being updated is, what version it is being updated to, and when the update happened.
- Upon starting the app after an update, alert the user that the update was successful (and note if it contained security updates), and update the history file to indicate that the update was successful.

It is probably a good idea to consult with our development team on [Discord chat](https://chat.lbry.io) or via email before completing this bounty in its entirety.
