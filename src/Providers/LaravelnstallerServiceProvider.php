<?php

namespace WeStacks\Laravel\Installer\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelnstallerServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->registerCommands();
        }
        $this->registerBindings();
    }

    private function publishConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/installer.php', 'installer');

        $this->publishes([
            __DIR__.'/../../config/installer.php' => $this->getConfigPath('installer.php'),
            __DIR__.'/../../public/install.php' => $this->getPublicPath('install.php'),
        ]);
    }

    private function getConfigPath($path = '')
    {
        if (function_exists('config_path')) {
            return config_path($path);
        }
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    private function getPublicPath($path = '')
    {
        if (function_exists('public_path')) {
            return public_path($path);
        }
        return app()->basePath() . '/public' . ($path ? '/' . $path : $path);
    }

    private function registerBindings()
    {
        //
    }

    private function registerCommands()
    {
        $this->commands([
            //
        ]);
    }
}
