<?php

use App\Http\Controllers\Api\CidadeController;
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

Route::apiResource('cidades', CidadeController::class);
Route::apiResource('enderecos', EnderecoController::class);

Route::post('/cidade/import', function () {
    return response()->json([
    ]);
});