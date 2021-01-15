<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post as Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        $danhnhan = Post::where('category_id', 1)
        ->get();

        $sukien = Post::where('category_id', 3)
        ->get();

        $ditich = Post::where('category_id', 2)
        ->get();

        $newpost = Post::orderBy('created_at')->first();

        return view('index', compact('posts','danhnhan','sukien', 'ditich', 'newpost'));
    }

    public function Candai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời cận đại(1845-1945)')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('thoicandai', compact('posts'));
    }

    public function Codai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời cổ đại')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('thoicodai', compact('posts'));
    }

    public function Trungdai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời trung đại')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('thoitrungdai', compact('posts'));
    }

    public function Hiendai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời hiện đại')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('thoihiendai', compact('posts'));
    }

    public function Danhnhan()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Danh nhân')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('danhnhan', compact('posts'));
    }

    public function Ditich()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Di tích')
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name']);
        return view('ditich', compact('posts'));
    }
    
    public function video()
    {
        $post = Post::where('post_type_id', 1)->where('hidden', 0)
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select('posts.*', 'users.name as user_name', 'categories.name as category')
                ->orderBy('created_at', 'desc')->get();
                // return $post;
        return view('video', compact('post'));
    }
    public function SinglePost($id)
    {
        $update = Post::where('id', $id)
            ->increment('views', 1);

        $post = Post::find($id);
        $user = User::find($post->user_id);
        $category = Category::find($post->category_id);
        $subpost = Post::join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.category_id', $post->category_id)
            ->where('posts.id', '!=', $post->id)
            ->inRandomOrder()->limit(2)->get(['posts.*', 'categories.name']);
        $comments = Comment::where('post_id', '=', $id)->join('users', 'comments.user_id', '=', 'users.id')->orderBy('created_at', 'desc')->get(['comments.*', 'users.name','users.avatar']);
// return $subpost;
        $postcount = Post::where('user_id', '=', $user->id)->count();
        return view('single-post', compact('post', 'subpost', 'postcount', 'user', 'category', 'comments'));
    }
}
