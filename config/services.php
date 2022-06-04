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
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses'    => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id'     => '264409137001-8bh5nbjmujv2j0igf039if78ce8loqh7.apps.googleusercontent.com',
        'client_secret' => 'raLznI08qmWL2hhxajhNUwmv',
        'redirect'      => 'http://giaoan247.net/account/google/callback',
    ],
    'facebook' => [
        'client_id'     => '211916683854484',
        'client_secret' => '9b3edf8cd4cfa8d7d351b9c3e1208297',
        'redirect'      => 'https://giaoan247.net/account/facebook/callback',
    ],

];
