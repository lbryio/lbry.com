---
title: How do I get LBRY for development
---

#### On Linux

LBRY is installed into `/usr/share/python/lbrynet`. The executables are in
`/usr/share/python/lbrynet/bin`. For example, to run lbrynet-daemon, type:

    /usr/share/python/lbrynet/bin/lbry



#### On OS X

On OS X, you need more than the packaged app. You can install LBRY command line by running this in a terminal:

    curl -sL https://raw.githubusercontent.com/lbryio/lbry-setup/master/lbry_setup_osx.sh | sudo bash

This script will install lbrynet and its dependancies, as well as the app.