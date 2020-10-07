---
title: How do I mine LBC?
category: mining
---

Through the PoW mining process, you can earn LBC while strengthening the security of the LBRY network.

In this guide we cover:

- Overview of LBRY Mining
- Understanding Mining Profitability
- Sourcing Mining Equipment
- Colocating your FPGAs
- Renting Hashrate
- Setting up your FPGA
- Choosing and Configuring a Mining Pool
- Setting up an LBRY wallet


### Overview of LBRY Mining

Mining is a process where computing power is used to verify transactions on the LBRY network and add them to the public ledger (LBRY blockchain). It is also the process of how new LBRY Credits (LBC) are created as a reward for the successful miners (see details below). The process uses the mining software to calculate complex mathematical puzzles in order to secure the transactions. Both CPU and GPU hardware can be used for mining, but the current market is dominated by GPU and ASIC mining. LBRY uses a mix of SHA512, SHA256 and RIPEMD hash functions in its algorithm. To put it in the most simple terms: mining enables secure and fast LBC transactions.

Library Credits (LBC) are mined over a [20-year Proof of Work](/faq/block-rewards) period. Block rewards increase every 100 blocks by 1LBC, peak at 500, and decline slowly.

### Understanding Mining Profitability 

LBRY mining economics are a result of mining revenue, operating expense & capital expenditure. 

For revenue, you can go to a public mining calculator to check the [current profitability](https://whattomine.com/asic?factor%5Bsha256_hr%5D=1000000.0&factor%5Bsha256_p%5D=2920.0&factor%5Bscrypt_hash_rate%5D=1000.0&factor%5Bscrypt_power%5D=1500.0&factor%5Bx11_hr%5D=1400000000.0&factor%5Bx11_p%5D=3000.0&factor%5Bsia_hr%5D=2200.0&factor%5Bsia_p%5D=1300.0&factor%5Bqk_hr%5D=56000.0&factor%5Bqk_p%5D=1600.0&factor%5Bqb_hr%5D=56000.0&factor%5Bqb_p%5D=1700.0&factor%5Bmg_hr%5D=56.0&factor%5Bmg_p%5D=700.0&factor%5Bsk_hr%5D=28.0&factor%5Bsk_p%5D=600.0&lbry=true&factor%5Blbry_hr%5D=1000.0&factor%5Blbry_p%5D=3300.0&factor%5Bbk14_hr%5D=1000000.0&factor%5Bbk14_p%5D=1470.0&factor%5Bx11g_hr%5D=7.0&factor%5Bx11g_p%5D=900.0&factor%5Bcn_hr%5D=360.0&factor%5Bcn_p%5D=720.0&factor%5Beq_hr%5D=1000.0&factor%5Beq_p%5D=2330.0&factor%5Blrev2_hr%5D=17.2&factor%5Blrev2_p%5D=1470.0&factor%5Bbcd_hr%5D=185.0&factor%5Bbcd_p%5D=670.0&factor%5Bl2z_hr%5D=62.0&factor%5Bl2z_p%5D=670.0&factor%5Bphi_hr%5D=310.0&factor%5Bphi_p%5D=670.0&factor%5Bkec_hr%5D=29.0&factor%5Bkec_p%5D=430.0&factor%5Bgro_hr%5D=56.0&factor%5Bgro_p%5D=900.0&factor%5Besg_hr%5D=530.0&factor%5Besg_p%5D=170.0&factor%5Btsr_hr%5D=150.0&factor%5Btsr_p%5D=800.0&factor%5Bcost%5D=0.05&sort=MarketCap&volume=0&revenue=24h&factor%5Bexchanges%5D%5B%5D=&factor%5Bexchanges%5D%5B%5D=binance&factor%5Bexchanges%5D%5B%5D=bitfinex&factor%5Bexchanges%5D%5B%5D=bitforex&factor%5Bexchanges%5D%5B%5D=bittrex&factor%5Bexchanges%5D%5B%5D=dove&factor%5Bexchanges%5D%5B%5D=exmo&factor%5Bexchanges%5D%5B%5D=gate&factor%5Bexchanges%5D%5B%5D=graviex&factor%5Bexchanges%5D%5B%5D=hitbtc&factor%5Bexchanges%5D%5B%5D=hotbit&factor%5Bexchanges%5D%5B%5D=ogre&factor%5Bexchanges%5D%5B%5D=poloniex&factor%5Bexchanges%5D%5B%5D=stex&dataset=Main&commit=Calculate). At the time of writing this guide, 1TH of hashpower generates $14 in revenue a day but this fluctuates day-to-day based on network difficulty and coin price. You should estimate this revenue out for the investment horizon making sure to factor in potential increases in difficulty and any changes in block reward. 

In regards to operating expenses, this is in largely determined by your [cost of electricity](https://hashrateindex.com/blog/energy-consumption-to-hashrate). As of 2020 you ideally want to pay less than 7-8 cents USD per kWh.


### Sourcing Mining Equipment

LBRY mining is dominated by the FPGA market. GPU & CPU mining is not viable at this point given the network difficulty.

FPGA’s are a bit more specialized hardware that have higher mining efficiencies than GPU’s for LBRY but also are more flexible than hardware like ASICs used to mine Bitcoin. 

The following LBRY rigs are available on the market today:


| Miner        | Hashrate    |Power Consumption (Watts)| Unit Power (W/Mh)| 
| -------------|:-----------:|:-----------------------:|:----------------:|
| Baikal BK-D  | 80 GH/s     |500 W                    |0.006j/Mh         |
| Baikal BK-B  | 40 GH/s     |400 W                    |0.01j/Mh          |


Going direct to the manufacturer is no longer an option given no new rigs have come to market.


ASIC resellers may also have miners available:
- [Blockware Mining](https://www.blockwaresolutions.com)
- [Kaboom Racks](http://kaboomracks.com)


### Colocating your FPGAs

Depending on your residential electricity rate and the size of your mining operation you may decide to host your rigs with a third-party colocation. Typically the hosting facility will charge a flat rate per kWh for setup, ensuring proper operations, electricity and ongoing maintenance.

There are many hosting options available in the US / Canada which can be found in a database [here](https://hashrateindex.com/farms). This database contains some of the top facilities like Blockware, Compute North, Core Scientific, Frontier, Box Miner, and many more. 

Please make sure to do your own research before making any decision on engaging a colocation business.

If you are self-hosting a farm you can check out various [ASIC management software](https://hashrateindex.com/blog/asic-miner-management-guide) to make your life easier. 


### Renting Hashrate

If you do not have the ability to buy a machine or it doesn’t make economic sense then you can also [rent hashrate](https://medium.com/luxor/how-to-mine-lbry-lbc-with-nicehash-on-luxor-89ae1280d339) directly to mine on platforms like Nicehash or Mining Rig Rental. 


### Setting up your FPGA

For this guide, we will set up a Baikal but the process is pretty similar for any rig.


**Powering up the Miner**
Connect your machine to the power outlet via the built-in PSU. Then connect your miner to your internet-connected router or switch using a standard network cable. You are now ready to power up your miner.

**Configuration**
To get started, navigate to your dashboard by finding your miners’ IP address using your router or scanner. Your page will look something like this:

![LBRY FPGA Setup](https://lbry.tv/$/download/ASIC-Setup-Dashboard/0ce0b653611c31cbcef380cffcf83661e6339214)


#### Choosing and Configuring a Mining Pool 

To finish the configuration, you will need to choose a mining pool. In choosing a mining pool, you can consider pool fee, [payout method](https://hashrateindex.com/blog/pps-fpps-pplns-pps_plus) & frequency, the stability of the pool, user interface, statistics / data, customer support, community channels and more. A list of pools can be found [here](/faq/mining-pools).

In this guide, we will set up an FPGA with [Luxor](https://mining.luxor.tech/), a US-based mining pool that operates based on the pay-per-share (PPS) payment method. 

- URL: stratum+tcp://lbc.luxor.tech:700
- Worker: [LuxorUsername].WorkerName Workername can be anything, but avoid using symbols or special characters as it may be invalid.
- Password: 123

Once you have filled out the details, click Save & Apply. Setup is now complete.


**Monitoring Results**

It will take about 5 minutes for your workers to appear on the stats page. To find your user, simply go to Luxor, login to your account and navigate to the Workers tab. You should see something like this:

![LBRY Monitoring Dashboard](https://lbry.tv/$/download/Luxor-LBRY-Dashboard/a0eca1075193c1d8ec7486015bef5e1bcaf19112)


### Setting up a LBRY Wallet

The last step is to set up your LBC address where you will receive your miner payouts. To do this in the LBRY wallet, see [here](/faq/standalone-wallet).
