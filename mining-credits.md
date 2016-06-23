---
title: How do I mine LBRY credits?
---

LBRY binaries are out for OS X and Ubuntu. Others may try compiling from source. 

## Mining on Ubuntu

1. `wget https://s3.amazonaws.com/files.lbry.io/bins.zip`
1. `unzip bins.zip`
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry*`

## Mining on macOS

1. `wget https://s3.amazonaws.com/files.lbry.io/osxbins.zip``
1. `unzip bins.zip`
1. `./lbrycrdd -server -printtoconsole -gen`
1. `mkdir ~/Library/Application\ Support/lbrycrd`
1. `sudo chown -R your-username ~/Library/Application\ Support/lbrycrd`
1. `nano ~/Library/Application\ Support/lbrycrd/lbrycrd.conf`
1. Add:
  `rpcuser=lbryrpc`
   `rpcpassword=gibberish`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry ~/Library/Application\ Support/lbrycrd`
1. Save 

## Compiling

LBRY can be compiled quite similarly to Bitcoin. Pester @jackrobison on Slack to fill this in!
