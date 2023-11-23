<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SocietyController;
use App\Http\Controllers\Api\FederationController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\HuntController;
use App\Http\Controllers\Api\KillController;
use App\Http\Controllers\Api\HunterController;
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
Route::get('/users', [UserController::class, "index"]);
Route::get('/users/{user}', [UserController::class, "show"]);
Route::patch('/users/{user}', [UserController::class, "update"]);
Route::delete('/users/{user}', [UserController::class, "delete"]);

//Routes for HunterController
Route::get('/hunter', [HunterController::class, "index"]);
Route::get('/hunter/{hunter}', [HunterController::class, "show"]);
Route::post('/hunter/', [HunterController::class, "store"]);
Route::patch('/hunter/{hunter}', [HunterController::class, "update"]);
Route::delete('/hunter/{hunter}', [HunterController::class, "delete"]);

//Routes for HuntController
Route::get('/hunt', [HuntController::class, "index"]);
Route::get('/hunt/{hunt}', [HuntController::class, "show"]);
Route::post('/hunt/', [HuntController::class, "store"]);
Route::patch('/hunt/{hunt}', [HuntController::class, "update"]);
Route::delete('/hunt/{hunt}', [HuntController::class, "delete"]);

//Routes for KillController
Route::get('/kill', [KillController::class, "index"]);
Route::get('/kill/{kill}', [KillController::class, "show"]);
Route::post('/kill/', [KillController::class, "store"]);
Route::patch('/kill/{kill}', [KillController::class, "update"]);
Route::delete('/kill/{kill}', [KillController::class, "delete"]);

//Routes for FederationController
Route::get('/federation', [FederationController::class, "index"]);
Route::get('/federation/{federation}', [FederationController::class, "show"]);
Route::post('/federation/', [FederationController::class, "store"]);
Route::patch('/federation/{federation}', [FederationController::class, "update"]);
Route::delete('/federation/{federation}', [FederationController::class, "delete"]);

//Routes for SeasonController
Route::get('/season', [SeasonController::class, "index"]);
Route::get('/season/{season}', [SeasonController::class, "show"]);
Route::post('/season/', [SeasonController::class, "store"]);
Route::patch('/season/{season}', [SeasonController::class, "update"]);
Route::delete('/season/{season}', [SeasonController::class, "delete"]);

//Routes for SocietyController
Route::get('/society', [SocietyController::class, "index"]);
Route::get('/society/{society}', [SocietyController::class, "show"]);
Route::post('/society/', [SocietyController::class, "store"]);
Route::patch('/society/{society}', [SocietyController::class, "update"]);
Route::delete('/society/{society}', [SocietyController::class, "delete"]);

Route::post('/login', [AuthController::class, "login"])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('api.reg');
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
