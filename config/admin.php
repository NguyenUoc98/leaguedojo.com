<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User operation log setting
    |--------------------------------------------------------------------------
    |
    | By setting this option to open or close operation log in laravel-admin.
    |
    */
    'operation_log' => [

        'enable' => false,

        /*
         * Only logging allowed methods in the list
         */
        'allowed_methods' => ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],

        /*
         * Routes that will not log to database.
         *
         * All method to path like: admin/logs
         * or specific method to path like: get:admin/logs.
         */
        'except' => [
            'admin/operation-logs*',
            'admin/logs*',
            'admin/bread*',
            'admin/menu*',
            'admin/database*',
            'admin/compass*',
            'admin/settings*',
            'broadcasting*',
            'admin/voyager-assets*',
        ],
    ],
];
