# Installation

## Prerequisites
To run this project, you'll need to have either PHP7.2.5 or Docker installed, and be using either macOS or Linux.

## Development
- Install [PHP 7.2.5 and up](http://php.net/downloads.php)
- Possibly install additional PHP extensions: `curl` / `dom` / `mbstring` / `xml`
- Checkout the project and install submodules: `git submodule update --init`
- If you have already cloned the project, be sure to update submodules: `git submodule update --recursive --remote`
- Run `./dev.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

## Verifying Install
If `localhost:8000` returns the lbry.com website, it's running correctly.

## Additional Notes
- The `dev.sh` script will initialize a configuration based on `data/config.php.example` if `data/config.php` does not exist.
- Some pages and interactions rely on API keys that will not be available to you in your install.
- To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.
- If `dev.sh` fails to start with missing php extensions, please install `php-xml`, `php-curl`, and `php-mbstring` according to your OS instructions.
