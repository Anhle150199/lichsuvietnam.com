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
Route::get('test', function(){
    $user = User::find(1);
    foreach ($user->post as $post){
        echo $post->title."<br>";
    }
    
});

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/danh-nhan', function () {
    return view('list');
});
Route::get('/video', function () {
    return view('video-post');
});
Route::get('/ditich', function () {
    return view('single-post');
});

//admin page
Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/admin/admin-list', function () {
    return view('admin/admin-list');
});