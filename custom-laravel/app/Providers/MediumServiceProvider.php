<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JonathanTorres\MediumSdk\Medium;

class MediumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('router')->get('medium', function () {
            return 'medium home';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('medium-php-sdk', function () {
            return new Medium(config('medium'));
        });
    }
}
