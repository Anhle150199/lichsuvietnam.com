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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

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
            $postHighlight = Post::where('hidden', 0)->where('highlight', '1')->orderBy('views', 'desc')->first();
            $postNew = Post::where('hidden', 0)->orderBy('created_at', 'desc')->first();

            $totalPost = $post->count();
            $views = $post->sum('views');
            $likes = $post->sum('likes');
            $comments = $post->sum('comments');
            if ($totalPost != 0 && $postHighlight != null) {
                $userPost = User::where('id', $postHighlight->user_id)->first();
                $userPostNew = User::where('id', '=', $postNew->user_id)->first();
                return view(
                    "admin.index",
                    [
                        'post' => $post, 'total_post' => $totalPost,
                        'views' => $views, 'likes' => $likes, 'comments' => $comments,
                        'post_highlight' => $postHighlight, 'post_new' => $postNew,
                        'user_post' => $userPost, 'user_post_new' => $userPostNew
                    ]
                );
            }
            $userPostNew = User::where('id', '=', $postNew->user_id)->first();
            return view(
                "admin.index",
                [
                    'post' => $post, 'total_post' => $totalPost,
                    'views' => $views, 'likes' => $likes, 'comments' => $comments,
                    'post_highlight' => $postHighlight, 'post_new' => $postNew,
                    'user_post_new' => $userPostNew
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
        $post->video = "";
        $post->created_at = date("Y-m-d H:i:s");
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $img = $file->getClientOriginalName();

            while (file_exists("public/upload/images/" . $img)) {
                $img = Str::random(5) . "_" . $img;
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
            $img = $file->getClientOriginalName();

            while (file_exists("public/upload/images/" . $img)) {
                $img = Str::random(5) . "_" . $img;
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
            ]
        );
        $user->name = $req->name;
        $user->email = $req->email;
        $user->level = $req->level;
        $user->active = $req->active;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        if (Auth::user()->id == $user->id && $user->active == 0) {
            Auth::logout();
        }
        return redirect()->route('user-edit', ['id' => $req->id])->with('dialog', 'Sửa thành công');
    }

    public function getProfile()
    {
        return view('profile');
    }
    public function postProfile(Request $req)
    {
        $user = Auth::user();
        $this->validate(
            $req,
            [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255',/* 'unique:users'*/],
            ],
            [
                'name.required' => 'Họ và tên là trường bắt buộc',
                'name.max' => 'Họ và tên không quá 100 ký tự',
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không quá 255 ký tự',
            ]
        );
        $user->name = $req->name;
        $user->email = $req->email;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect('profile')->with('dialog', 'Sửa thành công');
    }
    public function postChangeAvatar(Request $request)
    {
        $avatarDefault = ['avatar1.jpg', 'avatar2.jpg', 'avatar3.png', 'avatar4.jpg', 'avatar5.jpg'];
        $user = Auth::user();
        $file_path = "upload/images/" . $user->avatar;

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $name = $file->getClientOriginalName();
            // $img = Str::random(5) . "_" . $name;

            while (file_exists("public/upload/images/" . $name)) {
                $name = Str::random(5) . "_" . $name;
            }

            if (!in_array($user->avatar, $avatarDefault)) {
                FILE::delete($file_path);
            }
            $file->move("upload/images", $name);
            $user->avatar = $name;
        }
        $user->save();
        return redirect()->route('profile')->with('dialog', 'Cập nhật avatar thành công');
    }

    public function getChangePassword()
    {
        return view('change-pass');
    }
    public function postChangePassword(Request $request)
    {
        $rules = [
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $messages = [

            'old_password.required' => 'Mật khẩu là trường bắt buộc',
            'old_password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'new_password.required' => 'Mật khẩu là trường bắt buộc',
            'new_password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'new_password.confirmed' => 'Xác nhận mật khẩu không đúng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('change-password')->withErrors($validator)->withInput();
        } else {
            $oldPassword = $request->input('old_password');
            if (Hash::check($oldPassword, Auth::user()->password)) {
                $userId = Auth::user()->id;
                $user = User::find($userId);
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect('profile')->with('dialog', 'Đổi mật khẩu thành công');
            } else {
                return redirect('change-password')->with('error', 'Mật khẩu cũ không đúng!');
            }
        }
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
        $file_path = "upload/images/" . $post->image;

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

            while (file_exists("public/upload/images/" . $name)) {
                $name = Str::random(5) . "_" . $name;
            }
            FILE::delete($file_path);
            $file->move("upload/images", $name);
            $post->image = $name;
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
    public function disableUser()
    {
        $user = Auth::user();
        $user->active = 0;
        $user->save();
        Auth::logout();
        return redirect()->route('profile');
    }

    // public function userActive($id)
    // {
    //     $user = User::find($id);
    //     $user->active = 1;
    //     $user->save();
    //     return redirect()->route('user-edit', ['id' => $id])->with('dialog', 'Kích hoạt thành công');
    // }
}
