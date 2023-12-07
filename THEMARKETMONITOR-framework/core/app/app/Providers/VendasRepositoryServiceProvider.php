<?php
namespace app\Providers;

use App\Repositories\VendasLojaRepository;
use app\Repositories\VendasRepositoryInterface;
use App\Services\VendaServiceStrategy;
use App\Services\VendaServiceLoja;
use Illuminate\Support\ServiceProvider;

class VendasRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(VendasRepositoryInterface::class, VendasLojaRepository::class);
        $this->app->bind(VendaServiceStrategy::class, VendaServiceLoja::class);
    }

}
