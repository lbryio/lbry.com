---
title: Where are all the behind the scenes files?
category: setup
---

Depending on which OS and wallet you use, LBRY files may be stored in several places.

## Windows

- `C:\Program Files\LBRY` [32-bit located in Program Files(x86)] - LBRY application itself
- `C:\Users\%USER%\AppData\Local\lbry\lbrynet` or `%localappdata%\lbry\lbrynet` - Daemon configuration and encrypted blob files
- `C:\Users\%USER%\AppData\Local\lbry\lbryum` or `%localappdata%\lbry\lbryum` - Wallet and blockchain headers

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be in `%appdata%`*

## MacOS

- `~/Library/Application Support/LBRY` - LBRY application, daemon configuration and encrypted blob files
- `~/.lbryum` - Wallet and blockchain headers
- `~/.lbrycrd` - Location for [lbrycrdd](https://lbry.io/faq/standalone-wallet) full blockchain data (separate install)


*Hint: copy/paste the above directories into Finder - Click `Go` from the Finder top menu bar, then `Go To Folder`*

## Linux

- `/opt/LBRY` - LBRY application itself
- `~/.local/share/lbry/lbrynet` - Daemon configuration and encrypted blob files
- `~/.local/share/lbry/lbryum` - Wallet and blockchain headers
- `~/.lbrycrd` - Location for [lbrycrdd](https://lbry.io/faq/standalone-wallet) full blockchain data (separate install)

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be `~/.lbrynet` / `~/.lbryum`*
