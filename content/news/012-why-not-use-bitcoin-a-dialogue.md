---
author: jimmy-kiselak
title: Why Not Use Bitcoin? A Dialogue
date: '2015-09-23 17:57:00'
cover: 'why-not-bitcoin.jpg'
---

One of the most common questions we're asked is, "Why not use Bitcoin?" This post uses a pair of conversations to look at one of the biggest reasons we can't. If you aren't concerned with this question or the technical specifics of LBRY, this post probably won't interest you.

### Dialogue #1

Characters: **User**, a potential user of a generic blockchain; **Thin Node**, a partial node for a generic blockchain; and **Full Node**, a complete node for a generic blockchain.

*User enters the view, where Thin Node has been sitting around patiently waiting and consuming virtually no resources. Thin Node does not have a copy of the whole blockchain, because that would eat up resources, and User doesn't want him doing that. Maybe User doesn't have 40 gigabytes of space on the device he's using or is not interested in wasting bandwidth downloading each new full block that comes across the network. All the User wants to know is what a name resolves to on the blockchain.*

User: Hey Thin Node, would you mind finding some information for me?
Thin Node: Hey User, glad to see you again. I'd love to help if I can.
User: Can you tell me what the name 'wonderfullife' resolves to on your blockchain?
Thin Node: Let me see what I can do.

*Thin Node opens up a connection to Full Node, which uses non-trivial amounts of resources to keep a full copy of the blockchain.*

Thin Node: Hey Full Node, my User asked me for the value of the name 'wonderfullife' on our blockchain. Can you help me with that?
Full Node: Sure, it's *&lt;insert 8 kb of data&gt;*.
Thin Node: Thanks. Can you prove to me that your answer is correct? This is a blockchain after all, so if possible, I'd like to trust nothing except the blockchain consensus.
Full Node: Sure, I can send you all of the blocks that are relevant.
Thin Node: But wait, what if you're holding relevant blocks back from me? Aren't I still trusting you?
Full Node: Ya, I guess. Do you want the full copy of the blockchain?
Thin Node: No, User told me not to do that. I guess I'll just have to trust you.

*Exit Full Node.*

Thin Node: Hey User, that was kind of a weird experience. I think the answer is *&lt;insert 8 kb of data&gt;*, but I'm basing that on trusting some random node on the internet.
User: Aren't you a blockchain client? Why aren't you using blockchain consensus to verify that?
Thin Node: I'd have to download the whole blockchain, and you told me not to do that.
User: You're worthless! Why were you designed this way?

*Exit User.*

Thin Node: I am worthless. Why was I designed this way?




### Dialogue #2
Characters: **User**, a potential user of LBRY; **Thin Node**, a partial node for LBRY; and **Full Node**, a complete node for LBRY.

*User enters the view, where Thin Node has been sitting around patiently waiting and consuming virtually no resources. Thin Node does not have a copy of the whole blockchain but instead watches the network to see which chain is the longest. He keeps the latest few hundred block headers, which each consume around 100 bytes of space and therefore at most a few kilobytes per hour of bandwidth. He believes that if a block header has several block headers following it, and he can't find a longer chain of block headers following any other block header at that height, then it's safe to assume the network has come to a consensus on the validity of that block header at that height.*

User: Hey Thin Node, would you mind finding some information for me?
Thin Node: Hey User, glad to see you again. I'd love to help if I can.
User: Can you tell me what the name 'wonderfullife' resolves to on your blockchain?
Thin Node: Let me see what I can do.

*Thin Node opens up a connection to Full Node, which uses non-trivial amounts of resources to keep a full copy of the LBRY blockchain.*

Thin Node: Hey Full Node, my User asked me for the value of the name 'wonderfullife' on our blockchain. Can you help me with that?
Full Node: Sure, it's *&lt;insert 8 kb of data&gt;*.
Thin Node: Thanks. Can you prove to me that your answer is correct? This is a blockchain after all, so if possible, I'd like to trust nothing except the blockchain consensus.
Full Node: Sure, do you see that extra field in our block header which no other blockchain has?
Thin Node: Ya, I see it.
Full Node: Great. You'll use that field shortly to prove my answer to yourself. First, though, what's the hash of a block header that you have trusted using blockchain consensus?
Thin Node: It's *&lt;insert hash&gt;*.
Full Node: OK, here's a teeny tiny fraction of all of the data stored in our blockchain. It's just enough for you to prove to yourself cryptographically that I'm not lying to you, as long as you trust that number you sent me and modern cryptography in general.
Thin Node: Wow, it all checks out! I'll let my User know. Thanks, Full Node!

*Exit Full Node.*

Thin Node: Hey User, that was an awesome experience. The answer is <insert 4 kb of data>, and I'm as sure of that as I am that the entire blockchain I'm based on is secure. And I verified it quickly and easily, without having to use tons of network resources and storage space!
User: That's awesome, Thin Node! I love you!
Thin Node: I am awesome. I love you too, User.

*And they lived happily ever after.*


### Conclusion

LBRY is best thought of as an application or a protocol, not a cryptocurrency. As such, it requires a blockchain designed specifically to solve the problems that LBRY faces.

If you found this interesting and would like to check out LBRY, go to [lbry.io/get](https://lbry.io/get).
