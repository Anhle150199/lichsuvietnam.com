<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post as Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function Candai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời cận đại(1858-1945)')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('thoicandai', compact('posts', 'postView'));
    }

    public function Codai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời cổ đại')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('thoicodai', compact('posts', 'postView'));
    }

    public function Trungdai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời trung đại')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);

        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('thoitrungdai', compact('posts', 'postView'));
    }

    public function Hiendai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời hiện đại')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('thoihiendai', compact('posts', 'postView'));
    }

    public function Danhnhan()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Danh nhân')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('danhnhan', compact('posts', 'postView'));
    }

    public function Ditich()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->where('hidden', 0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Di tích')
            ->orderBy('created_at', 'desc')
            ->select('posts.*', 'users.name')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('ditich', compact('posts', 'postView'));
    }

    public function video()
    {
        $posts = Post::where('post_type_id', 1)->where('hidden', 0)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as user_name', 'categories.name as category')
            ->orderBy('created_at', 'desc')->paginate(7);
        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('video', compact('posts', 'postView'));
    }
    
}
