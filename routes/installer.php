<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use WeStacks\Laravel\Installer\Controllers\InstallController;

if (config('installer.app_configured') === false) {
    Route::group(['prefix' => 'install', 'name' => 'install'], function (Router $router) {
        $router->view('/', 'installer::start')->name('start');
        $router->get('/requirements', [InstallController::class, 'requirements'])->name('requirements');
    });
}