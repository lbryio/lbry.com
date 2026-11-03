{
  "title": "How to change default daemon peer port?",
  "url": "/faq/how-to-change-port",
  "type": "faq",
  "source_url": "https://lbry.com/faq/how-to-change-port",
  "description": "If you see the error message couldn't bind to port 3333, it is likely that another process is already bound…",
  "images": [
    "https://lbry.com/img/og-faq.png?_cache=2026-10-31"
  ],
  "og_type": "article",
  "twitter_card": "summary_large_image",
  "news_feed": false,
  "footer_email_href": "/cdn-cgi/l/email-protection#bdd5d8d1d1d2fdd1dfcfc493ded2d0",
  "footer_email_code": "eb838e878784ab87899992c5888486",
  "meta_title": "How to change default daemon peer port? - LBRY",
  "category": "powerusers",
  "source_file": "content/faq/how-to-change-port.md",
  "edit_url": "https://github.com/lbryio/lbry.com/tree/master/content/faq/how-to-change-port.md",
  "weight": 49
}
If you see the error message `couldn't bind to port 3333`, it is likely that another process is already bound to that port. You will need to change the port before starting the daemon. The port number should not matter as long as it is available and not blocked by your ISP.

The most user friendly way to change the port permanently is to append the below line to the `daemon_settings.yml` in the `lbrynet` [directory](/faq/lbry-directories). If it doesn't exist, create a new file named `daemon_settings.yml` and append:

    tcp_port: 3334

Sample daemon_settings.yml (may vary by OS):

    download_directory: c:\users\lbry
    tcp_port: 3334

## Other methods
To change the port once during runtime, set the LBRY_PEER_PORT env variable. Here's one way to do this:

    LBRY_TCP_PORT=3334 ./lbrynet-daemon

Once the daemon is running, you can change the port permanently by using the following [api](/api) call

    curl -d'{"method": "settings_set", "params": {"key": "tcp_port", "value": <port-num>}}' http://localhost:5279/


or via cli command

    lbrynet settings set tcp_port 3334
