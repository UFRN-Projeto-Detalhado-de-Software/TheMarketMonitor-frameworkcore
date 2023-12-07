<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CargosServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'app\Repositories\Abstract\CargosRepositoryInterface',
            'App\Repositories\CargosRepository'
        );
    }
}
