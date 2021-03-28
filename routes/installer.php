<?php

use Illuminate\Support\Facades\Route;

if (config('installer.app_configured') === false) {
    Route::group(['prefix' => 'install', 'name' => 'install'], function ($router) {
        Route::view('/', 'installer::start')->name('start');
    });
}