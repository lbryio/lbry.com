{
  "title": "LBRY Chain Parameters",
  "url": "/faq/integration",
  "type": "faq",
  "source_url": "https://lbry.com/faq/integration",
  "description": "These parameters are often needed to integrate LBRY into wallets or exchanges. Only trust the source The source code is…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#7f171a1313103f131d0d06511c1012",
  "footer_email_code": "c0a8a5acacaf80aca2b2b9eea3afad",
  "meta_title": "LBRY Chain Parameters",
  "category": "other",
  "source_file": "content/faq/integration.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/integration.md",
  "weight": 80
}
These parameters are often needed to integrate LBRY into wallets or exchanges.

## Only trust the source

[The source code](https://github.com/lbryio/lbrycrd/blob/v0.17.3.2/src/chainparams.cpp) is the only true definition of the chain parameters. 
They are reproduced here for convenience only. If there's any discrepancy, the source is correct. 

## Parmeters

| Name      | Value |
| ----------- | ----------- |
| Genesis Block Hash                | `9c89283ba0f3227f6c03b70216b9f665f0118d5e0fa729cedf4fb34d6a34f463` |
| Target Block Time                 | 150 seconds |
| Default Port                      | `9246` |
| Pubkey Address Prefix             | `0x55` (starts with `b`) |
| Script Address Prefix             | `0x7a` (starts with `r`) |
| Secret Key Prefix                 | `0x1c` |
| Witness Pubkey Prefix             | `0x06` (starts with `p2`) |
| Witness Script Prefix             | `0x0a` (starts with `7Xh`) |
| BIP32 Extended Pubkey Prefix      | `0x0488b21e` (starts with `xpub`) |
| BIP32 Extended Secret Prefix      | `0x0488ade4` (starts with `xprv`) |
| BIP173 Bech32 Human-Readable Part | `lbc` |
| BIP44 Coin Type                   | `0x8c` |
| Network Magic Bytes               | `0xfae4aaf1` |
| COIN (how many deweys in 1 LBC)   | `100000000` |
