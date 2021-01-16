<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post as Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        $videos = Post::where('post_type_id', 1)->orderBy('created_at', 'desc')->limit(10)->get();
// return $videos[0];
        $danhnhan = Post::where('category_id', 1)
            ->get();

        $sukien = Post::where('category_id', 3)
            ->get();

        $ditich = Post::where('category_id', 2)
            ->get();
        $newpost = Post::orderBy('created_at')->first();

        $postView  = Post::orderBy('views', 'desc')->limit(10)->get();
        return view('index', compact('posts','videos', 'danhnhan', 'sukien', 'ditich', 'newpost', 'postView'));
    }
}
