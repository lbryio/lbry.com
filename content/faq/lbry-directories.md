---
title: Where are all the behind the scenes files?
category: powerusers
---

Depending on which OS and wallet you use, LBRY files may be stored in several places.

## Windows

- `C:\Program Files\LBRY` [32-bit located in Program Files(x86)] - LBRY application itself
- `C:\Users\%USER%\AppData\Local\lbry\lbrynet` or `%localappdata%\lbry\lbrynet` - Daemon configuration, logs, encrypted blob files
- `C:\Users\%USER%\AppData\Local\lbry\lbryum` or `%localappdata%\lbry\lbryum` - Wallet and blockchain data

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be in `%appdata%`*

## MacOS

- `~/Library/Application Support/LBRY` - LBRY application, daemon configuration, logs and encrypted blob files
- `~/.lbryum` - Wallet and blockchain data
- `~/.lbrycrd` - Location for [lbrycrdd](/faq/standalone-wallet) full blockchain data (separate install)


*Hint: copy/paste the above directories into Finder - Click `Go` from the Finder top menu bar, then `Go To Folder`*

## Linux

- `/opt/LBRY` - LBRY application itself
- `~/.local/share/lbry/lbrynet` - Daemon configuration and encrypted blob files
- `~/.local/share/lbry/lbryum` - Wallet and blockchain headers
- `~/.lbrycrd` - Location for [lbrycrdd](/faq/standalone-wallet) full blockchain data (separate install)

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be `~/.lbrynet` / `~/.lbryum`*

## Android {#android}
 *Use file manager to navigate to the path below*
- `Internal storage/android/data/io.lbry.browser/files/lbrynet` - Daemon configuration, logs, encrypted blob files
- `Internal storage/android/data/io.lbry.browser/files/lbryum` - Wallet and blockchain data
