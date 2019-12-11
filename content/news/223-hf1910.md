---
author: alex-grintsvayg
title: 'HF1910: A Blockchain Hard Fork on October 30th, 2019'
date: '2019-10-03 10:00:00'
category: technical
---

**Update 2019-10-30 10:24am EST**: The fork is live. Block 658309 occurred on October 30 at 9:53am ET. The prefork chain halted at that block, while the postfork chain is proceeding normally (at block 658325 at the time of writing).

**Update 2019-12-11 9:40am EST**: The final upgrade, SegWit support, is now live. Block 680770 occurred on December 11 at 2:45am ET. All pool and exchange operations are functioning as normal at this time. 

### What's Changing

The LBRY blockchain will experience a hard fork (named HF1910) on October 30th, 2019, to enable the ability to prove the existence of non-winning claims (via Merkle tree proofs). 

Staked claims compete against others of the same name. The intention was that their existence would be provable with a mechanism similar to "simplified payment verification" (SPV), thus reducing the need for a secure connection to (or local instance of) lbrycrd for verification purposes. Prior to the hard fork, only the winning claim for any given name is included in the block hash. This made it difficult to authoritatively verify the existence of non-winning claims when they were queried from librycrd over an insecure connection. For further documentation on the claimtrie, see [https://spec.lbry.com/#claimtrie](https://spec.lbry.com/#claimtrie).

To address this limitation, after HF1910 lbrycrd will percolate all claim IDs into the trie root hash. Simultaneously, the mechanism for computing the hash of the claims and node children in the trie will change to use an actual Merkle tree (rather than string append) for the hash computation. This significantly reduces the output of the proof RPC methods and allows us to take advantage of newer SIMD instructions for the hash computations.

HF1910 will activate on the mainnet at height 658300, with a second phase on block 658309, which both should take place on October 30th, 2019. The testnet activation will happen today at block 1198550. Regtest activates HF1910 at height 350.

A third and unrelated hard-fork phase for enabling Segwit will take place on December 11, 2019, at block 680770. We expect that it will take some time before the LBRY SDK and other LBRY tools support Segwit transactions.

Please note that the block rewards, token distribution, etc. are all staying the same.

### What You Should Do

For most people, nothing needs to be done. The fork will take effect transparently and won't change your experience of LBRY.

If you are running a full node, upgrade to the latest version of lbrycrd as soon as possible. Pre-built binaries are available on the releases page: [https://github.com/lbryio/lbrycrd/releases](https://github.com/lbryio/lbrycrd/releases). You will need version 0.17.3.1 or higher. Please read the release notes.

We will post updates about HF1910 to this page. If you want to be notified of news about this fork and future forks, please [join the fork mailing list](https://lbry.com/forklist).

