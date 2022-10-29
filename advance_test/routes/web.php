<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class,'index']);
Route::get('/contact', [ContactController::class,'contact']);
Route::post('/contact', [ContactController::class,'contact']);
Route::post('/confirm', [ContactController::class,'confirm']);
Route::get('/thanks', [ContactController::class,'thanks']);
Route::post('/add', [ContactController::class,'add']);

Route::get('/admin',[ContactController::class,'admin']);
Route::get('/search',[ContactController::class,'search']);
Route::post('/delete',[ContactController::class,'delete']);
Route::post('/del_multi',[ContactController::class,'del_multi']);
