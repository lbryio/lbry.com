#!/bin/bash

source dev-prepare.sh

docker run --rm -it --name "dev.lbry.io" \
  -v "$(readlink -f .):/usr/src/lbry.io" \
  -w "/usr/src/lbry.io" \
  -p "127.0.0.1:8000:8000" \
  -u "$(id -u):$(id -g)" \
  php:7-alpine \
  php --server "0.0.0.0:8000" --docroot "web/" "web/index.php"
