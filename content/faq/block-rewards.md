---
title: What is mining and what are the LBRY block rewards?
category: mining
order: 1
---

## What is mining?

Mining is a process where computing power is used to verify transactions on the LBRY network and add them to the public ledger (LBRY blockchain). It is also the process of how new LBRY credits (LBC) are created as a reward for the successful miners (see details below). The process uses the mining software to calculate complex mathematical puzzles in order to secure the transactions.
Both CPU and GPU hardware can be used for mining, but the current market is dominated by GPU and ASIC mining. LBRY uses a mix of SHA512, SHA256 and RIPEMD hash functions in its algorithm. To put it in the most simple terms: mining enables secure and fast LBC transactions.

## Only trust the source

The source code, and not this file, is the only true definition of the block rewards. That source file is located here in [`master`]:

[https://github.com/lbryio/lbrycrd/blob/master/src/validation.cpp](https://github.com/lbryio/lbrycrd/blob/master/src/validation.cpp#L1025)

## Mining reward schedule

Eventually 1,083,202,000<sup>1</sup> LBRY credits will exist.

<sup>1</sup>This value was [updated from 1B](https://github.com/lbryio/lbry.com/commit/4b4a8401d8ada40203d2bfb232066f42c4ac7a84) (which was a nice round number for a FAQ) on 09/21/2018 with the goal of increasing accuracy and transparency. [View the calculation here to verify](https://www.onlinegdb.com/r1NQOiyYQ) the source code referenced above.

They are awarded on the following schedule:

* The genesis block creates 400,000,000 credits to be administered by LBRY, Inc. 300,000,000 of these will be strategically allocated to partners, many of whom have a direct interest in the naming layer.  It also includes 100,000,000 earmarked for charity. Additionally, some may be given directly to the public in ways that add value and make sense. 100,000,000 are owned by LBRY directly.

* The remaining 600,000,000 are mined in 3 stages:

  1. The first stage goes from block 1 to block 5100 and will take roughly 9 days. Every block in this stage has a reward of 1 credit. This is the testing stage, to ensure that there are no glaring problems with the blockchain.

  2. The second stage is the ramp-up. It goes from block 5101 to block 55000 (roughly 3 months of mining). During this stage, the block reward increases linearly from 2 to 500. 500 is the largest block reward available.

  3. The final stage is the "normal" mining stage. From block 55001 onward, the block reward decreases logarithmically over the course of 20 years.

* Block rewards ramp up slowly because we want to ensure that users are given some time to get LBRY up and running, and to avoid unfairly benefiting the earliest users.

* To see the current block reward, visit the [LBRY Blockchain Explorer](https://explorer.lbry.com) and explore the latest block details.

## Where can I see this visually?
The [Stats page on the Explorer](https://explorer.lbry.com/stats) has this information, including inflation rates and emission schedule. It can be exported to CSV.
