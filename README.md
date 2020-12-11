<h1 align="center">lbry.com</h1>

<div align="center">
  <strong>We came from the future to help you save the Internet</strong>
</div>

<div align="center">
  Official website for <a href="https://lbry.com">the LBRY protocol</a>.
</div>

<div align="center">
<img src="https://lbry.com/img/website-screenshot.png">
</div>

<div align="center">
  <a href="https://github.com/lbryio/lbry.com/blob/master/LICENSE">
    <img src="https://img.shields.io/dub/l/vibe-d.svg?style=flat-square"/>
  </a>

  <a href="https://chat.lbry.com">
    <img src="https://img.shields.io/discord/362322208485277697.svg?style=flat-square&logo=discord"/>
  </a>
</div>


## Installation
Please see [INSTALL](INSTALL.md) for comprehensive, easy-to-follow instructions on running this project.

## Usage
Unless you are planning to contribute to the `lbry.com` website, this project serves little independent purpose.

To access a local copy of `lbry.com`, follow [INSTALL](INSTALL.md) and then access `localhost:8000` in your browser. This will allow you to make changes to the website, test locally, and then submit pull requests.

## Contributing
Contributions to this project are welcome, encouraged, and compensated. For more details, see [CONTRIBUTING](https://lbry.tech/contribute).

## License
This project is MIT licensed. For the full license, see [LICENSE](LICENSE).

## Build URLs
lbry.com provides functionality for redirecting to build assets of other LBRY repos. The general structure is:

`lbry.com/releases/<github_repo_name>.<extension>`

For example, to get the latest [lbry-desktop](https://github.com/lbryio/lbry-desktop) release on Windows, you would use the URL:

`lbry.com/releases/lbry-desktop.exe`

Extension is used to get the release for the appropriate operating system, even if the release asset does not match the extension provided.

| Operating System | Extensions
--- | ---
| Windows | msi, exe
| macOS | dmg, pkg
| Linux (Debian) | deb
| Android | apk

The asset returned will match the latest release on the appropriate GitHub repo.

Release candidates can also be targeted. For release candidates, use the following structure:

`lbry.com/releases/pre/<github_repo_name>.<extension>`

## Security
We take security seriously. Please contact [security@lbry.com](mailto:security@lbry.com) regarding any security issues.

[Our PGP key is here](https://keybase.io/lbry/key.asc) if you need it.

## Contact
The primary contact for this project is [@netoperatorwibby](https://github.com/netoperatorwibby) (paul+github@lbry.com).

## Additional Info and Links
- [https://lbry.com](https://lbry.com) - The live LBRY website
- [Discord Chat](https://chat.lbry.com) - A chat room for the LBRYians
- [LBRY Tech Forum](https://forum.lbry.tech) - LBRY Forum
- [Email us](mailto:hello@lbry.com) - LBRY Support email
- [Twitter](https://twitter.com/@lbryio) - LBRY Twitter page
- [Facebook](https://www.facebook.com/lbrycom) - LBRY Facebook page
- [Reddit](https://reddit.com/r/lbry) - LBRY Reddit page
- [Telegram](https://t.me/lbryofficial) - Telegram group


