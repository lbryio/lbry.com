# Installation

## Prerequisites
To run this project, you'll need to have either PHP7.0 or Docker installed, and be using either macOS or Linux.

## Development
- Install [PHP7.1 and up](http://php.net/downloads.php)
- Possibly install additional PHP extensions: `curl` / `dom` / `mbstring` / `xml`
- Checkout the project and install submodules: `git submodule update --init`
- If you have already cloned the project, be sure to update submodules: `git submodule update --recursive --remote`
- Run `./dev.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

## Installing Composer
To quickly install composer directly via Linux, run the following script to the terminal:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```
then run `composer update` to check the latest dependency updates for your php version.
More documentation available here on [https://getcomposer.org/doc](https://getcomposer.org/doc).

For windows installation, you can click [here](https://getcomposer.org/doc/00-intro.md#installation-windows) on how to set up.

## Verifying Install
If `localhost:8000` returns the lbry.com website, it's running correctly.

## Additional Notes
- The `dev.sh` script will initialize a configuration based on `data/config.php.example` if `data/config.php` does not exist.
- Some pages and interactions rely on API keys that will not be available to you in your install.
- To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.
- If `dev.sh` fails to start with missing php extensions, please install `php-xml`, `php-curl`, and `php-mbstring` according to your OS instructions.
