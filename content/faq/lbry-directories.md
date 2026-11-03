{
  "title": "Where are all the behind the scenes files?",
  "url": "/faq/lbry-directories",
  "type": "faq",
  "source_url": "https://lbry.com/faq/lbry-directories",
  "description": "Depending on which OS and wallet you use, LBRY files may be stored in several places. Windows C:\\Program Files\\LBRY [32-bit…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#b6ded3dadad9f6dad4c4cf98d5d9db",
  "footer_email_code": "cda5a8a1a1a28da1afbfb4e3aea2a0",
  "meta_title": "Where are all the behind the scenes files? - LBRY",
  "category": "powerusers",
  "source_file": "content/faq/lbry-directories.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/lbry-directories.md",
  "weight": 53
}
Depending on which OS and wallet you use, LBRY files may be stored in several places.

## Windows

- `C:\Program Files\LBRY` [32-bit located in Program Files(x86)] - LBRY application itself
- `C:\Users\%USER%\AppData\Local\lbry\lbrynet` or `%localappdata%\lbry\lbrynet` - Daemon configuration, logs, encrypted blob files
- `C:\Users\%USER%\AppData\Local\lbry\lbryum` or `%localappdata%\lbry\lbryum` - Wallet and blockchain data

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be in `%appdata%`*

## MacOS

- `~/Library/Application Support/LBRY` - LBRY application, daemon configuration, logs and encrypted blob files
- `~/.lbryum` - Wallet and blockchain data
- `~/.lbrycrd` - Location for [lbrycrdd](/faq/standalone-wallet) full blockchain data (separate install)


*Hint: copy/paste the above directories into Finder - Click `Go` from the Finder top menu bar, then `Go To Folder`*

## Linux

- `/opt/LBRY` - LBRY application itself
- `~/.local/share/lbry/lbrynet` - Daemon configuration and encrypted blob files
- `~/.local/share/lbry/lbryum` - Wallet and blockchain headers
- `~/.lbrycrd` - Location for [lbrycrdd](/faq/standalone-wallet) full blockchain data (separate install)

*\*If you originally installed v0.14 and below, the lbrynet and lbryum directories will be `~/.lbrynet` / `~/.lbryum`*

## Android {#android}
 *Use file manager to navigate to the path below*
- `Internal storage/android/data/io.lbry.browser/files/lbrynet` - Daemon configuration, logs, encrypted blob files
- `Internal storage/android/data/io.lbry.browser/files/lbryum` - Wallet and blockchain data

_____________________________

Note: do not confuse blobfiles with `Download directory` that you define in app settings. The `Download directory` is just a path where all downloaded files are copied for your potential convenience, the files placed there are not used by LBRY anyhow. You can disable saving copies of all viewed content in _Advanced Settings_. If you want to change the location of actual `/blobfiles/` participating in LBRY network distribution, refer to [this instruction](https://lbry.com/faq/how-to-change-lbry-blob-files).
