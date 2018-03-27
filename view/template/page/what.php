<?php Response::setMetaDescription(__('description.what')) ?>
<?php Response::setMetaTitle(__('title.what')) ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => true, 'isAbsolute' => true]) ?>
<main>
  <div class="cover cover-dark cover-center cover-full" style="background-image:url(/img/altamira-bison.jpg)">
    <h1 class="cover-title" id="art">Art in the Internet Age</h1>
    <div class="cover-subtitle">
     An introduction to LBRY.
    </div>
  </div>
  <div class="content content-readable">
    <section>
      <h2 id="introduction">Introduction</h2>
      <p>In 34,000 B.C., there were cave paintings. And that’s it. When you came home from a sweltering August day of foraging along the Vézère river, the only form of non-live art or entertainment available was something like the above buffalo.</p>

      <p>Today, we live in a world of near infinite choices. This is true not just for art but for all kinds of things (like potato chips). Since the era of cave art, humanity has incessantly and progressively trended towards interconnected, more efficient, and increasingly transparent markets. This undercurrent of connectedness and openness has affected everything human beings produce.</p>

      <p>Nerds like us like to speculate about the end-game of this trend with others on the internet. What will society be like when we have a "Star Trek"-like capacity to instantly and freely replicate anything that exists? The term for this society is <em>post-scarcity</em><sup><a href="#note-post-scarcity" class="link-primary" >1</a></sup>.</p>

      <p>Generally, post-scarcity is regarded as fantastical; something that will never happen in our lifetimes. Except for one area: digital goods.</p>

      <p>Art in the internet age is infinitely reproducible and easily shared. This is a sea change from any prior time in history. Previously, vinyl records captured audio in physical grooves; tapes captured data on magnetic strips; compact disks held digital files read by lasers—in each of these cases physical, medium-specific hardware is required to both produce and recover the bits of data that made up the digital content. </p>

      <p>Today art is just data, a string of 1s and 0s, a <em>number</em>, and we no longer need any specialized hardware to decode and enjoy digital content. We use the same technological methods to access a personal photograph a single time as we do to watch a blockbuster on Netflix.</p>

      <p>This is a big step forward from the past. As production costs fall to zero, choices go up. Digital distributors provide virtually every song, film, photo or book for purchase and download to any internet enabled device. Technology has decreased the cost of production, too -- it has never been easier for aspirant artists to achieve a following through self-publishing.</p>

      <p>The digitization of art has added a lot of value to both content creators and consumers, reducing costs and increasing choice. This transition is still in its infancy. With LBRY, we’re going to make it a little more mature.</p>
      <footer id="note-post-scarcity"><sup>1</sup> Note that post-scarcity does not eliminate the need to create <em>new</em> goods, it just eliminates or reduces the costs of <em>duplicating</em> goods to nothing. As long as people desire goods that did not previously exist, there will always be a market demand for creation, even in a post-scarcity world.</footer>
    </section>
    <section>
      <h2 id="peoples-marketplace">A People’s Marketplace</h2>
      <p>LBRY is the first digital marketplace to be controlled by the market’s participants rather than a corporation or other 3rd-party. It is the most open, fair, and efficient marketplace for digital goods ever created, with an incentive design encouraging it to become the most complete.</p>
      <p>At the highest level, LBRY does something extraordinarily simple. LBRY creates an association between a unique name and a piece of digital content, such as a movie, book, or game. This is similar to the domain name system that you are most likely using to access this very post.</p>

      <div class="text-center meta spacer1">
        <img src="/img/lbry-ui.png"/>
        <div class="content-inset">
          A user searches and prepares to stream and the film <em>It’s a Wonderful Life</em>, located at <a href="lbry://wonderfullife">lbry://wonderfullife</a>, via a completely decentralized network. Try it out for yourself at <a href="/get">lbry.io/get</a>.
        </div>
      </div>

      <p>However, LBRY does this not through a proprietary service or network, but as a <em>protocol</em>, or a method of doing things, much like HTTP, DNS and other specifications that make up the internet itself. Just as many different domains owned by many different companies all speak a shared language, so too can any person or company speak LBRY.  No special access or permission is needed.</p>

      <p>LBRY differs from the status quo in three big ways:</p>

      <ol>
        <li><strong>Coupled payment and access</strong>. If desired, the person who publishes to <a href="lbry://wonderfullife">lbry://wonderfullife</a> can charge a fee to users that view the content. </li>
        <li><strong>Decentralized and distributed</strong>. Content published to LBRY is not specific to one computer or network, making LBRY robust to failure and disruption.</li>
        <li><strong>Community controlled</strong>. No party other than the publisher (including us) can unilaterally remove or block content on the LBRY network.<sup><a class="link-primary" href="#note-community-controlled">2</a></sup></li>
      </ol>

      <p>While creating a protocol that we ourselves cannot control sounds chaotic, it is actually about establishing trust. Every other publishing system requires trusting an intermediary that can unilaterally change the rules on you. What happens when you build your business on YouTube or Amazon and they change fees? Or Apple drops your content because the Premier of China thought your comedy went too far?</p>

      <p>Only LBRY consists of a known, promised set of rules that no one can unilaterally change. LBRY provides this by doing something unique: leaving the <em>users</em> in control rather than demanding that control for itself.</p>
      <footer id="note-community-controlled"><sup>2</sup>If it worries you that LBRY facilitates infringing or unsavory content, this is addressed in <a class="link-primary" href="#combatting-the-ugly">Combatting the Ugly</a>.</footer>
    </section>
    <section>
      <h2 id="sample-use">A Sample Use</h2>
      <p>Let’s look at a sample use of LBRY, Ernest releasing a film on LBRY that is later purchased and viewed by Hillary. </p>

      <ol>
        <li>Ernest wants to release his comedy-horror film, <em>Ernie Runs For President</em>.</li>
        <li>The content is encrypted and sliced into many pieces. These pieces are stored by hosts.</li>
        <li>Ernest reserves <a href="lbry://erniebythebay">lbry://ernieruns</a>, a name pointing to his content.</li>
        <li>When Ernest reserves the location, he also submits metadata, such as a description and thumbnail.</li>
        <li>Hillary, a user, opens her browser, searches the LBRY network, and decides she wants to watch the film.</li>
        <li>Hillary issues a payment to Ernest for the decryption key, allowing her to watch the film.</li>
        <li>Hillary’s LBRY client collects the pieces from the hosts and reassembles them, using the key to decrypt the pieces (if necessary). This is transparent to Hillary, the film streams within a few seconds after purchase.</li>
      </ol>

      <p>From a user's perspective, interaction is extremely similar to those that happen on hundreds of different sites, similar to YouTube, Amazon and Netflix.
        The key difference is that this one happens via a network that is completely decentralized.
        The data and technology that makes the entire interaction possible is not reliant on nor controlled by any single entity.</p>
    </section>
    <section>
      <h2 id="the-network">The LBRY Network</h2>
      <p>To understand precisely what LBRY is and why it matters, one must understand both LBRY as a protocol and the services the protocol enables. HTTP is the protocol that makes web browsing possible, but it would be of little interest without the service of a web browser!</p>

      <p>To understand LBRY, think of LBRY in terms of two layers: <em>protocol</em> and <em>service.</em> The protocol provides a fundamental, underlying technological capability. The service layer utilizes the protocol to do something that a human being would actually find useful.</p>

      <p>For a user using LBRY at the service level, the magic of what the LBRY protocol does will be largely transparent, much as a typical internet user sees nothing of how HTTP works. Via a LBRY application, a user will be able to open a familiar interface to quickly and easily discover and purchase a piece of digital content published by anyone in the world.</p>

      <p>However, such an application would not be possible without the LBRY the underlying layer, the LBRY protocol.</p>


      <h3>Layer 1: Protocol</h3>
      <p>While the protocol is one comprehensive set of rules, it is easier to understand as two parts.</p>
      <h4>Part A: The LBRY Blockchain</h4>
      <p>A <em>blockchain</em>, or <em>distributed ledger</em> is the key innovation behind the Bitcoin network. Blockchains solved the very complicated technological problem of having a bunch of distributed, disparate entities all agree on a rivalrous state of affairs (like how much money they owe each other).</p>

      <p>Like Bitcoin, the LBRY blockchain maintains balances -- in this case, balances of <em>LBC</em>, LBRY’s unit of credit. More importantly, the LBRY blockchain also provides a decentralized lookup and metadata storage system. The LBRY blockchain supports a specific set of commands that allows anyone to bid (in LBC) to control a LBRY <em>name</em>, which is a lot like a domain name. Whoever controls a name gets to describe what it contains, what it costs to access, who to pay, and where to find it. These names are sold in a continuous running auction. We will talk more about this system a little later on.</p>

      <p>If you’re a programmer, you might recognize the LBRY blockchain as a <em>key-value store</em>. Each key, or name, corresponds to a value, or a metadata entry. Whichever party (or parties) bids the most LBC, gets to control the metadata returned by a key lookup.</p>

      <p>Here is a sample key-value entry in the LBRY blockchain. Here, wonderfullife is the key, and the rest of the description is the value.</p>
      <code class="code-bash"><span class="code-bash__prompt">$</span>lbrynet-cli resolve_name name=wonderfullife

<span class="code-bash__kw">wonderfullife</span> : {
  <span class="code-bash__kw">title</span>: "It’s a Wonderful Life",
  <span class="code-bash__kw">description</span>: "An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.",
  <span class="code-bash__kw">thumbnail</span>: "http://i.imgur.com/MW45x88.jpg",
  <span class="code-bash__kw">license</span>: "public domain",
  <span class="code-bash__kw">price</span>: 0, <span class="code-bash__comment">//free!</span>
  <span class="code-bash__kw">publisher</span>: "A Fan Of George Bailey", <span class="code-bash__comment">//simplification</span>
  <span class="code-bash__kw">sources</span>: { <span class="code-bash__comment">//extensible, variable list</span>
    <span class="code-bash__kw">lbry_hash</span> : &lt;unique id&gt;,
    <span class="code-bash__kw">url</span> : &lt;url&gt;
  }
}</code>
      <div class="meta text-center content-inset"><p>A slightly simplified sample entry of metadata in the LBRY blockchain. Whichever party (or parties) bids the most in an ongoing auction, controls what a name returns.</p></div>

      <p>Other than the usage of the LBRY blockchain to store names and metadata, there are only minor differences between the blockchains of LBRY and Bitcoin, and the changes are generally consensus improvements. We’ve buffed the hashing algorithm, smoothed the block reward function, increased the block size, increased the total number of credits, and prepared for off-chain settlement.</p>

      <p>The LBRY blockchain simply maintains LBC balances and a content namespace/catalogue. The next part, LBRYnet, specifies what to do with this data. To compare to the existing web, the blockchain is like the domain system (it maintains a listing of what is available), while the next piece makes it possible to actually fetch and pay for content.</p>
      <footer> If you’re a Bitcoiner wondering why we don’t use the Bitcoin blockchain, you can read a detailed answer to that question <a href="/news/why-doesnt-lbry-just-use-bitcoin">here</a>.</footer>

      <h4>Part B: The Data Network (LBRYNet)</h4>
      <p>LBRYNet is the layer that makes the LBRY blockchain useful beyond a simple payment system. It says what to do with the information available in the LBRY blockchain, how to issue payments, how to look up a content identifier, and so on. </p>

      <p>To use the LBRY network, a user’s computer needs the capacity to speak LBRY. That layer is LBRYNet. Just as your computer has a library that enables it to understand HTTP, DNS, and other languages and protocols, LBRYNet is the piece of software that allows your computer to understand how to interact with the LBRY network.</p>

      <p>To understand what role LBRYNet plays, let’s drill a little more into a sample user interaction. Once a user has affirmed access and purchase, such as in step 5 of our Sample Use above, the following happens:</p>

      <ol>
        <li>LBRYNet issues a lookup for the name associated with the content. If the client does not have a local copy of the blockchain, this lookup is broadcast to miners or to a service provider. This lookup acquires the metadata associated with the name.</li>
        <li>LBRYNet issues any required payments, as instructed by metadata entries.
          <ol>
            <li>If the content is set to free, nothing happens here.</li>
            <li>If the content is set to have a price in LBC, the client must issue a payment in LBC to the specified address. If the content is published encrypted, LBRYNet will not allow access until this payment has been issued.</li>
            <li>If the content is set to have another payment method, the seller must run or use a service that provides a private server enforcing payment and provisioning accessing keys.</li>
          </ol>
        </li>
        <li>Simultaneous to #2, LBRYNet uses the metadata to download the content itself.
          <ol>
            <li>The metadata allows chunks to be discovered and assembled in a BitTorrent-like fashion. However, unlike BitTorrent, chunks do not individually identify themselves as part of a greater whole. Chunks are just arbitrary pieces of data.</li>
            <li>If LBRYNet cannot find nodes offering chunks for free, it will offer payments for chunks to other hosts with those chunks.</li>
            <li>This payment is not done via proof-of-bandwidth, or third-party escrow. Instead, LBRYNet uses reputation, trust, and small initial payments to ensure reliable hosts. </li>
            <li>If content is not published directly to LBRY, the metadata can instruct other access methods, such as a Netflix URL. This allows us to catalogue content not yet available on LBRY as well as offer legacy and extensibility purposes.</li>
          </ol>
        </li>
      </ol>
      <h3>Layer 2: Services</h3>
      <p>Services are what actually make the LBRY protocol <em>useful. </em>While the LBRY protocol determines what is possible, it is the services that actually do things.</p>

      <p>While the protocol is determined, open, and fixed, the service layer is much more flexible. It is far easier to redesign a website than it is to revise the HTTP protocol itself. The same is true here.</p>

      <p>Additionally, just as in the early days of the internet, imagining the later direction of the web would have been unfathomable, so too may the best uses of LBRY’s namespace or technology be undiscovered.  However, there are some clear use cases:</p>
      <h4>Applications and Devices</h4>
      <p>A LBRY application is how a user would actually have meaningful interactions with the LBRY network. A LBRY client packages the power of the LBRY protocol into a simple application that allows the user to simply search for content, pay for it when necessary, download and enjoy.</p>

      <p>Additionally, a LBRY client can allow users to passively participate in the network, allowing them to automatically earn rewards in exchange for contributing bandwidth, disk space, or processing power to the overall network.</p>

      <p>Applications beyond a traditional computer based browser are possible as well. A LBRY television dongle, a LBRY radio, and any number of existing content access mechanisms can be implemented via an analogous LBRY device.</p>
      <h4>Content Discovery</h4>
      <p>Although the namespace provided by the LBRY protocol is helpful towards discovery, much as the web would be much less useful without search engines or aggregators, LBRY needs its own discovery mechanisms.</p>

      <p>Search features can be constructed from the catalogue of metadata provided in the blockchain as well as the content transaction history available in the blockchain or observed on the network. All of this data, along with user history, allows for the creation of content recommendation engines and advanced search features.</p>

      <p>Discovery on LBRY can also take the form of featured content. Clients can utilize featured content to provide additional visibility for new content that consumers might not otherwise be looking for.</p>
      <h4>Content Distribution</h4>
      <p>Digital content distributors with server-client models are subject to the whims of internet service providers and hostile foreign governments. Traffic from the host servers can be throttled or halted altogether if the owners of cables and routers so choose. However, in the case of the LBRY protocol, content comes from anywhere and everywhere and is therefore not so easily stifled. </p>

      <p>Additionally, the market mechanisms of LBRY create a strong incentive for efficient distribution, which will save the costs of producers and ISPs alike. These properties, along with LBRY’s infringement disincentivizing properties, make LBRY an appealing technology for large existing data or content distributors.</p>
      <h4>Transaction Settlement</h4>
      <p>While payments can be issued directly on the LBRY blockchain, the LBRY protocol encourages a volume of transactions that will not scale without usage of off-chain settlement.</p>

      <p>Essentially, rather than issue a transaction to the core blockchain, transactions are issued to a 3rd-party provider. These providers have a substantial number of coins which are used to maintain balances internally and settle a smaller number of transactions to the core chain. In exchange, these providers earn a small fee, less than the fee required to issue the transaction directly to the blockchain.</p>
    </section>
    <section>
      <h2 id="credits">LBRY Credits</h2>
      <p>LBRY Credits, or <em>LBC</em>, are the unit of account for LBRY. Eventually 1,000,000,000 LBC will exist, according to a defined schedule over 20 years. The schedule decays exponentially, with around 100,000,000 in the first year.</p>

      <p>Additionally, some credits are awarded on a fixed basis. The total breakdown looks like this:</p>

      <ul>
        <li>10% for organizations, charities, and other strategic partners. Organizations like the EFF, ACLU, and others that have fought for digital rights and the security and freedom of the internet.</li>
        <li>20% for adoption programs. We’ll be giving out lots of bonus credits, especially in the early days of LBRY, in order to encourage participation. We will also look to award credits broadly, ensuring the marketplace is egalitarian.</li>
        <li>10% for us. For operational costs as well as profit.</li>
        <li>60% earned by LBRY users, via mining the LBRY cryptocurrency.</li>
      </ul>
    </section>

    <section>
      <h2 id="combatting-the-ugly">Combating The Ugly</h2>
      <p>As neither naïfs nor knaves, we acknowledge that LBRY can be used for bad ends. Technology is frequently this way. Encryption protects our privacy -- as well as that of terrorists. Cars allow us to travel marvelous distances -- and kill millions per year.</p>

      <p>The downside to LBRY is that it can be used to exchange illegal content. However, several factors of LBRY make illicit usage less likely than it may seem at first consideration. On the whole, as with the car and encryption, the benefits of LBRY clearly outweigh its nefarious uses.</p>

      <p>To evaluate a technology’s effect, we must consider where it moves us from the current state of affairs, not judge against a Platonic ideal or past era. In assessing LBRY, we must compare it to a world in which BitTorrent already exists and is quite popular, not the 1950s. LBRY is an improvement over BitTorrent in combatting unsavory content in at least four ways:</p>

      <ol><li><strong>More records. </strong>LBRY contains a public ledger of transactions recording name purchases and published content. As many purchases make it onto the ledger as well, this means infringing actions are frequently recorded <em>forever, </em>or are at a minimum, widely observable.</li>

        <li><strong>Updatable URLs.</strong> Once a BitTorrent magnet hash is in the wild, there is no mechanism to update or alter its resolution whatsoever. If a LBRY name is pointing to infringing content, it can be updated or removed (but not by us). </li>

        <li><strong>Stiffer penalties. </strong>Penalties for profiting off of infringement are far stronger and can involve jail time, while infringement without profit only results in statutory damages. This serves as a far stronger deterrent for all infringing uses than BitTorrent provides.</li>

        <li><strong>Expensive or impossible. </strong>Off-chain settlement will be a requirement for efficient purchases at any significant network size. Settlement providers, ourselves included, will be able to block purchases for infringing content. At significant traffic volume, if infringing content can’t be outright removed or blocked, transaction fees will make it prohibitively expensive.</li>
      </ol>
      <p>And of course, let’s not forget that LBRY users are still subject to the DMCA and other laws governing intellectual property. Users who publishing infringing content are still subject to penalties for doing so in exactly the same way they would be via BitTorrent. LBRY only adds to the suite of options available. This makes LBRY a strict improvement over BitTorrent with regards to illegal usages, which provides none of the mechanisms listed.</p>
    </section>

    <section>
      <h2 id="values">Our Values</h2>
      <p>We want to be the first digital content marketplace to:</p>

      <ol>
        <li><strong>Treat users like adults.</strong> LBRY doesn’t play nanny. It encourages individual people to express their own preferences, rather than force our own onto them. We enable consumers to make their own choices about where and who they want to purchase digital content from.</li>

        <li><strong>Operate openly, inclusively, and transparently.</strong> Anyone can publish or interact with the LBRY network. No one needs permission from us or anyone else. LBRY encourages all parties to participate in the network, rather than the creation of walled gardens. LBRY is a completely open specification and all code is open source.</li>

        <li><strong>Prove decentralization doesn’t mean infringement.</strong> Existing decentralized publishing protocols offer no way for right holders to combat or capture profits from illegally shared content. LBRY’s service layer, blacklisting mechanisms, and naming system all improve the status quo.</li>

        <li><p><strong>Acknowledge modern digital realities and ethical norms.</strong> Prohibition has failed at every turn and in every iteration. Regulating human behavior only works when it aligns with moral norms that are shared by the majority of the population.
          <p>
          If it is impossible to keep drugs out of prisons, it will never be possible to enforce copyright via analogous tactics on the infinitely less-controlled internet. Instead, focus on enticement. While legal compliance is paramount, concentrate as much as possible on making a system that relies more on giving people no excuse to do the wrong thing.</li>

        <li><strong>Collect no rent.</strong> Whatever an artist or creator charges for their work should go to them. Distributing bits is exceedingly simple. There’s no need to give 45% to YouTube or 30% to Apple. Collecting no rent isn’t just a promise, it’s hard coded. The nature of LBRY means this could never be done -- by us or anyone else.</li>
      </ol>
    </section>
    <section>
      <h2 id="tldr">TL;DR</h2>
      <p>Digital art is one of the first goods to evolve beyond scarcity. This evolution is changing the way content is discovered, publicized, paid for and delivered. Heretofore, the lack of transparency and monetization mechanisms in peer-to-peer sharing networks has largely enabled piracy. By equipping a peer-to-peer protocol with a digital currency and transparent decentralized ledger, the LBRY protocol opens the door to a new era of digital content distribution making peer-to-peer content distribution suitable for major publishing houses, self-publishers and everyone in between.</p>

      <p>If LBRY succeeds, we will enter a world that is even more creative, connected, and conservatory. We will waste less and we make more. We will create a world where a teenager in Kenya and a reality star in Los Angeles use the same tool to search the same network and have access to the same results -- a world where information, knowledge, and imagination know no borders. </p>

      <p>Build our dream with us! Download LBRY at <a class="link-primary" href="/get">lbry.io/get</a>.</p>
    </section>
  </div>
  <?php echo View::render('nav/_learnFooter') ?>
</main>
<?php echo View::render('nav/_footer') ?>
<?php /*

 <h3>Layer 1: Protocol</h3>
    <p>While the protocol is one comprehensive set of rules, it is easier to understand as two parts.</p>
    <h4>Part A: The LBRY Blockchain</h4>
    <p>A <em>blockchain</em>, or <em>distributed ledger</em> is the key innovation behind the Bitcoin network. Blockchains solved the very complicated technological problem of having a bunch of distributed, disparate entities all agree on a rivalrous state of affairs (like how much money they owe each other).</p>

    <p>Like Bitcoin, the LBRY blockchain maintain balances -- in this case, balances of <em>LBC</em>, LBRY’s unit of credit. More importantly, the LBRY blockchain also provides a decentralized lookup and metadata storage system. The LBRY blockchain supports a specific set of commands that allows anyone to bid (in LBC) to control a LBRY <em>name</em>, which is a lot like a domain name. Whoever controls a name gets to describe what it contains, what it costs to access, who to pay, and where to find it. These names are sold in a continuous running auction. We will talk more about this system a little later on.</p>

    <p>If you’re a programmer, you might recognize the LBRY blockchain as a <em>key-value store</em>. Each key, or name, corresponds to a value, or a metadata entry. Whichever party or parties bid the most LBC gets to control the metadata returned by a key lookup.</p>

    <p>Here is a sample key-value entry in the LBRY blockchain. Here, wonderfullife is the key, and the rest of the description is the value.</p>
    <div class="code-bash">
        <code><pre style="white-space: pre-wrap;">
    <span class="code-bash__kw">wonderfullife</span> : {
      <span class="code-bash__kw">title</span>: "It’s a Wonderful Life",
      <span class="code-bash__kw">description</span>: "An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.",
      <span class="code-bash__kw">thumbnail</span>: "http://i.imgur.com/MW45x88.jpg",
      <span class="code-bash__kw">license</span>: "public domain",
      <span class="code-bash__kw">price</span>: 0, <span class="code-bash__comment">//free!</span>
      <span class="code-bash__kw">publisher</span>: "A Fan Of George Bailey", <span class="code-bash__comment">//simplification</span>
      <span class="code-bash__kw">sources</span>: { <span class="code-bash__comment">//extensible, variable list</span>
        <span class="code-bash__kw">lbry_hash</span> : &lt;unique id&gt;,
        <span class="code-bash__kw">url</span> : &lt;url&gt;
      }
    }</pre></code>
    </div>
    <div class="meta text-center content-inset"><p>A slightly simplified sample entry of metadata in the LBRY blockchain. Whichever party or parties bid the most in an ongoing auction control what a name returns.</p></div>

    <p>Other than the usage of the LBRY blockchain to store names and metadata, there are only minor differences between the blockchains of LBRY and Bitcoin, and the changes are generally consensus improvements. We’ve buffed the hashing algorithm, smoothed the block reward function, increased the block size, increased the total number of credits, and prepared for off-chain settlement.</p>

    <p>The LBRY blockchain simply maintains LBC balances and a content namespace/catalogue. The next part, LBRYnet, specifies what to do with this data. To compare to the existing web, the blockchain is like the domain system (it maintains a listing of what is available), while the next piece makes it possible to actually fetch and pay for content.</p>
    <footer> If you’re a Bitcoiner wondering why we don’t use the Bitcoin blockchain, you can read a detailed answer to that question <a href="/news/why-doesnt-lbry-just-use-bitcoin/">here</a>.</footer>

    <h4>Part B: The Data Network (LBRYNet)</h4>
    <p>LBRYNet is the layer that makes the LBRY blockchain useful beyond a simple payment system. It says what to do with the information available in the LBRY blockchain, how to issue payments, how to look up a content identifier, and so on. </p>

    <p>To use the LBRY network, a user’s computer needs the capacity to speak LBRY. That layer is LBRYNet. Just as your computer has a library that enables it to understand HTTP, DNS, and other languages and protocols, LBRYNet is the piece of software that allows your computer to understand how to interact with the LBRY network.</p>

    <p>To understand what role LBRYNet plays, let’s drill a little more into a sample user interaction. Once a user has affirmed access and purchase, such as in step 5 of our Sample Use above, the following happens:</p>

    <ol>
      <li>LBRYNet issues a lookup for the name associated with the content. If the client does not have a local copy of the blockchain, this lookup is broadcast to miners or to a service provider. This lookup acquires the metadata associated with the name.</li>
      <li>LBRYNet issues any required payments, as instructed by metadata entries.
        <ol>
          <li>If the content is set to free, nothing happens here.</li>
          <li>If the content is set to have a price in LBC, the client must issue a payment in LBC to the specified address. If the content is published encrypted, LBRYNet will not allow access until this payment has been issued.</li>
          <li>If the content is set to have another payment method, the seller must run or use a service that provides a private server enforcing payment and provisioning accessing keys.</li>
        </ol>
      </li>
      <li>Simultaneous to #2, LBRYNet uses the metadata to download the content itself.
        <ol>
          <li>The metadata allows chunks to be discovered and assembled in a BitTorrent-like fashion. However, unlike BitTorrent, chunks do not individually identify themselves as part of a greater whole. Chunks are just arbitrary pieces of data.</li>
          <li>If LBRYNet cannot find nodes offering chunks for free, it will offer payments for chunks to other hosts with those chunks.</li>
          <li>This payment is not done via proof-of-bandwidth, or third-party escrow. Instead, LBRYNet uses reputation, trust, and small initial payments to ensure reliable hosts. </li>
          <li>If content is not published directly to LBRY, the metadata can instruct other access methods, such as a Netflix URL. This allows us to catalogue content not yet available on LBRY as well as offer legacy and extensibility purposes.</li>
        </ol>
      </li>
    </ol>
      <h3>Layer 2: Services</h3>
      <p>Services are what actually make the LBRY protocol <em>useful. </em>While the LBRY protocol determines what is possible, it is the services that actually do things.</p>

      <p>While the protocol is determined, open, and fixed, the service layer is much more flexible. It is far easier to redesign a website than it is to revise the HTTP protocol itself. The same is true here.</p>

      <p>Additionally, just as in the early days of the internet the later direction of web would have been unfathomable, so too may the best uses of LBRY’s namespace or technology be undiscovered.  However, here are some clear uses.</p>
      <h4>Applications and Devices</h4>
      <p>A LBRY application is how a user would actually have meaningful interactions with the LBRY network. A LBRY client packages the power of the LBRY protocol into a simple application that allows the user to simply search for content, pay for it when necessary, download and enjoy.</p>

      <p>Additionally, a LBRY client can allow users to passively participate in the network, allowing them to automatically earn rewards in exchange for contributing bandwidth, disk space, or processing power to the overall network.</p>

      <p>Applications beyond a traditional computer based browser are possible as well. A LBRY television dongle, a LBRY radio, and any number of existing content access mechanisms can be implemented via an analogous LBRY device.</p>
      <h4>Content Discovery</h4>
      <p>Although the namespace provided by the LBRY protocol is helpful towards discovery, much as the web would be much less useful without search engines or aggregators, LBRY needs it’s own discovery mechanisms.</p>

      <p>Search features can be constructed from the catalogue of metadata provided in the blockchain as well as the content transaction history available in the blockchain or observed on the network. All of this data, along with user history, allows for the creation of content recommendation engines and advanced search features.</p>

      <p>Discovery on LBRY can also take the form of featured content. Clients can utilize featured content to provide additional visibility for new content that consumers might not otherwise be looking for.</p>
      <h4>Content Distribution</h4>
      <p>Digital content distributors with server-client models are subject to the whims of internet service providers and hostile foreign governments. Traffic from the host servers can be throttled or halted altogether if the owners of cables and routers so choose. However, in case of the LBRY protocol content comes from anywhere and everywhere, and is therefore not so easily stifled. </p>

      <p>Additionally, the market mechanisms of LBRY create a strong incentive for efficient distribution, which will save the costs of producers and ISPs alike. These properties, along with LBRY’s infringement
      disincentivizing properties, make LBRY an appealing technology for large existing data or content distributors.</p>
      <h4>Transaction Settlement</h4>
      <p>While payments can be issued directly on the LBRY blockchain, the LBRY protocol encourages a volume of transactions that will not scale without usage of off-chain settlement.</p>

      <p>Essentially, rather than issue a transaction to the core blockchain, transactions are issued to a 3rd-party provider. These providers have a substantial number of coins which are used to maintain balances internally and settle a smaller number of transactions to the core chain. In exchange, these providers earn a small fee, less than the fee required to issue the transaction directly to the blockchain.</p>*
        */ ?>
