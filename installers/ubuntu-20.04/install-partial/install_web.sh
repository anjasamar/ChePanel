#!/bin/bash

# Check dir exists
if [ ! -d "/usr/local/che/web" ]; then
  echo "ChePanel directory not found."
  return 1
fi

# Go to web directory
cd /usr/local/che/web

# Create MySQL user
MYSQL_CHE_ROOT_USERNAME="che"
MYSQL_CHE_ROOT_PASSWORD="$(tr -dc a-za-z0-9 </dev/urandom | head -c 32; echo)"

mysql -uroot -proot <<MYSQL_SCRIPT
  CREATE USER '$MYSQL_CHE_ROOT_USERNAME'@'%' IDENTIFIED BY '$MYSQL_CHE_ROOT_PASSWORD';
  GRANT ALL PRIVILEGES ON *.* TO '$MYSQL_CHE_ROOT_USERNAME'@'%' WITH GRANT OPTION;
  FLUSH PRIVILEGES;
MYSQL_SCRIPT


# Create database
CHE_PANEL_DB_PASSWORD="$(tr -dc a-za-z0-9 </dev/urandom | head -c 32; echo)"
CHE_PANEL_DB_NAME="che$(tr -dc a-za-z0-9 </dev/urandom | head -c 13; echo)"
CHE_PANEL_DB_USER="che$(tr -dc a-za-z0-9 </dev/urandom | head -c 13; echo)"

mysql -uroot -proot <<MYSQL_SCRIPT
  CREATE DATABASE $CHE_PANEL_DB_NAME;
  CREATE USER '$CHE_PANEL_DB_USER'@'localhost' IDENTIFIED BY '$CHE_PANEL_DB_PASSWORD';
  GRANT ALL PRIVILEGES ON $CHE_PANEL_DB_NAME.* TO '$CHE_PANEL_DB_USER'@'localhost';
  FLUSH PRIVILEGES;
MYSQL_SCRIPT

mysql_secure_installation --use-default

# Change mysql root password
MYSQL_ROOT_PASSWORD="$(tr -dc a-za-z0-9 </dev/urandom | head -c 32; echo)"
mysql -uroot -proot <<MYSQL_SCRIPT
  ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by '$MYSQL_ROOT_PASSWORD';
  FLUSH PRIVILEGES;
MYSQL_SCRIPT

# Save mysql root password
echo "$MYSQL_ROOT_PASSWORD" > /root/.mysql_root_password

# Configure the application
che-php artisan che:set-ini-settings APP_ENV "local"
che-php artisan che:set-ini-settings APP_URL "127.0.0.1:8443"
che-php artisan che:set-ini-settings APP_NAME "CHE_PANEL"
che-php artisan che:set-ini-settings DB_DATABASE "$CHE_PANEL_DB_NAME"
che-php artisan che:set-ini-settings DB_USERNAME "$CHE_PANEL_DB_USER"
che-php artisan che:set-ini-settings DB_PASSWORD "$CHE_PANEL_DB_PASSWORD"
che-php artisan che:set-ini-settings DB_CONNECTION "mysql"
che-php artisan che:set-ini-settings MYSQL_ROOT_USERNAME "$MYSQL_CHE_ROOT_USERNAME"
che-php artisan che:set-ini-settings MYSQL_ROOT_PASSWORD "$MYSQL_CHE_ROOT_PASSWORD"
che-php artisan che:key-generate

che-php artisan migrate
che-php artisan db:seed

che-php artisan che:set-ini-settings APP_ENV "production"

chmod -R o+w /usr/local/che/web/storage/
chmod -R o+w /usr/local/che/web/bootstrap/cache/

mkdir -p /usr/local/che/ssl
cp /usr/local/che/web/server/ssl/che.crt /usr/local/che/ssl/che.crt
cp /usr/local/che/web/server/ssl/che.key /usr/local/che/ssl/che.key

service che start

CURRENT_IP=$(hostname -I | awk '{print $1}')

echo "ChePanel downloaded successfully."
echo "Please visit http://$CURRENT_IP:8443 to continue installation of the panel."
