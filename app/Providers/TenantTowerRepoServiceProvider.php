<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TenantTowerRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\TenantTower\TenantTowerInterface',
            'App\Repositories\TenantTower\TenantTowerRepository'
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
