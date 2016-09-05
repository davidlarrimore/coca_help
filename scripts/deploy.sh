#!/bin/bash

. "$HOME/.bashrc"

SSHUsername="$1"
BowerPHPToken="$2"


export BOWERPHP_TOKEN=$BowerPHPToken

export PATH=/usr/local/php56/bin:$PATH

export PATH=/home/$SSHUsername/.php/composer:$PATH

#git pull


composer self-update

composer update

composer install

vendor/beelab/bowerphp/bin/bowerphp install
