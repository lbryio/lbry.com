#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -e "data/config.php" ]; then
  cp "$DIR/data/config.php.example" "$DIR/data/config.php"
fi

php7.0 --server localhost:8000 --docroot "$DIR/web" "$DIR/web/index.php"
