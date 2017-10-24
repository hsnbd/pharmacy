<?php

if ($this->app->environment() == 'local') {
    return [
        'default' => 'mysql',

        'connections' => [

            'mysql' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'php108',
                'username' => 'root',
                'password' => '',
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ],
        ],

        'migrations' => 'migrations',

        'redis' => [

            'client' => 'predis',

            'default' => [
                'host' => env('REDIS_HOST', '127.0.0.1'),
                'password' => env('REDIS_PASSWORD', null),
                'port' => env('REDIS_PORT', 6379),
                'database' => 0,
            ],

        ],

    ];
}

return [
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => parse_url(getenv("DATABASE_URL"))["host"],
            'database' => substr(parse_url(getenv("DATABASE_URL"))["path"], 1),
            'username' => parse_url(getenv("DATABASE_URL"))["user"],
            'password' => parse_url(getenv("DATABASE_URL"))["pass"],
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
            'sslmode' => 'prefer',
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'client' => 'predis',
        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];
