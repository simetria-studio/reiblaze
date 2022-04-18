<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AdminController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {

    return view('auth.login');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth.check.permission');
Route::post('user/store', [AdminController::class, 'storeUser'])->name('user.store')->middleware('auth.check.permission');
Route::get('/users', [AdminController::class, 'users'])->name('users')->middleware('auth.check.permission');
Route::post('user/status/{id}', [AdminController::class, 'userStatus'])->name('user.status')->middleware('auth.check.permission');
Route::get('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('user.edit')->middleware('auth.check.permission');
Route::post('/user/update/{id}', [AdminController::class, 'userUpdate'])->name('user.update')->middleware('auth.check.permission');

Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'userUpdate'])->name('update.user');

Route::any('/sair', [AdminController::class, 'logout'])->name('sair');


Route::post('scraping', [AdminController::class, 'webDriver']);
Route::get('getDados', [AdminController::class, 'getDados']);
Route::get('getClass', [AdminController::class, 'getClass']);
