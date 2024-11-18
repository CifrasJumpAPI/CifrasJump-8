<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aplic\Main\MainController;

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


//Apenas para 1° teste de conectividade entre dispositivos.
Route::get('/teste', function(){
  return response()->json(['msg'=>'Seja Bem Vindo Ao CIFRAS JUMP API!']);
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/main', [MainController::class, 'main']);