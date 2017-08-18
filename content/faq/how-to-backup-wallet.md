---
title: How do I back up my wallet funds?
category: wallet
---

LBRY provides two different wallets, `lbryum` and `lbrycrd`. `lbryum` is the default wallet, but early versions came with `lbrycrd` as the default.

Wallets should be backed up securely to one or more (redundancy!) locations which only you have control over. Anyone with access to the wallet file could potentially have access to your LBRY Credits.  As an added layer of protection when backing up your wallet, you can password encrypt a ZIP file with your wallet data. We are trying to make this process easier for users in the future through the LBRY App. 

## Windows

Make a copy of the `C:\Users\%USER%\AppData\Roaming\LBRYum\wallets` directory. If you originally installed v0.14 or later, you will find the wallet in `C:\Users\%USER%\AppData\Local\lbry\LBRYum\wallets`. The AppData folder may be hidden, so you can also try `%appdata%\LBRYum\wallets` or `%localappdata%\lbry\LBRYum\wallets` for new installations (v0.14+).

## Linux

Make a copy of the `~/.lbryum/wallets` directory. If you originally installed v0.14 or later, you will find the wallet in `~/.local/share/lbry/lbryum/wallets`.

## MacOS

Make a copy of the `$HOME/.lbryum/wallets` directory. Hint: Type  `~/.lbryum/wallets` into Finder and click Go. 

## lbrycrd wallet

You may have a lbrycrd wallet if you used an early version of LBRY or if you ran `lbrycrdd` manually. Look for the `C:\Users\%USER%\AppData\Roaming\lbrycrd` directory on Windows, the `$HOME/Library/Application Support/lbrycrd` directory on MacOS, or the `$HOME/.lbrycrd` directory on Linux. If you have this directory, back up the `wallet.dat` file therein.

## See Also

- [important directories](https://lbry.io/faq/lbry-directories).
