---
title: How do I specify a web-UI to use?
category: developer
---

If the files for the UI you'd like to use are stored locally on your computer, start LBRY with the `--ui` flag:

    lbrynet-daemon --ui=/full/path/to/ui/files/root/folder

Once set with the UI flag, the given UI will be cached by LBRY and used as the default going forward. Also, LBRY will only successfully load a UI if the UI contains a conforming requirements.txt file to specify the required versions of lbrynet and lbryum. [Here](https://github.com/lbryio/lbry-web-ui/blob/master/dist/requirements.txt) is an example requirements.txt file.

To reset your UI to pull from lbryio, or to try a UI still in development, run LBRY with the `--branch` flag:

    lbrynet-daemon --branch=master
