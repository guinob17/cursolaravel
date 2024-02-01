<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Resource;

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

Route::resource('produtos', ProdutoController::class);

Route::get('/', [SiteController::class,'index'])->name('site.index');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class,'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class,'adicionaCarrinho'])->name('site.addcarrinho');



//Testes
Route::get('/empresa', function(){
    return view('empresa');
});

Route::any('/any', function(){
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

Route::match(['get', 'post'], '/match', function(){
    return "Permite apenas acessos definidos";
});

//redirecionar
Route::get('/about', function(){
    return redirect('/empresa');
});

//redirecionar de outra forma mais simplificada
Route::redirect('/sobre', '/empresa');

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

//Grupos de rotas
Route::prefix('admin')->group(function(){
    Route::get('dashboard', function(){
        return "dashboard";
    });

    Route::get('users', function(){
        return "users";
    });

    Route::get('clientes', function(){
        return "clientes";
    });
});

//Controllers
Route::get('/home', [ProdutoController::class, 'index'])->name('product.index');

Route::get('/product/{id?}', [ProdutoController::class, 'show'])->name('product.show');

//Resources
Route::resource('resources', Resource::class);