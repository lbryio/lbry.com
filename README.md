# lbry.io

The [lbry.io](https://lbry.io) website.

## Running lbry.io

It's very easy to have lbry.io running locally:

- Install PHP7
- Checkout the project
- Run `./dev.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

You can also run the development server using docker:

- Install Docker
- Checkout the project
- Run `./docker.sh` from the project root
- Access [localhost:8000](http://localhost:8000) in your browser

Both the `dev.sh` and `dev-docker.sh` scripts will initialise a configuration based on `data/config.php.example` if `data/config.php` does not exist.

To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.

Note that some pages and interactions rely on API keys that will not be available to you in your install.
