#!/bin/bash

# Define the path to the www folder
WWW_FOLDER=".www"
cd  .www

# Install Composer
EXPECTED_CHECKSUM="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]; then
    >&2 echo 'ERROR: Invalid Composer installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet
RESULT=$?
rm composer-setup.php

if [ $RESULT -ne 0 ]; then
    >&2 echo 'ERROR: Composer installation failed'
    exit 1
fi

# Install PHP Mailer
composer require phpmailer/phpmailer

# Print success message
echo "Composer and PHP Mailer have been installed in the www folder."
