<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/','/admin');
//Route::get('/', function () {
    //return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para el módulo de soporte y tickets
    // Permitimos al usuario listar los tickets y crear o enviar un nuevo ticket
    Route::resource('support', App\Http\Controllers\TicketController::class)->only(['index', 'create', 'store']);
});