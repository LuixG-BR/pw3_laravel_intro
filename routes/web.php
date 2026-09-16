<?php

use App\Http\Controllers\EventoController;
use App\Models\User;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/admin', 'admin.dashboard');

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/teste-orm', function() {
    User::create([
        'name' => 'Luis',
        'email' => 'luis@escola.sp.gov.br',
        'password' => '12345'
    ]);

    return User::all();
});
