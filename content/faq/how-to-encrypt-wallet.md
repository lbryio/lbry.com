---
title: How do I encrypt my wallet?
category: wallet
---
*Note: The below instructions are the [LBRYCrd Full Blockchain wallet](https://github.com/lbryio/lbrycrd) and not the default wallet that ships with the LBRY App. We are still working on an encryption solution for this.*

You can use `lbrycrd-cli encryptwallet <passphrase>` to encrypt your wallet.

You can use `lbrycrd-cli walletpassphrase <passphrase> <timeout>` to temporarily unlock the wallet. The <timeout> parameter is in seconds.

For example, `lbrycrd-cli walletpassphrase 'open sesame 321' 300` would unlock your wallet for five minutes, assuming your passphrase was `open sesame 321`. (In reality, you should choose a harder-to-guess passphrase than that.)

If you set <timeout> too low, it might expire before you get done using your wallet. If you set it too high, you might forget that you left your wallet unlocked.
