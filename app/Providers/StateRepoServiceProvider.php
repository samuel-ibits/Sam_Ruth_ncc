<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StateRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\State\StateInterface',
            'App\Repositories\State\StateRepository'
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
