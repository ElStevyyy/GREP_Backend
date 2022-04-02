<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\juridiquesController;
use App\Http\Controllers\nogaController;
use App\Http\Controllers\adresseController;
use App\Http\Controllers\barMiaNoaController;
use App\Http\Controllers\etablissementController;



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
Route::get('bars', [barMiaNoaController::class,'index']);
Route::get('bars/{barMiaNoa}', [barMiaNoaController::class,'show']);
Route::get('juridiques', [juridiquesController::class,'index']);
Route::get('nogas', [nogaController::class,'index']);

Route::post('bars/adresse/updateAll', [adresseController::class, 'updateAll']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
