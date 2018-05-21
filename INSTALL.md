# Installation

## Prerequisites

To run this project, you'll need to have either PHP7 or Docker installed, and be using either macOS or Linux.

## Running Locally

- Install PHP7
- Checkout the project
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

- Both the `dev.sh` and `docker.sh` scripts will initialise a configuration based on `data/config.php.example` if `data/config.php` does not exist.
- Some pages and interactions rely on API keys that will not be available to you in your install.
- To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.
- If the dev.sh fail to start with missing php extension please install php-xml, php-curl, php-mbstring according to your OS instruction