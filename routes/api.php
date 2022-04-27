<?php

use App\Http\Controllers\Api\{
    CidadeController,
    EnderecoController,
    EstadoController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('estados', EstadoController::class);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('enderecos', EnderecoController::class);

Route::post('cidades/import/{uf}', CidadeController::class . '@import');
Route::post('estados/import', EstadoController::class . '@import');