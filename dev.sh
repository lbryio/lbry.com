#!/bin/bash

if [ ! -e "data/config.php" ]; then
  cp "data/config.php.example" "data/config.php"
fi

php7.0 --server localhost:8000 --docroot web/ web/index.php
