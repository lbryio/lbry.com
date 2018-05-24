---
title: How do I use the Discord tipbot?
category: tipbots
order: 1
---

## LBRY Discord Tipbot Information

Tips, in LBRY Credits (LBC), are an integral part of our community because they allow us to reward members for their contributions - whether that's for sharing something insightful, providing feedback, completing bounties, testing our various apps or helping promote LBRY's vision and technology. You can earn them, share, or transfer them via simple commands on the Discord server. 

It is important to note that the LBC stored as a result of a tip is tied to your Discord account username and are stored on LBRY's wallet server. It is your responsibility to withdraw the tips to your LBRY App or other wallet like Coinomi. If you plan on storing LBC on the Discord server, it is a good idea to enable Two Factor Authentication (2FA) on your account. LBRY takes no responsibility for lost funds due to negligence 

Use the following commands to make amazing things happen. We recommend running them in the `#bot-sandbox` channel, unless you are tipping someone! 

### Help
This displays a list of tip commands and how to use them.  
![Tip Help](https://spee.ch/9/tiphelp.png) 
![Tips](https://spee.ch/2/tips.png)   
**Example:**  
`!tip help` or `!tips`

### Balance
Displays the balance of your Discord LBRY wallet.   
**Example:**   
`!tip balance`

### Deposit
Displays your Discord LBRY wallet address. Useful if you want to receive LBC's directly to your Discord wallet.
**Example:**  
`!tip deposit`

### Withdraw
Use this to withdraw a chosen amount from your LBRY Discord wallet to another LBRY wallet such as the wallet in your LBRY app, Coinomi or to a LBC wallet on an exchange.  
**Arguments:**   
`!tip withdraw <address> <amount>`  
**Example:**  
`!tip withdraw bQ8N2xbbityGNyiijaUtZVHkN3KZys2ci 10`

### Private Tips
Want to tip someone privately in a personal message? This will send a tip to your chosen username in a private personal message.  
**Arguments:**  
`!tip private <username> <amount>`  
**Example:**  
`!tip private @Electron#1111 10`  

### Multi Tips
This will send your set tip amount to all the users you list.  
**Arguments:**  
`!multitip <usernames> <amount>`  
**Example:**  
`!multitip @Electron#1111 @Proton#222 10`  

### Multi Tip Private
This will privately send your set tip amount to all the users you list in personal messages.  
**Arguments:**  
`!multitip private <usernames> <amount>`    
**Example:**  
`!multitip private @Electron#1111 @Proton#222 10`  

### Role Tips
Want to tip a Disocrd role? This will send a tip to your chosen role.  
**Arguments:**    
`!roletip <role> <amount>`  
**Example:**  
`!roletip @LBRY Team 10`  

### Private Role Tips
Want to tip a Disocrd role privately? This will send a tip to your chosen role in a private message.  
**Arguments:**  
`!roletip private <role> <amount>`  
**Example:**  
`!roletip private @LBRY Team 10`
