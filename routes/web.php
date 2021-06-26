<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InformationController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');;


// Route Auth Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess'])->name('login');

//Route Auth register
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'registerProcess'])->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('information', InformationController::class);
    Route::resource('category', CategoryController::class);
    

});

