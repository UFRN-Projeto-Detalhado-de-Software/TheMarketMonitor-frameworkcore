<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PeriodoTipoRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'app\Repositories\PeriodoTipoRepositoryInterface',
            'App\Repositories\PeriodoTipoRepository'
        );
    }

}
