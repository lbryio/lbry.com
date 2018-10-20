---
category: slack
title: Create a URL Handler for Slack
award: 1000
status: complete
date: '2016-07-01'
---

Create a script for Slackbot that will:

- Use the Slack API to monitor all messages in all channels
- Detect messages sent with LBRY URLs (e.g. `lbry://oprahbees`)
- Look up LBRY URLs
- Detect if the image resolves to a GIF/GIFV and has no license payment
- Fetch and display the image
