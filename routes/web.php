<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\UserController;
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

//home
Route::get('/',[AdminLoginController::class,'index'])->name('index');

//auth
Route::post('store',[AdminLoginController::class,'store'])->name('store');

//users
Route::resource('users',UserController::class);
