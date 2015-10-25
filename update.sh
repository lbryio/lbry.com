#!/bin/sh

git checkout master && git pull
sass --update web/scss:web/css --style compressed
