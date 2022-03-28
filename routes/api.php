<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barMiaNoaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
