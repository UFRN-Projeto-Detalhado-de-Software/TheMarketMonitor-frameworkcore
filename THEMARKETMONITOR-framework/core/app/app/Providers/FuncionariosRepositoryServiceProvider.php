<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FuncionariosRepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'app\Repositories\Abstract\FuncionariosRepositoryInterface',
            'App\Repositories\FuncionariosRepository'
        );
    }

}
