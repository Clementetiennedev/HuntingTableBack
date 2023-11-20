<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, "index"]);
Route::get('/users/{user}', [UserController::class, "show"]);

//Routes for HunterController
Route::get('/hunter', [\App\Http\Controllers\Api\HunterController::class, "index"]);

//Routes for HuntController
Route::get('/hunt', [\App\Http\Controllers\Api\HuntController::class, "index"]);
Route::get('/hunt/{idUser}', [\App\Http\Controllers\Api\HuntController::class, "show"]);

//Routes for KillController
Route::get('/kill', [\App\Http\Controllers\Api\KillController::class], "index");
Route::get('/kill/{idUser}', [\App\Http\Controllers\Api\KillController::class], "show");
