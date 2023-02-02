<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TenantRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Tenant\TenantInterface',
            'App\Repositories\Tenant\TenantRepository'
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
