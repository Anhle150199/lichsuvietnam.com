<?php

namespace App\Http\Controllers;

use App\Models\Post as Post;

use Illuminate\Http\Request;

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
        $danhnhan = Post::where('category_id', 1)
        ->get();

        $sukien = Post::where('category_id', 3)
        ->get();

        $ditich = Post::where('category_id', 2)
        ->get();

        $newpost = Post::orderBy('created_at')->first();

        return view('index', compact('posts','danhnhan','sukien', 'ditich', 'newpost'));
    }
    public function Candai(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->join('period','posts.period_id','=','period.id')
        ->where('categories.name', 'Sự kiện')
        ->where('period.name', 'Thời cận đại(1845-1945)')
        ->get(['posts.*','users.name']);   
        return view('thoicandai', compact('posts'));
    }
    public function Codai(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->join('period','posts.period_id','=','period.id')
        ->where('categories.name', 'Sự kiện')
        ->where('period.name', 'Thời cổ đại')
        ->get(['posts.*','users.name']);   
        return view('thoicodai', compact('posts'));
    }
    public function Trungdai(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->join('period','posts.period_id','=','period.id')
        ->where('categories.name', 'Sự kiện')
        ->where('period.name', 'Thời trung đại')
        ->get(['posts.*','users.name']);   
        return view('thoitrungdai', compact('posts'));
    }
    public function Hiendai(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->join('period','posts.period_id','=','period.id')
        ->where('categories.name', 'Sự kiện')
        ->where('period.name', 'Thời hiện đại')
        ->get(['posts.*','users.name']);   
        return view('thoihiendai', compact('posts'));
    }
    public function Danhnhan(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->where('categories.name', 'Danh nhân')
        ->get(['posts.*','users.name']);   
        return view('danhnhan', compact('posts'));
    }
    public function Ditich(){
        $posts = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->where('categories.name', 'Di tích')
        ->get(['posts.*','users.name']);   
        return view('ditich', compact('posts'));
    }
    public function SinglePost($id){
        $update = Post::where('id', $id)
        ->increment('views', 1);

        $post = Post::join('users','posts.user_id','=','users.id')
        ->join('categories','posts.category_id','=','categories.id')
        ->where('posts.id', $id)
        ->first(['posts.*','users.name as user_name','categories.name as category_name']);

        $subpost = Post::join('categories','posts.category_id','=','categories.id')
        ->where('posts.category_id', $post->category_id)
        ->where('posts.id','!=',$post->id)
        ->inRandomOrder(2)->get('posts.*','categories.*');

        $postcount = Post::all()->count();
        return view('single-post', compact('post','subpost','postcount'));
    }
    
}
