<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AntennaRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Antenna\AntennaInterface',
            'App\Repositories\Antenna\AntennaRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
