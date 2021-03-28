<?php

namespace WeStacks\Laravel\Installer\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelnstallerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/installer.php');
        $this->loadViewsFrom(__DIR__.'/../../views', 'installer');
        $this->publishes([
            __DIR__.'/../../config/installer.php' => $this->getConfigPath('installer.php'),
            __DIR__.'/../../public/install.php' => $this->getPublicPath('install.php'),
            __DIR__.'/../../views' => $this->getBasePath('resources/views/vendor/installer'),
        ], 'installer');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/installer.php', 'installer');
    }


    // Utility methods

    private function getConfigPath($path = '')
    {
        if (function_exists('config_path')) {
            return config_path($path);
        }
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    private function getBasePath($path = '')
    {
        if (function_exists('base_path')) {
            return base_path($path);
        }
        return app()->basePath() . ($path ? '/' . $path : $path);
    }

    private function getPublicPath($path = '')
    {
        if (function_exists('public_path')) {
            return public_path($path);
        }
        return app()->basePath() . '/public' . ($path ? '/' . $path : $path);
    }
}
