<?php

namespace App\Http\Controllers;

// use App\Events\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Events\RedisEvent;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }

    public function postComment(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id= Auth::user()->id;
        $comment->hidden = 0;
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();
        event(
            $e = new RedisEvent($comment)
        );
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id= Auth::user()->id;
        $comment->hidden = 0;
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();

    }
}
