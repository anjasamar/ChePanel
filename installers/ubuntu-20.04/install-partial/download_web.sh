#!/bin/bash

wget https://github.com/anjasamar/ChePanelWebCompiledVersions/raw/main/che-web-panel.zip
unzip -qq -o che-web-panel.zip -d /usr/local/che/web
rm -rf che-web-panel.zip

chmod 711 /home
chmod -R 750 /usr/local/che
