<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Post as Post;
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

Route::get('/danh-nhan', [App\Http\Controllers\HomeController::class, 'Danhnhan']);
Route::get('/di-tich', [App\Http\Controllers\HomeController::class, 'Ditich']);
Route::get('/thoi-co-dai', [App\Http\Controllers\HomeController::class, 'Codai']);
Route::get('/thoi-trung-dai', [App\Http\Controllers\HomeController::class, 'Trungdai']);
Route::get('/thoi-can-dai', [App\Http\Controllers\HomeController::class, 'Candai']);
Route::get('/thoi-hien-dai', [App\Http\Controllers\HomeController::class, 'Hiendai']);

Route::get('/video', function () {
    return view('video-post');
});

Route::get('/id={id}', [App\Http\Controllers\HomeController::class, 'SinglePost']);
//admin page
Route::get('/admin', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');

Route::get('/admin/admin-list', function () {
    return view('admin/admin-list');
});
