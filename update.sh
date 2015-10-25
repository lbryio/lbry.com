#!/bin/sh

cd "$(dirname "$0")"
rm web/css/*
git checkout master && git pull
sass --update web/scss:web/css --style compressed -E "UTF-8"
