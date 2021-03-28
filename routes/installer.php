<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use WeStacks\Laravel\Installer\Controllers\InstallController;

if (config('installer.app_configured') === false) {
    Route::group(['prefix' => 'install', 'as' => 'install.'], function (Router $router) {
        $router->view('/', 'installer::start')->name('start');
        $router->get('/requirements', [InstallController::class, 'requirements'])->name('requirements');
        $router->get('/permissions', [InstallController::class, 'permissions'])->name('permissions');
    });
}