#!/bin/bash

PHPBIN=php7.0

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -e "data/config.php" ]; then
  cp "$DIR/data/config.php.example" "$DIR/data/config.php"
fi

if ! which $PHPBIN 2>/dev/null; then
    PHPBIN=php
fi

$PHPBIN composer.phar install

$PHPBIN --server localhost:8000 --docroot "$DIR/web" "$DIR/web/index.php"
