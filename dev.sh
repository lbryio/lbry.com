#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -e "data/config.php" ]; then
  cp "$DIR/data/config.php.example" "$DIR/data/config.php"
fi

if ! which $PHPBIN 2>/dev/null; then
    PHPBIN=php
fi

# Install dependencies
$PHPBIN composer.phar install

# Run server
$PHPBIN --server localhost:8000 --docroot "$DIR/web" "$DIR/web/index.php"
