#!/bin/sh

cd "$(dirname "$0")"
git checkout master && git pull
sass --update web/scss:web/css --style compressed
