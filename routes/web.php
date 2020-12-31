<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::post('/login',  [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('login');

// Route::get('/callback/{facebook}',  [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('facebook_callback');
// Route::get('/redirect/{facebook}',  [App\Http\Controllers\Auth\LoginController::class, 'redirectProvider'])->name('facebook_login');
Route::get('/auth/redirect/{provider}', [App\Http\Controllers\SocialController::class, 'redirect']);
 Route::get('/callback/{provider}', [App\Http\Controllers\SocialController::class, 'callback']);


Route::get('/profile',  [App\Http\Controllers\UserController::class, 'getProfile'])->name('profile');
Route::post('/profile',  [App\Http\Controllers\UserController::class, 'postProfile'])->name('profile');

Route::post('/change-avatar',  [App\Http\Controllers\UserController::class, 'postChangeAvatar'])->name('change-avatar');
Route::get('/change-password',  [App\Http\Controllers\UserController::class, 'getChangePassword'])->name('change-password');
Route::post('/change-password',  [App\Http\Controllers\UserController::class, 'postChangePassword'])->name('change-password');

Route::post('/disable-user',  [App\Http\Controllers\UserController::class, 'disableUser'])->name('disable-user');

Route::get('/danh-nhan', [App\Http\Controllers\HomeController::class, 'Danhnhan'], function () {
    return view('list');
});
Route::get('/video', [App\Http\Controllers\HomeController::class, 'Video'], function () {
    return view('video');
});
Route::get('/ditich', [App\Http\Controllers\HomeController::class, 'Ditich'], function () {
    return view('ditich');
});
Route::get('/thoi-co-dai', [App\Http\Controllers\HomeController::class, 'Codai'], function () {
    return view('thoicodai');
});
Route::get('/thoi-trung-dai', [App\Http\Controllers\HomeController::class, 'Trungdai'], function () {
    return view('thoitrungdai');
});
Route::get('/thoi-can-dai', [App\Http\Controllers\HomeController::class, 'Candai'], function () {
    return view('thoicandai');
});
Route::get('/thoi-hien-dai', [App\Http\Controllers\HomeController::class, 'Hiendai'], function () {
    return view('thoihiendai');
});

Route::prefix('admin')->group(function(){

    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin');

    Route::get('/admins', [App\Http\Controllers\UserController::class, 'getAdminList'])->name('admins-list');//ok
    Route::get('/users', [App\Http\Controllers\UserController::class, 'getUserList'])->name('users-list');//ok
 
    Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getUserEdit'])->name('user-edit');//ok
    Route::post('edit', [App\Http\Controllers\UserController::class, 'postUserEdit'])->name('edit');//ok

    Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user-delete');//ok
    Route::get('active/{id}', [App\Http\Controllers\UserController::class, 'userActive'])->name('user-active');//ok

    Route::prefix('/posts')->group(function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'getPostList'])->name('posts-list'); //ok

        Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getPostEdit'])->name('post-edit');//ok
        // Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getPostEdit'])->name('get-post-edit');//ok
        Route::post('edit/{id}', [App\Http\Controllers\UserController::class, 'postPostEdit'])->name('post-edit');//ok
        Route::post('edit/{id}', [App\Http\Controllers\UserController::class, 'postVideoEdit'])->name('video-edit');//ok

        Route::get('create-post', [App\Http\Controllers\UserController::class, 'getPostAdd'])->name('post-create');//ok
        Route::post('create-post', [App\Http\Controllers\UserController::class, 'postPostAdd'])->name('post-create');//ok

        Route::get('create-video', [App\Http\Controllers\UserController::class, 'getVideoAdd'])->name('video-create');
        Route::post('create-video', [App\Http\Controllers\UserController::class, 'postVideoAdd'])->name('video-create');

        // Route::get('delete', [App\Http\Controllers\UserController::class, 'getPostDelete'])->name('post-delete');
        // Route::get('show/{id}', [App\Http\Controllers\UserController::class, 'getPostShow'])->name('post-show');
    });
    Route::prefix('/comments')->group(function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'getPostList'])->name('comments');
        Route::get('delete', [App\Http\Controllers\UserController::class, 'getPostDelete'])->name('post-delete');
    });
});

Route::get('test', function ()
{
    return view('test');
});