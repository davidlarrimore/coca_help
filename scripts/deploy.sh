#!/bin/bash

export BOWERPHP_TOKEN="$1"

export PATH=/usr/local/php56/bin:$PATH

export PATH=$(pwd)/.php/composer:$PATH

#git pull


composer self-update

composer update

composer install

vendor/bin/bowerphp install

#FIN
