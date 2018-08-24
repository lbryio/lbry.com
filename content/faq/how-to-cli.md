---
title: How do I use the LBRY Command Line Interface (CLI) tool?
category: setup
---

In addition to the JSON commands available in the [LBRY API Quickstart Guide](https://lbry.io/quickstart/api) as a method to interact with the LBRY protocol, there is another way through the command line tools (CLI). This will allow you to run any available commands from the [LBRY CLI documentation](https://lbryio.github.io/lbry/cli/). You must be running the LBRY app or daemon in order to interact with the protocol.

In recent versions of LBRY, the lbrynet-cli tool is no longer included with the App and must be downloaded/copied into the appropriate folder (see below). [Download](https://github.com/lbryio/lbry/releases) the version that matches your Settings > Help > `Daemon` version number. 

## Windows
1. Open a **Command Prompt** application window
1. Type `cd "C:\Program Files\LBRY\resources\static\daemon"` ([32-bit located in Program Files(x86)]) and click Enter
1. Type `lbrynet-cli status` and click **Enter**. This will return the LBRYnet status data
1. See examples below or [LBRY CLI documentation](https://lbryio.github.io/lbry/cli/) for additional commands

## MacOS
1. Open a **Terminal** window
1. Type `cd /Applications/LBRY.app/Contents/Resources/static/daemon`
1. Type `./lbrynet-cli status`  and click **Enter**. This will return the LBRYnet status data
1. See examples below or [LBRY CLI documentation](https://lbryio.github.io/lbry/cli/) for additional commands

## Ubuntu / Linux 
1. Open a **Terminal** window
1. Type `cd /opt/LBRY/resources/static/daemon`
1. Type `./lbrynet-cli status`  and click **Enter**. This will return the LBRYnet status data
1. See examples below or [LBRY CLI documentation](https://lbryio.github.io/lbry/cli/) for additional commands

## Common/Sample Commands
- `lbrynet-cli claim_list_mine` - Show list of own claims, including channels
- `lbrynet-cli claim_new_support --name=@channel --claim_id=<claimid> --amount=5` - add 5 LBC to a claim or channel
- `lbrynet-cli resolve one` - Retrieve information about winning claim at lbry://one
- `lbrynet-cli claim_list one` - Retrieve information about all claims at lbry://one
- `lbrynet-cli claim_abandon --claim_id=<claimid>` - Abandon claim by claim id (from claim info)
- `lbrynet-cli claim_abandon --txid=<txid> --nout=<nout>` - Abandon claim by transaction id and nout (from claim info)
