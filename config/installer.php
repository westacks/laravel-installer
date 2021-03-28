<?php

use Illuminate\Support\Facades\Log;

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
    | Log channel which will be used to log any update related info.
    | By default it uses default Laravel logger, but you may specify any custom
    | if it necessary.
    | 
    | If you are using private repository be sure you are not exposing any
    | private tokens.
    | 
    | Avaliative source types:
    | - github
    | - bitbucket
    | - gitlab
    | - http
    |
    */
    "source" => [
        "type"      => "github",
        "vendor"    => "example_vendor",
        "project"   => "example_project",
        "token"     => env('INSTALLER_SOURCE_TOKEN', null)
    ]
];