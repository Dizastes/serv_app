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
    return view('welcome');
});

Route::prefix('/info') -> group (function(){
    Route::get('/server', [InfoController::class, 'serverInfo']); //Возвращает данные об установленной версии PHP;

    Route::get('/client', [InfoController::class, 'clientInfo']); //Возвращает данные о перешедшем по роуту клиенте

    Route::get('/database', [InfoController::class, 'databaseInfo']); //Возвращает данные об используемой базе данных
});
