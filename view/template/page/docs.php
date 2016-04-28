<?php Response::setMetaDescription('Documentation on LBRY, a decentralized content distribution network.') ?>
<?php echo View::render('nav/header', ['isDark' => false]) ?>
<main>
  <div class="content">
    <h1>Docs</h1>
    <h3>Layer 1: Protocol</h3>
    <p>While the protocol is one comprehensive set of rules, it is easier to understand as two parts.</p>
    <h4>Part A: The LBRY Blockchain</h4>
    <p>A <em>blockchain</em>, or <em>distributed ledger</em> is the key innovation behind the Bitcoin network. Blockchains solved the very complicated technological problem of having a bunch of distributed, disparate entities all agree on a rivalrous state of affairs (like how much money they owe each other).</p>

    <p>Like Bitcoin, the LBRY blockchain maintain balances -- in this case, balances of <em>LBC</em>, LBRY’s unit of credit. More importantly, the LBRY blockchain also provides a decentralized lookup and metadata storage system. The LBRY blockchain supports a specific set of commands that allows anyone to bid (in LBC) to control a LBRY <em>name</em>, which is a lot like a domain name. Whoever controls a name gets to describe what it contains, what it costs to access, who to pay, and where to find it. These names are sold in a continuous running auction. We will talk more about this system a little later on.</p>

    <p>If you’re a programmer, you might recognize the LBRY blockchain as a <em>key-value store</em>. Each key, or name, corresponds to a value, or a metadata entry. Whichever party or parties bid the most LBC gets to control the metadata returned by a key lookup.</p>

    <p>Here is a sample key-value entry in the LBRY blockchain. Here, wonderfullife is the key, and the rest of the description is the value.</p>
    <div class="code-bash">
        <code><pre style="white-space: pre-wrap;">
    <span class="code-bash-kw1">wonderfullife</span> : {
      <span class="code-bash-kw2">title</span>: "It’s a Wonderful Life",
      <span class="code-bash-kw2">description</span>: "An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.",
      <span class="code-bash-kw2">thumbnail</span>: "http://i.imgur.com/MW45x88.jpg",
      <span class="code-bash-kw2">license</span>: "public domain",
      <span class="code-bash-kw2">price</span>: 0, <span class="code-bash-comment">//free!</span>
      <span class="code-bash-kw2">publisher</span>: "A Fan Of George Bailey", <span class="code-bash-comment">//simplification</span>
      <span class="code-bash-kw2">sources</span>: { <span class="code-bash-comment">//extensible, variable list</span>
        <span class="code-bash-kw2">lbry_hash</span> : &lt;unique id&gt;,
        <span class="code-bash-kw2">url</span> : &lt;url&gt;
      }
    }</pre></code>
    </div>
    <div class="meta text-center content-inset"><p>A slightly simplified sample entry of metadata in the LBRY blockchain. Whichever party or parties bid the most in an ongoing auction control what a name returns.</p></div>

    <p>Other than the usage of the LBRY blockchain to store names and metadata, there are only minor differences between the blockchains of LBRY and Bitcoin, and the changes are generally consensus improvements. We’ve buffed the hashing algorithm, smoothed the block reward function, increased the block size, increased the total number of credits, and prepared for offchain settlement.</p>

    <p>The LBRY blockchain simply maintains LBC balances and a content namespace/catalogue. The next part, LBRYnet, specifies what to do with this data. To compare to the existing web, the blockchain is like the domain system (it maintains a listing of what is available), while the next piece makes it possible to actually fetch and pay for content.</p>
    <footer> If you’re a Bitcoiner wondering why we don’t use the Bitcoin blockchain, you can read a detailed answer to that question <a href="https://blog.lbry.io/why-doesnt-lbry-just-use-bitcoin/">here</a>.</footer>

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
  </div>
</main>
<?php echo View::render('nav/footer') ?>