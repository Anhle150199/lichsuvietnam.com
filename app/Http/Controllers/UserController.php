<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Period;
use App\Models\Post;
use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level == 1 || Auth::user()->level == 2) {
            $post = Post::all();
            $postHighlight = DB::table('posts')->where('highlight', '1')->orderBy('views', 'desc')->first();
            $postNew = DB::table('posts')->orderBy('created_at', 'desc')->first();

            $totalPost = $post->count();
            $views = $post->sum('views');
            $likes = $post->sum('likes');
            $comments = $post->sum('comments');
            if ($totalPost != 0 && $postHighlight != null && $postNew != null ) {
                $userPostNew = User::where('id', '=', $postNew->user_id)->first();

                $userPost = User::where('id', '=', $postHighlight->user_id)->first();
                $userPostNew = User::where('id', '=', $postNew->user_id)->first();
                return view("admin.index",
                    [
                        'post' => $post, 'total_post' => $totalPost,
                        'views' => $views, 'likes' => $likes, 'comments' => $comments,
                        'post_highlight' => $postHighlight, 'post_new' => $postNew,
                        'user_post' => $userPost, 'user_post_new' => $userPostNew
                    ]
                );
            }
            return view("admin.index",
                    [
                        'post' => $post, 'total_post' => $totalPost,
                        'views' => $views, 'likes' => $likes, 'comments' => $comments,
                        'post_highlight' => $postHighlight, 'post_new' => $postNew,
                        // 'user_post_new' => $userPostNew
                    ]
                );
        }
        return redirect()->route('home');
    }


    //get list
    public function getAdminList()
    {
        $users = User::where('level', '>', 0)->get();
        return view('admin.admin-list', ['admins' => $users]);
    }

    public function getUserList()
    {
        $users = User::where('level',  0)->get();
        return view('admin.users-list', ['users' => $users]);
    }
    public function getPostList()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        // $posts = Post::all;
        return view('admin.posts-list', ['posts' => $posts]);
    }

    //Create
    public function getPostAdd()
    {
        $categories = Category::all();
        $period = Period::all();
        return view("admin.post-create", ['categories' => $categories, 'periods' => $period]);
    }
    public function postPostAdd(Request $request)
    {


        $post = new Post;
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->post_content;
        $post->highlight = $request->highlight;
        $post->category_id = $request->category;
        $post->period_id = $request->period;
        $post->post_type_id = 2;
        $post->user_id = Auth::user()->id;
        // $post->views = 0;
        // $post->comments = 0;
        // $post->likes = 0;
        $post->video = "";
        // $post->hidden = 0;
        $post->created_at = date("Y-m-d H:i:s");
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $img = Str::random(5) . "_" . $name;

            while (file_exists("public.upload.images." . $img)) {
                $img = Str::random(5) . "_" . $name;
            }
            $file->move("upload/images", $img);
            $post->image = $img;
        } else {
            $post->image = "";
        }
        $post->save();
        return redirect()->route('posts-list')->with('dialog', 'Đăng tải bài viết thành công');
    }

    //create video
    public function getVideoAdd()
    {
        $categories = Category::all();
        $period = Period::all();
        return view("admin.video-create", ['categories' => $categories, 'periods' => $period]);
    }
    public function postVideoAdd(Request $request)
    {


        $post = new Post;
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->post_content;
        $post->highlight = $request->highlight;
        $post->category_id = $request->category;
        $post->period_id = $request->period;
        $post->post_type_id = 1;
        $post->user_id = Auth::user()->id;
        // $post->views = 0;
        // $post->comments = 0;
        // $post->likes = 0;
        $post->video = $request->video;
        // $post->hidden = 0;
        $post->created_at = date("Y-m-d H:i:s");
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $img = Str::random(5) . "_" . $name;

            while (file_exists("public.upload.images." . $img)) {
                $img = Str::random(5) . "_" . $name;
            }
            $file->move("upload/images", $img);
            $post->image = $img;
        } else {
            $post->image = "";
        }
        // return $request;
        $post->save();
        return redirect()->route('posts-list')->with('dialog', 'Đăng tải bài viết thành công');
    }

    //Edit
    //user
    public function getUserEdit($id)
    {
        $user = User::find($id);
        return view('admin.profile-edit', ['user' => $user]);
    }
    public function postUserEdit(Request $req)
    {
        $user = User::find($req->id);
        $this->validate(
            $req,
            [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255',/* 'unique:users'*/],
                'level' => ['required', 'integer'],
            ],
            [
                'name.required' => 'Họ và tên là trường bắt buộc',
                'name.max' => 'Họ và tên không quá 100 ký tự',
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không quá 255 ký tự',
                // 'email.unique' => 'Email đã tồn tại',
            ]
        );
        $user->name = $req->name;
        $user->email = $req->email;
        $user->level = $req->level;
        $user->active = $req->active;
        
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        if($user->active == 0){
            Auth::logout();
        }

        return redirect()->route('user-edit', ['id' => $req->id])->with('dialog', 'Sửa thành công');
    }

    //post - bai viet
    public function getPostEdit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $period = Period::all();
        return view(
            'admin.post-edit',
            ['post' => $post, 'categories' => $categories, 'periods' => $period]
        );
    }

    public function postPostEdit(Request $request, $id)
    {

        $post = Post::find($id);
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->post_content;
        $post->highlight = $request->highlight;
        $post->category_id = $request->category;
        $post->period_id = $request->period;
        $post->user_id = Auth::user()->id;
        $post->hidden = $request->hidden;
        
        $post->updated_at = date("Y-m-d H:i:s");
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();
            $img = Str::random(5) . "_" . $name;

            while (file_exists("public.upload.images." . $img)) {
                $img = Str::random(5) . "_" . $name;
            }
            $file->move("upload/images", $img);
            File::delete($post->image);
            $post->image = $img;
        }
        $post->save();
        return redirect()->route('posts-list')->with('dialog', 'Cập nhật bài viết thành công ');
    }

    public function postVideoEdit(Request $request, $id)
    {

        $post = Post::find($id);
        $post->title = $request->title;
        $post->summary = $request->summary;
        $post->content = $request->post_content;
        $post->highlight = $request->highlight;
        $post->category_id = $request->category;
        $post->period_id = $request->period;
        $post->user_id = Auth::user()->id;
        $post->hidden = $request->hidden;
        $post->updated_at = date("Y-m-d H:i:s");

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();
            $img = Str::random(5) . "_" . $name;

            while (file_exists("public.upload.images." . $img)) {
                $img = Str::random(5) . "_" . $name;
            }
            $file->move("upload/images", $img);
            File::delete($post->image);
            $post->image = $img;
        }
        $post->save();
        return redirect()->route('posts-list')->with('dialog', 'Cập nhật thành công ');
    }

    //enable and disable || delete
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return redirect()->route('user-edit', ['id' => $id])->with('dialog', 'Vô hiệu hóa thành công');
    }

    public function userActive($id)
    {
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->route('user-edit', ['id' => $id])->with('dialog', 'Kích hoạt thành công');
    }
}
