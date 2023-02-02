<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InsuranceRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Insurance\InsuranceInterface',
            'App\Repositories\Insurance\InsuranceRepository'
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
