---
title: What are the LBRY Block Rewards?
---

## 0. Only Trust the Source

The source code, and not this file, is the only true definiton of the block rewards. That source file is located here:

[https://github.com/lbryio/lbrycrd/blob/real2/src/main.cpp](https://github.com/lbryio/lbrycrd/blob/real2/src/main.cpp#L1576)

But is soon to be located in [`master`]:

[https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp](https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp#L1576)

## 1. Reward Schedule

Eventually 1,000,000,000 LBRY credits will exist. They are awarded on the following schedule:

* The genesis block creates 400,000,000 credits to be administered by LBRY, Inc. 300,000,000 of these will be given away to the public.

* The remaining 600,000,000 are mined in 3 stages:

  1. The first stage goes from block 1 to block 5100, and will take roughly 9 days. Every block in this stage has a reward of 1 credit. This
     is the testing stage, to ensure that there are no glaring problems with the blockchain.

  2. The second stage is the ramp-up. It goes from block 5101 to block 55000 (roughly 3 months of mining). During this stage, the block reward
     increases linearly from 2 to 500. 500 is the largest block reward available.

  3. The final stage is the "normal" mining stage. From block 55001 onward, the block reward decreases logarithmically over the course of 20
     years.

* Block rewards ramp up slowly because we want to ensure that users are given some time to get LBRY up and running, and to avoid unfairly benefit the earliest users.
