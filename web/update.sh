CHE_PHP=/usr/local/che/php/bin/php

rm -rf /usr/local/che/update/web
mkdir -p /usr/local/che/update/web

rm -rf /usr/local/che/update/che-web-panel.zip
wget https://github.com/anjasamar/ChePanelWebCompiledVersions/raw/refs/heads/main/che-web-panel.zip -O /usr/local/che/update/che-web-panel.zip

unzip /usr/local/che/update/che-web-panel.zip -d /usr/local/che/update/web

rm -rf /usr/local/che/web/app
rm -rf /usr/local/che/web/Modules
rm -rf /usr/local/che/web/bootstrap
rm -rf /usr/local/che/web/config
rm -rf /usr/local/che/web/database
rm -rf /usr/local/che/web/public
rm -rf /usr/local/che/web/resources
rm -rf /usr/local/che/web/routes
rm -rf /usr/local/che/web/tests
rm -rf /usr/local/che/web/vendor
rm -rf /usr/local/che/web/composer.json
rm -rf /usr/local/che/web/composer.lock
rm -rf /usr/local/che/web/package.json

cp -r /usr/local/che/update/web/app /usr/local/che/web/app
cp -r /usr/local/che/update/web/Modules /usr/local/che/web/Modules
cp -r /usr/local/che/update/web/bootstrap /usr/local/che/web/bootstrap
cp -r /usr/local/che/update/web/config /usr/local/che/web/config
cp -r /usr/local/che/update/web/database /usr/local/che/web/database
cp -r /usr/local/che/update/web/public /usr/local/che/web/public
cp -r /usr/local/che/update/web/resources /usr/local/che/web/resources
cp -r /usr/local/che/update/web/routes /usr/local/che/web/routes
cp -r /usr/local/che/update/web/tests /usr/local/che/web/tests
cp -r /usr/local/che/update/web/vendor /usr/local/che/web/vendor
cp /usr/local/che/update/web/composer.json /usr/local/che/web/composer.json
cp /usr/local/che/update/web/composer.lock /usr/local/che/web/composer.lock
cp /usr/local/che/update/web/package.json /usr/local/che/web/package.json



systemctl stop che
apt remove che-nginx -y

OS=$(lsb_release -si)
OS_LOWER=$(echo $OS | tr '[:upper:]' '[:lower:]')
OS_VERSION=$(lsb_release -sr)

rm -rf /usr/local/che/update/nginx
mkdir -p /usr/local/che/update/nginx
wget https://github.com/anjasamar/ChePanelNGINX/raw/main/compilators/debian/nginx/dist/che-nginx-1.24.0-$OS_LOWER-$OS_VERSION.deb -O /usr/local/che/update/nginx/che-nginx-1.24.0-$OS_LOWER-$OS_VERSION.deb
dpkg -i /usr/local/che/update/nginx/che-nginx-1.24.0-$OS_LOWER-$OS_VERSION.deb

#
printf "Updating the panel...\n"
wget https://raw.githubusercontent.com/anjasamar/ChePanelNGINX/main/compilators/debian/nginx/nginx.conf -O /usr/local/che/nginx/conf/nginx.conf
#
mkdir -p /usr/local/che/ssl
cp /usr/local/che/web/server/ssl/che.crt /usr/local/che/ssl/che.crt
cp /usr/local/che/web/server/ssl/che.key /usr/local/che/ssl/che.key

systemctl restart che
#systemctl status che

printf "Updating the database...\n"
$CHE_PHP /usr/local/che/web/artisan migrate
#$CHE_PHP artisan l5-swagger:generate
