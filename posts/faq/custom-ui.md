---
title: How do I specify a web-UI to use?
---

If the files for the UI you'd like to use are stored locally on your computer, start lbry with the `--ui` flag:

    `lbrynet-daemon --ui=/full/path/to/ui/files/root/folder`

Once set with the UI flag, the given UI will be cached by lbry and used as the default going forward. Also, it will only successfully load a UI if it contains a conforming requirements.txt file to specify required lbrynet and lbryum versions. [Here](https://github.com/lbryio/lbry-web-ui/blob/master/dist/requirements.txt) is an example requirements.txt file.

To reset your ui to pull from lbryio, or to try a UI still in development, run lbry with the `--branch` flag:

    `lbrynet-daemon --branch=master`
