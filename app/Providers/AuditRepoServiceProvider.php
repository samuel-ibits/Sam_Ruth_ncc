<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuditRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Audit\AuditInterface',
            'App\Repositories\Audit\AuditRepository'
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
