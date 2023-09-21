<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadorApiController;
use App\Http\Controllers\ProdutoApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('computadores.')->prefix('computadores')->controller(ComputadorApiController::class)->group(function () {
    Route::get('/{computador}', 'apiFind')->name('apiFind');
    Route::get('/', 'apiAll')->name('apiAll');
    Route::post('/', 'apiStore')->name('apiStore');
    Route::put('/{computador}', 'apiUpdate')->name('apiUpdate');
    Route::delete('/{computador}', 'apiDelete')->name('apiDelete');
});

Route::name('produtos.')->prefix('produtos')->controller(ProdutoApiController::class)->group(function () {
    Route::get('/{produto}', 'apiFind')->name('apiFind');
    Route::get('/', 'apiAll')->name('apiAll');
    Route::post('/', 'apiStore')->name('apiStore');
    Route::put('/{produto}', 'apiUpdate')->name('apiUpdate');
    Route::delete('/{produto}', 'apiDelete')->name('apiDelete');
});
