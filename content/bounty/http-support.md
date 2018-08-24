---
category: daemon
title: Add Support for HTTP
award: 3000
status: completed
date: '2016-11-01'
---

Add support for resolution via HTTP to [`lbry`](https://github.com/lbryio).

The LBRY blockchain supports storing metadata about media content. A simplified, sample entry looks like:

```
title: "What is LBRY?",
language: "en",
description: "What is LBRY? An introduction with Alex Tabarrok",
author: "Samuel Bryan",
sources: {
  lbry_sd_hash : "d5169241150022f996fa7cd6a9a1c421937276a3275eb912790bd07ba7aec1fac5fd45431d226b8fb402691e79aeb24b"
}
```

The `sources` field is designed to be extended and support resolution to multiple protocols. To complete this the LBRY daemon must be modified to read `http` as a source key and use this key to access the data via HTTP (or HTTPS) when present,
