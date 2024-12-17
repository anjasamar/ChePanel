rm -rf /usr/local/che/update/web-panel-latest
rm -rf /usr/local/che/update/che-web-panel.zip

wget https://github.com/anjasamar/ChePanelWebCompiledVersions/raw/main/che-web-panel.zip
ls -la
unzip -o che-web-panel.zip -d /usr/local/che/update/web-panel-latest

rm -rf /usr/local/che/web/vendor
rm -rf /usr/local/che/web/composer.lock
rm -rf /usr/local/che/web/routes
rm -rf /usr/local/che/web/public
rm -rf /usr/local/che/web/resources
rm -rf /usr/local/che/web/database
rm -rf /usr/local/che/web/config
rm -rf /usr/local/che/web/app
rm -rf /usr/local/che/web/bootstrap
rm -rf /usr/local/che/web/lang
rm -rf /usr/local/che/web/Modules
rm -rf /usr/local/che/web/thirdparty

cp -r /usr/local/che/update/web-panel-latest/vendor /usr/local/che/web/vendor
cp /usr/local/che/update/web-panel-latest/composer.lock /usr/local/che/web/composer.lock
cp -r /usr/local/che/update/web-panel-latest/routes /usr/local/che/web/routes
cp -r /usr/local/che/update/web-panel-latest/public /usr/local/che/web/public
cp -r /usr/local/che/update/web-panel-latest/resources /usr/local/che/web/resources
cp -r /usr/local/che/update/web-panel-latest/database /usr/local/che/web/database
cp -r /usr/local/che/update/web-panel-latest/config /usr/local/che/web/config
cp -r /usr/local/che/update/web-panel-latest/app /usr/local/che/web/app
cp -r /usr/local/che/update/web-panel-latest/bootstrap /usr/local/che/web/bootstrap
cp -r /usr/local/che/update/web-panel-latest/lang /usr/local/che/web/lang
cp -r /usr/local/che/update/web-panel-latest/Modules /usr/local/che/web/Modules
#cp -r /usr/local/che/update/web-panel-latest/thirdparty /usr/local/che/web/thirdparty

cp -r /usr/local/che/update/web-panel-latest/db-migrate.sh /usr/local/che/web/db-migrate.sh
chmod +x /usr/local/che/web/db-migrate.sh
#
cd /usr/local/che/web
#
#
#
#CHE_PHP=/usr/local/che/php/bin/php
##
#$CHE_PHP -v
#$CHE_PHP -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#$CHE_PHP ./composer-setup.php
#$CHE_PHP -r "unlink('composer-setup.php');"

#rm -rf composer.lock
#COMPOSER_ALLOW_SUPERUSER=1 $CHE_PHP composer.phar i --no-interaction --no-progress
#COMPOSER_ALLOW_SUPERUSER=1 $CHE_PHP composer.phar dump-autoload --no-interaction

./db-migrate.sh

service che restart
