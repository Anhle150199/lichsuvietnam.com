<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Socialite;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Period;
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
            return view("admin.index");
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

    //Edit
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
        $user->save();

        return redirect()->route('user-edit', ['id' => $req->id])->with('dialog', 'Sửa thành công');
    }

    //enable and disable || delete
    public function userDelete($id)
    {
        $user =User::find($id);
        $user->active = 0;
        $user->save();
        return redirect()->route('user-edit', ['id' => $id])->with('dialog', 'Vô hiệu hóa thành công');
    }

    public function userActive($id)
    {
        $user =User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->route('user-edit', ['id' => $id])->with('dialog', 'Kích hoạt thành công');
    }

    
}
