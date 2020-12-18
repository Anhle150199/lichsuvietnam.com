<?php

namespace App\Http\Controllers;

use App\Models\Post as Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     if (Auth::check()) {
    //         if(Auth::user()->active == 0){
    //             Auth::logout();
    //             $this->middleware('guest')->except('logout');
    //         }
    //     }
    // }

    /**
     * Show the application dashboard.  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function Candai(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 7)->where('posts.period_id', 3)->get(['posts.*','users.name']);   
        return view('thoicandai', compact('posts'));
    }
    public function Codai(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 7)->where('posts.period_id', 1)->get(['posts.*','users.name']);   
        return view('thoicodai', compact('posts'));
    }
    public function Trungdai(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 7)->where('posts.period_id', 2)->get(['posts.*','users.name']);   
        return view('thoitrungdai', compact('posts'));
    }
    public function Hiendai(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 7)->where('posts.period_id', 4)->get(['posts.*','users.name']);   
        return view('thoihiendai', compact('posts'));
    }
    public function Danhnhan(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 1)->get(['posts.*','users.name']);   
        return view('danhnhan', compact('posts'));
    }
    public function Ditich(){
        $posts = Post::join('users','posts.user_id','=','users.id')->where('posts.category_id', 2)->get(['posts.*','users.name']);   
        return view('ditich', compact('posts'));
    }
}
