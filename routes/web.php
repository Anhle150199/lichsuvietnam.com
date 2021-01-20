<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Post as Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

// Route::get('/callback/{facebook}',  [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('facebook_callback');
// Route::get('/redirect/{facebook}',  [App\Http\Controllers\Auth\LoginController::class, 'redirectProvider'])->name('facebook_login');
// Route::get('/auth/redirect/{provider}', [App\Http\Controllers\SocialController::class, 'redirect']);
// Route::get('/callback/{provider}', [App\Http\Controllers\SocialController::class, 'callback']);


Route::get('/login',  [App\Http\Controllers\Auth\LoginController::class, 'getLogin'])->name('login');

Route::post('/comment-list',  [App\Http\Controllers\CommentController::class, 'index'])->name('comment');
Route::post('/comment-post',  [App\Http\Controllers\CommentController::class, 'postComment'])->name('post-comment');
Route::post('/reply',  [App\Http\Controllers\CommentController::class, 'postReply'])->name('post-reply');

Route::get('send-notification', [App\Http\Controllers\CommentController::class, 'commentRealTime']);

Route::get('/profile',  [App\Http\Controllers\UserController::class, 'getProfile'])->name('profile');
Route::post('/profile',  [App\Http\Controllers\UserController::class, 'postProfile'])->name('profile');

Route::post('/change-avatar',  [App\Http\Controllers\UserController::class, 'postChangeAvatar'])->name('change-avatar');
Route::get('/change-password',  [App\Http\Controllers\UserController::class, 'getChangePassword'])->name('change-password');
Route::post('/change-password',  [App\Http\Controllers\UserController::class, 'postChangePassword'])->name('change-password');

Route::post('/disable-user',  [App\Http\Controllers\UserController::class, 'disableUser'])->name('disable-user');

Route::get('/danh-nhan', [App\Http\Controllers\CategoryController::class, 'Danhnhan']);
Route::get('/di-tich', [App\Http\Controllers\CategoryController::class, 'Ditich']);
Route::get('/thoi-co-dai', [App\Http\Controllers\CategoryController::class, 'Codai']);
Route::get('/thoi-trung-dai', [App\Http\Controllers\CategoryController::class, 'Trungdai']);
Route::get('/thoi-can-dai', [App\Http\Controllers\CategoryController::class, 'Candai']);
Route::get('/thoi-hien-dai', [App\Http\Controllers\CategoryController::class, 'Hiendai']);

Route::get('/video-list',  [App\Http\Controllers\CategoryController::class, 'video'])->name('video.list');

Route::get('/id={id}', [App\Http\Controllers\PostController::class, 'SinglePost'])->name('post.show');
Route::get('/like', [App\Http\Controllers\PostController::class, 'likePost'])->name('post.like');


//Admin
Route::prefix('admin')->group(function () {

    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('admin');

    Route::get('/admins', [App\Http\Controllers\UserController::class, 'getAdminList'])->name('admins-list'); //ok
    Route::get('/users', [App\Http\Controllers\UserController::class, 'getUserList'])->name('users-list'); //ok

    Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getUserEdit'])->name('user-edit'); //ok
    Route::post('edit', [App\Http\Controllers\UserController::class, 'postUserEdit'])->name('edit'); //ok

    Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'userDelete'])->name('user-delete'); //ok
    Route::get('active/{id}', [App\Http\Controllers\UserController::class, 'userActive'])->name('user-active'); //ok

    Route::prefix('/posts')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'getPostList'])->name('posts-list'); //ok

        Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getPostEdit'])->name('post-edit'); //ok
        // Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'getPostEdit'])->name('get-post-edit');//ok
        Route::post('edit/{id}', [App\Http\Controllers\UserController::class, 'postPostEdit'])->name('post-edit'); //ok
        Route::post('edit/{id}', [App\Http\Controllers\UserController::class, 'postVideoEdit'])->name('video-edit'); //ok

        Route::get('create-post', [App\Http\Controllers\UserController::class, 'getPostAdd'])->name('post-create'); //ok
        Route::post('create-post', [App\Http\Controllers\UserController::class, 'postPostAdd'])->name('post-create'); //ok

        Route::get('create-video', [App\Http\Controllers\UserController::class, 'getVideoAdd'])->name('video-create');
        Route::post('create-video', [App\Http\Controllers\UserController::class, 'postVideoAdd'])->name('video-create');
    });
    Route::prefix('/comments')->group(function () {
        Route::get('/', [App\Http\Controllers\CommentController::class, 'getCommentList'])->name('comments');
        Route::get('hidden/{id}', [App\Http\Controllers\CommentController::class, 'hiddenComment'])->name('comment.hidden');
        Route::get('delete/{id}', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('comment.delete');

        Route::get('/{id}/replies', [App\Http\Controllers\CommentController::class, 'getReplyList'])->name('replies');
        Route::get('/replies/hidden/{id}', [App\Http\Controllers\CommentController::class, 'hiddenReply'])->name('replies.hidden');
        Route::get('/replies/delete/{id}', [App\Http\Controllers\CommentController::class, 'deleteReply'])->name('replies.delete');
    });
});

Route::get('send-notification', [App\Http\Controllers\NotificationController::class, 'sendNofication']);
Route::get('test', function () {
    return view('test');
});

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('callback/facebook', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('callback/google', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);