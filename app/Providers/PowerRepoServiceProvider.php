<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PowerRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Power\PowerInterface',
            'App\Repositories\Power\PowerRepository'
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
