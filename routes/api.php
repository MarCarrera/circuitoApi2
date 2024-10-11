<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LissonController;
use App\Http\Controllers\Api\EconomicController;
use App\Http\Controllers\Api\MovementController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('lissons', LissonController::class);
Route::apiResource('economics', EconomicController::class);
Route::apiResource('movements', MovementController::class);
