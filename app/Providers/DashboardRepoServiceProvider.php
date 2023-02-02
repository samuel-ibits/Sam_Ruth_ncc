<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Dashboard\DashboardInterface',
            'App\Repositories\Dashboard\DashboardRepository'
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
