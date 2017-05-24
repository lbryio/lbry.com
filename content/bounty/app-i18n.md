---
category: browser
title: Internationalization of LBRY Browser
award: 2000
status: available
date: '2016-07-01'
---

The LBRY browser is currently lacking support for internationalization.

To complete this bounty, [lbry-web-ui](https://github.com/lbryio/lbry-web-ui) must be modified as follows:

- Add [gettext](https://en.wikipedia.org/wiki/Gettext) internationalization calls to the React app
- Store selected language in the user settings
- Load and perform translation based on language settings
- Existing component text and messaging must be wrapped in translation calls

It is probably a good idea to consult with our development team on [Slack](https://slack.lbry.io) or via email before completing this bounty in it's entirety.