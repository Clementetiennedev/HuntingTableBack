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

Route::get('/admin', [\App\Http\Controllers\UserBoController::class, 'mainPage']);
Route::get('/society', [\App\Http\Controllers\UserBoController::class, 'index']);
Route::get('/department', [\App\Http\Controllers\UserBoController::class, 'index']);
Route::get('/federation', [\App\Http\Controllers\UserBoController::class, 'index']);
Route::get('/animals', [\App\Http\Controllers\UserBoController::class, 'index']);

//Users backoffice routes
Route::get('/user', [\App\Http\Controllers\UserBoController::class, 'indexUser']);
Route::get('/delete/user/{id}', [\App\Http\Controllers\UserBoController::class, 'deleteUser']);
Route::get('/update/user/{id}', [\App\Http\Controllers\UserBoController::class, 'updateUser']);
Route::post('/update/user', [\App\Http\Controllers\UserBoController::class, 'updateUserValues']);
Route::get('/create/user', [\App\Http\Controllers\UserBoController::class, 'createView']);
Route::post('/create/user', [\App\Http\Controllers\UserBoController::class, 'createUser']);

//Societes backoffice routes
Route::get('/society', [\App\Http\Controllers\SocietyController::class, 'indexSociety']);
Route::get('/delete/society/{id}', [\App\Http\Controllers\SocietyController::class, 'deleteSociety']);
Route::get('/update/society/{id}', [\App\Http\Controllers\SocietyController::class, 'updateSociety']);
Route::post('/update/society', [\App\Http\Controllers\SocietyController::class, 'updateSocietyValues']);
Route::get('/create/society-view', [\App\Http\Controllers\SocietyController::class, 'createSocietyView']);
Route::post('/create/society', [\App\Http\Controllers\SocietyController::class, 'createSociety']);
