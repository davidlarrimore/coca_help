#!/bin/bash

. "$HOME/.bashrc"

export BOWERPHP_TOKEN="$1"

export PATH=/usr/local/php56/bin:$PATH

export PATH=/home/davlar33/.php/composer:$PATH

#git pull


composer self-update

composer update

composer install

vendor/beelab/bowerphp/bin/bowerphp install
