# lbry.io

The [lbry.io](https://lbry.io) website.

## Running lbry.io

It's very easy to have lbry.io running locally:

- Install PHP7
- Checkout the project
- Run `php --server localhost:8000 --docroot web/ web/index.php` from the root project folder
- Access `localhost:8000` in your browser

To run remotely, simply install PHP and configure Apache or your server of choice to serve `web/index.php`.

Note that some pages and interactions rely on API keys that will not be available to you in your install.
