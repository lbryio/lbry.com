---
title: How do I use the Reddit tipbot?
category: tipbots
order: 2
---

## LBRY Reddit Tipbot Information

Tips, in LBRY Credits (LBC), are an integral part of our community because they allow us to reward members for their contributions - whether that's for sharing something insightful, providing feedback, completing bounties, testing our various apps or helping promote LBRY's vision and technology. You can earn them, share, or transfer them via simple [commands on Reddit](https://np.reddit.com/r/lbry/wiki/tipbot).
![Reddit-tip](https://spee.ch/1/reddit-tip.png)

It is important to note that the LBC stored as a result of a tip is tied to your Reddit account and are stored on LBRY's wallet server. It is your responsibility to withdraw the tips to your LBRY App or other wallet like Coinomi. If you plan on storing LBC on Reddit, it is a good idea to enable Two Factor Authentication (2FA) on your account. LBRY takes no responsibility for lost funds due to negligence.

Use the following commands to make amazing things happen.

### Balance
Displays the balance of your Reddit LBRY wallet. Performed via Reddit messaging.

- **Example:** `balance`
- **Request:** [Request Balance](https://reddit.com/message/compose?to=lbryian&subject=Balance&message=balance)

### Deposit
Displays your Reddit LBRY wallet address. Useful if you want to receive LBC's directly to your wallet. Performed via Reddit messaging.

- **Example:** `Deposit`
- **Request:** [Request Wallet Address](https://www.reddit.com/message/compose?to=lbryian&subject=Deposit&message=deposit)

### Withdraw
Use this to withdraw your balance from your LBRY Reddit wallet to another LBRY wallet such as the wallet in your LBRY app, or to an LBRY exchange wallet. Performed via Reddit messaging.

- **Arguments:** `withdraw <address> <amount>`
- **Request:** [Request Withdraw](https://reddit.com/message/compose?to=lbryian&subject=Withdraw&message=withdraw%20%3Camount%3E%20%3Caddress)
- **Example:** `withdraw bLXasdadsa32432soas2sadsa 10`

### Tip
Want to tip someone? This will send a tip to a chosen username from within a replying comment.

- **Arguments:**
  - `<amount> <currency> u/lbryian`
  - `<$+amount> u/lbryian`
- **Examples:**
  - LBC: `10 lbc u/lbryian`
  - USD: `5 usd u/lbryian`
  - USD: `$5 u/lbryian`

**Note**: Only USD and LBC are currently supported.

### Gild
Want to gild a post? This will command will gild the post you are replying to.

- **Examples:**
  - `gild u/lbryian`
  - `u/lbryian gild`

Find out more about Reddit Gilding [here](https://www.reddit.com/gilding).
