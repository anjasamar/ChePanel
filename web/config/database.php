<?php

use Illuminate\Support\Str;
use App\CheConfig;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => CheConfig::get('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        //        'sqlite' => [
        //            'driver' => 'sqlite',
        //            'url' => CheConfig::get('DATABASE_URL'),
        //            'database' => CheConfig::get('DB_DATABASE', database_path('database.sqlite')),
        //            'prefix' => '',
        //            'foreign_key_constraints' => CheConfig::get('DB_FOREIGN_KEYS', true),
        //        ],

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => '',
            'database' => database_path('database.sqlite'),
            'prefix' => '',
            'foreign_key_constraints' => false,
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => CheConfig::get('DATABASE_URL'),
            'host' => CheConfig::get('DB_HOST', '127.0.0.1'),
            'port' => CheConfig::get('DB_PORT', '3306'),
            'database' => CheConfig::get('DB_DATABASE', 'forge'),
            'username' => CheConfig::get('DB_USERNAME', 'forge'),
            'password' => CheConfig::get('DB_PASSWORD', ''),
            'unix_socket' => CheConfig::get('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => CheConfig::get('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => CheConfig::get('DATABASE_URL'),
            'host' => CheConfig::get('DB_HOST', '127.0.0.1'),
            'port' => CheConfig::get('DB_PORT', '5432'),
            'database' => CheConfig::get('DB_DATABASE', 'forge'),
            'username' => CheConfig::get('DB_USERNAME', 'forge'),
            'password' => CheConfig::get('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => CheConfig::get('DATABASE_URL'),
            'host' => CheConfig::get('DB_HOST', 'localhost'),
            'port' => CheConfig::get('DB_PORT', '1433'),
            'database' => CheConfig::get('DB_DATABASE', 'forge'),
            'username' => CheConfig::get('DB_USERNAME', 'forge'),
            'password' => CheConfig::get('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => CheConfig::get('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => CheConfig::get('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => CheConfig::get('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => CheConfig::get('REDIS_CLUSTER', 'redis'),
            'prefix' => CheConfig::get('REDIS_PREFIX', Str::slug(CheConfig::get('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => CheConfig::get('REDIS_URL'),
            'host' => CheConfig::get('REDIS_HOST', '127.0.0.1'),
            'username' => CheConfig::get('REDIS_USERNAME'),
            'password' => CheConfig::get('REDIS_PASSWORD'),
            'port' => CheConfig::get('REDIS_PORT', '6379'),
            'database' => CheConfig::get('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => CheConfig::get('REDIS_URL'),
            'host' => CheConfig::get('REDIS_HOST', '127.0.0.1'),
            'username' => CheConfig::get('REDIS_USERNAME'),
            'password' => CheConfig::get('REDIS_PASSWORD'),
            'port' => CheConfig::get('REDIS_PORT', '6379'),
            'database' => CheConfig::get('REDIS_CACHE_DB', '1'),
        ],

    ],

];
