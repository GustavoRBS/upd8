<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Api\ClientApiController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
        Route::get('/client/register', [ClientController::class, 'showClientRegister'])->name('show.register');
        Route::get('/client/register/edit/{client_id}', [ClientController::class, 'editClientRegister'])->name('send.register');
        Route::get('/client/consult', [ClientController::class, 'showClientConsult'])->name('show.consult');
});
