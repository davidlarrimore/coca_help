#!/bin/bash

. "$HOME/.bashrc"

export BOWERPHP_TOKEN="8930c19b9cbf4d5182d7f04ed5be787cdc010f5c"

export PATH=/usr/local/php56/bin:$PATH

export PATH=/home/davlar33/.php/composer:$PATH

#git pull


composer self-update

composer update

composer install

vendor/beelab/bowerphp/bin/bowerphp install
