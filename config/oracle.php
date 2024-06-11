<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => 'PROD',
        'host'           => '192.9.150.5',
        'port'           => '1521',
        'database'       => 'prod',
        'service_name'   => 'orcl',
        'username'       => 'ptweb',
        'password'       => 'web2021',
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'load_balance'   => env('DB_LOAD_BALANCE', 'yes'),
        'max_name_len'   => env('ORA_MAX_NAME_LEN', 30),
        'dynamic'        => [],
    ],
];
