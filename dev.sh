#!/bin/bash

source dev-prepare.sh

php7.0 --server localhost:8000 --docroot web/ web/index.php
