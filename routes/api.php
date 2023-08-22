<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clients', ClientApiController::class);
Route::name('clients.search')->prefix('clients/search')->group(function () {
    Route::post('', [ClientApiController::class, 'search']);
});
