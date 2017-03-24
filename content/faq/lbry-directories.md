---
title: Where are all the behind the scenes files?
category: setup
---

Depending on which OS and wallet you use, LBRY files may be stored in several places.

## Windows

- `C:\Program Files (x86)\lbrynet` - LBRY application itself
- `C:\Users\%USER%\AppData\Roaming\lbrynet` - Daemon configuration and blobs
- `C:\Users\%USER%\AppData\Roaming\LBRYum` - Wallet and blockchain headers (if using the app or the lbryum wallet)

## MacOS

- `~/Library/Application Support/LBRY` - LBRY application itself
- `~/Library/Application Support/lbrycrd` - Wallet and blockchain (if using lbrycrdd wallet)
- `~/.lbrycrd` - Alternate location for lbrycrdd wallet and blockchain
- `~/.lbryum` - Wallet and blockchain headers (if using the app or the lbryum wallet)

## Linux

- `/opt/LBRY` - LBRY application itself
- `~/.lbrynet` - Daemon configuration and blobs
- `~/.lbryum` - Wallet and blockchain headers (if using the app or the lbryum wallet)
- `~/.lbrycrd` - Wallet and blockchain (if using lbrycrdd wallet)
