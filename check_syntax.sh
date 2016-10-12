#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

for FILE in $(find "$DIR" -name '*.php'); do
  php7.0 -l $FILE
done
