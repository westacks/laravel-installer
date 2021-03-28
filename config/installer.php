<?php

return [
    /*-----------------------------------------------------------------------------
    | App Version
    |------------------------------------------------------------------------------
    |
    | Determines currently installed app version.
    | This parameter is self-updating after successfull update, but you may
    | manage it by yourself.
    |
    | Semantic Versioning specification: https://semver.org/
    |
    */
    "app_version" => env('APP_VERSION', '0.0.0'),

    /*-----------------------------------------------------------------------------
    | App Configured
    |------------------------------------------------------------------------------
    |
    | Determines is app is configured. If "true", unloads graphical installer from
    | available routes. This parameter is automatically sets "true" after
    | successfull app installation.
    |
    | WARNING! Changing it back to "false" during production will cause breaking
    | permission issues and expose private env variables. Do it only if you know
    | what you are doing or be sure that you are running you application under
    | maintainance mode: https://laravel.com/docs/configuration#maintenance-mode
    |
    */
    "app_configured" => env('APP_CONFIGURED', false),

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel server requirements, you can add as many
    | as your application require, we check if the extension is enabled
    | by looping through the array and run "extension_loaded" on it.
    |
    */
    'requirements' => [
        'php_version' => '7.2.0',
        'php' => [
            'openssl',
            'pdo',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
        ],
        'apache' => [
            'mod_rewrite',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/framework/'     => '775',
        'storage/logs/'          => '775',
        'bootstrap/cache/'       => '775',
    ],

    /*-----------------------------------------------------------------------------
    | Environment specific worker tasks
    |------------------------------------------------------------------------------
    |
    | Here you may specify worker tasks for each environment of your application.
    | When you run "installer" artissan commands, package will use registered
    | worker depending on your 'app.env' (APP_ENV) config variable.
    |
    | Each environment installer should implement
    | "WeStacks\Laravel\Installer\Interfaces\InstallerInterface" interface.
    |
    */
    "environments" => [
        // "local"      => App\Installer\LocalInstaller::class,
        // "production" => App\Installer\ProductionInstaller::class,
    ],

    /*-----------------------------------------------------------------------------
    | Log config
    |------------------------------------------------------------------------------
    |
    | Log channel which will be used to log any update related info.
    | By default it uses default Laravel logger, but you may specify any custom
    | if it necessary.
    |
    */
    "log" => env('LOG_CHANNEL', 'stack'),

    /*-----------------------------------------------------------------------------
    | Update source config
    |------------------------------------------------------------------------------
    |
    | Config to obtain latest app releases. 
    | 
    | If you are using private repository, be sure you are not exposing any
    | private tokens - your clients should obtain their own.
    | 
    | Supported source types: "github", "bitbucket", "gitlab", "http"
    |
    */
    "source" => [
        // Source repository type
        "type"      => "github",

        /*
        | Repository credentials.
        | "vendor" and "project" variables are used for "github", "bitbucket", "gitlab" types.
        | "url" variable is used for "http" type.
        | "token" variable required for private repositories (obrainable by your source provider).
        */
        "url"       => "https://yourappsources.com",
        "vendor"    => "example_vendor",
        "project"   => "example_project",
        "token"     => env('INSTALLER_SOURCE_TOKEN', null),

        // This folders will be ignored during update
        'exclude'   => [
            '__MACOSX',
            'node_modules',
            'bootstrap/cache',
            'bower',
            'storage/app',
            'storage/framework',
            'storage/logs',
            'storage/self-update',
            'vendor',
        ],
    ],

    /*-----------------------------------------------------------------------------
    | Important App Variables
    |------------------------------------------------------------------------------
    |
    | This is array of .env variables and their description which installer will
    | propose to configure during app installation proccess.
    |
    | If possible, views will try to localize your descriptions using current app locale.
    |
    */
    "should_config" => [
        "APP_NAME"      => 'Your application name',
        "APP_URL"       => 'Your application base URL (http://example.com)',
        "DB_CONNECTION" => 'Database connection type (mysql, sqlite, pgsql, sqlsrv etc.)',
        "DATABASE_URL"  => 'Database URL (driver://username:password@host:port/database?options)',
        // ...
    ]
];