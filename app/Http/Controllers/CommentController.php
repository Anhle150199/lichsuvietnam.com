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
        $comments = Comment::where('post_id', '=', $id)
            ->where('hidden', 0)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->get(['comments.*', 'users.name', 'users.avatar']);
        $replies = Reply::where('post_id', $id)
            ->where('hidden', 0)
            ->join('users', 'replies.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->get(['replies.*', 'users.name', 'users.avatar']);
?>
        @foreach($comments as $comment)
        <li class="single_comment_area" id="{{$comment->id}}">
            <div class="comment-content d-flex">
                <div class="comment-author">
                    <img src="<?php echo url('/'); ?>/upload/images/{{$comment->avatar}}" alt="author" style="margin-top: 20%;">
                </div>
                <div class="comment-meta alert ">
                    <div class=" alert " style="background-color: #393c3d;  width: 550px;">
                        <h6 style="color: white;">{{$comment->name}}</h6>
                        <span>{{$comment->content}}</span>
                    </div>
                    @if(Auth::check())
                    @if(Auth::user()->id == $comment->user_id)
                    <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
                        <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
                        <div class="dropdown-menu " style="background: none;border: none;">
                            <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                            <a href="#" class="reply dropdown-item">Xóa</a>
                        </div>
                    </div>
                    @endif
                    @endif
                    <div class="d-flex align-items-center row" style="float: right;width: 100%;">
                        <a onclick="reply({{$comment->id}}, {{$replies}})" class="reply" style="height: 30px;">Reply</a>
                        <p class="comment-date" style="font-size: 13px; margin-top: 2%;">{{$comment->created_at}}</p>
                    </div>
                </div>
            </div>

            <!-- reply -->
            <div class=" " style="margin-top: -5%;">
                <form action="{{route('post-reply')}}" method="post" id="form-comment" style="margin-left: 18%; width: 68%;">
                    @csrf
                    <input type="text" name="comment_id" id="comment_id" value=" {{$comment->id}} " hidden />
                    <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
                    <div class="row" id="reply-{{$comment->id}}">

                    </div>
                </form>
            </div>
            <!-- more reply -->
            <ol class="children" style="margin-top: -5%; ">
                <li class="single_comment_area">
                    @foreach($replies as $reply)
                    @if($reply->comment_id == $comment->id)
                    <div class="comment-content d-flex" style="height: 130px;">
                        <div class="comment-author">
                            <img src="<?php echo url('/'); ?>/upload/images/{{$reply->avatar}}" alt="author" style="margin-top: 20%;">
                        </div>
                        <div class="comment-meta alert">
                            <div class=" alert " style="background-color: #393c3d;  width: 499PX;">
                                <h6 style="color: white;">{{$reply->name}}</h6>
                                <span>{{$reply->content}}</span>
                            </div>
                            @if(Auth::check())
                            @if(Auth::user()->id == $reply->user_id)
                            <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
                                <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
                                <div class="dropdown-menu " style="background: none;border: none;">
                                    <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                                    <a href="#" class="reply dropdown-item">Xóa</a>
                                </div>
                            </div>
                            @endif
                            @endif
                            <div class="d-flex align-items-center" style="float: right;width: 100%;">
                                <p class="comment-date " style="margin-right: 37%;">{{$reply->created_at}}</p>
                                <a href="#" class="reply" style="float: right;">Chỉnh sửa</a>
                                <a href="#" class="reply" style="float: right;">Xóa</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </li>
            </ol>
            <!-- end more reply -->

        </li>
        @endforeach
<?php
    }
    public function postComment(Request $request)
    {
        // $message = $request->comment; 
        // event(new CommentEvent($message));

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::user()->id;
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
        $reply->user_id = Auth::user()->id;
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
        return view('admin.replies-list', compact('replies'), ['comment' => $comment]);
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
        $comment->user_id = Auth::user()->id;
        $comment->hidden = 0;
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();
    }
}
