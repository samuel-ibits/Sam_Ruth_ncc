<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ReportRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Report\ReportInterface',
            'App\Repositories\Report\ReportRepository'
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
