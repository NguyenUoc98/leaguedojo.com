<?php

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
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID',"52867832915-tpinfs9uf2to9msmbc8j4c9409k7j4do.apps.googleusercontent.com"),
        'client_secret' => env('GOOGLE_CLIENT_SECRET',"QhKub3WPANEkmZNvsts5tmBb"),
        'redirect'      => env('GOOGLE_REDIRECT'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID',"470070003944545"),
        'client_secret' => env('FACEBOOK_APP_SECRET',"3722e16534d4b1549446b76a719652e7"),
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],
];
