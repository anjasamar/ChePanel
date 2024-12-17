<?php

use App\CheConfig;

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => CheConfig::get('MAILGUN_DOMAIN'),
        'secret' => CheConfig::get('MAILGUN_SECRET'),
        'endpoint' => CheConfig::get('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => CheConfig::get('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => CheConfig::get('AWS_ACCESS_KEY_ID'),
        'secret' => CheConfig::get('AWS_SECRET_ACCESS_KEY'),
        'region' => CheConfig::get('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
