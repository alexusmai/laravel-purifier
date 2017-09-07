<?php

namespace Alexusmai\LaravelPurifier;

use Illuminate\Support\ServiceProvider;

class LaravelPurifierServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('purifier', function ($app) {
            return new Purifier($app);
        });

        $this->app->alias('purifier', Purifier::class);
    }

    /**
     * Publish config
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/purifier.php' => config_path('purifier.php'),
        ]);
    }
}