<?php

namespace kallbuloso\LaravelPackagerCommands;

use Illuminate\Support\ServiceProvider;

class LaravelPackagerCommandsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'kallbuloso');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'kallbuloso');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelpackagercommands.php', 'laravelpackagercommands');

        // Register the service the package provides.
        $this->app->singleton('laravelpackagercommands', function ($app) {
            return new LaravelPackagerCommands;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelpackagercommands'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelpackagercommands.php' => config_path('laravelpackagercommands.php'),
        ], 'laravelpackagercommands.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/kallbuloso'),
        ], 'laravelpackagercommands.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/kallbuloso'),
        ], 'laravelpackagercommands.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/kallbuloso'),
        ], 'laravelpackagercommands.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
