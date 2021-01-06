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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
    public function Candai()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('period', 'posts.period_id', '=', 'period.id')
            ->where('categories.name', 'Sự kiện')
            ->where('period.name', 'Thời cận đại(1845-1945)')
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
            ->get(['posts.*', 'users.name']);
        return view('thoihiendai', compact('posts'));
    }
    public function Danhnhan()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Danh nhân')
            ->get(['posts.*', 'users.name']);
        return view('danhnhan', compact('posts'));
    }
    public function Ditich()
    {
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', 'Di tích')
            ->get(['posts.*', 'users.name']);
        return view('ditich', compact('posts'));
    }
    public function SinglePost($id)
    {
        $update = Post::where('id', $id)
            ->increment('views', 1);
        // $sessionView = Session::get($sessionKey);
        // $post = PostModel::findOrFail($postId);
        // if (!$sessionView) { //nếu chưa có session
        //     Session::put($sessionKey, 1); //set giá trị cho session
        //     $post->increment('views');
        // }

        // $post = Post::join('users','posts.user_id','=','users.id')
        // ->join('categories','posts.category_id','=','categories.id')
        // ->where('posts.id', $id)
        // ->first(['posts.*','users.name as user_name','categories.name as category_name']);

        $post = Post::find($id);
        $user = User::find($post->user_id);
        $category = Category::find($post->category_id);
        $subpost = Post::join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.category_id', $post->category_id)
            ->where('posts.id', '!=', $post->id)
            ->inRandomOrder(2)->get('posts.*', 'categories.*');
        $comments = Comment::where('post_id', '=', $id)->join('users', 'comments.user_id', '=', 'users.id')->get(['comments.*', 'users.name','users.avatar']);
        // $comments = Comment::where('post_id', '=', $id)->get();
        // return $comments;
        $postcount = Post::where('user_id', '=', $user->id)->count();
        return view('single-post', compact('post', 'subpost', 'postcount', 'user', 'category', 'comments'));
    }
}
