---
title: Contributing to LBRY
category: other
---

Interested in progressing content freedom? Awesome! This guide will get you started.

There are many ways you can get involved. This document covers:

* [Ecosystem Overview](#ecosystem-overview)
* [Raising Issues](#raising-issues)
  * [Reporting Bugs](#report-a-bug)
  * [Feature Requests](#feature-requests)
* [Coding](#coding)
* [Creative](#creative)
  * [Writing](#writing)
  * [Designing](#designing)
  * [Communicating](#communicating)
* [Translating](#translating)
* [Testing](#testing)

## Ecosystem Overview {#ecosystem-overview}

Typical usage of LBRY does not involve a single piece of software but instead involves several interacting components.

Whether you want to report an issue, contribute to the code, or help test the software, it's important to understand which component you want.

| Component | Language | What Is It | Use This Repo For..|
--- | --- | --- | ---
| [lbry](https://github.com/lbryio/lbry) | Python | A daemon that runs in the background and allows your computer to speak LBRY. | Issues with downloading or uploading. <br/><br/> Anything related to output in `lbrynet.log`. <br/><br/> Issues unrelated to or deeper than the interface that does not deal with blockchain credits. |
| [lbry-app](https://github.com/lbryio/lbry-app) | JavaScript | A graphical browser for the LBRY protocol | Problems with or features missing from the browser interface. <br/><br/> Issues with using, installing or running the LBRY app **other** than network, connection, or performance issues. |
| [lbryum](https://github.com/lbryio/lbryum) | Python | Server for the thin wallet bundled with lbry/lbry-app | Issues related to credit/wallet functionality.<br><br><em>This is a fork of <a href="https://github.com/spesmilo">electrum</a>.</em>
| [lbrycrd](https://github.com/lbryio/lbrycrd) | C++ | The LBRY blockchain and standalone wallet | Running a full node, or direct access to the LBRY blockchain.<br><br> <em>(This wallet is not bundled with the application. You only want this if you downloaded/installed this package specifically.)</em>
| [lbry-schema](https://github.com/lbryio/lbryschema) | Protobuf, Python | The structure of the metadata stored in the LBRY blockchain. | You want to change the metadata LBRY stores about digital content. |
| [lbryio](https://github.com/lbryio/lbry.io) | PHP | The lbry.io website. | Edits to the site, FAQ/KB requests or additions.

The vast majority of issues will be filed in either `lbry-app` or `lbry`.

## Raising Issues {#raising-issue}

If you're about to raise an issue because you've found a problem with LBRY, or you'd like to request a new feature, or for any other reason, please read this first.

GitHub is the preferred channel for [bug reports](#report-a-bug) and [feature requests](#feature-requests). 

### Reporting a Bug {#report-a-bug}

A bug is a _demonstrable problem_ that is caused by the code in the repository. Good bug reports are extremely helpful - thank you!

Guidelines for bug reports:

1. **Identify the correct repo**. See [ecosystem overview](#ecosystem-overview). While it's okay if you get this wrong, it's a big help to us if you get it right.

1. **Use the GitHub issue search** &mdash; check if the issue has already been reported (or fixed). Be sure to include closed tickets in your search.

1. **Follow the instructions** - When you open an issue inside of GitHub, each repo contains a template for how to create a good bug report. Please follow it!

Well-specified bug reports save developers lots of time and are extremely appreciated, typically with an LBRY credit tip.

### Feature Requests {#feature-requests}

Feature requests are welcome. Before you submit one be sure to:


1. **Identify the correct repo**. See [ecosystem overview](#ecosystem-overview).
1. **Use the Github Issues search** and check the feature hasn't already been requested. Be sure to include closed tickets.
2. **Consider whether it's feasible** for us to tackle this feature in the next 6-12 months. The LBRY team is currently stretched thin just adding basic functionality. If this is a nice to have rather than a need, it is probably more clutter than helpful.
3. **Make a strong case** to convince the project's leaders of the merits of this feature. Please provide as much detail and context as possible. This means explaining the use case and why it is likely to be common.

## Coding {#coding}

You're welcome and encouraged to work with us and the community on LBRY!

An incredible amount of LBRY was built via public contributions. Every technical employee of LBRY outside of the founding team started as a public contributor. Contributors have also earned hundreds of thousands of LBRY credits (and tens of millions of street cred).

How to contribute:

1. **Identify the component you want to work on**. LBRY has code bases in Python, JavaScript, PHP, and C++. See [Ecosystem Overview](#ecosystem-overview).
1. **Get set up.** Each repo has a README.md or INSTALL.md with instructions on how to get the repo up and running properly.
1. **Find something to work on**. Look for issues tagged "Contributor Friendly" inside of the repo you selected. These are good for new contributors. Of course, you are also welcome to work on something not currently filed if you have your own idea!
1. **Abide coding and commit standards**. Look for a STANDARDS.md document in the repo you are working on for repo specific instructions. Update CHANGELOG.md (if it exists) along with your pull request.
1. **Questions or problems? Ask!**. The #dev channel of [our chat](https://chat.lbry.io) is full of other LBRY community devs and team members.

## Creative {#creative}

If you're a writer, designer, or communicator, you can also contribute to LBRY.

### Writing {#writing}

If you want to update or edit existing written copy, it likely exists in either [lbry.io](https://github.com/lbryio/lbry.io) (the website) or [lbry-app](https://github.com/lbryio/lbry-app) (the browser). Try searching the respective repo for a string (in quotes) related to the copy that you want to adjust. You can likely figure out how to edit text via the GitHub interface. If not, you can point out issues to [Tom](mailto:tom@lbry.io).

If you want to contribute new written copy, such as a blog post or other content, please contact [Jeremy](mailto:jeremy@lbry.io), or join or [chat](https://chat.lbry.io) and post a message in #general.

### Designing {#designing}

If you're a web designer, you can contribute to either [lbry.io](https://github.com/lbryio/lbry.io) (the website) or [lbry-app](https://github.com/lbryio/lbry-app) (the browser) by opening a pull request. 

If you're a graphic designer, creating engaging graphics, GIFs, explainers, HOWTOs, wallpapers, and other related graphical content is a huge help! You can submit or discuss contributions by emailing [Jeremy](mailto:jeremy@lbry.io) or joining the #design channel in our [chat](https://chat.lbry.io).

### Communicating {#communicating}

If you're engaged with or otherwise involved with either an online or in-person community that could make use of LBRY, we're happy to work with you in how to introduce LBRY to them. Email [Jeremy](mailto:jeremy@lbry.io) if you are interested in this.

## Translating {#translating}

Translations are not managed through Git or GitHub. Email [Josh](mailto:josh@lbry.io) if you'd like to join LBRY as a translator.

## Testing {#testing}

If you aren't a coder, or you're a lazy coder, one of the best ways you can contribute is testing!

Both `lbry` and `lbry-app` go through regular release cycles where new versions are shipped every few weeks. Testing release candidates or builds of a master is a great way to help us identify issues and ship bug-free code.

For any repos, you want to be a tester on, "Watch" the repo on GitHub. You will receive an email with release notes whenever a release candidate is out.

If you're feeling moderately hard-core, you can also test `master` builds via [releases.lbry.io](http://releases.lbry.io/). If you're feeling super hard-core, you can compile `master` yourself, via the README.md or INSTALL.md in the associated repo.

**Note that you are using release candidates and especially master builds at your own risk. Back up your wallet first.**
