#!/usr/bin/env bash

bin/console cache:clear
bin/console doctrine:database:drop --force
bin/console doctrine:database:create
bin/console doctrine:schema:update --force
bin/console doctrine:fixtures:load -n
bin/console assets:install --symlink
