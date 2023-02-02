<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PowerTypeRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\PowerType\PowerTypeInterface',
            'App\Repositories\PowerType\PowerTypeRepository'
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
