<?php

namespace Jaacu\LaravelModelHashids;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

use Vinkla\Hashids\HashidsServiceProvider;  

class LaravelModelHashidsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-model-hashids');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-model-hashids');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app->register(HashidsServiceProvider::class);

        Blueprint::macro('hashid', function(){
            return $this->string('hash_id')->unique()->nullable()->index();
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('hashids.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-model-hashids'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-model-hashids'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-model-hashids'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'hashids');
        
        // $this->app['config']->set('hashids', require __DIR__.'/../config/config.php'); 
        
        // Register the main class to use with the facade
        $this->app->singleton('laravel-model-hashids', function () {
            return new LaravelModelHashids;
        });
    }
}
