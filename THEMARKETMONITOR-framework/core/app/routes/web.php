<?php

use App\Http\Controllers\AnaliseProdutoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FaturamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HistoricoFuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeioPagamentoController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\OrigemVendaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PeriodoTipoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\TipoVendaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaControllerLoja;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Suas rotas protegidas vão aqui
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/ranking', [RankingController::class, 'show'])->name('ranking');
    Route::get('/faturamento',[FaturamentoController::class, 'get_faturamento'])->name('calcularfaturamento');
});


//Route::get('home', [HomeController::class, 'index'])->name('home');





// Rotas Funcionario

Route::name('funcionario.')->group(function (){
    Route::prefix('/funcionario')->group(function (){
        //Get
        Route::get('/create', [FuncionarioController::class, 'create'])->name('create');
        Route::get('/', [FuncionarioController::class, 'home'])->name('home');
        Route::get('/edit/{id}', [FuncionarioController::class, 'edit'])->name('edit');
        Route::get('/verMetas/{id}', [FuncionarioController::class, 'verMetas'])->name('verMetas');
        //Post
        Route::post('/store', [FuncionarioController::class, 'store'])->name('store');
        //Put
        Route::put('/edited/{id}', [FuncionarioController::class, 'edited'])->name('edited');
        //Delete
        Route::delete('/deleted/{id}', [FuncionarioController::class, 'deleted'])->name('destroy');
    });
});


// Rotas Vendas
//Route::resource('/venda/vendas', VendasController::class);

// Rotas Origens de Venda
Route::resource('/origensvendas/origemvenda', OrigemVendaController::class);

// Rotas Tipos de Venda
Route::resource('/tipovenda', TipoVendaController::class);



// Rotas de Periodo (incluso tipo)
Route::name('periodo.')->group(function (){
    Route::prefix('/periodo')->group(function (){
        // Get
        Route::get('/', [PeriodoController::class, 'home'])->name('home');
        Route::get('/novo', [PeriodoController::class, 'create'])->name('create');
        Route::get('/editar/{id}', [PeriodoController::class, 'formEdit'])->name('formEdit');

        // Post
        Route::post('/store', [PeriodoController::class, 'store'])->name('store');

        // Put
        Route::put('/edit/{id}', [PeriodoController::class, 'edit'])->name('edit');

        // Delete
        Route::delete('/destroy/{id}', [PeriodoController::class, 'destroy'])->name('destroy');

        // Rotas de periodoTipo
        Route::name('tipo.')->group(function (){
            Route::prefix('/tipo')->group(function (){
                // Get
                Route::get('/', [PeriodoTipoController::class, 'home'])->name('home');
                Route::get('/novo', [PeriodoTipoController::class, 'create'])->name('create');
                Route::get('/editar/{id}', [PeriodoTipoController::class, 'formEdit'])->name('formEdit');

                // Post
                Route::post('/store', [PeriodoTipoController::class, 'store'])->name('store');

                // Put
                Route::put('/edit/{id}', [PeriodoTipoController::class, 'edit'])->name('edit');

                // Delete
                Route::delete('/destroy/{id}', [PeriodoTipoController::class, 'destroy'])->name('destroy');

            });
        });
    });
});

// Aliasing do controller de meta usado:
use App\Http\Controllers\MetaControllerLoja  as myMetaController;

// Rotas de Meta
Route::name('meta.')->group(function (){
    Route::prefix('/meta')->group(function (){
        // Get
        Route::get('/', [myMetaController::class, 'home'])->name('home');
        Route::get('/novo', [myMetaController::class, 'create'])->name('create');
        Route::get('/editar/{id}', [myMetaController::class, 'formEdit'])->name('formEdit');

        // Post
        Route::post('/store', [myMetaController::class, 'store'])->name('store');

        // Put
        Route::put('/edit/{id}', [myMetaController::class, 'edit'])->name('edit');

        // Delete
        Route::delete('/destroy/{id}', [myMetaController::class, 'destroy'])->name('destroy');
    });
});

// Rotas Meio de Pagamento
Route::resource('/meiopagamento', MeioPagamentoController::class);

//Rotas Produto
Route::resource('/produto', ProdutoController::class);


// Rotas de Perfil
Route::name('perfil.')->group(function (){
    Route::prefix('/perfil')->group(function (){
        //Get
        Route::get('/register', [UserController::class, 'showRegister'])->name('register');
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/login', [UserController::class, 'showLogin'])->name('login');
        Route::get('/adm', [UserController::class, 'showAdm'])->name('adm');
        Route::get('/edit_funcionario/{user}', [UserController::class, 'showEdit_funcionario'])->name('edit_funcionario');
        Route::get('/create_meta/{funcionario}', [UserController::class, 'create_meta'])->name('create_meta');
        Route::get('/acesso', [UserController::class, 'acesso'])->name('acesso');
        //Post
        Route::post('/register/do', [UserController::class, 'getRegister'])->name('register.do');
        Route::post('/login/do', [UserController::class, 'getLogin'])->name('login.do');
        Route::post('/store_meta/{funcionario}', [UserController::class, 'store_meta'])->name('store_meta');
        //Put
        Route::put('/edit_funcionario/do', [UserController::class, 'getEdit_funcionario'])->name('edit_funcionario.do');
        //Delete
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');

    });
});






//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';

//Rotas Cliente
Route::resource('/cliente', ClienteController::class);

//Rotas HistóricoFuncionário
Route::get('historico/funcionario/{funcionario}', [HistoricoFuncionarioController::class, 'show'])->name('historico.funcionario.show');


Route::name('/analise')->group(function (){
    Route::prefix('/analise')->group(function (){
        Route::get('/list', [AnaliseProdutoController::class, 'list'])->name('analise.list');
        Route::get('/{produto}', [AnaliseProdutoController::class, 'show']);
    });
});

// Rotas de Cargos
Route::name('cargo.')->group(function (){
    Route::prefix('/cargo')->group(function (){
        // Get
        Route::get('/', [CargoController::class, 'home'])->name('home');
        Route::get('/novo', [CargoController::class, 'create'])->name('create');
        Route::get('/editar/{id}', [CargoController::class, 'formEdit'])->name('formEdit');

        // Post
        Route::post('/store', [CargoController::class, 'store'])->name('store');

        // Put
        Route::put('/edit/{id}', [CargoController::class, 'edit'])->name('edit');

        // Delete
        Route::delete('/destroy/{id}', [CargoController::class, 'destroy'])->name('destroy');
    });


});
//ROTAS DA INSTÂNCIA LOJA

//Route::get('/loja', [VendaControllerLoja::class, 'index'])->name('index');
//Route::get('/loja/venda/create', [VendaControllerLoja::class, 'create'])->name('create');
Route::resource('/loja', VendaControllerLoja::class);

