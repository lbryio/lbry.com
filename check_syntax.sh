#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ERRORS=0

for FILE in $(find "$DIR" -name '*.php'); do
  CHECK=$(php -l $FILE | grep -v "^No syntax errors detected")
  if [ -n "$CHECK" ]; then
    echo "$CHECK"
    ERRORS=1
  fi
done

if [ $ERRORS -eq 0 ]; then
  echo "Syntax OK"
fi

exit $ERRORS
