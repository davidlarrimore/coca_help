#!/bin/bash

echo "RUNNING DEPLOY.SH"
echo ''
echo ''

source config/environment.cfg

export BOWERPHP_TOKEN=$bowerphp_token

git pull

composer install

vendor/beelab/bowerphp/bin/bowerphp install


echo ''
echo ''
echo "COMPLETED DEPLOY.SH"
