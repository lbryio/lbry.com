#What are the LBRY Block Rewards?

##0. Only Trust the Source

The source code, and not this file, is the only true definiton of the block rewards. That source file is located here:

[https://github.com/lbryio/lbrycrd/blob/real2/src/main.cpp](https://github.com/lbryio/lbrycrd/blob/real2/src/main.cpp#L1576)

But is soon to be located in [`master`]:

[https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp](https://github.com/lbryio/lbrycrd/blob/master/src/main.cpp#L1576)

##1. Reward Schedule

Eventually 1,000,000,000 LBRY credits will exist. They are awarded on the following schedule:

* The genesis block rewards 400,000,000 credits to be administered by LBRY, Inc. 300,000,000 of these will be given away to the public.
* The remaining 600,000,000 are mineed.
* The peak block is block is block 55001, at 500 credits. Block 55001 will likely hit 2-3 months after launch.
* Blocks past 55001 descend logarithmically, lasting approximately 20 years. 
* Blocks 0-5000 are 1 credit. Blocks 5001 to 550001 ramp up linearly to 500.
