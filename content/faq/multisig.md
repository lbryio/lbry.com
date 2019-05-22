---
title: Multisignature and Ledger HW Wallet
category: powerusers
---

This guide is meant for power users and those who want to store LBRY Credits on their Ledger Hardware devices before official support is added. If you are participating in the LBRY Swarm program, this solution will allow you to store LBC at a Multisignature address which typically requires more than 1 person to sign off on a transction before it's sent to the network. **Please note that the current LBRY apps / SDK do not support outgoing transactions to multisignature wallets. Incoming transactions to the apps will work, but require a restart of the app afterward.**

Learn more about Multisignature wallets and how they work: [Electrum Documentation ](http://docs.electrum.org/en/latest/multisig.html), [Creating a Multisignatuire Wallet](https://bitcoinelectrum.com/creating-a-multisig-wallet/). This documetation can also be referenced along with the steps below. 

### Installing and Running Electrum for LBRY

You can find the downloads and setup information for [Electron LBRY on GitHub](https://github.com/tzarebczan/electrum/releases/tag/0.1.0).  Windows and Mac installers are provided, but Linux needs to be run from source as detailed on the install instructions. If you previously ran an old version and created wallets, they will need to re-created in this new version. You can use the old version to send the funds to another wallet and then re-create a new one. 

### Setting up a Multisignature Wallet

On the initial screen, you'll be asked to select a wallet file or create a new one. If this is the first time running it, proceed with a new file. If you have a wallet file already and want to create another, change the name of the file. Each user in the multisignature scheme will need to do this locally to create the same wallet. 

At the next prompt, you'll be asked for the wallet type - choose Multi-signature. Next, choose how many people (including the current person/wallet) will be sharing this wallet (from X cosigners) and how many are required to approve the transaction (require X cosigners). For example, if you choose 2 of 3, any 2 people will need to sign off to send the transaction. 

Next, you'll be asked to provide a key for each wallet, including the current one, which is first. If you want to use your LBRY app's key / seed, proceed with  "I alreeady have a seed". You can find this seed inside your default_wallet file that's [created as part of your app installation](https://lbry.io/faq/how-to-backup-wallet). Open the default_wallet and you'll see a seed there. The wallet must not be encrypted to see it (you can decrypt temporarily via Desktop App > Settings). Otherwise, you can proceed with a new seed or Hardware device (requires Ledger device, [see below](#HW). Make sure to back up the seed if creating a new one. 

You will be given a Master Public Key that will be shared with the other co-signers when they create the same wallet locally. Next, you will be prompted for the next cosigners key. This would come from their PC while setting up the same wallet, or from their [default_wallet file](https://lbry.io/faq/how-to-backup-wallet) by opening it and using the ```"public_key":``` portion (this assumes they will create their Electrum wallet from this LBRY app seed). Proceed with all cosigners until they are all filled out. Lastly, enter a password to encrypt the multisignature wallet. 

### Ledger Hardware Wallet with Electrum

You can use your Ledger device with LBRY Electrum to store LBC. Please follow [these directions on how to install it on your device](https://github.com/tzarebczan/ledger-app-btc/releases/tag/lbry) and then use the above directions to setup a new wallet. For a normal account (non-multisignature), you will choose **Standard wallet** when setting up the device, and then **Use a hardware device**, and then follow the prompts. 

Official support with Ledger will be coming at a later date. 
