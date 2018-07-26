---
category: daemon
title: Add Support for BitTorrent
award: 10000
status: completed
date: '2016-07-01'
---

Add support for the BitTorrent protocol to [`lbrynet`](https://github.com/lbryio/lbry) and [`lbryschema`](https://www.github.com/lbryio/lbryschema).

The LBRY blockchain supports storing metadata that can be resolved by a human friendly uri.
This metadata is defined by a flexible protobuf based schema, [lbryschema](https://www.github.com/lbryio/lbryschema).

A simple example looks like:

```
{
  "version": "_0_0_1",
  "claimType": "streamType",
  "stream": {
    "source": {
      "source": "d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b",
      "version": "_0_0_1",
      "contentType": "video/mp4",
      "sourceType": "lbry_sd_hash"
    },
    "version": "_0_0_1",
    "metadata": {
      "license": "LBRY inc",
      "description": "What is LBRY? An introduction with Alex Tabarrok",
      "language": "en",
      "author": "Samuel Bryan",
      "title": "What is LBRY?",
      "version": "_0_1_0",
      "nsfw": false,
      "licenseUrl": "",
      "preview": "",
      "thumbnail": "https://s3.amazonaws.com/files.lbry.io/logo.png"
      }
  }
}
```

The [source field](https://github.com/lbryio/lbryschema/blob/master/lbryschema/proto/source.proto) is designed to be extended and support resolution to multiple protocols. To complete this, lbryschema and lbrynet must be modified to:

- Support the BitTorrent protocol via `python-libtorrent` or similar.
- Support the `sourceType` of `btih` in source.proto in lbryschema
- Add a BitTorrent downloader and factory for use in `EncryptedFileManager`, to be used as an alternative to `ManagedEncryptedFileDownloader`
- Use all of this to resolve a BTIH from a claim and download data via BitTorrent when requested
- Probably a lot more stuff!
