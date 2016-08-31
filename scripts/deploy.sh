#!/bin/bash

source config/environment.cfg

export BOWERPHP_TOKEN=$bowerphp_token

ls -l

git pull

composer install

vendor/beelab/bowerphp/bin/bowerphp install
