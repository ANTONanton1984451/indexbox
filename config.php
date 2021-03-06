<?php

return [

    'database' => [

        'driver' => 'mysql',

        'host' => 'localhost',

        'db_name' => 'indexbox',

        'password' => 'root',

        'user' => 'root'

    ],

    'templates' => [

        'base_path' => __DIR__.'/resources/views/'

    ],

    'api_response' => [

        'json' => \App\Http\Responses\JsonFormatter::class
    ]

];