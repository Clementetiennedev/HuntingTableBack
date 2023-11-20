<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SocietyController;
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
Route::get('/hunt/{hunt}', [\App\Http\Controllers\Api\HuntController::class, "show"]);

//Routes for KillController
Route::get('/kill', [\App\Http\Controllers\Api\KillController::class, "index"]);
Route::get('/kill/{kill}', [\App\Http\Controllers\Api\KillController::class, "show"]);

//Routes for CategoryController
Route::get('/category', [\App\Http\Controllers\Api\CategoryController::class, "index"]);
Route::get('/category/{category}', [\App\Http\Controllers\Api\CategoryController::class, "show"]);

//Routes for DepartmentController
Route::get('/department', [\App\Http\Controllers\Api\DepartmentController::class, "index"]);
Route::get('/department/{department}', [\App\Http\Controllers\Api\DepartmentController::class, "show"]);

//Routes for FederationController
Route::get('/federation', [\App\Http\Controllers\Api\FederationController::class, "index"]);
Route::get('/federation/{federation}', [\App\Http\Controllers\Api\FederationController::class, "show"]);

//Routes for QuotaController
Route::get('/quota', [\App\Http\Controllers\Api\QuotaController::class, "index"]);
Route::get('/quota/{quota}', [\App\Http\Controllers\Api\QuotaController::class, "show"]);

//Routes for RoleController
Route::get('/role', [\App\Http\Controllers\Api\RoleController::class, "index"]);
Route::get('/role/{role}', [\App\Http\Controllers\Api\RoleController::class, "show"]);

//Routes for SeasonController
Route::get('/season', [\App\Http\Controllers\Api\SeasonController::class, "index"]);
Route::get('/season/{season}', [\App\Http\Controllers\Api\SeasonController::class], "show");

//Routes for SocietyController
Route::get('/society', [SocietyController::class, "index"]);
Route::get('/society/{society}', [SocietyController::class, "show"]);

//Routes for SpeciesController
Route::get('/species', [\App\Http\Controllers\Api\SpeciesController::class, "index"]);
Route::get('/species/{species}', [\App\Http\Controllers\Api\SpeciesController::class, "show"]);
