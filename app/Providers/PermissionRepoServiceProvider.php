<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Permission\PermissionInterface',
            'App\Repositories\Permission\PermissionRepository'
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
