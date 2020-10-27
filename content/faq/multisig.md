---
title: Multisignature and Ledger hardware wallets
category: powerusers
---

**Important announcement**
The latest version of LBRY Ledger app fixes issues with creating new wallets with hardware wallets. Make sure you have new version of app installed on your Ledger device via Ledger Manager. During creating/opening wallet files you might notice "derivation path is unusual" error, you can safely approve it (the adress shown on device tests if adresses are genearted in corect format).

This guide is meant for power users and those who want to store LBRY Credits on their [Ledger Hardware devices](#HW) before official support is added.

If you are participating in the LBRY Swarm program, this solution will allow you to store LBC at a multisignature address which typically requires more than 1 person to sign off on a transaction before it's sent to the network. **It is important to test a single small transaction incoming and outgoing before using the wallet to store larger amounts. Also make sure a backup is taken (see instructions below).**

**Please note that the LBRY does not support outgoing transactions to multisignature wallets.**

Learn more about multisignature wallets and how they work: [Electrum Documentation](http://docs.electrum.org/en/latest/multisig.html), [Creating a Multisignature Wallet](https://bitcoinelectrum.com/creating-a-multisig-wallet/). This documentation can also be referenced along with the steps below.

![wallet](https://spee.ch/2/multisig.jpg)

## Installing and running LBRY Vault for LBRY

You can find the downloads and setup information for [LBRY Vault on GitHub](https://github.com/kodxana/LBRY-Vault/releases). Windows, Mac, and Linux Appimage installations are provided. Additional setup and installation required.

## Setting up a multisignature wallet

You can also reference [step by step instructions with images here](https://drive.google.com/file/d/1zS9gXyfsz8e5gQGj8GrtlzCuhIWibQv4/view) or follow along below.

On the initial screen, you'll be asked to select a wallet file or create a new one. If this is the first time running it, proceed with a new file. If you have a wallet file already and want to create another, change the name of the file. Each user in the multisignature scheme will need to do this locally to create the same wallet (they all require to have started this process or have a key from the LBRY app wallet).

At the next prompt, you'll be asked for the wallet type - choose Multi-signature. Next, choose how many people (including the current person/wallet) will be sharing this wallet (from X cosigners) and how many are required to approve the transaction (require X cosigners). For example, if you choose 2 of 3, any 2 people will need to sign off to send the transaction.

Next, you'll be asked to provide a key for each wallet, including the current one, which is first. If you want to use your LBRY app's key / seed, proceed with  "I already have a seed." You can find this seed inside your default_wallet file that's [created as part of your app installation](https://lbry.com/faq/how-to-backup-wallet). Open the default_wallet and you'll see a seed there. The wallet must not be encrypted to view it (you can decrypt temporarily via Desktop App > Settings). Otherwise, you can proceed with a new seed or Hardware device (requires Ledger device, [see below](#HW). Make sure to back up the seed if creating a new one - this can be done by copying the seed phrase or backing up the wallet file that's created.

You will be given a Master Public Key that will be shared with the other co-signers when they create the same wallet locally. Next, you will be prompted for the next cosigners key. This would come from their PC while setting up the same wallet, or from their [default_wallet file](https://lbry.com/faq/how-to-backup-wallet) by opening it and using the ```"public_key":``` portion (this assumes they will create their Electrum wallet from this LBRY app seed). Proceed with all cosigners until they are all filled out. Lastly, enter a password to encrypt the multisignature wallet.

## Receiving LBC in the wallet

To receive LBC in the LBRY Vault wallet, go to the Receive tab click On-chain button to view an address or enable the addresses view by going to **View > Show Addresses** from the top menu bar. Here you will see all available addresses on the wallet. Multisignature addresses with start with an **r**, regular wallets, including hardware ones, will start with a **b**.

## Sending multisignature transactions

Once all parties have their multisignature wallets configured and LBC has been received, you can now send LBC to other addresses. Anyone in the party can start by creating a transaction. Once the transaction is created, you'll see an option to Copy or Export it. It must be shared via one of those two methods with however many cosigners are needed (i.e. for 2 of 3, 1 other cosigner must sign it). Send the other cosigner the copied message or exported file. You may also be able to share the Transaction Id and import it that way, but the copy/file method will always work.

The cosigner has to open the wallet on their PC and go to **Tools > Load Transaction** and then choose from text (if copied) or from file (if export was used). They can then sign the transaction. Each cosigner will need to do the same to send the transaction on the network.

## Ledger hardware wallet with LBRY Vault {#HW}

You can use your Ledger device with LBRY Vault to store LBC. Please follow [these directions on how to install it on your device](https://support.ledger.com/hc/en-us/articles/360012122999-LBRY-LBRY-) and then use the above directions to setup a new wallet. 

For a normal account (non-multisignature), you will choose **Standard wallet** when setting up the device, and then **Use a hardware device**, and then follow the prompts.

Official support with Ledger Live is coming at a later date. 

## LBRY Vault wallet file location {#backup}

LBRY Vault wallet files and blockchain data can be found in the App Data Roaming directory under `Electrum-lbry`. The wallet is located in `%appdata%\Electrum-lbry\wallets` and the data in `%appdata%\Electrum-lbry` on Windows. On Mac/Ubuntu, search your system for the .lbry-vault folder or the name of the wallet file. The wallet should be backed up if you do not have your phrase or are not using the LBRY Desktop wallet.

## Troubleshooting

1. If the balance is not updating properly or transaction not showing confirmed, try restarting the application. To resync the wallet data, delete the blockchain_headers file in `%appdata%\Electrum-lbry` and restart the application.

2. If you are having trouble sending due to fees, make sure that fee estimation is set to static, and edit fees manually is checked under **Tools > Preferences**.

3. If LBRY Vault stuck in connection mode (LBRY Vault keeps connecting and disconecting)  delete the blockchain_headers file in `%appdata%\Electrum-lbry` and restart the application.

4. If you have problems connecting to LBRY servers try adding one of community hosted server by going to **Tools > Network > Server.**

| Address   |      Region      |  Host |
|----------|:-------------:|------:|
| spv1.allaboutlbc.com:50001 |  EU | Madiator2011 |
