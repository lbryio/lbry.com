---
author: samuel-lbryian
title: 'LBRY Blockchain Update'
date: '2019-9-10 09:00:00'
cover: 'blockchaintech.jpg'
category: update
---

On August 16, 2019, the LBRY chain experienced an unexpected fork between the current version of lbrycrd (v0.17.2) and previous versions. Block height of the fork: 617743. We might have favored the older build, but older versions of lbrycrd would crash when receiving data from the newer version after that block. v0.17.1 was able to proceed down its own chain, but there was little mining power behind this;  the main pools were already mining with majority of hash on the correct (v0.17.2) chain.

This was middle of the night for most LBRY engineers, but the event was fortunately detected by a LBRY engineer three hours after the occurrence. In response to the incident, miners and other critical systems were immediately upgraded to v0.17.2. We appreciate the immediate and dedicated response from the various mining pools, exchanges, and others.

Version 0.17.2 replaces a large portion of the consensus-critical code path with more memory-efficient mechanisms. When this work was done, two existing issues with the takeover height computation were discovered in the older code. An effort was made to search for others through random block data generation. No other issues were found at the time, and it was hoped that there were no other lurking issues with the old code. The two known issues were maintained with workarounds in hopes that the root hash computation would match the existing versions, but it was done in a way that they would be disabled with the next hard-fork (not released yet). Details on the bugs are to be revealed after the pending hard fork occurs.

In block 617743, the newer code for the hash computation incorrectly decided that a certain claim required the takeover height workaround. It was a failure to completely model the previous erroneous behavior. Other blocks in the future may be affected, but the behavior will likely go undetected as most are now upgraded to the latest release. We appreciate your patience in the matter. Sincerely, blockchain@lbry.com
