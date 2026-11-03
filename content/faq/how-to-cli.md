{
  "title": "How do I use the LBRY command line interface (CLI) tool?",
  "url": "/faq/how-to-cli",
  "type": "faq",
  "source_url": "https://lbry.com/faq/how-to-cli",
  "description": "As a power user, you may want to run your own commands against the LBRY SDK. This guide explains how…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#6c04090000032c000e1e15420f0301",
  "footer_email_code": "eb838e878784ab87899992c5888486",
  "meta_title": "How do I use the LBRY command line interface (CLI) tool?",
  "category": "powerusers",
  "source_file": "content/faq/how-to-cli.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/how-to-cli.md",
  "weight": 48
}
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

## Common/sample commands
- `lbrynet claim list` - Show list of own claims, including channels
- `lbrynet support create --claim_id=<claimid> --amount=5.0` - add 5 LBC to a claim or channel
- `lbrynet resolve one` - Retrieve information about winning claim at lbry://one
- `lbrynet claim search one` - Retrieve information about all claims at lbry://one
- `lbrynet stream abandon --claim_id=<claimid>` - Abandon stream claim by claim id (from claim info)
