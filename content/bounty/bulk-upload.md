---
category: code
title: Bulk Sync/Upload Utility
award: 500
status: completed
date: '2018-03-20'
---

Completed in: https://github.com/marcdeb1/lbry_uploader

This bounty is to create a utility that can bulk upload a series of videos to LBRY. A LBRY term intern started implementing this in https://github.com/filipnyquist/lbrysync - this can be used as a base to fill in the rest of the required features.

This utility is for semi-technical users who have a large amount of content they want to sync. A good example use case would be the videos from a conference.

The typical input to the utility would be a CSV exported from a spreadsheet. The following columns would be included:

- Title
- File name, relative file path, or absolute file path
- Description
- Thumbnail URL
- Channel name
- Desired LBRY URL (optional - can be created from file name)
- Desired bid amount (optional - can default to amount across all files)
- Possibly something else sensible that the bounty writer has neglected to include ;)

The utility must:

- Process each line and perform an upload
- Give good feedback as to the state of the sync (e.g. it should give me feedback as it progresses)
- Properly finish the sync (i.e. it shouldn't exit until it confirms all content has actually published and synced)
- Be fully idempotent (stopping / halting the script midway and restarting it should never cause a problem)

The utility can assume at least moderate technical competency. While we always support user-friendliness, this tool would only be used by a user of at least moderate sophistication.
