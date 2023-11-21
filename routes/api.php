<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Routes for UserController

Route::middleware('auth')->get('/users', [UserController::class, "index"]);
Route::get('/users/{user}', [UserController::class, "show"]);

//Routes for HunterController
Route::get('/hunter', [\App\Http\Controllers\Api\HunterController::class, "index"]);

//Routes for HuntController
Route::get('/hunt', [\App\Http\Controllers\Api\HuntController::class, "index"]);
Route::get('/hunt/{hunt}', [\App\Http\Controllers\Api\HuntController::class, "show"]);

//Routes for KillController
Route::get('/kill', [\App\Http\Controllers\Api\KillController::class], "index");
Route::get('/kill/{idUser}', [\App\Http\Controllers\Api\KillController::class], "show");
Route::post('login', [\App\Http\Controllers\AuthController::class, "login"]);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
