<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ApiController;
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
    return view('welcome');
});
Route::post('/file',[FileController::class,'showFile']);
Route::get('/file',function () {
    return view('welcome');
});
Route::get('/enc_key',[ApiController::class,'enc_key']);
Route::get('/acc_token',[ApiController::class,'acc_token']);
Route::get('/verify',[ApiController::class,'verify']);