<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // <-- Adicione esta linha no topo
use App\Http\Livewire\CaixaVenda;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/caixa', CaixaVenda::class);

// Rotas abertas
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas Protegidas (Só entra quem estiver logado)
Route::middleware(['auth'])->group(function () {
    Route::get('/caixa', CaixaVenda::class);
    Route::get('/', function () { return redirect('/caixa'); });
});

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/gerar-senha', function () {
    User::create([
        'name' => 'Paulo',
        'email' => 'paulo@email.com',
        'password' => Hash::make('123456'),
    ]);
    return "Usuário criado com sucesso! Agora apague esta rota.";
});
