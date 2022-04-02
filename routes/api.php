<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barMiaNoaController;
use App\Http\Controllers\BarMiaNoaControllerTrue;
use App\Http\Controllers\adresseController;


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
Route::post('bars', [barMiaNoaController::class,'store']);
Route::put('bars/{barMiaNoa}', [barMiaNoaController::class,'update']);
Route::delete('bars/{barMiaNoa}', [barMiaNoaController::class,'delete']);

Route::post('bars/insert', [BarMiaNoaControllerTrue::class,'insert']);

Route::get('bars/adresse/showAll', [adresseController::class,'showAll']);
Route::get('bars/adresse/{adresses}', [adresseController::class, 'show']);
Route::post('bars/adresse', [adresseController::class, 'updateOne']);
Route::post('bars/adresse/updateAll', [adresseController::class, 'updateAll']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
