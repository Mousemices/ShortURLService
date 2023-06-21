<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom URL prefix
    |--------------------------------------------------------------------------
    |
    | This is the prefix that add to the route that we generate for
    | short URL.
    |
    */

    'prefix' => '/s',

    /*
    |--------------------------------------------------------------------------
    | Key Salt
    |--------------------------------------------------------------------------
    |
    | Define the salt that will be used to create unique short URL code.
    |
    */

    'key_salt' => 'Mousemices/ShortURLService',

    /*
    |--------------------------------------------------------------------------
    | Short code length
    |--------------------------------------------------------------------------
    |
    | Define the character length of the shortened URL.
    |
    */

    'key_length' => 6,

    /*
    |--------------------------------------------------------------------------
    | Characters
    |--------------------------------------------------------------------------
    |
    | String of characters that define allowed output for short URL.
    |
    */

    'characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
];
