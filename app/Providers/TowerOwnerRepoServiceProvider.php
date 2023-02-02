<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TowerOwnerRepoServiceProvider extends ServiceProvider
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
            'App\Repositories\TowerOwner\TowerOwnerInterface',
            'App\Repositories\TowerOwner\TowerOwnerRepository'
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
