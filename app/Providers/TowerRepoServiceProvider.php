<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TowerRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\Tower\TowerInterface',
            'App\Repositories\Tower\TowerRepository'
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
