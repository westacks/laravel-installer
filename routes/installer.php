<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use WeStacks\Laravel\Installer\Controllers\InstallController;

if (config('installer.app_configured') === false) {
    Route::group(['prefix' => 'install', 'as' => 'install.'], function (Router $router) {
        $router->view('/', 'installer::start')->name('start');
        $router->get('/requirements', [InstallController::class, 'requirements'])->name('requirements');
        $router->get('/permissions', [InstallController::class, 'permissions'])->name('permissions');
        $router->get('/env', [InstallController::class, 'env'])->name('env');
        $router->get('/env/editor', [InstallController::class, 'env_editor'])->name('env.editor');
        $router->get('/env/wizard', [InstallController::class, 'env_wizard'])->name('env.wizard');
    });
}