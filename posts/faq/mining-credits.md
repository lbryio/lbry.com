---
title: How do I mine LBRY credits?
---

LBRY binaries are out for OS X and Ubuntu. Others may try compiling from source.

## Mining on Ubuntu

1. `wget https://s3.amazonaws.com/files.lbry.io/bins.zip`
1. `unzip bins.zip`
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry*`. **Note:** this will delete your wallet and any credits you may have.

## Mining on macOS

1. `wget https://s3.amazonaws.com/files.lbry.io/osxbins.zip`
1. `unzip bins.zip`
1. `mkdir ~/Library/Application\ Support/lbrycrd`
1. `sudo chown -R "$(whoami)" ~/Library/Application\ Support/lbrycrd`
1. `echo -e "rpcuser=lbryrpc\nrpcpassword=$(env LC_CTYPE=C LC_ALL=C tr -dc A-Za-z0-9 < /dev/urandom | head -c 16 | xargs)" > ~/Library/Application\ Support/lbrycrd/lbrycrd.conf`
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry ~/Library/Application\ Support/lbrycrd`. **Note:** this will delete your
   wallet and any credits you may have.

## Compiling

LBRY can be compiled quite similarly to Bitcoin. Pester @jackrobison on Slack to fill this in!
