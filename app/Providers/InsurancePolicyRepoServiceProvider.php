<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InsurancePolicyRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\InsurancePolicy\InsurancePolicyInterface',
            'App\Repositories\InsurancePolicy\InsurancePolicyRepository'
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
