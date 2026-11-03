> This site was rewritten from PHP to a static Hugo site. The previous PHP version is preserved on the [`php-version`](../../tree/php-version) branch. To check it out locally, run `git switch php-version`.

# LBRY website

A static Hugo site. Building requires Hugo; PHP, Python, a database and the
original source checkout are not needed.

## Build and preview

Use Hugo 0.168.0:

```sh
hugo
hugo server
```

The build is written to `public/`. The built-in Hugo server previews content and
platform download pages. Use Caddy when serving legacy URLs, redirects and
custom HTTP statuses.

## Serve with Caddy

From this directory, after building:

```sh
caddy run --config Caddyfile --adapter caddyfile
```

`Caddyfile` contains the complete production configuration, including automatic
HTTPS for `lbry.com`. Set `SITE_ROOT` to override the default `./public` directory:

```sh
SITE_ROOT="$PWD/public" caddy run --config Caddyfile --adapter caddyfile
```

Caddy serves Hugo pages and assets directly. It normalizes repeated and trailing
slashes and tries lowercase paths when an exact file does not exist. Known pages
redirect to their normalized URL; unknown paths receive the normal 404 page.
Exact asset filenames retain their spelling, including uppercase extensions.

Public shortlinks and recognized article filename aliases remain in `Caddyfile`.
Article aliases check that the canonical destination exists. Query strings are
preserved during URL normalization and article redirects. Asset query strings use
the same underlying file; FAQ and download options are handled by JavaScript.

HTML uses a shared five-minute cache policy; common assets use four hours.
Errors use `private, no-cache`. Security headers are shared across responses.
Unsupported methods receive the site's 405 page. The former per-URL HTTP
profiles and captured error/redirect bodies are no longer used.

HTTP and HTTPS `lbry.tv` requests redirect directly to Odysee, preserving the URI.
`hugo server` previews the site independently and does not use this configuration.

## Editing

- Articles, FAQs, biographies and reports: `content/news/`, `content/faq/`,
  `content/team/` and `content/credit-reports/`.
- Other page content: `content/pages/`; indexes: `content/indexes/`.
- Shared document, header and footer: `layouts/_default/baseof.html` and
  `layouts/partials/site/`.
- Platform pages: `content/download-platforms/`; download layouts:
  `layouts/partials/downloads/`; client-side OS selection: `static/js/download.js`.
- Desktop release data: `data/downloads.json`; platform/store/screenshot data:
  `data/download_page.json`. The Android APK redirect target is configured in
  `Caddyfile`.
- Roadmap snapshots: `data/roadmaps.yaml`; FAQ grouping:
  `data/faq_categories.json`; shared link policy: `data/link_policy.json`.
- Known article filename aliases redirect to their canonical articles through
  `Caddyfile`; they no longer generate duplicate HTML pages.
- The older Real Talk article remains at `/news/128-redactedtonight`, separate
  from `/news/redactedtonight`.
- Historical blank team filename pages remain in `content/team-file-pages/`.

On `/get`, JavaScript detects the OS and displays the corresponding production
layout. Explicit platform URLs override detection. `?showall=1` displays the OS
chooser; `?auto=1` starts the desktop download. Without JavaScript, visitors can
choose a platform using normal links.

The site unlinks chat.lbry.com and shop.lbry.com references while preserving
inline text. The footer omits Shop and Chat on Discord.

Hugo explicitly allows the repository's trusted HTML and Markdown content.
Templates access shared data through `hugo.Data`.

After upgrading an existing checkout, run `hugo --cleanDestinationDir` once to
remove obsolete generated files from `public/`. The captured response folders
(`_http`, `_family-probes`, `_url-addendum`, `_variants` and
`__migration_missing_reference__`) have been removed. Real assets formerly stored
there now live at their normal public paths.
