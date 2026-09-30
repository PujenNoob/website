<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the bcrypt algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => env('HASH_DRIVER', 'bcrypt'),

    /*
    |--------------------------------------------------------------------------
    | Bcrypt Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options for the bcrypt algorithm.
    | This includes the work factor (cost), which determines how much time
    | it takes to compute the hash. Ensure rounds is bounded between 4 and 31.
    |
    */

    'bcrypt' => [
        'rounds' => max(4, min(31, (int) env('BCRYPT_ROUNDS', 12) ?: 12)),
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options for the Argon2 algorithm.
    | These options control the memory, threads, and time cost used when
    | hashing passwords with Argon2.
    |
    */

    'argon' => [
        'memory' => env('ARGON_MEMORY', 65536),
        'threads' => env('ARGON_THREADS', 1),
        'time' => env('ARGON_TIME', 4),
        'verify' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rehash Passwords
    |--------------------------------------------------------------------------
    |
    | When enabled, Laravel will automatically rehash passwords on login if
    | the algorithm configuration has changed since the hash was generated.
    |
    */

    'rehash_on_login' => true,

];
