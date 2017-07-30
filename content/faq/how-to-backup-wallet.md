---
title: How do I back up my wallet?
category: wallet
---

LBRY provides two different wallets, `lbryum` and `lbrycrd`. `lbryum` is the default wallet, but early versions came with `lbrycrd` as the default.

## Windows

Make a copy of the `C:\Users\%USER%\AppData\Roaming\LBRYum\wallets` directory. If you originally installed v0.14 or later, you will find the wallet in `C:\Users\%USER%\AppData\Local\lbry\LBRYum\wallets`.

## MacOS and Linux

Make a copy of the `$HOME/.lbryum/wallets` directory. Hint: Type  `~/.lbryum/wallets` into Finder and click Go. 

## lbrycrd wallet

You may have a lbrycrd wallet if you used an early version of LBRY or if you ran `lbrycrdd` manually. Look for the `C:\Users\%USER%\AppData\Roaming\lbrycrd` directory on Windows, the `$HOME/Library/Application Support/lbrycrd` directory on MacOS, or the `$HOME/.lbrycrd` directory on Linux. If you have this directory, back up the `wallet.dat` file therein.

## See Also

- [important directories](https://lbry.io/faq/lbry-directories).
