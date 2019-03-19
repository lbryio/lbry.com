---
title: How do I use the LBRY Command Line Interface (CLI) tool?
category: powerusers
---

As a power user, you may want to run your own commands against the LBRY SDK. This guide explains how to run any available commands from the [LBRY SDK documentation](https://lbry.tech/api/sdk). You must be running the LBRY app or daemon in order to interact with the protocol.

## Windows
1. Open a **Command Prompt** application window
2. Type `cd "C:\Program Files\LBRY\resources\static\daemon"` ([32-bit located in Program Files(x86)]) and click Enter
3. Type `lbrynet status` and click **Enter**. This will return the LBRYnet status data
4. See examples below or [LBRY SDK documentation](https://lbry.tech/api/sdk) for additional commands

## MacOS
1. Open a **Terminal** window
2. Type `cd /Applications/LBRY.app/Contents/Resources/static/daemon`
3. Type `./lbrynet status`  and click **Enter**. This will return the LBRYnet status data
4. See examples below or [LBRY SDK documentation](https://lbry.tech/api/sdk) for additional commands

## Ubuntu / Linux
1. Open a **Terminal** window
2. Type `cd /opt/LBRY/resources/static/daemon`
3. Type `./lbrynet status`  and click **Enter**. This will return the LBRYnet status data
4. See examples below or [LBRY SDK documentation](https://lbry.tech/api/sdk) for additional commands

## Common/Sample Commands
- `lbrynet claim_list_mine` - Show list of own claims, including channels
- `lbrynet claim_new_support --name=@channel --claim_id=<claimid> --amount=5` - add 5 LBC to a claim or channel
- `lbrynet resolve one` - Retrieve information about winning claim at lbry://one
- `lbrynet claim_list one` - Retrieve information about all claims at lbry://one
- `lbrynet claim_abandon --claim_id=<claimid>` - Abandon claim by claim id (from claim info)
- `lbrynet claim_abandon --txid=<txid> --nout=<nout>` - Abandon claim by transaction id and nout (from claim info)
