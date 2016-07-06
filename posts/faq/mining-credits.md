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
1. `unzip osxbins.zip`
1. `mkdir ~/Library/Application\ Support/lbrycrd`
1. `sudo chown -R "$(whoami)" ~/Library/Application\ Support/lbrycrd`
1. `echo -e "rpcuser=lbryrpc\nrpcpassword=$(env LC_CTYPE=C LC_ALL=C tr -dc A-Za-z0-9 < /dev/urandom | head -c 16 | xargs)" > ~/Library/Application\ Support/lbrycrd/lbrycrd.conf`
1. `./lbrycrdd -server -printtoconsole -gen`
1. If you need to start over, run `rm -rf bins.zip lbry* ~/.lbry ~/Library/Application\ Support/lbrycrd`. **Note:** this will delete your wallet and any credits you may have.

## Compiling

LBRY can be compiled quite similarly to Bitcoin. Pester @jackrobison on Slack to fill this in!

## FAQ

###Q. How do I check my balance?
**A.** You can use `lbrycrd-cli getbalance`, `getinfo`, or `lbrycrd-cli getwalletinfo` for more detailed information. It takes 100 confirmed blocks (roughly 4 hours) for mined LBC to show up in your confirmed balance, but you can see these credits in your immature balance in getwalletinfo.

###Q. How do I check my address?
**A.** You can get a new address with `lbrycrd-cli getnewaddress` to generate a new receiving address.

###Q. What are some other commands available?
**A.** lbrycrd is forked from bitcoin core, so many (but not all) of the available commands for the original client can be passed via lbrycrd-cli, like those above. Here is a list: https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list

###Q. I can't get lbrycrd-cli to work, is there another way?
**A.** If you cannot get the cli to work, first check that you passed -server when starting lbrycrdd. If it still can't connect, you can try running this command:

`curl --user USER:PASSWORD --data-binary '{"jsonrpc": "1.0", "id":"curltest", "method": "COMMAND", "params": [] }' -H 'content-type: text/plain;' http://127.0.0.1:9245/`

USER and PASSWORD come from the above instructions and can be found in `~/Library/Application\ Support/lbrycrd/lbrycrd.conf`, COMMAND can be any of the above methods like getbalance or getnewaddress. 9245 is the default port used, but if you chose a custom port for the server, you'll need to use that instead. If the command accepts parameters, they can be passed inside the params array [].

###Q. Can I check my hashrate?
**A.** Not at the present time, but that feature is coming soon (gethashespersec is not implemented for lbrycrd yet).

## Technical Problems

Have a technical problem? If you're having an issue with install of the UI/miner, or something involving an invite code, please join the slack at https://lbry.slack.com and in channel #bugs post a SINGLE detailed note with what exactly is going on.  If you can get to the LBRY UI after installing, but can't watch a video or have another problem, please click the three horizontal lines in the top right hand corner of the LBRY UI, click Help, then click the Send Us a Bug Report link.