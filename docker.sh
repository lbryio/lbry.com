#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ ! -e "$DIR/data/config.php" ]; then
  cp "$DIR/data/config.php.example" "$DIR/data/config.php"
fi

# Installing git hook
$DIR/hooks/install.sh

docker run --rm -it --name "dev.lbry.com" \
  -v "$DIR:/usr/src/lbry.com" \
  -w "/usr/src/lbry.com" \
  -p "127.0.0.1:8000:8000" \
  -u "$(id -u):$(id -g)" \
  php:7-alpine \
  php composer.phar install

  php --server "0.0.0.0:8000" --docroot "web/" "index.php"
