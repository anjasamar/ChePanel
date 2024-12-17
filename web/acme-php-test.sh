CHE_PHP=/usr/local/che/php/bin/php

$CHE_PHP -r "copy('https://github.com/acmephp/acmephp/releases/download/1.0.1/acmephp.phar', 'acmephp.phar');"
$CHE_PHP -r "copy('https://github.com/acmephp/acmephp/releases/download/1.0.1/acmephp.phar.pubkey', 'acmephp.phar.pubkey');"
$CHE_PHP acmephp.phar --version
