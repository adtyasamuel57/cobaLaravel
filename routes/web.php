<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\SeaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});
Route::get('/data', [AppController::class, 'data']);
Route::get('/peta', function () {
    return view('peta');
});
Route::get('/info', function () {
    return view('info');
});
Route::get('/pdarurat', function () {
    return view('pdarurat');
});
Route::get('/laravelinfo', function () {
    return view('welcome');
});

Route::get('/input-data/{tinggi}-{arus}-{getaran}', [AppController::class, 'input_data']);
Route::get('/tabeldata', [SeaController::class, 'index']);

