<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'install', 'name' => 'install'], function ($router) {
    Route::view('/', 'vendor.installer.start')->name('start');
});