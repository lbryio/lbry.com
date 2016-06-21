---
title: How do I get LBRY for development
date: '2015-05-24 16:00:00'
---

In order to run lbry from command line, you need more than the packaged app/deb.

######On OS X

You can install LBRY command line by running `curl -sL https://rawgit.com/lbryio/lbry-setup/master/lbry_setup_osx.sh | sudo bash` in a terminal. This script will install lbrynet and its dependancies, as well as the app.

######On Linux

On Ubuntu or Mint you can install the prerequisites and lbrynet by running

    sudo apt-get install libgmp3-dev build-essential python2.7 python2.7-dev python-pip
    git clone https://github.com/lbryio/lbry.git
    cd lbry
    sudo python setup.py install
