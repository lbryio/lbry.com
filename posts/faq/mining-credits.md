---
title: How do I mine LBRY credits?
category: mining
---
Library Credits (LBC) are mined over a 20-year Proof of Work period.
Block rewards increase every 100 blocks by 1LBC, peak at 500, and decline slowly.

For GPU mining, please see our list of [pools](https://lbry.io/faq/mining-pools). Each pool has a slightly different setup so please check their Getting Started page.

For CPU mining, LBRY binaries are out for OS X, Windows, and Ubuntu. Others may try compiling from source.

You can download the latest binaries [here](https://github.com/lbryio/lbrycrd/releases/latest)

## Mining on Ubuntu

1. unzip the binaries, and `cd` into the directory containing them
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry*`. **Note:** this will delete your wallet and any credits you may have.

## Mining on macOS

1. unzip the binaries, and `cd` into the directory containing them
1. `mkdir ~/Library/Application\ Support/lbrycrd`
1. `sudo chown -R "$(whoami)" ~/Library/Application\ Support/lbrycrd`
1. `echo -e "rpcuser=lbryrpc\nrpcpassword=$(env LC_CTYPE=C LC_ALL=C tr -dc A-Za-z0-9 < /dev/urandom | head -c 16 | xargs)" > ~/Library/Application\ Support/lbrycrd/lbrycrd.conf`
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry ~/Library/Application\ Support/lbrycrd`. **Note:** this will delete your wallet and any credits you may have.

## Compiling

Join us on [Slack](https://slack.lbry.io) if you need help compiling from source!
