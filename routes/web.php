<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login',  [App\Http\Controllers\Auth\LoginController::class, 'getLogin'])->name('login');

Route::get('/danh-nhan', function () {
    return view('list');
});
Route::get('/video-post', function () {
    return view('video-post');
});

//admin page
Route::get('/admin', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');

Route::get('/admin/admin-list', function () {
    return view('admin/admin-list');
});

