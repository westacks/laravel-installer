<?php

namespace WeStacks\Laravel\Installer\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use WeStacks\Laravel\Installer\Middleware\InstallMiddleware;

class LaravelnstallerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/installer.php');
        $this->loadViewsFrom(__DIR__.'/../../views', 'installer');

        $this->publishFiles();
        $this->configureMiddleware();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/installer.php', 'installer');
    }


    protected function publishFiles(string $tag = 'installer')
    {
        $this->publishes([
            __DIR__.'/../../config/installer.php' => $this->getConfigPath('installer.php'),
        ], "$tag.config");

        $this->publishes([
            __DIR__.'/../../public/install.php' => $this->getPublicPath('install.php'),
        ], "$tag.public");

        $this->publishes([
            __DIR__.'/../../views' => $this->getBasePath('resources/views/vendor/installer'),
        ], "$tag.views");
    }

    protected function configureMiddleware()
    {
        if (config('installer.app_configured', false)) return;
        $this->app->make(Kernel::class)->pushMiddleware(InstallMiddleware::class);
    }


    // Utility methods

    private function getConfigPath($path = '')
    {
        if (function_exists('config_path')) {
            return config_path($path);
        }
        return $this->app->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    private function getBasePath($path = '')
    {
        if (function_exists('base_path')) {
            return base_path($path);
        }
        return $this->app->basePath() . ($path ? '/' . $path : $path);
    }

    private function getPublicPath($path = '')
    {
        if (function_exists('public_path')) {
            return public_path($path);
        }
        return $this->app->basePath() . '/public' . ($path ? '/' . $path : $path);
    }
}
