---
title: What is Mining and what are the LBRY Block Rewards?
category: mining
order: 1
---

## What is Mining?

Mining is a process where computing power is used to verify transactions on LBRY network and add them to the public ledger (LBRY blockchain). It is also a process of how additional new LBRY credits (LBC) are created as a reward for the successful miners (see details below). The process uses the mining software to calculate complex mathematical puzzles in order to secure the transactions.
Both CPU and GPU hardware can be used for mining, but the current market is dominated by GPU mining. LBRY uses a mix of SHA512, SHA256 and RIPEMD hash functions in its algorithm. To put it in the most simple terms: mining enables secure and fast LBC transactions.

## Only Trust the Source

The source code, and not this file, is the only true definition of the block rewards. That source file is located here in [`master`]:

[https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp](https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp#L1576)

## Mining Reward Schedule

Eventually 1,000,000,000 LBRY credits will exist. They are awarded on the following schedule:

* The genesis block creates 400,000,000 credits to be administered by LBRY, Inc. 300,000,000 of these will be strategically allocated to partners, many of whom have a direct interest in the naming layer.  It also includes 100,000,000 earmarked for charity.  Additionally, some may be given directly to the public in ways that add value and make sense.  100,000,000 are owned by LBRY directly.

* The remaining 600,000,000 are mined in 3 stages:

  1. The first stage goes from block 1 to block 5100 and will take roughly 9 days. Every block in this stage has a reward of 1 credit. This
     is the testing stage, to ensure that there are no glaring problems with the blockchain.

  2. The second stage is the ramp-up. It goes from block 5101 to block 55000 (roughly 3 months of mining). During this stage, the block reward
     increases linearly from 2 to 500. 500 is the largest block reward available.

  3. The final stage is the "normal" mining stage. From block 55001 onward, the block reward decreases logarithmically over the course of 20
     years.

* Block rewards ramp up slowly because we want to ensure that users are given some time to get LBRY up and running, and to avoid unfairly benefiting the earliest users.

* To see the current block reward, visit the [LBRY Blockchain Explorer](https://explorer.lbry.io) and explore the latest block details.
