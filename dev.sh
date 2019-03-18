#!/bin/bash

set -e

PHPBIN=php7.2

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ ! -e "data/config.php" ]; then
  cp "$DIR/data/config.php.example" "$DIR/data/config.php"
fi

if ! which $PHPBIN 2>/dev/null; then
  PHPBIN=php
fi

# Installing git hook
$DIR/hooks/install.sh

$PHPBIN composer.phar install

$PHPBIN --server localhost:8000 --docroot "$DIR/web" "$DIR/web/index.php"
