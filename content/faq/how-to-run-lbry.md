{
  "title": "How do I run LBRY from the command line?",
  "url": "/faq/how-to-run-lbry",
  "type": "faq",
  "source_url": "https://lbry.com/faq/how-to-run-lbry",
  "description": "This guide will allow you to run the LBRY daemon which connects to the LBRY network. You can run the…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#f098959c9c9fb09c928289de939f9d",
  "footer_email_code": "87efe2ebebe8c7ebe5f5fea9e4e8ea",
  "meta_title": "How do I run LBRY from the command line?",
  "category": "powerusers",
  "source_file": "content/faq/how-to-run-lbry.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/how-to-run-lbry.md",
  "weight": 47
}
This guide will allow you to run the LBRY daemon which connects to the LBRY network. You can run the daemon separately in this fashion without having to start the LBRY app. If the LBRY app is started, it will utilize the running daemon.

## Windows
1. Open a **Command Prompt** application window
2. Type `cd "C:\Program Files\LBRY\resources\static\daemon"` ([32-bit located in Program Files(x86)]) and click Enter
3. Type `lbrynet start` and click Enter

## MacOS
1. Open a **Terminal** window
2. Type `cd /Applications/LBRY.app/Contents/Resources/static/daemon`
3. Type `./lbrynet start` and click Enter

## Ubuntu / Linux
1. Open a **Terminal** window
2. Type `cd /opt/LBRY/resources/static/daemon` or build location if running from source
3. Type `./lbrynet start` and click Enter
