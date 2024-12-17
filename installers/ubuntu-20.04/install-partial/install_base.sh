#!/bin/bash

INSTALL_DIR="/che/install"

apt-get update && apt-get install ca-certificates

mkdir -p $INSTALL_DIR

cd $INSTALL_DIR

DEPENDENCIES_LIST=(
    "openssl"
    "jq"
    "curl"
    "wget"
    "unzip"
    "zip"
    "tar"
    "mysql-common"
    "mysql-server"
    "mysql-client"
    "lsb-release"
    "gnupg2"
    "ca-certificates"
    "apt-transport-https"
    "software-properties-common"
    "supervisor"
    "libonig-dev"
    "libzip-dev"
    "libcurl4-openssl-dev"
    "libsodium23"
    "libpq5"
    "apache2"
    "libapache2-mod-ruid2"
    "libapache2-mod-php"
    "libssl-dev"
    "zlib1g-dev"
)
# Check if the dependencies are installed
for DEPENDENCY in "${DEPENDENCIES_LIST[@]}"; do
    apt install -yq $DEPENDENCY
done

# Start MySQL
service mysql start

wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/installers/ubuntu-20.04/greeting.sh
mv greeting.sh /etc/profile.d/che-greeting.sh

# Install CHE PHP
wget https://github.com/anjasamar/ChePanelPHP/raw/main/compilators/debian/php/dist/che-php-8.2.0-ubuntu-20.04.deb
dpkg -i che-php-8.2.0-ubuntu-20.04.deb

# Install CHE NGINX
wget https://github.com/anjasamar/ChePanelNGINX/raw/main/compilators/debian/nginx/dist/che-nginx-1.24.0-ubuntu-20.04.deb
dpkg -i che-nginx-1.24.0-ubuntu-20.04.deb

CHE_PHP=/usr/local/che/php/bin/php

ln -s $CHE_PHP /usr/bin/che-php
