<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MaintenanceRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Maintenance\MaintenanceInterface',
            'App\Repositories\Maintenance\MaintenanceRepository'
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
        View::composer('*','App\Http\View\Composers\MenuComposer');
    }
}
