---
title: Jeremy's email Q&A
category: other
---

Q. Is anonymous publication possible? How is anonymity accomplished?

A. LBRY does not log

Q. What are the privacy mechanisms? Specifically:

Can publishers be connected to real-world identifiers, such as IP addresses? If not, how do you authenticate users so they can maintain control of their content?
A. Yes, if they choose to provide this info. Some of this is still in the works, they're closer to pseudonymous identities currently, though we believe we can support fully verified ones.

Q. Can downloaders be connected to real-world identifiers?

A. Similar to BitTorrent. You can observe IPs.

Q. Is LBRY resistant to firewalls as found in China or Iran?

A. Somewhat unclear. It is likely sophisticated enough software could detect LBRY and stop usage of it, though if this happened we could also evolve things on our end, turning it into a fun game of cat-and-mouse. A lot of the traffic basically ends up looking like random encrypted UDP requests.

Q. What information do you retain that could be subpoeaned?

A. The current software makes some analytics calls that are discarded after several months but are technically subpoenable and could likely be used to prove certain activities. This can be turned off though. Other than this, none.

Q. In whose legal jurisdiction are your servers located?

A. The point of the LBRY protocol is that our servers are not required for it to operate. Though given the youthful state of the network, we do choose to operate some to ensure good performance, and they're located in the US.
