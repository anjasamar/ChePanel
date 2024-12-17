#!/bin/bash

che-php /usr/local/che/web/artisan che:letsencrypt-http-authenticator-hook --certbot-domain $CERTBOT_DOMAIN --certbot-token $CERTBOT_TOKEN --certbot-validation $CERTBOT_VALIDATION
