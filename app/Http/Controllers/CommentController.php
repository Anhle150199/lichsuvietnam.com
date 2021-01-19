<?php

namespace App\Http\Controllers;

// use App\Events\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\CommentEvent;

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
        // $message = $request->comment; 
        // event(new CommentEvent($message));

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id= Auth::user()->id;
        $comment->hidden = 0;
        $comment->created_at = date("Y-m-d H:i:s");
        $post = Post::find($request->post_id)->increment('comments', 1);
        // $post->save();
        $comment->save();
        return redirect()->back();
    }
    public function postReply(Request $request)
    {
        $reply = new Reply;
        $reply->content = $request->reply;
        $reply->comment_id = $request->comment_id;
        $reply->post_id = $request->post_id;
        $reply->user_id= Auth::user()->id;
        $reply->hidden = 0;
        $reply->created_at = date("Y-m-d H:i:s");
        $post = Post::find($request->post_id)->increment('comments', 1);
        $reply->save();
        return redirect()->back();
    }

    public function getCommentList()
    {
        $comment = Comment::orderBy('created_at', 'desc')->join('users', 'users.id', 'comments.user_id')->select('comments.*', 'users.name')->get();
        return view('admin.comments-list', compact('comment'));
    }

    public function hiddenComment($id)
    {
        $comment = Comment::find($id);
        $comment->hidden = 1 - $comment->hidden;
        $comment->save();
        return redirect()->back();
    }
    public function deleteComment($id)
    {

        $comment = Comment::find($id);
        $reply  = DB::table('replies')->where('comment_id', '=', $id)->delete();
        $comment->delete();
        return redirect()->back();
    }

    public function getReplyList($id)
    {
        $comment = Comment::join('users', 'users.id', 'user_id')->where('comments.id', $id)
        ->select('comments.content', 'users.name')->get();
        $replies = Reply::join('users', 'users.id', 'replies.user_id')->where('comment_id', $id)->select('replies.*', 'users.name')->get();
        return view('admin.replies-list', compact('replies'), ['comment'=>$comment]);
    }

    public function hiddenReply($id)
    {
        $reply = Reply::find($id);
        $reply->hidden = 1 - $reply->hidden;
        $reply->save();
        return redirect()->back();
    }
    public function deleteReply($id)
    {
        $reply = Reply::find($id);
        $reply->delete();
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
