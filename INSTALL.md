# Installation

## Prerequisites

To run this project, you'll need to have either PHP7 or Docker installed, and be using either macOS or Linux.

## Running Locally

- Install [PHP7](http://php.net/downloads.php)
- Possibly install additional PHP extensions: `curl`, `xml`, `mbstring`, `dom`
- Checkout the project. Be sure to install/update submodules (`git submodule update --recursive --remote`).
- Run `./dev.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

## Running via Docker

- Install Docker
- Checkout the project
- Run `./docker.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

## Verifying Install

If `localhost:8000` returns the lbry.io website, it's running correctly.

## Additional Notes

- Both the `dev.sh` and `docker.sh` scripts will initialize a configuration based on `data/config.php.example` if `data/config.php` does not exist.
- Some pages and interactions rely on API keys that will not be available to you in your install.
- To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.
- If dev.sh fails to start with missing php extensions, please install php-xml, php-curl, php-mbstring according to your OS instruction.
