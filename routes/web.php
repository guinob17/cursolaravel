<?php

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

Route::get('/empresa', function(){
    return view('empresa');
});

Route::any('/any', function(){
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

Route::match(['get', 'post'], '/match', function(){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id?}/{cat?}', function($id = '0', $cat = 'default'){
    return "O id desse produto é: ".$id."<br>"."A categoria é: ".$cat;
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