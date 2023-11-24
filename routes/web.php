<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.admin');
});

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'mainPage']);

Route::get('/society', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/department', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/federation', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/animals', [\App\Http\Controllers\AdminController::class, 'index']);

//User backoffice route
Route::get('/user', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/delete/user/{id}', [\App\Http\Controllers\AdminController::class, 'deleteUser']);
Route::get('/update/user/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser']);
Route::post('/update/user', [\App\Http\Controllers\AdminController::class, 'updateUserValues']);
Route::get('/create/user', [\App\Http\Controllers\AdminController::class, 'createView']);
Route::post('/create/user', [\App\Http\Controllers\AdminController::class, 'createUser']);
