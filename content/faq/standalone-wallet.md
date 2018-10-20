---
title: Is there a standalone wallet?
category: wallet
---

Yes, please visit [Coinomi](http://www.coinomi.com) to download their excellent and easy to use wallet.

For technical users, we have [lbrycrd](https://github.com/lbryio/lbrycrd/releases), a full blockchain node very similar to bitcoind. You'll need to set up a `lbrycrd.conf` file in the `lbrycrd` [directory for your OS](https://lbry.io/faq/lbry-directories) with values for `rpcuser` and `rpcpassword` provided. For example:

  ```
  rpcuser=lbryrpc
  rpcpassword=do_not_copy_paste_this_password
  ```

The lbrycrdd daemon can be started with `lbrycrdd -server -printtoconsole`. For help using the command line, `lbrycrd-cli help`.
